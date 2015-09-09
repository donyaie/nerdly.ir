<?php if(form_error('DeleteTermChild')){?>
	<h4 class="alert_error"><?php echo form_error('DeleteTermChild')?></h4>
<?php }?>
<?php if(form_error('DeletePost')){?>
	<h4 class="alert_error"><?php echo form_error('DeletePost')?></h4>
<?php }?>
<div class="clear"></div>

<article class="module width_full">
	<header><h3>  حذف '<?php echo $term->termCaption?>'</h3></header>
	<?php echo form_open('admin/blog/deleteterm/'.$term->termId)?>
	<div class="module_content">
	
		<table class="tablesorter" cellspacing="0">  
			<tbody>  
				<tr> 
    				<td>حذف مقاله</td> 
   					<td><?php echo form_checkbox('DeletePost', 'بله', TRUE)?></td> 
    			</tr>
				<tr> 
    				<td>حذف فرزند ها</td> 
   					<td><?php echo form_checkbox('DeleteTermChild', 'بله', True)?></td> 
    			</tr> 
			</tbody> 
		</table>
		<div class="clear"></div>
	</div>
	<footer>
		<div class="submit_link">
			<input name="submit" type="submit" value="پاک کردن" class="alt_btn">
		</div>
	</footer>
	<?php echo form_close() ?>

</article><!-- end of post new article -->

	