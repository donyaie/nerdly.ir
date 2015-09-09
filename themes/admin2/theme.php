<!DOCTYPE html>
<html lang="en">
    <?php $themePath = base_url() . 'themes/admin2/'; ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $themePath; ?>img/phpLover.ico">
        <meta name="description" content="<?php echo (isset($description)) ? $description : ' Admin' ?>" />
        <meta name="keywords" content="<?php echo (isset($keywords)) ? $keywords : '' ?>" />
        <meta name="language" content="en" />
        <title><?php echo (isset($title)) ? $title : 'Admin Nerdly' ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $themePath; ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Core CSS RTL-->
        <link href="<?php echo $themePath; ?>css/bootstrap-rtl.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $themePath; ?>css/sb-admin.css" rel="stylesheet">
        <link href="<?php echo $themePath; ?>css/sb-admin-rtl.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo $themePath; ?>css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $themePath; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php
        if (isset($includes)) {
            echo $includes;
        }
        ?>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>admin">پنل مدیرت</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $this->session->userdata('userEmail') ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $this->session->userdata('userId') ?>"><i class="fa fa-fw fa-user"></i> پروفایل</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url(); ?>logout"><i class="fa fa-fw fa-power-off"></i> خروج</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="<?php echo base_url(); ?>admin"><i class="fa fa-fw fa-dashboard"></i>داشبرد</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#article_drop"><i class="fa fa-fw fa-file-word-o"></i> مقالات <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="article_drop" class="collapse">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/blog/addpost"> <i class="fa fa-fw fa-file"></i>افزودن مقاله</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/blog/index"> <i class="fa fa-fw fa-pencil"></i>ویرایش مقاله</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/blog/indexterm"> <i class="fa fa-fw fa-star"></i>دسته بندی ها</a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-fw fa-tags"></i>تگ ها</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#users_drop"><i class="fa fa-fw fa-users"></i> کاربران <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="users_drop" class="collapse">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/users/add"> <i class="fa fa-fw fa-unlock"></i>افزودن کاربر</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/users/index"> <i class="fa fa-fw fa-users"></i>نمایش کاربران</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $this->session->userdata('userId') ?>"> <i class="fa fa-fw fa-user"></i>ویرایش پروفایل</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#fails_drop"><i class="fa fa-fw fa-folder"></i> رسانه ها <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="fails_drop" class="collapse">
                                <li>
                                    <a href="#"> <i class="fa fa-fw fa-folder-open"></i>مدیریت فایل ها</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/gallery/index"> <i class="fa fa-fw fa-picture-o"></i>گالری</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#analyse_drop"><i class="fa fa-fw fa-archive"></i> آنالیز <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="analyse_drop" class="collapse">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/analyse/index"> <i class="fa fa-fw fa-archive"></i>جلسه ها</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/settings/index"><i class="fa fa-fw fa-cog "></i>تنظیمات</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <div id="page-wrapper">

                <div class="container-fluid">
                    <?php echo $content; ?>

                    <div class="row">
                        <div class="alert alert-info">

                            <strong>بارگزاری</strong>
                            ({elapsed_time}) ثانیه
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo $themePath; ?>js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $themePath; ?>js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo $themePath; ?>js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo $themePath; ?>js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo $themePath; ?>js/plugins/morris/morris-data.js"></script>

    </body>

</html>
