<?php 

/**
 * Session_Model

 * @package Session
 *
 */
class Session_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	
	
	/**
	 * GetSession method returns a qualified list of Sessions table
	 * 
	 * Options:Values
	 * --------------
	 * id
	 * ip_address
	 * timestamp
	 * data
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * id
	 * ip_address
	 * timestamp
	 * data
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetSession($options=array()){
		// Qualification
		if(isset($options['id']))
			$this->db->where('id',$options['id']);
		
		if(isset($options['ip_address']))
			$this->db->where('ip_address',$options['ip_address']);
		
		if(isset($options['timestamp']))
			$this->db->where('timestamp',$options['timestamp']);
		
		if(isset($options['data']))
			$this->db->where('data',$options['data']);
		
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		
		$query=$this->db->get("ci_sessions");
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['id']))
			return $query->row(0);
		
		return $query->result();
	}
	

}

/* End of file Session_model */
/* Location: ./application/models/Session_model.php */











