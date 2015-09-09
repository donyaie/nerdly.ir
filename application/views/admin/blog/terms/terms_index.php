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
		<h3 class="tabs_involved">موضوعات <a href="<?php echo base_url();?>admin/blog/addterm">افزودن</a></h3>
	</header>
		
	<div class="tab_container">
		<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>
					<td>شناسه</td>
					<td>نام</td>
					<td>عنوان</td>
					<td>والد</td>
					<td>وضعیت</td>
					<td>ویرایش</td>
				</tr>
			</thead> 
			<tbody> 
			<?php if(isset($terms)&& is_array($terms)&& count($terms)>0){?>
				<?php foreach ($terms as $term){?>
					<tr>
						<td><?php echo $term->termId?></td>
						<td><?php echo $term->termName?></td>
						<td><?php echo $term->termCaption?></td>
						<td><?php echo $term->termParent?></td>
						<td><?php echo $term->termStatus?></td>
						<td>
						<a href='<?php echo base_url()?>admin/blog/editterm/<?php echo $term->termId?>' ><input  type="image" src="<?php echo base_url();?>themes/admin/images/icn_edit.png" title="Edit"></a>
						<a href='<?php echo base_url()?>admin/blog/deleteterm/<?php echo $term->termId?>' ><input type="image" src="<?php echo base_url();?>themes/admin/images/icn_trash.png" title="Trash"></a>
						</td>
					</tr>
				<?php } ?>
			<?php }else{?>
				<tr>
					<td colspan="11">موضوعی موجود نیست</td>
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


