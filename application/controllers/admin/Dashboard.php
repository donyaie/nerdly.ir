<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 	public function __construct(){
        parent::__construct();
        
 		if(!$this->user_model->Secure(array('userType'=>array('admin','user')))){
        	$this->session->set_flashdata('flashError','You most be logged into a valid admin acount to access to this section');
        	redirect('login');
        }
        
    }
	
	public function index(){
		$data['title']='داشبرد';
		$data['userEmail']=$this->session->userdata('userEmail');
		
		$this->load->theme('admin2');
		$this->load->view('dashboard/dashboard_index',$data);
	}
        
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */