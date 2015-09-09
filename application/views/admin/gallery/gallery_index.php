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
		<h3 class="tabs_involved"> گالری <a href="<?php echo base_url()?>admin/gallery/add/">افزودن</a> </h3>
	</header>
		
	<div class="tab_container">
		<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>
					<td>نمایه</td>
					<td>شناسه</td>
					<td>نام</td>
					<td>عنوان</td>
					<td>ادرس</td>
					<td>وضعیت</td>
					<td>داخلی</td>
					<td>ویرایش</td>
				</tr>
			</thead> 
			<tbody> 
			<?php if(isset($gallery)&& is_array($gallery)&& count($gallery)>0){?>
				<?php foreach ($gallery as $photo){?>
					<tr>
						<?php if($photo->mediaLocal=='true') {?>
						<td><a href="<?php echo $photoPath.$photo->mediaAddress?>"><img style="width:100px;max-height:100px;" src="<?php echo $photoThemePath.$photo->mediaTheme?>" /></a></td>
						<?php }else{?>
						<td><a href="<?php echo $photo->mediaAddress?>"><img style="width:100px;max-height:100px;" src="<?php echo $photo->mediaTheme?>" /></a></td>
						<?php }?>
						<td><?php echo $photo->mediaId?></td>
						<td><?php echo $photo->mediaName?></td>
						<td><?php echo $photo->mediaCaption?></td>
						<td><?php echo $photo->mediaAddress?></td>
						<td><?php echo $photo->mediaStatus?></td>
						<td><?php echo $photo->mediaLocal?></td>
						<td>
						<a href='<?php echo base_url()?>admin/gallery/edit/<?php echo $photo->mediaId?>' ><input  type="image" src="<?php echo base_url();?>themes/admin/images/icn_edit.png" title="Edit"></a>
						<a href='<?php echo base_url()?>admin/gallery/delete/<?php echo $photo->mediaId?>' ><input type="image" src="<?php echo base_url();?>themes/admin/images/icn_trash.png" title="Trash"></a>
						</td>
					</tr>
				<?php } ?>
			<?php }else{?>
				<tr>
					<td colspan="11">تصویری موجود نیست</td>
				</tr>
			<?php }?>
			
			<tbody>
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


