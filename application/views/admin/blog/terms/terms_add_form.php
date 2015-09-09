<!-- message section -->
	<?php if(form_error('termName')){?>
	<h4 class="alert_error"><?php echo form_error('termName')?></h4>
	<?php }?>
	<?php if(form_error('termCaption')){?>
	<h4 class="alert_error"><?php echo form_error('termCaption')?></h4>
	<?php }?>
	<?php if(form_error('termStatus')){?>
	<h4 class="alert_error"><?php echo form_error('termStatus')?></h4>
	<?php }?>
	<?php if(form_error('termParent')){?>
	<h4 class="alert_error"><?php echo form_error('termParent')?></h4>
	<?php }?>
	<div class="clear"></div>
<!-- end message section -->

<article class="module width_full">
	<header><h3>افزودن موضوع   </h3></header>
	
	<?php echo form_open('admin/blog/addTerm')?>
	<div class="module_content">
	
		<fieldset>
				<label>نام<span>*</span></label>
				<?php echo form_input('termName',set_value('termName'))?>
		</fieldset>
		<fieldset>
				<label>عنوان<span>*</span></label>
				<?php echo form_input('termCaption',set_value('termCaption'))?>
		</fieldset>
		<fieldset>
				<label>وضعیت<span>*</span></label>
				<?php echo form_dropdown('termStatus',array('active'=>'فعال','inactive'=>'غیر فعال'),set_value('termStatus'))?>
		</fieldset>
		<fieldset>
				<label>والد<span>*</span></label>
				<?php echo form_dropdown('termParent',(isset($terms)?$terms:null),set_value('termParent'))?>
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

	