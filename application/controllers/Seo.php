<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Seo extends CI_Controller {

    function sitemap()
    {

        $data['data'] = array('');//select urls from DB to Array
        
        
        $data['posts'] = $this->post_model->GetPosts(array(
            'postType' => 'post',
            'sortBy' => 'postDate',
            'sortDirection' => 'DES'
        ));
        
        
        header("Content-Type: text/xml;charset=utf-8");
        
        
        
        $this->load->view("sitemap",$data);
    }
}