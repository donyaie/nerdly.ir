<?php 

/**
 * Client_Model

 * @package Client
 *
 */
class Client_Model extends CI_Model {

	
	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Client Methode **/	
	
	/**
	 * AddClient method creates a record in the Clients 
	 * 
	 * Option: Values
	 * --------------
	 * clientId
	 * clientSourceId
	 * clientFName
	 * clientLName
	 * clientPhone
	 * clientAddress
	 * clientTotalPurchase
	 * clientStatus
	 * clientUserId
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddClient($options =array()){
		// required values
		if(!$this->_required(
			array('clientSourceId'),
			$options)
		)return false;
		$options=$this->_defult(array('clientStatus'=>'update'), $options);
		
		$this->db->insert('clients',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateClient method updates a record in the Clients table
	 * 
	 * Option:Values
	 * -------------
	 * clientId			required
	 * clientSourceId
	 * clientFName
	 * clientLName
	 * clientPhone
	 * clientAddress
	 * clientTotalPurchase
	 * clientStatus
	 * clientUserId
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateClient($options=array()){
		// required values
		if(!$this->_required(
			array('clientId'),
			$options)
		)return false;
		
		if(isset($options['clientSourceId']))
			$this->db->set('clientSourceId',$options['clientSourceId']);
		
		if(isset($options['clientFName']))
			$this->db->set('clientFName',$options['clientFName']);
		
		if(isset($options['clientLName']))
			$this->db->set('clientLName',$options['clientLName']);
			
		if(isset($options['clientPhone']))
			$this->db->set('clientPhone',$options['clientPhone']);
		
		if(isset($options['clientAddress']))
			$this->db->set('clientAddress',$options['clientAddress']);
		
		if(isset($options['clientTotalPurchase']))
			$this->db->set('clientTotalPurchase',$options['clientTotalPurchase']);
		
		if(isset($options['clientStatus']))
			$this->db->set('clientStatus',$options['clientStatus']);
		
		if(isset($options['clientUserId']))
			$this->db->set('clientUserId',$options['clientUserId']);
		
		$this->db->where('clientId',$options['clientId']);
			
		$this->db->update('clients');
		
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetClients method returns a qualified list of Client table
	 * 
	 * Options:Values
	 * --------------
	 * clientId
	 * clientSourceId
	 * clientFName
	 * clientLName
	 * clientPhone
	 * clientAddress
	 * clientTotalPurchase
	 * clientStatus
	 * clientUserId
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * clientId
	 * clientSourceId
	 * clientFName
	 * clientLName
	 * clientPhone
	 * clientAddress
	 * clientTotalPurchase
	 * clientStatus
	 * clientUserId
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetClients($options=array()){
		// Qualification
		if(isset($options['clientId']))
			$this->db->where('clientId',$options['clientId']);
		
		if(isset($options['clientSourceId']))
			$this->db->where('clientSourceId',$options['clientSourceId']);
		
		if(isset($options['clientFName']))
			$this->db->where('clientFName',$options['clientFName']);
		
		if(isset($options['clientLName']))
			$this->db->where('clientLName',$options['clientLName']);
		
		if(isset($options['clientPhone']))
			$this->db->where('clientPhone',$options['clientPhone']);
		
		if(isset($options['clientAddress']))
			$this->db->where('clientAddress',$options['clientAddress']);
		
		if(isset($options['clientTotalPurchase']))
			$this->db->where('clientTotalPurchase',$options['clientTotalPurchase']);
		
		if(isset($options['clientStatus']))
			$this->db->where('clientStatus',$options['clientStatus']);
		
		if(isset($options['clientUserId']))
			$this->db->where('clientUserId',$options['clientUserId']);
		
		//if(!isset($options['clientStatus']))$this->db->where('clientStatus !=','deleted' );
		
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$query=$this->db->get("clients");
		//var_dump($query->result());
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['clientId']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file client_Model */
/* Location: ./application/models/client_Model.php */