<!-- message section -->
	<?php if(form_error('mediaName')){?>
	<h4 class="alert_error"><?php echo form_error('mediaName')?></h4>
	<?php }?>
	<?php if(form_error('mediaCaption')){?>
	<h4 class="alert_error"><?php echo form_error('photoCaption')?></h4>
	<?php }?>
	<?php if(form_error('mediaStatus')){?>
	<h4 class="alert_error"><?php echo form_error('photoStatus')?></h4>
	<?php }?>
	<?php if ($this->session->flashdata('flashError')){?>
	<h4 class="alert_error"><?php echo $this->session->flashdata('flashError')?></h4>
	<?php }?>
	<div class="clear"></div>
<!-- end message section -->

<article class="module width_full">
	<header><h3>ویرایش تصویر</h3></header>
	
	<?php echo form_open_multipart('admin/gallery/edit')?>
	<div class="module_content">
	
		<fieldset>
				<label>نام<span>*</span></label>
				<?php echo form_input('mediaName',set_value('mediaName',$photo->mediaName))?>
		</fieldset>
		<fieldset>
				<label>عنوان<span>*</span></label>
				<?php echo form_input('mediaCaption',set_value('mediaCaption',$photo->mediaCaption))?>
		</fieldset>
		<fieldset>
				<label>وضعیت<span>*</span></label>
				<?php echo form_dropdown('mediaStatus',array('active'=>'فعال','inactive'=>'غیر فعال'),set_value('mediaStatus',$photo->mediaStatus))?>
		</fieldset>
		<fieldset >
				<label>نمایه</label>
				<strong><?php echo $photoThemePath.$photo->mediaTheme;?></strong></br></br>
				<img src="<?php echo $photoThemePath.$photo->mediaTheme;?>" />		
		</fieldset>
		<fieldset >
				<label>تصویر</label>
				<strong><?php echo $photoPath.$photo->mediaAddress;?></strong></br></br>
				<img width="500px;" src="<?php echo $photoPath.$photo->mediaAddress;?>" />		
		</fieldset>
		<div class="clear"></div>
	</div>
	<footer>
		<div class="submit_link">
			<input type="submit" value="دخیره تغییرات" class="alt_btn">
		</div>
	</footer>
	<?php echo form_close() ?>

</article><!-- end of post new article -->

	