<?php 

/**
 * Post_Model

 * @package Post
 *
 */
class Post_Model extends CI_Model {

	/** Utility Methods **/
	function _required($required,$data){
		foreach($required as $field)
			if(!isset($data[$field])) return FALSE;
		return true;
	}
	
	function _defult($defaults,$options){
		return array_merge($defaults,$options);
	}
	
	/** Post Methode **/	
	
	/**
	 * AddPost method creates a record in the posts 
	 * 
	 * Option: Values
	 * --------------
	 * postId
	 * postAuthorId
	 * postDate
	 * postTitle
	 * postName
	 * postContent
	 * postExcerpt
	 * postStatus
	 * postParent
	 * postType
	 * postCommentCount
	 * postGuid
	 * postTermId
	 * postThemeId
	 * 
	 * @param array $option
	 * @result int insert_id()
	 */
	function AddPost($options =array()){
		// required values
		if(!$this->_required(
			array('postAuthorId','postName','postType'),
			$options)
		)return false;
		
		$options=$this->_defult(array('postStatus'=>'active','postType'=>'post','postThemeId'=>'1'), $options);
		
		$this->db->insert('posts',$options);
		
		return $this->db->insert_id();
	}  
	
	/**
	 * UpdatePost method updates a record inthe posts table
	 * 
	 * Option:Values
	 * -------------
	 * postId		required
	 * postAuthorId
	 * postDate
	 * postTitle
	 * postName
	 * postContent
	 * postExcerpt
	 * postStatus
	 * postParent
	 * postType
	 * postCommentCount
	 * postGuid
	 * postTermId
	 * postThemeId
	 * 
	 * @param array $options
	 * @return int affected_rows()
	 */
	function UpdatePost($options=array()){
		// required values
		if(!$this->_required(
			array('postId'),
			$options)
		)return false;
		
		if(isset($options['postAuthorId']))
			$this->db->set('postAuthorId',$options['postAuthorId']);
		
		if(isset($options['postDate']))
			$this->db->set('postDate',$options['postDate']);
		
		if(isset($options['postTitle']))
			$this->db->set('postTitle',$options['postTitle']);
		
		if(isset($options['postName']))
			$this->db->set('postName',$options['postName']);
		
		if(isset($options['postContent']))
			$this->db->set('postContent',$options['postContent']);
		
		if(isset($options['postExcerpt']))
			$this->db->set('postExcerpt',$options['postExcerpt']);
		
		if(isset($options['postStatus']))
			$this->db->set('postStatus',$options['postStatus']);
		
		if(isset($options['postParent']))
			$this->db->set('postParent',$options['postParent']);
		
		if(isset($options['postType']))
			$this->db->set('postType',$options['postType']);
			
		if(isset($options['postThemeId']))
			$this->db->set('postThemeId',$options['postThemeId']);	
		
		if(isset($options['postCommentCount']))
			$this->db->set('postCommentCount',$options['postCommentCount']);
		
		if(isset($options['postGuid']))
			$this->db->set('postGuid',$options['postGuid']);
		
		if(isset($options['postTermId']))
			$this->db->set('postTermId',$options['postTermId']);
		
		$this->db->where('postId',$options['postId']);
			
		$this->db->update('posts');
		
		return $this->db->affected_rows();
		
	}
	
	/**
	 * GetPosts method returns a qualified list of posts table
	 * 
	 * Options:Values
	 * --------------
	 * postId
	 * postAuthorId
	 * postDate
	 * postTitle
	 * postName
	 * postContent
	 * postExcerpt
	 * postStatus
	 * postParent
	 * postType
	 * postCommentCount
	 * postGuid
	 * postTermId
	 * postThemeId
	 * limit			limit the returned records
	 * offset			bypass this many records
	 * sortBy			sort by this column
	 * sortDirection	(asc,desc)
	 * 
	 * Returned Object (array of)
	 * --------------------------
	 * postId
	 * postAuthorId
	 * postDate
	 * postTitle
	 * postName
	 * postContent
	 * postExcerpt
	 * postStatus
	 * postParent
	 * postType
	 * postCommentCount
	 * postGuid
	 * postTermId
	 * postThemeId
	 * 
	 * @parm array $options
	 * @return array of objects
	 * 
	 */
	function GetPosts($options=array()){
		// Qualification
		if(isset($options['postId']))
			$this->db->where('postId',$options['postId']);
		
		if(isset($options['postAuthorId']))
			$this->db->where('postAuthorId',$options['postAuthorId']);
		
		if(isset($options['postDate']))
			$this->db->where('postDate',$options['postDate']);
		
		if(isset($options['postTitle']))
			$this->db->where('postTitle',$options['postTitle']);
		
		if(isset($options['postName']))
			$this->db->where('postName',$options['postName']);
		
		if(isset($options['postContent']))
			$this->db->where('postContent',$options['postContent']);
		
		if(isset($options['postExcerpt']))
			$this->db->where('postExcerpt',$options['postExcerpt']);
		
		if(isset($options['postStatus']))
			$this->db->where('postStatus',$options['postStatus']);
		
		if(isset($options['postParent']))
			$this->db->where('postParent',$options['postParent']);
		
		if(isset($options['postType']))
			$this->db->where('postType',$options['postType']);
		
		if(isset($options['postCommentCount']))
			$this->db->where('postCommentCount',$options['postCommentCount']);
		
		if(isset($options['postGuid']))
			$this->db->where('postGuid',$options['postGuid']);
			
		if(isset($options['postTermId']))
			$this->db->where('postTermId',$options['postTermId']);
			
		if(isset($options['postThemeId']))
			$this->db->where('postThemeId',$options['postThemeId']);
                
		
		// limit / offset
		if(isset($options['limit'])&& isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
                
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);
			
		// sort
		if(isset($options['sortBy'])&& isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
                // like
		if(isset($options['like'])&& isset($options['likeDirection']))
			$this->db->like($options['like'],$options['likeDirection']);
                
		if(!isset($options['postStatus']))$this->db->where('postStatus !=','deleted' );
		
		$this->db->select('*');
		$this->db->from('posts');
		
		if(isset($options['getAuthor']) && $options['getAuthor']== true)
			$this->db->join('users', 'users.userId = posts.postAuthorId');

		if(isset($options['getTerm']) && $options['getTerm']== true)
			$this->db->join('terms', 'terms.termId = posts.postTermId');
			
		if(isset($options['getTheme']) && $options['getTheme']== true)
			$this->db->join('medias', 'medias.mediaId = posts.postThemeId');
			
		$query = $this->db->get();
                //echo '<pre>';
                
               // if(isset($options['like'])&& isset($options['likeDirection']))
			//var_dump($options['like']." like '".$options['likeDirection']."'");
		//$query=$this->db->get("posts");
		//var_dump($query->result());
                
		//die();
               //  echo '</pre>';
		//$query=$this->db->get("posts");
		
		if(isset($options['count']))return $query->num_rows();
		
		if(isset($options['postId']))
			return $query->row(0);
		
		return $query->result();
	}
}

/* End of file post_model */
/* Location: ./application/models/blog/post_model.php */