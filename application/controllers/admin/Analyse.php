<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analyse extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->user_model->Secure(array('userType' => array('admin', 'user')))) {
            $this->session->set_flashdata('flashError', 'You most be logged into a valid admin OR user acount to access to this section');
            redirect('login');
        }
    }

    public function index($offset = 0) {

//        $this->load->library('user_agent');
//
//        if ($this->agent->is_browser()) {
//            $agent = $this->agent->browser() . ' ' . $this->agent->version();
//        } elseif ($this->agent->is_robot()) {
//            $agent = $this->agent->robot();
//        } elseif ($this->agent->is_mobile()) {
//            $agent = $this->agent->mobile();
//        } else {
//            $agent = 'Unidentified User Agent';
//        }
//
//        echo $agent;
//
//        echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
//        
//        $_SERVER['REMOTE_ADDR'];
//        $ip = $this->input->ip_address();
//        $location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
//        print_r($location);

        $this->load->Model('session_model');


        /////////////////////////////////////////////////

        $this->load->library('pagination');

        $perpage = 5;


        $config['total_rows'] = $this->session_model->GetSession(array(
            'count' => true
        ));



        $config['base_url'] = base_url() . 'admin/analyse/index/';
        $config['per_page'] = $perpage;
        $config['uri_segment'] = 4;

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li> ';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['last_tag_open'] = '<li> &nbsp;';
        $config['last_tag_close'] = '</li> ';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '&nbsp;</li> ';

        $config['last_link'] = 'اخرین &rsaquo;';
        $config['first_link'] = '&lsaquo; اولین';



        $config['num_links'] = 10;


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['sessions'] = $this->session_model->GetSession(array(
            'sortBy' => 'timestamp',
            'sortDirection' => 'DESC',
            'limit' => $perpage,
            'offset' => $offset
        ));

        //var_dump($data);
        $this->load->theme('admin2', $data);
        $this->load->view('analyse/analyse_index', $data);
    }

}

/* End of file Analyse.php */
/* Location: ./application/controllers/Analyse.php */