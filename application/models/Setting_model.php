<?php 

/**
 * Setting_Model

 * @package Setting
 *
 */
class Setting_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Setting Methode **/	
	
	/**
	 * AddSetting method creates a record in the Settings 
	 * 
	 * Option: Values
	 * --------------
	 * settingKey	required
	 * settingCaption
	 * settingValue
	 * settingType
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddSetting($options =array()){
		// required values
		if(!$this->_required(
			array('settingKey'),
			$options)
		)return false;
		//$options=$this->_defult(array('settingStatus'=>'active'), $options);
		
		$this->db->insert('settings',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateSetting method updates a record inthe Settings table
	 * 
	 * Option:Values
	 * -------------
	 * settingKey	required
	 * settingCaption
	 * settingValue
	 * settingType
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateSetting($options=array()){
		// required values
		if(!$this->_required(
			array('settingKey'),
			$options)
		)return false;
		
		if(isset($options['settingCaption']))
			$this->db->set('settingCaption',$options['settingCaption']);
			
		if(isset($options['settingValue']))
			$this->db->set('settingValue',$options['settingValue']);
			
		if(isset($options['settingType']))
			$this->db->set('settingType',$options['settingType']);
			
		$this->db->where('settingKey',$options['settingKey']);
			
		$this->db->update('settings');
			var_dump($options);
			
			var_dump($this->db->affected_rows());
			
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetSettings method returns a qualified list of Settings table
	 * 
	 * Options:Values
	 * --------------
	 * settingId	
	 * settingKey
	 * settingCaption
	 * settingValue
	 * settingType
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * settingId	
	 * settingKey
	 * settingCaption
	 * settingValue
	 * settingType
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetSettings($options=array()){
		// Qualification
		if(isset($options['settingId']))
			$this->db->where('settingId',$options['settingId']);
		
		if(isset($options['settingKey']))
			$this->db->where('settingKey',$options['settingKey']);
		
		if(isset($options['settingValue']))
			$this->db->where('settingValue',$options['settingValue']);
		
		if(isset($options['settingType']))
			$this->db->where('settingType',$options['settingType']);
		
		if(isset($options['settingCaption']))
			$this->db->where('settingCaption',$options['settingCaption']);
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$query=$this->db->get("settings");
		//var_dump($query->result());
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['settingId']) || isset($options['settingKey']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file setting_Model */
/* Location: ./application/models/setting_Model.php */