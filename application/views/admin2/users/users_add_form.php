
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            افزودن کاربر
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>  افزودن کاربر</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/users/add">

            <div class="form-group">
                <label>ایمیل</label>
                <input class="form-control" name="userEmail" value="<?php echo set_value('userEmail'); ?>" placeholder="example@example.et" >
            </div>
            <?php if (form_error('userEmail')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userEmail') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>پسورد</label>
                <input class="form-control" name="userPassword"  placeholder="کلمه عبور" >


            </div> 
            <?php if (form_error('userPassword')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userPassword') ?></div>
            <?php } ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>نوع</label>
                        <select class="form-control" name="userType" value="<?php echo set_value('userType'); ?>" >
                            <option value="user">کاربر عادی</option>
                            <option value="admin">مدیر</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>وضعیت</label>
                        <select class="form-control" name="userStatus" value="<?php echo set_value('userStatus'); ?>" >
                            <option value="active">فعال</option>
                            <option value="inactive">غیر فعال</option>
                        </select>

                    </div>
                </div>
            </div>
            <?php if (form_error('userType')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userType') ?></div>
            <?php } ?>
            <?php if (form_error('userStatus')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userStatus') ?></div>
            <?php } ?>
            <button type="submit" class="btn  btn-success">افزودن</button>
            <button type="reset" class="btn  btn-warning">پاک کردن</button>
        </form>
    </div>
</div>