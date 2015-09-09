<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            مقاله
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"></i>  مقاله</strong>
            </li>
        </ol>
    </div>
</div>
<!-- message section -->
<?php if ($this->session->flashdata('flashError')) { ?>
    <div class="alert alert-danger"><strong>Fail : </strong><?php echo $this->session->flashdata('flashError') ?></div>
<?php } ?>
<?php if ($this->session->flashdata('flashConfirm')) { ?>
    <div class="alert alert-success"><strong> Success : </strong><?php echo $this->session->flashdata('flashConfirm') ?></div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
       
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>خلاصه</th>
                        <th>وضعیت</th>
                        <th>نوع</th>
                        <th>نظرات</th>
                        <th>آدرس</th>
                        <th>موضوع</th>
                        <th>نویسنده</th>
                        <th>تاریخ درج</th>
                        <th>ویرایش</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($posts) && is_array($posts) && count($posts) > 0) { ?>
                        <?php foreach ($posts as $post) { ?>
                            <tr>
                                <td><?php echo $post->postId ?></td>
                                <td><?php echo $post->postTitle ?></td>
                                <td><?php echo (empty($post->postExcerpt) ? '' : substr(trim(  strip_tags ($post->postExcerpt)), 0, 20) . '...') ?></td>
                                <td><?php echo $post->postStatus ?></td>
                                <td><?php echo $post->postType ?></td>
                                <td><?php echo $post->postCommentCount ?></td>
                                <td><?php echo $post->postGuid ?></td>
                                <td><?php echo $post->termCaption ?></td>
                                <td><?php echo $post->userEmail ?></td>
                                <td><?php echo $post->postDate ?></td>
                                <td>
                                    <a href='<?php echo base_url() ?>admin/blog/editpost/<?php echo $post->postId ?>' ><input  type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_edit.png" title="Edit"></a>
                                    <a href='<?php echo base_url() ?>admin/blog/deletepost/<?php echo $post->postId ?>' ><input type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_trash.png" title="Trash"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="11">پستی موجود نیست</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <nav>
            <?php if (isset($pagination)) { ?>
                <ul class='pagination'>
                    <?php echo $pagination ?>
                </ul>
            <?php } ?>
        </nav>


    </div>
</div>
<!-- /.row -->
