<!-- message section -->
	<?php if(form_error('photoName')){?>
	<h4 class="alert_error"><?php echo form_error('photoName')?></h4>
	<?php }?>
	<?php if(form_error('photoCaption')){?>
	<h4 class="alert_error"><?php echo form_error('photoCaption')?></h4>
	<?php }?>
	<?php if(form_error('photoStatus')){?>
	<h4 class="alert_error"><?php echo form_error('photoStatus')?></h4>
	<?php }?>
	<?php if(form_error('photoLocal')){?>
	<h4 class="alert_error"><?php echo form_error('photoLocal')?></h4>
	<?php }?>
	<?php if(form_error('photoUrl')){?>
	<h4 class="alert_error"><?php echo form_error('photoUrl')?></h4>
	<?php }?>
	<?php if(form_error('photoUpload')){?>
	<h4 class="alert_error"><?php echo form_error('photoUpload')?></h4>
	<?php }?>
	<?php if ($this->session->flashdata('flashError')){?>
	<h4 class="alert_error"><?php echo $this->session->flashdata('flashError')?></h4>
	<?php }?>
	<div class="clear"></div>
<!-- end message section -->

<article class="module width_full">
	<header><h3>افزودن تصویر</h3></header>
	
	<?php echo form_open_multipart('admin/gallery/add')?>
	<div class="module_content">
	
		<fieldset>
				<label>نام<span>*</span></label>
				<?php echo form_input('photoName',set_value('photoName'))?>
		</fieldset>
		<fieldset>
				<label>عنوان<span>*</span></label>
				<?php echo form_input('photoCaption',set_value('photoCaption'))?>
		</fieldset>
		<fieldset>
				<label>وضعیت<span>*</span></label>
				<?php echo form_dropdown('photoStatus',array('active'=>'فعال','inactive'=>'غیر فعال'),set_value('photoStatus'))?>
		</fieldset>
		<fieldset >
				<label>داخلی<span>*</span></label>
				<?php echo form_dropdown('photoLocal',array('true'=>'بله','false'=>'خیر'),set_value('photoLocal'))?>
		</fieldset>
		<fieldset>
				<label>url</label>
				<?php echo form_input('photoUrl',set_value('photoUrl'))?>
		</fieldset>
		<fieldset>
				<label>بارگذاری</label>
				<?php echo form_upload('photoUpload',set_value('photoUpload'))?>
		</fieldset>
		<div class="clear"></div>
	</div>
	<footer>
		<div class="submit_link">
			<input type="submit" value="افزودن" class="alt_btn">
			<input type="reset" value="پاک کردن">
		</div>
	</footer>
	<?php echo form_close() ?>

</article><!-- end of post new article -->

	