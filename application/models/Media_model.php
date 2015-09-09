<?php 

/**
 * Media_Model

 * @package Media
 *
 */
class Media_Model extends CI_Model {

	
	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Media Methode **/	
	
	/**
	 * AddMedia method creates a record in the Medias 
	 * 
	 * Option: Values
	 * --------------
	 * mediaName
	 * mediaCaption
	 * mediaType
	 * mediaAddress
	 * mediaTheme
	 * mediaStatus
	 * mediaLocal
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddMedia($options =array()){
		// required values
		if(!$this->_required(
			array('mediaName'),
			$options)
		)return false;
		$options=$this->_defult(array('mediaStatus'=>'active'), $options);
		
		$this->db->insert('medias',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateMedia method updates a record inthe Medias table
	 * 
	 * Option:Values
	 * -------------
	 * mediaId		required
	 * mediaName
	 * mediaCaption
	 * mediaType
	 * mediaAddress
	 * mediaTheme
	 * mediaStatus
	 * mediaLocal
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateMedia($options=array()){
		// required values
		if(!$this->_required(
			array('mediaId'),
			$options)
		)return false;
		if(isset($options['mediaName']))
			$this->db->set('mediaName',$options['mediaName']);
		
		if(isset($options['mediaCaption']))
			$this->db->set('mediaCaption',$options['mediaCaption']);
		
		if(isset($options['mediaType']))
			$this->db->set('mediaType',$options['mediaType']);
			
		if(isset($options['mediaAddress']))
			$this->db->set('mediaAddress',$options['mediaAddress']);
		
		if(isset($options['mediaTheme']))
			$this->db->set('mediaTheme',$options['mediaTheme']);
		
		if(isset($options['mediaStatus']))
			$this->db->set('mediaStatus',$options['mediaStatus']);
		
		if(isset($options['mediaLocal']))
			$this->db->set('mediaLocal',$options['mediaLocal']);
		
		$this->db->where('mediaId',$options['mediaId']);
			
		$this->db->update('medias');
                
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetMedias method returns a qualified list of Medias table
	 * 
	 * Options:Values
	 * --------------
	 * mediaId		
	 * mediaName
	 * mediaCaption
	 * mediaType
	 * mediaAddress
	 * mediaTheme
	 * mediaStatus
	 * mediaLocal
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * mediaId	
	 * mediaName
	 * mediaCaption
	 * mediaType
	 * mediaAddress
	 * mediaTheme
	 * mediaStatus
	 * mediaLocal
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetMedias($options=array()){
		// Qualification
		if(isset($options['mediaId']))
			$this->db->where('mediaId',$options['mediaId']);
		
		if(isset($options['mediaName']))
			$this->db->where('mediaName',$options['mediaName']);
		
		if(isset($options['mediaCaption']))
			$this->db->where('mediaCaption',$options['mediaCaption']);
		
		if(isset($options['mediaType']))
			$this->db->where('mediaType',$options['mediaType']);
		
		if(isset($options['mediaAddress']))
			$this->db->where('mediaAddress',$options['mediaAddress']);
		
		if(isset($options['mediaTheme']))
			$this->db->where('mediaTheme',$options['mediaTheme']);
		
		if(isset($options['mediaStatus']))
			$this->db->where('mediaStatus',$options['mediaStatus']);
		
		if(isset($options['mediaLocal']))
			$this->db->where('mediaLocal',$options['mediaLocal']);
		
		if(!isset($options['mediaStatus']))$this->db->where('mediaStatus !=','deleted' );
		
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$query=$this->db->get("medias");
		//var_dump($query->result());
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['mediaId']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file media_Model */
/* Location: ./application/models/media_Model.php */