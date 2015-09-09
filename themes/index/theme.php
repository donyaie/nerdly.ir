<?php $themePath = base_url() . 'themes/index/'; ?>
<!DOCTYPE html>
<html lang="fa-ir">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="alexaVerifyID" content="6QG66NgTV7_tJsMusB0jJsRS2s8"/> 
		<meta name="google-site-verification" content="ai1_Fa6xJDAciA75tfIp2kJ7GdD69etb9thvJaXTzgY" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $themePath; ?>img/phpLover.ico"/>

        <meta name="description" content="<?php echo (isset($description)) ? $description : 'نردلی یک پروژه open source و ارائه وب سرویس رایگان است ' ?>" />
        <meta name="keywords" content="<?php echo (isset($keywords)) ? $keywords : 'طراحی شبکه, طراحی نرم افزار ,سرویس , سرویس گرایی , soap , nerdly, نردلی , میزبانی وب, آموزش  برنامه نویسی ,آب و هوا , وب سرویس,شبکه'  ?>" />


        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?php echo (isset($title)) ? $title : 'نردلی '; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo $themePath; ?>css/bootstrap.min.css" rel="stylesheet"/>
        <link href="<?php echo $themePath; ?>css/bootstrap-rtl.min.css" rel="stylesheet"/>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>

        <link href="<?php echo $themePath; ?>css/style.css" rel="stylesheet"/>
        <link rel="alternate" href="<?php echo base_url() ?>" hreflang="fa-ir" />


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
                        <a class="navbar-brand logo " href="#menu_header">نردلی</a>
                    </div>

                    <div id="navbar" class="collapse navbar-collapse" >
                        <ul class="nav navbar-nav navbar-right">
	                        <li class="dropdown ">
		                        <a href="#menu_services" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">سرویس <span class="caret"></span></a>
		                        <ul class="dropdown-menu " style="text-align: right">
			                        <li><a href="#">آب و هوا</a></li>
			                        <li><a href="#">تقویم فارسی</a></li>
		                        </ul>
	                        </li>
                            <li ><a href="#menu_training">مقالات </a></li>
                            <li><a href="#menu_team">درباره </a></li>

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

            <div class="container-fluid header" id="menu_header">
                <p><h1>نردلی</h1></p>
            </div>


	        <section id="menu_services" class="services">
		        <div class="container">
			        <div class="row text-center">
				        <div id="services"  class="col-lg-10 col-lg-offset-1">
					        <h2>سرویس ها</h2>
					        <div class="row">
						        <div class="col-md-6 col-sm-6">
							        <a href="#" class="service-item">
                                        <span class="fa-stack fa-5x">
                                            <i class="fa fa-circle fa-stack-2x services-circle"></i>
                                            <i  class="fa fa-cloud fa-stack-1x services-icon "></i>
                                        </span>
								        <h3>
									        <strong>آب و هوا</strong>
								        </h3>
								        </br>
								        <p>API  از سرویس های آب و هوا را برای شما آماده کرده ایم</p>
							        </a>
						        </div>
						        <div class="col-md-6 col-sm-6">
							        <a href="#" class="service-item">
                                        <span class="fa-stack fa-5x">
                                            <i class="fa fa-circle fa-stack-2x services-circle"></i>
                                            <i class="fa fa-calendar fa-stack-1x services-icon"></i>
                                        </span>
								        <h3>
									        <strong>تقویم فارسی </strong>
								        </h3>

								        </br>
								        <p>API هایی برای استفاه از تقویم فارسی</p>
							        </a>
						        </div>

					        </div>
					        <!-- /.row (nested) -->
				        </div>
				        <!-- /.col-lg-10 -->
			        </div>
			        <!-- /.row -->
		        </div>
		        <!-- /.container -->
	        </section>


            <section class="row" id="menu_training">


                <div class="container-fluid">
                    <?php if (isset($learning)) echo $learning; ?>
                </div>
            </section>



            <section id="menu_team" class="bg-light-gray">
                <div class="container">
                    <div id="team" class="row">
                        <div class="col-sm-6">
                            <div class="team-member">
                                <img src="<?php echo $themePath; ?>img/gallery/donyaie.jpg" class="img-responsive img-circle" alt="علی دنیایی" width="200px" height= "200px" />


                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="team-member">
	                            <h3 class="team-name">علی دنیایی</h3>
	                            <p class="team-skill">php , C# , Java</p>
                                <ul class="row social-buttons">
                                    <li><a href="#"><span class="fa fa-linkedin"></span></a>
                                    </li>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a>
                                    </li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

			</section>
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
                        <li>
                            <a href="https://plus.google.com/113881068068380192798" rel="publisher">‪<span class="fa fa-google-plus"></span>‏</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">

                </div>
            </footer>
        </div>

      
	    <script src="<?php echo $themePath; ?>js/jquery.min.js"></script>
	    <script src="<?php echo $themePath; ?>js/bootstrap.min.js"></script>
	    <script src="<?php echo $themePath; ?>js/script.js"></script>
    </body>
</html>
