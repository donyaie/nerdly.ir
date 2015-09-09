<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ویرایش مقاله
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>ویرایش مقاله  <strong > <?php echo $post->postTitle ?></strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/blog/editPost/<?php echo $post->postId; ?>">

            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="postName" value="<?php echo $post->postName; ?>"  >
            </div>
            <?php if (form_error('postName')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postName') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>عنوان</label>
                <input class="form-control" name="postTitle" value="<?php echo $post->postTitle; ?>"  >
            </div>
            <?php if (form_error('postTitle')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postTitle') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>محتوی</label>
                <?php echo form_textarea('postContent', $post->postContent) ?>               
                <?php echo display_ckeditor($postContentEditor); ?>
            </div>
            <?php if (form_error('postContent')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postContent') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>خلاصه</label>
                <?php echo form_textarea('postExcerpt', $post->postExcerpt) ?>               
                <?php echo display_ckeditor($postExcerptEditor); ?>
            </div>
            <?php if (form_error('postContent')) { ?>
                <div class="alert alert-danger"><?php echo form_error('postExcerpt') ?></div>
            <?php } ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>والد</label>
                        <input class="form-control" name="postParent" value="<?php echo $post->postParent; ?>"  >
                    </div>
                    <?php if (form_error('postParent')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postParent') ?></div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ادرس</label>
                        <input class="form-control" name="postGuid" value="<?php echo $post->postGuid; ?>"  >
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
                        <?php echo form_dropdown('postStatus" class="form-control', array('active' => 'Publish', 'inactive' => 'Not Show'), $post->postStatus) ?>
                    </div>

                    <?php if (form_error('postStatus')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postStatus') ?></div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>نوع</label>
                        <?php echo form_dropdown('postType" class="form-control', array('post' => 'post', 'page' => 'page', 'picture' => 'picture', 'album' => 'album'), $post->postType) ?>
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
                        <?php echo form_dropdown('postTermId" class="form-control', (isset($terms) ? $terms : null), $post->postTermId) ?>
                    </div>
                    <?php if (form_error('postTermId')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postTermId') ?></div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>تصویر</label>
                        <?php echo form_dropdown('postThemeId" class="form-control', (isset($themes) ? $themes : null), $post->postThemeId) ?>

                    </div>

                    <?php if (form_error('postThemeId')) { ?>
                        <div class="alert alert-danger"><?php echo form_error('postThemeId') ?></div>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" class="btn  btn-success">ذخیره تغییرات</button>
        </form>
    </div>
</div>