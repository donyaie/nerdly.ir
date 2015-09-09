<?php 

/**
 * Term_Model

 * @package Term
 *
 */
class Term_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Term Methode **/	
	
	/**
	 * AddTerm method creates a record in the terms 
	 * 
	 * Option: Values
	 * --------------
	 * termId
	 * termName
	 * termCaption
	 * termParent
	 * termStatus
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddTerm($options =array()){
		// required values
		if(!$this->_required(
			array('termName'),
			$options)
		)return false;
		$options=$this->_defult(array('termStatus'=>'active'), $options);
		
		$this->db->insert('terms',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateTerm method updates a record inthe Terms table
	 * 
	 * Option:Values
	 * -------------
	 * termId		required
	 * termName
	 * termCaption
	 * termParent
	 * termStatus
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateTerm($options=array()){
		// required values
		if(!$this->_required(
			array('termId'),
			$options)
		)return false;
		
		if(isset($options['termName']))
			$this->db->set('termName',$options['termName']);
		
		if(isset($options['termCaption']))
			$this->db->set('termCaption',$options['termCaption']);
		
		if(isset($options['termParent']))
			$this->db->set('termParent',$options['termParent']);
			
		if(isset($options['termStatus']))
			$this->db->set('termStatus',$options['termStatus']);
		
		$this->db->where('termId',$options['termId']);
			
		$this->db->update('terms');
		
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetTerms method returns a qualified list of terms table
	 * 
	 * Options:Values
	 * --------------
	 * termId
	 * termName
	 * termCaption
	 * termParent
	 * termStatus
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * termId
	 * termName
	 * termCaption
	 * termParent
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetTerms($options=array()){
		// Qualification
		if(isset($options['termId']))
			$this->db->where('termId',$options['termId']);
		
		if(isset($options['termName']))
			$this->db->where('termName',$options['termName']);
		
		if(isset($options['termCaption']))
			$this->db->where('termCaption',$options['termCaption']);
		
		if(isset($options['termParent']))
			$this->db->where('termParent',$options['termParent']);
		
			
		if(!isset($options['termStatus']))$this->db->where('termStatus !=','deleted' );
		
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$query=$this->db->get("terms");
		//var_dump($query->result());
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['termId']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file term_Model */
/* Location: ./application/models/blog/term_Model.php */