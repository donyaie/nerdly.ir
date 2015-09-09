<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ویرایش موضوع
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>ویرایش  موضوع   <strong><?php echo $term->termName?></strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/blog/editterm/<?php echo $term->termId;?>">

            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="termName" value="<?php echo $term->termName; ?>"  >
            </div>
            <?php if (form_error('termName')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termName') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>عنوان</label>
                <input class="form-control" name="termCaption" value="<?php echo $term->termCaption; ?>"  >
            </div>
            <?php if (form_error('termCaption')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termCaption') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>والد</label>
                <?php echo form_dropdown('termParent" class="form-control', (isset($terms) ? $terms : null), $term->termParent) ?>
            </div>

            <?php if (form_error('termParent')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termParent') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>وضعیت</label>
                <?php echo form_dropdown('termStatus" class="form-control', array('active' => 'فعال', 'inactive' => 'غیر فعال'), $term->termStatus) ?>
            </div>

            <?php if (form_error('termStatus')) { ?>
                <div class="alert alert-danger"><?php echo form_error('termStatus') ?></div>
            <?php } ?>
                <button type="submit" class="btn  btn-success">ذخیره تغییرات</button>
        </form>
    </div>
</div>