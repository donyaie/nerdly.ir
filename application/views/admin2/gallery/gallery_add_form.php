<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
             افزودن تصویر
 
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>   افزودن تصویر</strong>
            </li>
        </ol>
    </div>
</div>

<?php if ($this->session->flashdata('flashError')) { ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('flashError') ?></div>
<?php } ?>
    
<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/gallery/add">

            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="photoName" value="<?php echo set_value('photoName'); ?>"  >
            </div>
            <?php if (form_error('photoName')) { ?>
                <div class="alert alert-danger"><?php echo form_error('photoName') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>عنوان</label>
                <input class="form-control" name="photoCaption" value="<?php echo set_value('photoCaption'); ?>"  >
            </div> 
            <?php if (form_error('photoCaption')) { ?>
                <div class="alert alert-danger"><?php echo form_error('photoCaption') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>وضعیت</label>
                <?php echo form_dropdown('photoStatus" class="form-control', array('active' => 'فعال', 'inactive' => 'غیر فعال'), set_value('photoStatus')) ?>
            </div>
            <?php if (form_error('photoStatus')) { ?>
                <div class="alert alert-danger"><?php echo form_error('photoStatus') ?></div>
            <?php } ?>
            <div class="form-group">

                <label>بارگذاری</label>
                <input type="file" name="photoUpload" value="<?php echo set_value('photoUpload'); ?>" >
            </div> 
            <?php if (form_error('photoUpload')) { ?>
                <div class="alert alert-danger"><?php echo form_error('photoUpload') ?></div>
            <?php } ?>


            <button type="submit" class="btn  btn-success">افزودن</button>
            <button type="reset" class="btn  btn-warning">پاک کردن</button>
        </form>
    </div>
</div>