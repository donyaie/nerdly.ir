<article>
    <?php echo form_open(base_url() . 'main/login') ?>
    <ul>
        <?php if ($this->session->flashdata('flashError')) { ?>
            <li>
                <div class='flashError'>
                    <?php echo $this->session->flashdata('flashError') ?>
                </div>
            </li>
        <?php } ?>
        <li>
            <label>پست الکترونیک</label>
            <?php echo form_input('userEmail', set_value('userEmail')) ?>
            <?php echo form_error('userEmail') ?>
        </li>
        <li>
            <label>گذرواژه</label>
            <?php echo form_password('userPassword') ?>
            <?php echo form_error('userPassword') ?>
        </li>
        <li>
            <input class="button" type="submit" name="" value="ورود"  />
        </li>
    </ul>
    <?php echo form_close() ?>
</article>