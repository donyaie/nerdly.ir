<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            افزودن موضوع
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>افزودن موضوع  
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/blog/addTerm">

            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="termName" value="<?php echo set_value('termName'); ?>"  >
            </div>
            <?php if (form_error('termName')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termName') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>عنوان</label>
                <input class="form-control" name="termCaption" value="<?php echo set_value('termCaption'); ?>"  >
            </div>
            <?php if (form_error('termCaption')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termCaption') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>والد</label>
                <?php echo form_dropdown('termParent" class="form-control', (isset($terms) ? $terms : null), set_value('termParent')) ?>
            </div>

            <?php if (form_error('termParent')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termParent') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>وضعیت</label>
                <?php echo form_dropdown('termStatus" class="form-control', array('active' => 'فعال', 'inactive' => 'غیر فعال'), set_value('termStatus')) ?>
            </div>

            <?php if (form_error('termStatus')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termStatus') ?></div>
            <?php } ?>
            <button type="submit" class="btn  btn-success">افزودن</button>
            <button type="reset" class="btn  btn-warning">پاک کردن</button>
        </form>
    </div>
</div>