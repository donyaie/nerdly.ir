<div id="container">
	<h1>Edit User '<?php echo $user->userEmail?>'</h1>

	<div id="body">
	<?php echo form_open('admin/users/edit/'.$user->userId)?>
		<ul>
			<li>
				<label>Email<span>*</span></label>
				<?php echo form_input('userEmail',set_value('userEmail',$user->userEmail))?>
				<?php echo form_error('userEmail')?>
			</li>
			<li>
				<label>set New Password</label>
				<?php echo form_input('userPassword')?>
				<?php echo form_error('userPassword')?>
			</li>
			<li>
				<label>Type<span>*</span></label>
				<?php echo form_dropdown('userType',array('user'=>'Standard User','admin'=>'Admin User'),set_value('userType',$user->userType))?>
				<?php echo form_error('userType')?>
			</li>
			<li>
				<label>Status<span>*</span></label>
				<?php echo form_dropdown('userStatus',array('active'=>'Can log in','inactive'=>'Cannot log in'),set_value('userStatus',$user->userStatus))?>
				<?php echo form_error('userStatus')?>
			</li>
			<li>
				<?php echo form_submit('','Save Change')?>
			</li>
		</ul>
	<?php echo form_close() ?>
	
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

	