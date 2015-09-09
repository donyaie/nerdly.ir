<?php 

/**
 * Media_Model

 * @package Media
 *
 */
class Gallery_Model extends CI_Model {

	var $gallery_path;
	var $gallery_path_url;
	
	public function __construct(){
        parent::__construct();
        
        $this->gallery_path=realpath(APPPATH.'../resource/photo');
		$this->gallery_path_url=base_url().'resource/photo/';
	}

	public function do_upload($varName){
		$config['allowed_types']='jpg|jpeg|gif|png';
		$config['upload_path']=$this->gallery_path;
		$config['max_size']=2048;
		
		$this->load->library('upload',$config);
	
		$image_data=$this->upload->do_upload($varName);
		$thumbAddress=$this->MakeThumb($image_data['full_path']);
		
		return array(
			'photoAddress'=>$image_data['full_path'],
			'thumbAddress'=>$thumbAddress
			);
	}
	
	public function MakeThumb($sourceAddress){
		$config['source_image']=$sourceAddress;
		$config['new_image']=$this->gallery_path.'thumbs';
		$config['maintain_ration']=true;
		$config['width']=150;
		$config['height']=100;
		
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
		
		return $this->gallery_path.'thumbs';
		
	}

	public function GetPhotos(){
		$files=scandir($this->gallery_path);
		$files=array_diff($files,array('.','..','thumbs'));
		
		$images=array();
		foreach ($files as $file){
			$images[]=array(
				'url'=>$this->gallery_path_url.$file,
				'thumb_url'=>$this->gallery_path_url.'thumbs/'.$file
			);
		}
	}
}

/* End of file Gallery_Model */
/* Location: ./application/models/Gallery_Model.php */