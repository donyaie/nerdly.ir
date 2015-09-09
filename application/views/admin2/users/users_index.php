
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ویرایش کاربران
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"></i>  ویرایش کاربران</strong>
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
        <h2>ویرایش کاربران</h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ایمیل</th>
                        <th>نوع</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($users) && is_array($users) && count($users) > 0) { ?>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><a href='<?php echo base_url() ?>admin/users/edit/<?php echo $user->userId ?>' ><?php echo $user->userEmail ?></a></td>
                                <td><?php echo $user->userType ?></td>
                                <td><?php echo $user->userStatus ?></td>
                                <td style="width: 50px;">
                                    <a href='<?php echo base_url() ?>admin/users/edit/<?php echo $user->userId ?>' ><input  type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_edit.png" title="Edit"></a>
                                    <a href='<?php echo base_url() ?>admin/users/delete/<?php echo $user->userId ?>' ><input type="image" src="<?php echo base_url(); ?>themes/admin/images/icn_trash.png" title="Trash"></a>
                                </td>
                            </tr>

                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="4">کاربری موجود نیست</td>
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
