<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ویرایش تصویر

        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>   ویرایش تصویر
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/gallery/edit/<?php echo $photo->mediaId; ?>">

            <?php if ($this->session->flashdata('flashError')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('flashError') ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('flashConfirm')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('flashConfirm') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="mediaName" value="<?php echo $photo->mediaName; ?>"  >
            </div>
            <?php if (form_error('mediaName')) { ?>
                <div class="alert alert-danger"><?php echo form_error('mediaName') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>عنوان</label>
                <input class="form-control" name="mediaCaption" value="<?php echo $photo->mediaCaption; ?>"  >
            </div> 
            <?php if (form_error('mediaCaption')) { ?>
                <div class="alert alert-danger"><?php echo form_error('mediaCaption') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>وضعیت</label>
                <?php echo form_dropdown('mediaStatus" class="form-control', array('active' => 'فعال', 'inactive' => 'غیر فعال'), $photo->mediaStatus) ?>
            </div>
            <?php if (form_error('mediaStatus')) { ?>
                <div class="alert alert-danger"><?php echo form_error('mediaStatus') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>نمایه</label>
                <label><?php echo $photoThemePath . $photo->mediaTheme; ?></label>
                <a href="<?php echo $photoPath . $photo->mediaAddress; ?>">
                    <img class="img-responsive img-thumbnail" src="<?php echo $photoThemePath . $photo->mediaTheme; ?>" />
                </a>
            </div>
            <div class="form-group">
                <label>وضعیت</label>
                <?php echo form_dropdown('photoStatus" class="form-control', array('active' => 'فعال', 'inactive' => 'غیر فعال'), $photo->mediaStatus) ?>
            </div>


            <button type="submit" class="btn  btn-success">ذخیره تغیرات</button>
        </form>
    </div>
</div>