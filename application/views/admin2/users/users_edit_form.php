<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           ویرایش کاربر
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i><strong>  ویرایش کاربر'<?php echo $user->userEmail?></strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>admin/users/edit/<?php echo $user->userId;?>">

            <div class="form-group">
                <label>ایمیل</label>
                <input class="form-control" name="userEmail" value="<?php echo $user->userEmail; ?>" placeholder="example@example.et" >
            </div>
            <?php if (form_error('userEmail')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userEmail') ?></div>
            <?php } ?>
            <div class="form-group">
                <label>پسورد جدید</label>
                <input class="form-control" name="userPassword"  placeholder="کلمه عبور" >


            </div> 
            <?php if (form_error('userPassword')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userPassword') ?></div>
            <?php } ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>نوع</label>
                        
                        <?php echo form_dropdown('userType" class="form-control',array('user'=>'کاربر عادی','admin'=>'مدیر'),set_value('userType',$user->userType))?>
		
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>وضعیت</label>
                        <?php echo form_dropdown('userStatus" class="form-control',array('active'=>'فعال','inactive'=>'غیر فعال' ),set_value('userStatus',$user->userStatus))?>
		
                    </div>
                </div>
            </div>
            <?php if (form_error('userType')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userType') ?></div>
            <?php } ?>
            <?php if (form_error('userStatus')) { ?>
                <div class="alert alert-danger"><?php echo form_error('userStatus') ?></div>
            <?php } ?>
                
            <button type="submit" class="btn  btn-success">ذخیره تغییرات </button>
        </form>
    </div>
</div>
