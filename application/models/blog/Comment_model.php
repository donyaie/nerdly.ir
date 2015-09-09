<?php 

/**
 * Comment_Model

 * @package Comment
 *
 */
class Comment_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Comment Methode **/	
	
	/**
	 * AddComment method creates a record in the Comments 
	 * 
	 * Option: Values
	 * --------------
	 * commentId
	 * commentPostId
	 * commentAuthor
	 * commentAuthorEmail
	 * commentAuthorUrl
	 * commentAuthorIP
	 * commentDate
	 * commentContent
	 * commentParent
	 * commentUserId
	 * commentStatus
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddComment($options =array()){
		// required values
		if(!$this->_required(
			array('commentPostId'),
			$options)
		)return false;
		
		$this->db->insert('comments',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdateComment method updates a record inthe comments table
	 * 
	 * Option:Values
	 * -------------
	 * commentId		required
	 * commentPostId
	 * commentAuthor
	 * commentAuthorEmail
	 * commentAuthorUrl
	 * commentAuthorIP
	 * commentDate
	 * commentContent
	 * commentParent
	 * commentUserId
	 * commentStatus
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdateComments($options=array()){
		// required values
		if(!$this->_required(
			array('commentId'),
			$options)
		)return false;
		
		if(isset($options['commentPostId']))
			$this->db->set('commentPostId',$options['commentPostId']);
		
		if(isset($options['commentAuthor']))
			$this->db->set('commentAuthor',$options['commentAuthor']);
		
		if(isset($options['commentAuthorEmail']))
			$this->db->set('commentAuthorEmail',$options['commentAuthorEmail']);
		
		if(isset($options['commentAuthorUrl']))
			$this->db->set('commentAuthorUrl',$options['commentAuthorUrl']);
		
		if(isset($options['commentAuthorIP']))
			$this->db->set('commentAuthorIP',$options['commentAuthorIP']);
		
		if(isset($options['commentDate']))
			$this->db->set('commentDate',$options['commentDate']);
		
		if(isset($options['commentContent']))
			$this->db->set('commentContent',$options['commentContent']);
		
		if(isset($options['commentParent']))
			$this->db->set('commentParent',$options['commentParent']);
		
		if(isset($options['commentUserId']))
			$this->db->set('commentUserId',$options['commentUserId']);
		
		if(isset($options['commentStatus']))
			$this->db->set('commentStatus',$options['commentStatus']);
		
			
		$this->db->where('commentId',$options['commentId']);
			
		$this->db->update('comments');
		
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetComments method returns a qualified list of comments table
	 * 
	 * Options:Values
	 * --------------
	 * commentId
	 * commentPostId
	 * commentAuthor
	 * commentAuthorEmail
	 * commentAuthorUrl
	 * commentAuthorIP
	 * commentDate
	 * commentContent
	 * commentParent
	 * commentUserId
	 * commentStatus
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * commentId
	 * commentPostId
	 * commentAuthor
	 * commentAuthorEmail
	 * commentAuthorUrl
	 * commentAuthorIP
	 * commentDate
	 * commentContent
	 * commentParent
	 * commentUserId
	 * commentStatus
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetComments($options=array()){
		// Qualification
		if(isset($options['commentId']))
			$this->db->where('commentId',$options['commentId']);
		
		if(isset($options['commentPostId']))
			$this->db->where('commentPostId',$options['commentPostId']);
		
		if(isset($options['commentAuthor']))
			$this->db->where('commentAuthor',$options['commentAuthor']);
		
		if(isset($options['commentAuthorEmail']))
			$this->db->where('commentAuthorEmail',$options['commentAuthorEmail']);
		
		if(isset($options['commentAuthorUrl']))
			$this->db->where('commentAuthorUrl',$options['commentAuthorUrl']);
		
		if(isset($options['commentAuthorIP']))
			$this->db->where('commentAuthorIP',$options['commentAuthorIP']);
		
		if(isset($options['commentDate']))
			$this->db->where('commentDate',$options['commentDate']);
		
		if(isset($options['commentContent']))
			$this->db->where('commentContent',$options['commentContent']);
		
		if(isset($options['commentParent']))
			$this->db->where('commentParent',$options['commentParent']);
		
		if(isset($options['commentUserId']))
			$this->db->where('commentUserId',$options['commentUserId']);
		
		if(isset($options['commentStatus']))
			$this->db->where('commentStatus',$options['commentStatus']);
	
		if(!isset($options['commentStatus']))$this->db->where('commentStatus !=','deleted' );
			
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
		
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$query=$this->db->get("comments");
		//var_dump($query->result());
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['commentId']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file comment_model */
/* Location: ./application/models/blog/comment_model.php */