<?php 

/**
 * User_Model

 * @package Users
 *
 */
class User_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** User Methode **/	
	
	/**
	 * AddUser method creates a record in the users 
	 * 
	 * Option: Values
	 * --------------
	 * userEmail
	 * userPassword
	 * userStatus
	 * userType
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddUser($options =array()){
		// required values
		if(!$this->_required(
			array('userEmail','userPassword'),
			$options)
		)return false;
		
		$options=$this->_defult(array('userStatus'=>'active'), $options);
		
		$this->db->insert('users',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateUser method updates a record inthe users table
	 * 
	 * Option:Values
	 * -------------
	 * userId		required
	 * userEmail
	 * userPassword
	 * userStatus
	 * userType
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateUser($options=array()){
		// required values
		if(!$this->_required(
			array('userId'),
			$options)
		)return false;
		
		if(isset($options['userEmail']))
			$this->db->set('userEmail',$options['userEmail']);
		
		if(isset($options['userPassword']))
			$this->db->set('userPassword',md5($options['userPassword']));
		
		if(isset($options['userType']))
			$this->db->set('userType',$options['userType']);
		
		if(isset($options['userStatus']))
			$this->db->set('userStatus',$options['userStatus']);
		
		$this->db->where('userId',$options['userId']);
			
		$this->db->update('users');
		
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetUsers method returns a qualified list of users table
	 * 
	 * Options:Values
	 * --------------
	 * userId
	 * userEmail
	 * userPassword
	 * userStatus
	 * userType
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * userId
	 * userEmail
	 * userPassword
	 * userStatus
	 * userType
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetUsers($options=array()){
		// Qualification
		if(isset($options['userId']))
			$this->db->where('userId',$options['userId']);
		
		if(isset($options['userEmail']))
			$this->db->where('userEmail',$options['userEmail']);
		
		if(isset($options['userPassword']))
			$this->db->where('userPassword',$options['userPassword']);
		
		if(isset($options['userStatus']))
			$this->db->where('userStatus',$options['userStatus']);
		
		if(isset($options['userType']))
			$this->db->where('userType',$options['userType']);
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		if(!isset($options['userStatus']))$this->db->where('userStatus !=','deleted' );
		
		
		
		$query=$this->db->get("users");
		//var_dump($query->result());
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['userId'])|| isset($options['userEmail']))
			return $query->row(0);
		
		return $query->result();
	}
	
	/** authentication **/
	
	/**
	 * The login method adds user information from the database to session data.
	 * 
	 * Option Values
	 * -------------
	 * userEmail
	 * userPassword  md5 encoding 
	 * 
	 * @param array $options
	 * @return Object result()
	 */
	function Login($options){
		// required values
		if(!$this->_required(
			array('userEmail','userPassword'),
			$options)
		)return false;
		
		$user=$this->GetUsers(array('userEmail'=>$options['userEmail'],'userPassword'=>$options['userPassword']));

		if(!$user)return FALSE;
		
		$this->session->set_userdata('userType',$user->userType);
		$this->session->set_userdata('userEmail',$user->userEmail);
		$this->session->set_userdata('userId',$user->userId);

		return true;
	}	
	
	
	/**
	 * The secure method checks a user's session against the passed parameters to determine 
	 * in access to a specific area.
	 * 
	 * Option: Values
	 * userType
	 * 
	 * @param array $options
	 * @return bool 
	 */
	function Secure($options){
		//required values
		if(!$this->_required(
			array('userType'),
			$options)
		) return  false;
		
		$userType=$this->session->userdata('userType');
		
		if(is_array($options['userType'])){
			foreach ($options['userType'] as $optionUserType) {
				if($optionUserType==$userType) return true;
			}
		}
		else{
			if($userType==$options['userType'])return  true;
		}
		return  FALSE;
 	}

}

/* End of file user_model */
/* Location: ./application/models/user_model.php */











