<?php $themePath= base_url().'themes/fullscreen/';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $themePath; ?>img/phpLover.ico">

		<meta name="description" content="<?php echo (isset($description))?$description: ' شرکت طراخی و پیا ده سازی نرم افزار و میر بانی و پیا ذه سازی وب سایت های اختصاصی'?>" />
		<meta name="keywords" content="<?php echo (isset($keywords))? $keywords: 'طراحی شبکه, طراحی نرم افزار , شبکه'?>" />
		<meta name="language" content="en" />
	
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (isset($title))? $title: 'PHP Lover';?></title>

        <!-- Bootstrap -->
        <link href="<?php echo $themePath; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $themePath ;?>css/bootstrap-rtl.min.css" rel="stylesheet">

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
        <link href="<?php echo $themePath ;?>css/style.css" rel="stylesheet">

		
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
	<body>
        <div class="container-fluid" id="container">
	        <nav class="navbar  navbar-inverse navbar-fixed-top" id="top-nav">
		        <div class="container-fluid">

			        <div  class="navbar-header navbar-right active" >
				        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				        </button>
				        <a class="navbar-brand logo " href="<?php echo base_url();?>#menu_header">نردلی</a>
			        </div>

			        <div id="navbar" class="collapse navbar-collapse" >
				        <ul class="nav navbar-nav navbar-right">
					        <li class="dropdown ">
						        <a href="<?php echo base_url();?>#menu_services" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">سرویس <span class="caret"></span></a>
						        <ul class="dropdown-menu " style="text-align: right">
							        <li><a href="#">آب و هوا</a></li>
							        <li><a href="#">تقویم فارسی</a></li>
						        </ul>
					        </li>
					        <li ><a href="<?php echo base_url();?>blog">مقالات </a></li>
					        <li><a href="<?php echo base_url();?>#menu_team">درباره </a></li>

					        <?php
					        if ($this->user_model->Secure(array('userType' => array('admin', 'user')))) {
						        echo '<li><a href="' . base_url() . 'admin">مدیریت</a></li>';
						        echo '<li ><a href="' . base_url() . 'logout">خروج</a></li>';
					        } else
						        echo '<li><a href="' . base_url() . 'login">ورود</a></li>';
					        ?>

				        </ul>
				        <form class="navbar-form navbar-left" role="search"  method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>blog/search">
					        <div class="input-group">
						        <input type="text" class="form-control" name="searchQuery" value="<?php echo set_value('searchQuery'); ?>" placeholder="جستجو">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">جستجو</button>
                                </span>
					        </div>
				        </form>

			        </div>
		        </div>
	        </nav>

            <div class="row header " id="menu_header">
                <?php echo $content; ?> 
            </div>

            <div class="gap"></div>



            <footer class="row">
                <div class="col-md-4 text-center">

                </div>
                <div class="col-md-4">
                    <ul class="row social-buttons">
                        <li><a href="#"><span class="fa fa-linkedin"></span></a>
                        </li>
                        <li><a href="#"><span class="fa fa-facebook"></span></a>
                        </li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">

                </div>
            </footer>
        </div>
        <script src="<?php echo $themePath ;?>js/jquery.min.js"></script>
		<script src="<?php echo $themePath ;?>js/modernizr.js" type="text/javascript"></script>
        <script src="<?php echo $themePath ;?>js/bootstrap.min.js"></script>
        <script src="<?php echo $themePath ;?>js/script.js"></script>

        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script  src="<?php echo $themePath ;?>js/gmaps.js"></script>
    </body>
</html>
    