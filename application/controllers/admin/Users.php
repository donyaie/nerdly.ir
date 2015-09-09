<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

 	public function __construct(){
        parent::__construct();
        if(!$this->user_model->Secure(array('userType'=>array('admin')))){
        	$this->session->set_flashdata('flashError','You most be logged into a valid admin acount to access to this section');
        	redirect('login');
        }
         
    }
    
	//Creat
	public function add(){
		
		// Validate form
		$this->form_validation->set_rules('userEmail','email','trim|required|valid_email');
		$this->form_validation->set_rules('userPassword','password','trim|required|min_length[6]');
		$this->form_validation->set_rules('userType','type','trim|required');
		$this->form_validation->set_rules('userStatus','status','trim|required');
		
		if($this->form_validation->run()){
			//validation passes
			$userId=$this->user_model->AddUser(array(
				'userEmail'=>$this->input->post('userEmail'),
				'userPassword'=>md5($this->input->post('userPassword')),
				'userType'=>$this->input->post('userType'),
				'userStatus'=>$this->input->post('userStatus'),
			));
			
			if($userId){
				$this->session->set_flashdata('flashConfirm','The user has been successfully added');
				redirect('admin/users');
			}
			else{
				
				$this->session->set_flashdata('flashError','A dabase error has occured,please contact your administrator');
				redirect('admin/users');
			}
		}	
			
		$this->load->theme('admin2');
		$this->load->view('users/users_add_form');
	}
	
	//Retrive
	public function index($offset=0){
		
		$this->load->library('pagination');
		
		$perpage=5;
		
		$config['base_url']=base_url().'admin/users/index/';
		$config['total_rows']=$this->user_model->GetUsers(array('count'=>true));
		$config['per_page']=$perpage;
		$config['uri_segment']=4;
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                
                $config['prev_tag_open'] = '<li> ';
                $config['prev_tag_close'] = '</li>';
		
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
                
		$this->pagination->initialize($config);
		
		$data['pagination']=$this->pagination->create_links();
		
		$data['users']=$this->user_model->GetUsers(array(
			'limit'=>$perpage,
			'offset'=>$offset
		));
		
		$this->load->theme('admin2');
		$this->load->view('users/users_index',$data);
	}
	
	//Update
	public function edit($userId){
		$data['user']=$this->user_model->GetUsers(array('userId'=>$userId));
		if(!$data['user'])redirect('users');
		
		// Validate form
		$this->form_validation->set_rules('userEmail','email','trim|required|valid_email');
		$this->form_validation->set_rules('userPassword','password','trim|min_length[6]');
		$this->form_validation->set_rules('userType','type','trim|required');
		$this->form_validation->set_rules('userStatus','status','trim|required');
		
		if($this->form_validation->run()){
			//validation passes
			$user=array(
				'userId'=>$userId,
				'userEmail'=>$this->input->post('userEmail'),
				'userPassword'=>$this->input->post('userPassword'),
				'userType'=>$this->input->post('userType'),
				'userStatus'=>$this->input->post('userStatus'),
			);
			
			if(empty($user['userPassword']))
				unset($user['userPassword']);
				
			if($this->user_model->UpdateUser($user)){
				$this->session->set_flashdata('flashConfirm','The user has been successfully Updated');
				redirect('admin/users');
			}
			else{
				
				$this->session->set_flashdata('flashError','A dabase error has occured,please contact your administrator');
				redirect('admin/users');
			}
		}
		
		$this->load->theme('admin2');
		$this->load->view('users/users_edit_form',$data);
	}
	
	//Delete
	public function delete($userId){
		$data['user']=$this->user_model->GetUsers(array('userId'=>$userId));
		if(!$data['user'])redirect('admin/users');
		
		$this->user_model->UpdateUser(array(
			'userId'=>$userId,
			'userStatus'=>'deleted'
		));
		
		$this->session->set_flashdata('flashConfirm','The User has been successfully deleted.');
				redirect('admin/users');
		
	}
	
}

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */