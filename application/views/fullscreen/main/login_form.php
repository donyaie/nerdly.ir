<div class="col-sm-4 col-sm-offset-4 text-right"  > 
    <form role="form" class="form-horizontal" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>main/login">
        <?php if ($this->session->flashdata('flashError')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('flashError') ?></div>
        <?php } ?>

        <div class="form-group">
            <label for="userEmail" >پست الکترونیک</label>
            <input type="email" class="form-control" name="userEmail" value="<?php echo set_value('userEmail'); ?>" placeholder="example@exam.exam">
        </div>
            
        <?php if (form_error('userEmail')) { ?>
            <div class="alert alert-danger"><?php echo form_error('userEmail') ?></div>
        <?php } ?>
        <div class="form-group">
            <label for="userPassword" >کلمه عبور</label>
            <input type="password" class="form-control" name="userPassword" placeholder="کلمه عبور">
        </div>
        <?php if (form_error('userPassword')) { ?>
            <div class="alert alert-danger"><?php echo form_error('userPassword') ?></div>
        <?php } ?>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> به خاطر بسپار
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info  btn-lg">ورود</button>

        </div>
    </form>
</div>