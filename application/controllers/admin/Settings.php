<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

 	public function __construct(){
        parent::__construct();
        if(!$this->user_model->Secure(array('userType'=>array('admin','user')))){
        	$this->session->set_flashdata('flashError','You most be logged into a valid admin acount to access to this section');
        	redirect('login');
        }
    }
    
	//Retrive
	public function index(){
		
		$settings=$this->setting_model->GetSettings();
		if(!$settings)redirect('admin');
		foreach ($settings as $setting) {
			if($setting->settingKey == 'title')
				$data['settings']['settingTitle']=$setting;
			else if($setting->settingKey == 'description')
				$data['settings']['settingDescription']=$setting;
		}
		if(!$data['settings'])redirect('admin');
		
		// Validate form
		$this->form_validation->set_rules('settingTitle','Title','trim|required');
		$this->form_validation->set_rules('settingDescription','Description','trim|required');

		if($this->form_validation->run()){
			//validation passes
			$resultDescription=$this->setting_model->UpdateSetting(array(
						'settingKey'=>'description',
						'settingValue'=>$this->input->post('settingDescription')
						));
						
			$resultTitle=$this->setting_model->UpdateSetting(array(
						'settingKey'=>'title',
						'settingValue'=>$this->input->post('settingTitle')
						));
						
			$this->session->set_flashdata('flashConfirm','The Settings has been successfully Update');
			redirect('admin/settings');
		}
		
		$this->load->theme('admin2');
		$this->load->view('settings/settings_index',$data);
	}
	
	
}

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */