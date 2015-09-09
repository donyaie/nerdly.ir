<!-- message section -->
		<?php if ($this->session->flashdata('flashError')){?>
			<h4 class="alert_error">Fail : <?php echo $this->session->flashdata('flashError')?></h4>
		<?php }?>
		<?php if ($this->session->flashdata('flashConfirm')){?>
			<h4 class="alert_success">Success : <?php echo $this->session->flashdata('flashConfirm')?></h4>
		<?php }?>
		<div class="clear"></div>
<!-- message section -->
<article class="module width_full">
	<header>
		<h3 class="tabs_involved">مقاله</h3>
	</header>
		
	<div class="tab_container">
		<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>
					<td>شناسه</td>
					<td>عنوان</td>
					<td>خلاصه</td>
					<td>وضعیت</td>
					<td>نوع</td>
					<td>نظرات</td>
					<td>آدرس</td>
					<td>موضوع</td>
					<td>نویسنده</td>
					<td>تاریخ درج</td>
					<td>ویرایش</td>
				</tr>
			</thead> 
			<tbody> 
			<?php if(isset($posts)&& is_array($posts)&& count($posts)>0){?>
				<?php foreach ($posts as $post){?>
					<tr>
						<td><?php echo $post->postId?></td>
						<td><?php echo $post->postTitle?></td>
						<td><?php echo (empty($post->postExcerpt)?'':substr($post->postExcerpt,0,10).'...')?></td>
						<td><?php echo $post->postStatus?></td>
						<td><?php echo $post->postType?></td>
						<td><?php echo $post->postCommentCount?></td>
						<td><?php echo $post->postGuid?></td>
						<td><?php echo $post->termCaption?></td>
						<td><?php echo $post->userEmail?></td>
						<td><?php echo $post->postDate?></td>
						<td>
						<a href='<?php echo base_url()?>admin/blog/editpost/<?php echo $post->postId?>' ><input  type="image" src="<?php echo base_url();?>themes/admin/images/icn_edit.png" title="Edit"></a>
						<a href='<?php echo base_url()?>admin/blog/deletepost/<?php echo $post->postId?>' ><input type="image" src="<?php echo base_url();?>themes/admin/images/icn_trash.png" title="Trash"></a>
						</td>
					</tr>
				<?php } ?>
			<?php }else{?>
				<tr>
					<td colspan="11">پستی موجود نیست</td>
				</tr>
			<?php }?>
			
			<tbody>
		</table>

		

		
	</div>
	<footer>
	
	  <div class="submit_link">
		<?php if(isset($pagination)){?>
	    	<div class='pagination'>
	    		<?php echo $pagination?>
	    	</div>
		<?php }?>
	  </div>
	</footer>
</article>


