<?php 

/**
 * Link_Model

 * @package Link
 *
 */
class Link_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Link Methode **/	
	
	/**
	 * AddLink method creates a record in the Links 
	 * 
	 * Option: Values
	 * --------------
	 * linkId
	 * linkName
	 * linkCaption
	 * linkAddress
	 * linkType
	 * linkStatus
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddLink($options =array()){
		// required values
		if(!$this->_required(
			array('linkName'),
			$options)
		)return false;
		$options=$this->_defult(array('linkStatus'=>'active'), $options);
		
		$this->db->insert('links',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateLink method updates a record inthe Links table
	 * 
	 * Option:Values
	 * -------------	
	 * linkId	required
	 * linkName
	 * linkCaption
	 * linkAddress
	 * linkType
	 * linkStatus
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateLink($options=array()){
		// required values
		if(!$this->_required(
			array('linkId'),
			$options)
		)return false;
		
		if(isset($options['linkName']))
			$this->db->set('linkName',$options['linkName']);
		
		if(isset($options['linkCaption']))
			$this->db->set('linkCaption',$options['linkCaption']);
		
		if(isset($options['linkAddress']))
			$this->db->set('linkAddress',$options['linkAddress']);
			
		if(isset($options['linkType']))
			$this->db->set('linkType',$options['linkType']);
		
		if(isset($options['linkStatus']))
			$this->db->set('linkStatus',$options['linkStatus']);
			
		$this->db->where('linkId',$options['linkId']);
			
		$this->db->update('links');
		
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetLinks method returns a qualified list of Links table
	 * 
	 * Options:Values
	 * --------------
	 * linkId	
	 * linkName
	 * linkCaption
	 * linkAddress
	 * linkType
	 * linkStatus
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * linkId	
	 * linkName
	 * linkCaption
	 * linkAddress
	 * linkType
	 * linkStatus
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetLinks($options=array()){
		// Qualification
		if(isset($options['linkId']))
			$this->db->where('linkId',$options['linkId']);
		
		if(isset($options['linkName']))
			$this->db->where('linkName',$options['linkName']);
		
		if(isset($options['linkCaption']))
			$this->db->where('linkCaption',$options['linkCaption']);
		
		if(isset($options['linkAddress']))
			$this->db->where('linkAddress',$options['linkAddress']);
		
		if(isset($options['linkType']))
			$this->db->where('linkType',$options['linkType']);
		
		if(isset($options['linkStatus']))
			$this->db->where('linkStatus',$options['linkStatus']);
		
			
		if(!isset($options['linkStatus']))$this->db->where('linkStatus !=','deleted' );
		
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$query=$this->db->get("links");
		//var_dump($query->result());
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['linkId']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file link_Model */
/* Location: ./application/models/link_Model.php */