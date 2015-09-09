<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {

    var $photoPath;
    var $photoThemePath;

    public function __construct() {
        parent::__construct();
        if (!$this->user_model->Secure(array('userType' => array('admin', 'user')))) {
            $this->session->set_flashdata('flashError', 'You most be logged into a valid admin OR user acount to access to this section');
            redirect('login');
        }
        $this->photoPath = 'resource/photo/';
        $this->photoThemePath = 'resource/photo/Theme/';
    }

    //Creat
    public function add() {

        // Validate form
        $this->form_validation->set_rules('photoName', 'name', 'trim|required');
        $this->form_validation->set_rules('photoCaption', 'caption', 'trim|required');
        $this->form_validation->set_rules('photoStatus', 'status', 'trim|required');
        $this->form_validation->set_rules('photoUpload', 'upload', 'trim');

        if ($this->form_validation->run()) {

            $mediaAddress = "";
            $mediaTheme = "";
            var_dump($_POST);
            //die();

            $config['upload_path'] = './resource/photo/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10240';
            $config['max_width'] = '2048';
            $config['max_height'] = '2048';
            $config['encrypt_name'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photoUpload')) {
                $imageData = $this->upload->data();
                $mediaAddress = $imageData['file_name'];
                $mediaTheme = $imageData['file_name'];



                $sourceimage = $this->photoPath . $mediaAddress;

                list($width, $height) = getimagesize($sourceimage);

                $resize_settings['image_library'] = 'gd2';
                $resize_settings['source_image'] = $sourceimage;
                $resize_settings['maintain_ratio'] = false;
                $resize_settings['quality'] = '90%';
                $config['create_thumb'] = TRUE;
                $this->load->library('image_lib', $resize_settings);

                $resize_settings['width'] = 400; //$width;
                $resize_settings['height'] = 200; //$height;
                $resize_settings['new_image'] = $this->photoThemePath . $mediaAddress;
                $this->image_lib->initialize($resize_settings);

                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('flashError', $this->image_lib->display_errors());
                    redirect('admin/gallery/add');
                }
               
            } else {
                $this->session->set_flashdata('flashError', $this->upload->display_errors());
                redirect('admin/gallery/add');
            }


            //validation passes
            $photoId = $this->media_model->AddMedia(array(
                'mediaType' => 'photo',
                'mediaName' => $this->input->post('photoName'),
                'mediaCaption' => $this->input->post('photoCaption'),
                'mediaStatus' => $this->input->post('photoStatus'),
                'mediaLocal' => true,
                'mediaAddress' => $mediaAddress,
                'mediaTheme' => $mediaAddress,
            ));

            if ($photoId) {
                $this->session->set_flashdata('flashConfirm', 'The user has been successfully added');
                redirect('admin/gallery');
            } else {

                $this->session->set_flashdata('flashError', 'A dabase error has occured,please contact your administrator');
                redirect('admin/gallery');
            }
        }

        $this->load->theme('admin2');
        $this->load->view('gallery/gallery_add_form');
    }

    //Retrive
    public function index($offset = 0) {

        $data['photoThemePath'] = base_url() . $this->photoThemePath;
        $data['photoPath'] = base_url() . $this->photoPath;

        $this->load->library('pagination');

        $perpage = 5;

        $config['base_url'] = base_url() . 'admin/gallery/index/';
        $config['total_rows'] = $this->media_model->GetMedias(array('mediaType' => 'photo', 'count' => true));
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

        $data['gallery'] = $this->media_model->GetMedias(array(
            'mediaType' => 'photo',
            'limit' => $perpage,
            'offset' => $offset
        ));

        $this->load->theme('admin2');
        $this->load->view('gallery/gallery_index', $data);
    }
    

    //Update
    public function edit($photoId) {

        $data['photoThemePath'] = base_url() . $this->photoThemePath;
        $data['photoPath'] = base_url() . $this->photoPath;

        $data['photo'] = $this->media_model->GetMedias(array('mediaId' => $photoId));
        if (!$data['photo'])
            redirect('admin/gallery');

        // Validate form
        $this->form_validation->set_rules('mediaName', 'name', 'trim|required');
        $this->form_validation->set_rules('mediaCaption', 'caption', 'trim|required');
        $this->form_validation->set_rules('mediaStatus', 'status', 'trim|required');

        if ($this->form_validation->run()) {
            //validation passes
            $photo = array(
                'mediaId' => $photoId,
                'mediaName' => $this->input->post('mediaName'),
                'mediaCaption' => $this->input->post('mediaCaption'),
                'mediaStatus' => $this->input->post('mediaStatus'),
            );

            if ($this->media_model->UpdateMedia($photo)) {
                $this->session->set_flashdata('flashConfirm', 'تصویر با موفقیت به روزرسانی گردید');
                redirect('admin/gallery');
            } else {

                $this->session->set_flashdata('flashError', 'ایراد در پایگاه داده با مدیر تماس بگیرید');
                redirect('admin/gallery');
            }
        }

        $this->load->theme('admin2');
        $this->load->view('gallery/gallery_edit_form', $data);
    }

    //Delete
    public function delete($photoId) {

        $data['photo'] = $this->media_model->GetMedias(array('mediaId' => $photoId));
        if (!$data['photo'])
            redirect('admin/gallery');

        $this->media_model->UpdateMedia(array(
            'mediaId' => $photoId,
            'mediaStatus' => 'deleted'
        ));

        $this->session->set_flashdata('flashConfirm', 'The Photo has been successfully deleted.');
        redirect('admin/gallery');
    }

}

/* End of file users.php */
/* Location: ./application/controllers/admin/gallery.php */