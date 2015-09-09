


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            حذف موضوع
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>حذف  موضوع   <strong><?php echo $term->termName ?></strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/blog/deleteterm/<?php echo $term->termId; ?>">


            <?php if (form_error('DeletePost')) { ?>
                <div class="alert alert-danger"><?php echo form_error('DeletePost') ?></div>
            <?php } ?>
            <?php if (form_error('DeleteTermChild')) { ?>
                <div class="alert alert-danger"><?php echo form_error('DeleteTermChild') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>  حذف مقاله</label>
                <div class="checkbox">
                    <label>
                        <?php echo form_checkbox('DeletePost', 'بله', TRUE) ?>
                    </label>
                </div>
                <label>   حذف فرزند ها</label>
                <div class="checkbox">
                    <label>
                        <?php echo form_checkbox('DeleteTermChild', 'بله', True) ?>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn  btn-success">حذف </button>
        </form>
    </div>
</div>