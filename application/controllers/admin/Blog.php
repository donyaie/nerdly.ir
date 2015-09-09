<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('ckeditor');

        if (!$this->user_model->Secure(array('userType' => array('admin', 'user')))) {
            $this->session->set_flashdata('flashError', 'You most be logged into a valid admin OR user acount to access to this section');
            redirect('login');
        }
    }

    /** post Segment * */
    //Creat post
    public function addPost() {


        $data['postContentEditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'postContent',
            'path' => 'themes/lib/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '100px', //Setting a custom height
                'filebrowserBrowseUrl' => base_url() . 'themes/lib/js/fileman/index.html',
                'filebrowserImageBrowseUrl' => base_url() . 'themes/lib/js/fileman/index.html?type=image',
                'removeDialogTabs' => 'link:upload;image:upload'
            )
        );

        $data['postExcerptEditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'postExcerpt',
            'path' => 'themes/lib/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '100px', //Setting a custom height
                'filebrowserBrowseUrl' => base_url() . '/themes/lib/js/fileman/index.html',
                'filebrowserImageBrowseUrl' => base_url() . '/themes/lib/js/fileman/index.html?type=image',
                'removeDialogTabs' => 'link:upload;image:upload'
                
            )
        );

        $this->load->model('term_model');
        $terms = $this->term_model->GetTerms();
        if (isset($terms) && is_array($terms) && count($terms) > 0) {
            foreach ($terms as $term) {
                $data['terms'][$term->termId] = $term->termCaption;
            }
        }

        $this->load->model('media_Model');
        $themes = $this->media_Model->GetMedias(array('mediaType' => 'photo'));
        if (isset($themes) && is_array($themes) && count($themes) > 0) {
            foreach ($themes as $theme) {
                $data['themes'][$theme->mediaId] = $theme->mediaCaption;
            }
        }

        // Validate form
        $this->form_validation->set_rules('postName', 'name', 'trim|required');
        $this->form_validation->set_rules('postTitle', 'title', 'trim|required');
        $this->form_validation->set_rules('postExcerpt', 'excerpt', 'trim');
        $this->form_validation->set_rules('postContent', 'content', 'trim|required');
        $this->form_validation->set_rules('postStatus', 'status', 'trim|required');
        $this->form_validation->set_rules('postParent', 'parent', 'trim|required');
        $this->form_validation->set_rules('postGuid', 'guid', 'trim|required');
        $this->form_validation->set_rules('postType', 'types', 'trim|required');
        $this->form_validation->set_rules('postTermId', 'TermId', 'trim|required');
        $this->form_validation->set_rules('postThemeId', 'ThemeId', 'trim|required');

        if ($this->form_validation->run()) {
            //validation passes
            $postId = $this->post_model->AddPost(array(
                'postTitle' => $this->input->post('postTitle'),
                'postName' => $this->input->post('postName'),
                'postContent' => $this->input->post('postContent'),
                'postExcerpt' => ($this->input->post('postExcerpt')),
                'postParent' => $this->input->post('postParent'),
                'postGuid' => $this->input->post('postGuid'),
                'postType' => $this->input->post('postType'),
                'postDate' => date('Y-m-d H:i:s'),
                'postAuthorId' => $this->session->userdata('userId'),
                'postTermId' => $this->input->post('postTermId'),
                'postThemeId' => $this->input->post('postThemeId'),
                'postCommentCount' => '0'
            ));


            if ($postId) {
                $this->session->set_flashdata('flashConfirm', 'The post has been successfully added');
                redirect('admin/blog');
            } else {

                $this->session->set_flashdata('flashError', 'A dabase error has occured,please contact your administrator');
                redirect('admin/blog');
            }
        }

        $this->load->theme('admin2');
        $this->load->view('blog/posts/posts_add_form', $data);
    }

    //Retrive post
    public function index($offset = 0) {


        $this->load->library('pagination');

        $perpage = 5;

        $config['base_url'] = base_url() . 'admin/blog/index/';
        $config['total_rows'] = $this->post_model->GetPosts(array('count' => true));
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


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['posts'] = $this->post_model->GetPosts(array(
            'limit' => $perpage,
            'offset' => $offset,
            'getAuthor' => true,
            'getTerm' => true
        ));

        $this->load->theme('admin2');
        $this->load->view('blog/posts/posts_index', $data);
    }

    //Update post
    public function editPost($postId) {

        $data['postContentEditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'postContent',
            'path' => 'themes/lib/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '100px', //Setting a custom height
            )
        );

        $data['postExcerptEditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'postExcerpt',
            'path' => 'themes/lib/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '100px', //Setting a custom height
            )
        );



        $data['post'] = $this->post_model->GetPosts(array('postId' => $postId));
        if (!$data['post'])
            redirect('admin/blog');


        $terms = $this->term_model->GetTerms();
        if (isset($terms) && is_array($terms) && count($terms) > 0) {
            foreach ($terms as $term) {
                $data['terms'][$term->termId] = $term->termCaption;
            }
        }


        $this->load->model('media_Model');
        $themes = $this->media_Model->GetMedias(array('mediaType' => 'photo'));
        if (isset($themes) && is_array($themes) && count($themes) > 0) {
            foreach ($themes as $theme) {
                $data['themes'][$theme->mediaId] = $theme->mediaCaption;
            }
        }

        // Validate form
        $this->form_validation->set_rules('postName', 'name', 'trim|required');
        $this->form_validation->set_rules('postTitle', 'title', 'trim|required');
        $this->form_validation->set_rules('postExcerpt', 'excerpt', 'trim');
        $this->form_validation->set_rules('postContent', 'content', 'trim|required');
        $this->form_validation->set_rules('postStatus', 'status', 'trim|required');
        $this->form_validation->set_rules('postParent', 'parent', 'trim|required');
        $this->form_validation->set_rules('postGuid', 'guid', 'trim|required');
        $this->form_validation->set_rules('postType', 'types', 'trim|required');
        $this->form_validation->set_rules('postTermId', 'TermId', 'trim|required');
        $this->form_validation->set_rules('postThemeId', 'ThemeId', 'trim|required');


        if ($this->form_validation->run()) {
            //validation passes
            $post = array(
                'postId' => $postId,
                'postTitle' => $this->input->post('postTitle'),
                'postName' => $this->input->post('postName'),
                'postContent' => $this->input->post('postContent'),
                'postExcerpt' => ($this->input->post('postExcerpt')),
                'postParent' => $this->input->post('postParent'),
                'postType' => $this->input->post('postType'),
                'postGuid' => $this->input->post('postGuid'),
                'postDate' => date('Y-m-d H:i:s'),
                'postAuthorId' => $this->session->userdata('userId'),
                'postTermId' => $this->input->post('postTermId'),
                'postThemeId' => $this->input->post('postThemeId')
            );

            if ($this->post_model->UpdatePost($post)) {
                $this->session->set_flashdata('flashConfirm', 'The post has been successfully Updated');
                redirect('admin/blog');
            } else {

                $this->session->set_flashdata('flashError', 'A dabase error has occured,please contact your administrator');
                redirect('admin/blog');
            }
        }

        $this->load->theme('admin2');
        $this->load->view('blog/posts/posts_edit_form', $data);
    }

    //Delete post
    public function deletePost($postId) {
        $data['post'] = $this->post_model->GetPosts(array('postId' => $postId));
        if (!$data['post'])
            redirect('admin/blog');

        $this->post_model->UpdatePost(array(
            'postId' => $postId,
            'postStatus' => 'deleted'
        ));

        $this->session->set_flashdata('flashConfirm', 'The post has been successfully deleted.');
        redirect('admin/blog');
    }

    /** End post Segment * */

    /** term Segment * */
    //Creat term
    public function addTerm() {


        $terms = $this->term_model->GetTerms();
        $data['terms']['0'] = 'ریشه';
        if (isset($terms) && is_array($terms) && count($terms) > 0) {
            foreach ($terms as $term) {
                $data['terms'][$term->termId] = $term->termCaption;
            }
        }

        // Validate form
        $this->form_validation->set_rules('termName', 'name', 'trim|required');
        $this->form_validation->set_rules('termCaption', 'title', 'trim|required');
        $this->form_validation->set_rules('termStatus', 'excerpt', 'trim|required');
        $this->form_validation->set_rules('termParent', 'content', 'trim|required');


        if ($this->form_validation->run()) {
            //validation passes
            $termId = $this->term_model->AddTerm(array(
                'termName' => $this->input->post('termName'),
                'termCaption' => $this->input->post('termCaption'),
                'termStatus' => $this->input->post('termStatus'),
                'termParent' => ($this->input->post('termParent'))
            ));


            if ($termId) {
                $this->session->set_flashdata('flashConfirm', 'The term has been successfully added');
                redirect('admin/blog/indexterm');
            } else {

                $this->session->set_flashdata('flashError', 'A dabase error has occured,please contact your administrator');
                redirect('admin/blog/indexterm');
            }
        }

        $this->load->theme('admin2');
        $this->load->view('blog/terms/terms_add_form', $data);
    }

    //Retrive term
    public function indexTerm($offset = 0) {

        $this->load->library('pagination');

        $perpage = 5;

        $config['base_url'] = base_url() . 'admin/blog/indexterm/';
        $config['total_rows'] = $this->term_model->GetTerms(array('count' => true));
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



        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['terms'] = $this->term_model->GetTerms(array(
            'limit' => $perpage,
            'offset' => $offset,
        ));

        $this->load->theme('admin2');
        $this->load->view('blog/terms/terms_index', $data);
    }

    //Update term
    public function editTerm($termId) {

        $data['term'] = $this->term_model->GetTerms(array('termId' => $termId));
        if (!$data['term'])
            redirect('admin/blog/indexTerm');

        $terms = $this->term_model->GetTerms();
        $data['terms']['0'] = 'ریشه';
        if (isset($terms) && is_array($terms) && count($terms) > 0) {
            foreach ($terms as $term) {
                $data['terms'][$term->termId] = $term->termCaption;
            }
        }

        // Validate form
        $this->form_validation->set_rules('termName', 'name', 'trim|required');
        $this->form_validation->set_rules('termCaption', 'title', 'trim|required');
        $this->form_validation->set_rules('termStatus', 'excerpt', 'trim|required');
        $this->form_validation->set_rules('termParent', 'content', 'trim|required');


        if ($this->form_validation->run()) {
            //validation passes
            $term = array(
                'termId' => $termId,
                'termName' => $this->input->post('termName'),
                'termCaption' => $this->input->post('termCaption'),
                'termStatus' => $this->input->post('termStatus'),
                'termParent' => ($this->input->post('termParent'))
            );

            if ($this->term_model->UpdateTerm($term)) {
                $this->session->set_flashdata('flashConfirm', 'The term has been successfully Updated');
                redirect('admin/blog/indexterm');
            } else {

                $this->session->set_flashdata('flashError', 'A dabase error has occured,please contact your administrator');
                redirect('admin/blog/indexterm');
            }
        }

        $this->load->theme('admin2');
        $this->load->view('blog/terms/terms_edit_form', $data);
    }

    //Delete term
    public function deleteTerm($termId) {


        $data['term'] = $this->term_model->GetTerms(array('termId' => $termId));

        if (!$data['term']) {
            $this->session->set_flashdata('flashError', 'The Term not Found');
            redirect('admin/blog/indexterm');
        } else if ($termId == 1) {
            $this->session->set_flashdata('flashError', 'The Term Not To Delete');
            redirect('admin/blog/indexterm');
        }

        // Validate form
        $this->form_validation->set_rules('DeleteTermChild', 'DeleteTermChild', 'trim');
        $this->form_validation->set_rules('DeletePost', 'DeletePost', 'trim');

        if ($this->form_validation->run()) {

            $termChild = $this->term_model->GetTerms(array(
                'termParent' => $termId
            ));


            if ($this->input->post('DeletePost') == TRUE) {//delete post
                // delete this term post 
                $posts = $this->post_model->Getposts(array(
                    'postTermId' => $termId
                ));

                foreach ($posts as $post) {
                    $this->post_model->UpdatePost(array(
                        'postId' => $post->postId,
                        'postStatus' => 'deleted'
                    ));
                }
                if ($this->input->post('DeleteTermChild') == True) {
                    // delete this child term post

                    foreach ($termChild as $term) {
                        $posts = $this->post_model->Getposts(array(
                            'postTermId' => $term->termId
                        ));

                        foreach ($posts as $post) {
                            $this->post_model->UpdatePost(array(
                                'postId' => $post->postId,
                                'postStatus' => 'deleted'
                            ));
                        }
                    }
                }
            } else if ($this->input->post('DeletePost') == FALSE) {//Change the term post to 'no_term'
                // Change this term post to 'no_term' 
                $posts = $this->post_model->Getposts(array(
                    'postTermId' => $termId
                ));

                foreach ($posts as $post) {
                    $this->post_model->UpdatePost(array(
                        'postId' => $post->postId,
                        'postTermId' => '1'
                    ));
                }

                if ($this->input->post('DeleteTermChild') == True) {
                    // Change  child term post to 'no_term' 
                    foreach ($termChild as $term) {
                        $posts = $this->post_model->Getposts(array(
                            'postTermId' => $term->termId
                        ));
                        foreach ($posts as $post) {
                            $this->post_model->UpdatePost(array(
                                'postId' => $post->postId,
                                'postTermId' => '1'
                            ));
                        }
                    }
                }
            }


            //delete term 	
            $this->term_model->UpdateTerm(array(
                'termId' => $termId,
                'termStatus' => 'deleted'
            ));

            //delete term Child
            if ($this->input->post('DeleteTermChild') == TRUE) {
                foreach ($termChild as $term) {
                    $this->term_model->UpdateTerm(array(
                        'termId' => $term->termId,
                        'termStatus' => 'deleted'
                    ));
                }
            } else {
                foreach ($termChild as $term) {
                    $this->term_model->UpdateTerm(array(
                        'termId' => $term->termId,
                        'termParent' => '0'
                    ));
                }
            }



            /* $this->post_model->UpdatePost(array(
              'postTermId'=>'1',
              )); */


            $this->session->set_flashdata('flashConfirm', 'The Term  has been successfully deleted.');
            redirect('admin/blog/indexterm');
        }

        $this->load->theme('admin2');
        $this->load->view('blog/terms/terms_delete_form', $data);
    }

    /** End term Segment * */
}

/* End of file blog.php */
/* Location: ./application/controllers/admin/blog.php */