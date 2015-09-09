<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            آنالیز
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tags"></i>  لیست ورود</strong>
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
        <h2> لیست جلسه ها </h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>شناسه</th>
                        <th>ip</th>

                        <th>کشور</th>

                        <th>شهر</th>
                        <th>تاریخ</th>
                        <th>محتوی</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($sessions) && is_array($sessions) && count($sessions) > 0) { ?>
                        <?php foreach ($sessions as $session) { ?>
                            <tr>
                                <td><?php echo $session->id ?></td>
                                <td><?php echo $session->ip_address ?></td>
                                <?php
                                try {
                                    $location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $session->ip_address)); //http://devzone.co.in/find-location-ip-address-php/
                                } catch (Exception $ex) {
                                    $location['geoplugin_countryName'] = "";
                                    $location['geoplugin_city'] = '';
                                }
                                ?>
                                <td>  <?php echo $location['geoplugin_countryName']; ?>  </td>
                                <td>  <?php echo $location['geoplugin_city']; ?>  </td>
                                <td><?php echo date('Y-m-d H:m:s', $session->timestamp) ?></td>
                                <td><?php echo $session->data ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="11">جلسه ای موجود نیست</td>
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
