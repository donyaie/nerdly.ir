 <?php

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    function index()
    {
        $this->load->library('tinymce');
        
        $data['head'] = $this->tinymce->createhead();
        $data['mce']  = $this->tinymce->textarea(TRUE);
        
        $this->load->view('welcome_message',$data);
    }
}