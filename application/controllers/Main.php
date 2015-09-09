<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
       

        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        
         $this->session->set_userdata('agent', $agent);
         $this->session->set_userdata('agent_platform', $this->agent->platform());
    }

    public function login() {

        if ($this->user_model->Secure(array('userType' => array('admin', 'user'))))
            redirect('admin');

        $this->form_validation->set_rules('userEmail', 'email', 'trim|encode_php_tags|required|valid_email|callback__check_login');
        $this->form_validation->set_rules('userPassword', 'password', 'trim|encode_php_tags|required');

        if ($this->form_validation->run()) {
            // the form has successfuly validation

            if ($this->user_model->login(array('userEmail' => $this->input->post('userEmail'), 'userPassword' => md5($this->input->post('userPassword'))))) {
                redirect('admin');
            }

            $this->session->set_flashdata('flashError', 'پست الکترونیک یا رمز عبور اشتباه می باشد');
            redirect('main/login');
        }

        $this->load->theme('fullscreen');
        $this->load->view('main/login_form');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('main');
    }

    public function index($offset = 0) {

        $data['photoThemePath'] = base_url() . 'resource/photo/theme/';

//        $this->load->library('pagination');
//
//        $perpage = 5;
//
//        $config['base_url'] = base_url() . 'main/index/';
//        $config['total_rows'] = $this->post_model->GetPosts(array('count' => true));
//        $config['per_page'] = $perpage;
//
//        $this->pagination->initialize($config);
//
//        $data['pagination'] = $this->pagination->create_links();

        $data['posts'] = $this->post_model->GetPosts(array(
            'postType' => 'post',
            'sortBy' => 'postDate',
            'sortDirection' => 'DES',
            'limit' => 8,
            'offset' => 0,
            'getTheme' => true
        ));

        //var_dump($data);

        $this->load->theme('index', $data);
        $data['learning'] = $this->load->viewNONTheme('index/learning_index', $data, true);
        $this->load->view('main_index', $data);
    }

    public function _check_login($userEmail) {
        if ($this->input->post('userPassword')) {
            $user = $this->user_model->GetUsers(array('userEmail' => $userEmail, 'userPassword' => md5($this->input->post('userPassword'))));
            if ($user)
                return true;
        }

        $this->form_validation->set_message('_check_login', 'نام کاربری یا رمز عبور شما صحیح نمیباشد');
        return FALSE;
    }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */