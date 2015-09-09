<!-- message section -->
		<?php if ($this->session->flashdata('flashError')){?>
			<h4 class="alert_error">Fail : <?php echo $this->session->flashdata('flashError')?></h4>
		<?php }?>
		<?php if ($this->session->flashdata('flashConfirm')){?>
			<h4 class="alert_success">Success : <?php echo $this->session->flashdata('flashConfirm')?></h4>
		<?php }?>
		<div class="clear"></div>
<!-- message section -->
<!-- message section -->
	<?php if(form_error('settingTitle')){?>
	<h4 class="alert_error"><?php echo form_error('settingTitle')?></h4>
	<?php }?>
	<?php if(form_error('settingDescription')){?>
	<h4 class="alert_error"><?php echo form_error('settingDescription')?></h4>
	<?php }?>
	<div class="clear"></div>
<!-- end message section -->

<article class="module width_full" >
	<header><h3>تنظیمات</h3></header>
	
	<?php echo form_open('admin/settings/index')?>
	<div class="module_content">
	
		<fieldset>
			<label><?php echo $settings['settingTitle']->settingCaption;?></label>
			<?php echo form_input('settingTitle',set_value('settingTitle',$settings['settingTitle']->settingValue))?>
		</fieldset>
		<fieldset>
			<label><?php echo $settings['settingDescription']->settingCaption;?></label>
			<?php echo form_input('settingDescription',set_value('settingDescription',$settings['settingDescription']->settingValue))?>
		</fieldset>
		<div class="clear"></div>
		
	</div>
	<footer>
		<div class="submit_link">
			<input type="submit" value="ذخیره تغییرات" class="alt_btn">
		</div>
	</footer>
	<?php echo form_close() ?>
</article><!-- end of post new article -->
		

	