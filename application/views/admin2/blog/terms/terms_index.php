<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            دسته بندی ها
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tags"></i>  دسته بندی ها</strong>
            </li>
        </ol>
    </div>
</div>
<!-- message section -->
<?php if ($this->session->flashdata('flashError')) { ?>
    <div class="alert alert-danger"><strong><?php echo $this->session->flashdata('flashError') ?> </strong></div>
<?php } ?>
<?php if ($this->session->flashdata('flashConfirm')) { ?>
    <div class="alert alert-success"><strong> <?php echo $this->session->flashdata('flashConfirm') ?></strong></div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <h2> دسته بندی <a href="<?php echo base_url() ?>admin/blog/addterm/">افزودن</a></h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>نام</th>
                        <th>عنوان</th>
                        <th>والد</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($terms) && is_array($terms) && count($terms) > 0) { ?>
                        <?php foreach ($terms as $term) { ?>
                            <tr>
                                <td><?php echo $term->termId ?></td>
                                <td><?php echo $term->termName ?></td>
                                <td><?php echo $term->termCaption ?></td>
                                <td><?php echo $term->termParent ?></td>
                                <td><?php echo $term->termStatus ?></td>
                                <td>
                                    <a href='<?php echo base_url() ?>admin/blog/editterm/<?php echo $term->termId ?>' ><input  type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_edit.png" title="Edit"></a>
                                    <a href='<?php echo base_url() ?>admin/blog/deleteterm/<?php echo $term->termId ?>' ><input type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_trash.png" title="Trash"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="11">موضوعی موجود نیست</td>
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
