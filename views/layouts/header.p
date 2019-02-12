<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= str_replace("<", "&lt;", $title); ?></title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/template/images/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <div class="page-wrapper">


            <header id="header"><!--header-->
                <div class="header_top"><!--header_top-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="contactinfo">
                                    <ul class="nav nav-pills">
                                        <li><a href="#"><i class="fa fa-phone"></i> +34 672 97 96 19</a></li>
                                        <li><a href="#"><i class="fa fa-envelope"></i> vadmaz91@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="social-icons pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="https://www.facebook.com/LB-LIberty-Walk-BODY-KITS-214839485947748/">
											<i class="fa fa-facebook"></i>
											</a>
										</li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
							<div class="col-sm-4">
                                <div class="shop-menu pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="/cart">
                                                <i class="fa fa-shopping-cart"></i> Carrito 
                                                (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)
                                            </a>
                                        </li>
                                        <?php  
										
										if (User::isGuest() && isset($_SESSION['user'])){
												if($_SESSION['user'] != 'admin'){	
                                            	?>
											<li><a href="/cabinet/"><i class="fa fa-user"></i> Mi cuenta</a></li>
                                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Salir</a></li>
                                        <?php  }}
										
										
										if (isset($_SESSION['user'])) {
											
											if($_SESSION['user'] == 'admin') {
										?>
										 <li><a href="/admin/"><i class="fa fa-user-secret" aria-hidden="true"></i> Admin panel</a></li>
                                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Salir</a></li>
										<?php }}  else{ ?>
                                            
										<li><a href="/user/login/"><i class="fa fa-lock"></i> Acceder</a></li>
                                        <?php }  ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header_top-->

                <div class="header-middle"><!--header-middle-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="/"><img id="logo" src="/template/images/home/logo.png" alt="logo" /></a>
                            </div>

                        </div>
                    </div>
                </div><!--/header-middle-->

                <div class="header-bottom"><!--header-bottom-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="mainmenu pull-left">
                                    <ul class="nav navbar-nav collapse navbar-collapse">
                                        <li><a href="/">Inicio</a></li>
                                        <li class="dropdown"><a href="#">Tienda<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li><a href="/catalog/">Catalogo</a></li>
                                                <li><a href="/cart/">Carrito</a></li>
                                            </ul>
                                        </li>
										<li><a href="/service/">Servicios</a></li>
                                        <li><a href="/about/">Nosotros</a></li>
                                        <li><a href="/contacts/">Contacto</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-bottom-->

            </header><!--/header-->