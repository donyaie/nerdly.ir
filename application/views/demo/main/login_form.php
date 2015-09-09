<div id="container">
	<h1>Login form</h1>

	<div id="body">
		<?php echo form_open(base_url().'main/login')?>
		<ul>
		<?php if ($this->session->flashdata('flashError')){?>
			<li>
				<div class='flashError'>
					<?php echo $this->session->flashdata('flashError')?>
				</div>
			</li>
		<?php }?>
			<li>
				<label>Email</label>
				<?php echo form_input('userEmail',set_value('userEmail'))?>
				<?php echo form_error('userEmail')?>
			</li>
			<li>
				<label>Password</label>
				<?php echo form_password('userPassword')?>
				<?php echo form_error('userPassword')?>
			</li>
			<li>
				<?php echo form_submit('','login')?>
			</li>
		</ul>
		<?php echo form_close()?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>