<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            تنظیمات
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-cog"></i>تظیمات
        </ol>
    </div>
</div>

<div class="row">
    <?php if ($this->session->flashdata('flashError')) { ?>
        <div class="alert alert-danger"> <strong><?php echo $this->session->flashdata('flashError') ?></strong></div>
    <?php } ?>
    <?php if ($this->session->flashdata('flashConfirm')) { ?>
        <div class="alert alert-success"> <strong><?php echo $this->session->flashdata('flashConfirm') ?></strong></div>
    <?php } ?>
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/settings/index">

            <div class="form-group">
                <label><?php echo $settings['settingTitle']->settingCaption;?></label>
                <input class="form-control" name="settingTitle" value="<?php echo set_value('settingTitle',$settings['settingTitle']->settingValue); ?>"  >
            </div>
            <?php if (form_error('settingTitle')) { ?>
                <div class="alert alert-danger"><?php echo form_error('settingTitle') ?></div>
            <?php } ?>
            <div class="form-group">
                <label><?php echo $settings['settingDescription']->settingCaption;?></label>
                <input class="form-control" name="settingDescription" value="<?php echo set_value('settingDescription',$settings['settingDescription']->settingValue); ?>"  >
            </div>
            <?php if (form_error('settingDescription')) { ?>
                <div class="alert alert-danger"><?php echo form_error('settingDescription') ?></div>
            <?php } ?>
            <button type="submit" class="btn  btn-success">ذخیره تغییرات</button>
        </form>
    </div>
</div>