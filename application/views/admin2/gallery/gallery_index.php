<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            گالری
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"></i>  گالری</strong>
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
        <h2> گالری <a href="<?php echo base_url() ?>admin/gallery/add/">افزودن</a></h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>نمایه</th>
                        <th>شناسه</th>
                        <th>نام</th>
                        <th>عنوان</th>
                        <th>ادرس</th>
                        <th>وضعیت</th>
                        <th>داخلی</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($gallery) && is_array($gallery) && count($gallery) > 0) { ?>
                    <?php foreach ($gallery as $photo) { ?>
                    <tr class="text-center">
                            <?php if ($photo->mediaLocal == 'true') { ?>
                                <td><a href="<?php echo $photoPath . $photo->mediaAddress ?>"><img class="img-responsive img-rounded"  src="<?php echo $photoThemePath . $photo->mediaTheme ?>" /></a></td>
                            <?php } else { ?>
                                <td><a href="<?php echo $photo->mediaAddress ?>"><img class="img-responsive img-rounded" src="<?php echo $photo->mediaTheme ?>" /></a></td>
                            <?php } ?>
                            <td><?php echo $photo->mediaId ?></td>
                            <td><?php echo $photo->mediaName ?></td>
                            <td><?php echo $photo->mediaCaption ?></td>
                            <td><?php echo $photo->mediaAddress ?></td>
                            <td><?php echo $photo->mediaStatus ?></td>
                            <td><?php echo $photo->mediaLocal ?></td>
                            <td>
                                <a href='<?php echo base_url() ?>admin/gallery/edit/<?php echo $photo->mediaId ?>' ><input  type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_edit.png" title="Edit"></a>
                                <a href='<?php echo base_url() ?>admin/gallery/delete/<?php echo $photo->mediaId ?>' ><input type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_trash.png" title="Trash"></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="11">تصویری موجود نیست</td>
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
