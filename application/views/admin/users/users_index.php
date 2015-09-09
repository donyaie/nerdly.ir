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
		<h3 class="tabs_involved">کاربران</h3>
	</header>
		
	
	<div class="tab_container">
		<table class="tablesorter" cellspacing="0"> 
			<thead> 
			<tr>
				<td>ایمیل</td>
				<td>نوع</td>
				<td>وضعیت</td>
				<th>ویرایش</th>
			</tr>
			</thead> 
			<tbody> 
			<?php if(isset($users)&& is_array($users)&& count($users)>0){?>
				<?php foreach ($users as $user){?>
					<tr>
						<td><?php echo $user->userEmail?></td>
						<td><?php echo $user->userType?></td>
						<td><?php echo $user->userStatus?></td>
						<td>
						<a href='<?php echo base_url()?>admin/users/edit/<?php echo $user->userId?>' ><input  type="image" src="<?php echo base_url();?>themes/admin/images/icn_edit.png" title="Edit"></a>
						<a href='<?php echo base_url()?>admin/users/delete/<?php echo $user->userId?>' ><input type="image" src="<?php echo base_url();?>themes/admin/images/icn_trash.png" title="Trash"></a>
						</td>
					</tr>
				<?php } ?>
			<?php }else{?>
				<tr>
					<td colspan="4">کاربری موجود نیست</td>
				</tr>
			<?php }?>
			
			</tbody> 
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

