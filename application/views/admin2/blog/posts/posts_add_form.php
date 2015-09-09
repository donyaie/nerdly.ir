
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            افزودن مقاله
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>افزودن مقاله  
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/blog/addPost">

            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="postName" value="<?php echo set_value('postName'); ?>"  >
            </div>
            <?php if (form_error('postName')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postName') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>عنوان</label>
                <input class="form-control" name="postTitle" value="<?php echo set_value('postTitle'); ?>"  >
            </div>
            <?php if (form_error('postTitle')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postTitle') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>محتوی</label>
                <!--<textarea class="form-control" rows="3" name="postContent" value="<?php// echo set_value('postContent'); ?>"  ></textarea>-->
                <?php echo form_textarea('postContent', set_value('postContent')) ?>               
                <?php echo display_ckeditor($postContentEditor); ?>
            </div>
            <?php if (form_error('postContent')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postContent') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>خلاصه</label>
                <!--<textarea class="form-control" rows="3" name="postExcerpt" value="<?php// echo set_value('postExcerpt'); ?>"  ></textarea>-->
                <?php echo form_textarea('postExcerpt', set_value('postExcerpt')) ?>               
                <?php echo display_ckeditor($postExcerptEditor); ?>
            </div>
            <?php if (form_error('postContent')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postExcerpt') ?></div>
            <?php } ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>والد</label>
                        <input class="form-control" name="postParent" value="<?php echo set_value('postParent'); ?>"  >
                    </div>
                    <?php if (form_error('postParent')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postParent') ?></div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ادرس</label>
                        <input class="form-control" name="postGuid" value="<?php echo set_value('postGuid'); ?>"  >
                    </div>
                    <?php if (form_error('postGuid')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postGuid') ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>وضعیت</label>
                        <?php echo form_dropdown('postStatus" class="form-control', array('active' => 'Publish', 'inactive' => 'Not Show'), set_value('postStatus')) ?>
                    </div>
                    
                    <?php if (form_error('postStatus')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postStatus') ?></div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>نوع</label>
                        <?php echo form_dropdown('postType" class="form-control', array('post' => 'post', 'page' => 'page', 'picture' => 'picture', 'album' => 'album'), set_value('postType')) ?>
                    </div>
                    
                    <?php if (form_error('postType')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postType') ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>موضوع</label>
                        <?php echo form_dropdown('postTermId" class="form-control',(isset($terms)?$terms:null),set_value('postTermId'))?>
                    </div>
                    <?php if (form_error('postTermId')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postTermId') ?></div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>تصویر</label>
                        <?php echo form_dropdown('postThemeId" class="form-control',(isset($themes)?$themes:null),set_value('postThemeId','1'))?>
		
                    </div>
                    
                    <?php if (form_error('postThemeId')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postThemeId') ?></div>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" class="btn  btn-success">افزودن</button>
            <button type="reset" class="btn  btn-warning">پاک کردن</button>
        </form>
    </div>
</div>