<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($offset = 0) {


        $data['photoThemePath'] = base_url() . 'resource/photo/theme/';
        $data['photoPath'] = base_url() . 'resource/photo/';
        $this->load->library('pagination');

        $perpage = 4;

        $config['base_url'] = base_url() . 'blog/index/';

        $config['total_rows'] = $this->post_model->GetPosts(array(
            'count' => true,
            'postType' => 'post'
        ));

        $config['per_page'] = $perpage;
        $config['uri_segment'] = 3;

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

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['posts'] = $this->post_model->GetPosts(array(
            'postType' => 'post',
            'sortBy' => 'postDate',
            'sortDirection' => 'DES',
            'limit' => $perpage,
            'offset' => $offset,
            'getTheme' => true
        ));

        //var_dump($data);
        $this->load->theme('blog', $data);
        $this->load->view('blog_index', $data);
    }

    public function article($guide = '') {
        $data['photoThemePath'] = base_url() . 'resource/photo/theme/';
        $data['photoPath'] = base_url() . 'resource/photo/';
        $data['post'] = $this->post_model->GetPosts(array(
            'postType' => 'post',
            'postGuid' => $guide,
            'getAuthor' => true,
            'getTerm' => true,
            'getTheme' => true
        ));
        
        $data['posts'] = $this->post_model->GetPosts(array(
            'postType' => 'post',
            'getTheme' => true,
            'limit' => 6
        ));

        //var_dump($data);
        $this->load->theme('blog', $data);
        $this->load->view('blog_article', $data);
    }

    public function search($offset = 0) {



        // Validate form
        $this->form_validation->set_rules('searchQuery', 'عبارت', 'trim|required');
        $data = array();
        if ($this->form_validation->run()) {
            //validation passes




            $data['photoThemePath'] = base_url() . 'resource/photo/theme/';
            $data['photoPath'] = base_url() . 'resource/photo/';





            $data['posts'] = $this->post_model->GetPosts(array(
                'like' => 'postContent',
                'likeDirection' => $this->input->post('searchQuery'),
                'postType' => 'post',
                'sortBy' => 'postDate',
                'sortDirection' => 'DES',
                'limit' => 10,
                'getTheme' => true
            ));
        }


        $this->load->theme('blog', $data);
        $this->load->view('blog_index', $data);
    }

    public function subject($subject = "") {
        
    }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */