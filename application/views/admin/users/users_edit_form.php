<!-- message section -->
	<?php if(form_error('userEmail')){?>
	<h4 class="alert_error"><?php echo form_error('userEmail')?></h4>
	<?php }?>
	<?php if(form_error('userPassword')){?>
	<h4 class="alert_error"><?php echo form_error('userPassword')?></h4>
	<?php }?>
	<?php if(form_error('userType')){?>
	<h4 class="alert_error"><?php echo form_error('userType')?></h4>
	<?php }?>
	<?php if(form_error('userStatus')){?>
	<h4 class="alert_error"><?php echo form_error('userStatus')?></h4>
	<?php }?>
	<div class="clear"></div>
<!-- end message section -->

<article class="module width_full" >
	<header><h3>ویرایش کاربر'<?php echo $user->userEmail?>'</h3></header>
	
	<?php echo form_open('admin/users/edit/'.$user->userId)?>
	<div class="module_content">
	
		<fieldset>
			<label>ایمیل</label>
			<?php echo form_input('userEmail',set_value('userEmail',$user->userEmail))?>
		</fieldset>
		<fieldset>
			<label>پسورد جدید</label>
			<?php echo form_input('userPassword')?>
		</fieldset>
		<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
			<label>نوع</label>
			<?php echo form_dropdown('userType',array('user'=>'کاربر عادی','admin'=>'مدیر'),set_value('userType',$user->userType))?>
		</fieldset>
		<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
			<label>وضعیت</label>
			<?php echo form_dropdown('userStatus',array('active'=>'فعال','inactive'=>'فعال'),set_value('userStatus',$user->userStatus))?>
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
		

	