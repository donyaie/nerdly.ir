<div id="container">
	<h1>Users</h1>

	<div id="body">
		<table >
			<tr>
				<td>Email</td>
				<td>Type</td>
				<td>Status</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
			<?php if(isset($users)&& is_array($users)&& count($users)>0){?>
				<?php foreach ($users as $user){?>
					<tr>
						<td><?php echo $user->userEmail?></td>
						<td><?php echo $user->userType?></td>
						<td><?php echo $user->userStatus?></td>
						<td><a href='<?php echo base_url()?>admin/users/edit/<?php echo $user->userId?>' >Edit</a></td>
						<td><a href='<?php echo base_url()?>admin/users/delete/<?php echo $user->userId?>' >Delete</a></td>
					</tr>
				<?php } ?>
			<?php }else{?>
				<tr>
					<td colspan="5">There ara currently no users.</td>
				</tr>
			<?php }?>
			<tr>
				<td colspan="5"><a href='<?php echo base_url()?>admin/users/add'>Add a User</a></td>
			</tr>
			
			<?php if ($this->session->flashdata('flashError')){?>
			<tr>
				<td colspan="5" class='flashError'>Fail : <?php echo $this->session->flashdata('flashError')?></td>
			</tr>
			<?php }?>
			<?php if ($this->session->flashdata('flashConfirm')){?>
			<tr>
				<td colspan="5" class='flashConfirm'>Success : <?php echo $this->session->flashdata('flashConfirm')?></td>
			</tr>
			<?php }?>
		</table>
		<?php if(isset($pagination)){?>
	    	<div class='pagination'>
	    		<?php echo $pagination?>
	    	</div>
		<?php }?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

