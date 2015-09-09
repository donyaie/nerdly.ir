<!-- message section -->
	<?php if(form_error('postName')){?>
	<h4 class="alert_error"><?php echo form_error('postName')?></h4>
	<?php }?>
	<?php if(form_error('postTitle')){?>
	<h4 class="alert_error"><?php echo form_error('postTitle')?></h4>
	<?php }?>
	<?php if(form_error('postContent')){?>
	<h4 class="alert_error"><?php echo form_error('postContent')?></h4>
	<?php }?>
	<?php if(form_error('postExcerpt')){?>
	<h4 class="alert_error"><?php echo form_error('postExcerpt')?></h4>
	<?php }?>
	<?php if(form_error('postParent')){?>
	<h4 class="alert_error"><?php echo form_error('postParent')?></h4>
	<?php }?>
	<?php if(form_error('postGuid')){?>
	<h4 class="alert_error"><?php echo form_error('postGuid')?></h4>
	<?php }?>
	<?php if(form_error('postStatus')){?>
	<h4 class="alert_error"><?php echo form_error('postStatus')?></h4>
	<?php }?>
	<?php if(form_error('postType')){?>
	<h4 class="alert_error"><?php echo form_error('postType')?></h4>
	<?php }?>
	<div class="clear"></div>
<!-- end message section -->

<article class="module width_full">
	<header><h3>افزودن مقاله</h3></header>
	
	<?php echo form_open('admin/blog/addPost')?>
	<div class="module_content">
	
		<fieldset>
				<label>نام<span>*</span></label>
				<?php echo form_input('postName',set_value('postName'))?>
		</fieldset>
		<fieldset>
				<label>عنوان<span>*</span></label>
				<?php echo form_input('postTitle',set_value('postTitle'))?>
		</fieldset>
		<fieldset>
				<label>محتوی<span>*</span></label>
				</br></br>
				<?php echo form_textarea('postContent',set_value('postContent'))?>
				<?php echo display_ckeditor($postContentEditor); ?>

		</fieldset>
		
		<fieldset>
				<label>خلاصه<span>*</span></label>
				</br></br>
				<?php echo form_textarea('postExcerpt',set_value('postExcerpt'))?>
				<?php echo display_ckeditor($postExcerptEditor); ?>
		</fieldset>
		<fieldset style="width:48%; float:left; margin-right: 3%;">
				<label>والد<span>*</span></label>
				<?php echo form_input('postParent',set_value('postParent'))?>
		</fieldset>
		<fieldset style="width:48%; float:left;">
				<label>ادرس<span>*</span></label>
				<?php echo form_input('postGuid',set_value('postGuid'))?>
		</fieldset>
		<fieldset style="width:48%; float:left; margin-right: 3%;">
				<label>وضعیت<span>*</span></label>
				<?php echo form_dropdown('postStatus',array('active'=>'Publish','inactive'=>'Not Show'),set_value('postStatus'))?>
		</fieldset>
		<fieldset style="width:48%; float:left;">
				<label>نوع<span>*</span></label>
				<?php echo form_dropdown('postType',array('post'=>'post','page'=>'page','picture'=>'picture','album'=>'album'),set_value('postType'))?>
		</fieldset>
		<fieldset style="width:48%; float:left;">
				<label>موضوع<span>*</span></label>
				<?php echo form_dropdown('postTermId',(isset($terms)?$terms:null),set_value('postTermId'))?>
		</fieldset>
		<fieldset style="width:48%; float:left;">
				<label>تصویر<span>*</span></label>
				<?php echo form_dropdown('postThemeId',(isset($themes)?$themes:null),set_value('postThemeId','1'))?>
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

	