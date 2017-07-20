<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jade Capital Flow</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/logo.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li><a href="#about">Quienes Somos</a></li>
                            <li><a href="#contact">Contacto</a></li>
                            <li><a href="../jadesys/register.html">Regístrate</a></li>
                            <li class="active"><a href="../jadesys/login.html">Login</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">Quiero Invertir</h2>
                        <h4>Te ofrecemos opciones de inversión <br/>factibles y confiables.</h4>
                        <p>Estructuración de soluciones a la medida que <br/>permiten mayores rendimientos. Todas las empresas <br/>reciben asesoría para la estructuración de sus <br/>proyectos de inversión.</p>
                        <a href="index2.php" class="da-link button">Invertir</a>
                        <div class="da-img">
                            <!--img src="images/option01.png" alt="image01" width="320"-->
                        </div>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2>Busco Financiamiento</h2>
                        <h4>Te ofrecemos soluciones a la <br>medida para tus necesidades<br/> de financiamiento.</h4>
                        <p><br/>Date la oportunidad de crecer con nosotros y <br/>brindarte las soluciones a la medida <br/>de tus proyectos</p>
                        <a href="index2.php?emp=1" class="da-link button">Buscar Financiamiento</a>
                        <div class="da-img">
                            <!--img src="images/option02.png" width="320" alt="image02"-->
                        </div>
                    </div>
                    <!-- End second slide -->

                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->

        
        
        

        <!-- About us section start -->
        <div class="section primary-section" id="about">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>¿Quienes Somos?</h1>
                </div>
                <div class="about-text centered">
                    <h3>Somos una empresa 100% mexicana Experta en asesoramiento financiero y estructuración de proyectos de inversión. Tenemos un amplio conocimiento del mercado bursátil y bancario.</h3>
                    <!--p style="font-size:16px">Somos una empresa 100% mexicana Experta en asesoramiento financiero y estructuración de proyectos de inversión. Tenemos un amplio conocimiento del mercado bursátil y bancario.</p-->
                </div>
            </div>
        </div>
        <!-- Client section start -->
        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="triangle2"></div>
                <div class="container">
                    <div class="title">
                        <h1>Contacto</h1>
                        <p>Para dudas, aclaraciones, comentarios, puedes acercarte con nosotros por cualquiera de estos medios:.</p>
                        <p><?php echo $salida; ?></p>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <h3>Comentarios</h3>
                            <div id="successSend" class="alert alert-success invisible">
                                <strong>Excelente!</strong>Su mensaje ha sido enviado.</div>
                            <div id="errorSend" class="alert alert-error invisible">Ups!, ocurrió un error.</div>
                            <form id="contact-form" action="php/mail.php">
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="span12" type="text" id="name" name="name" placeholder="* Su nombre..." />
                                        <div class="error left-align" id="err-name">Ingrese su nombre.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="span12" type="email" name="email" id="email" placeholder="* Su email..." />
                                        <div class="error left-align" id="err-email">Ingrese una dirección de email valido.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <textarea class="span12" name="comment" id="comment" placeholder="* Comentarios..."></textarea>
                                        <div class="error left-align" id="err-comment">Ingrese sus comentarios.</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button id="send-mail" class="message-btn">Enviar mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="span6">
                            <div class="highlighted-box center">
                                <p class="info-mail">angel.hernandez@jadecapitalflow.mx</p>
                                <p class="info-mail">oliver.moreno@jadecapitalflow.mx</p>
                                <p class="info-mail">arnoldo.gutierrez@jadecapitalflow.mx</p>
                                <p class="info-mail">victor.trillo@jadecapitalflow.mx</p>
                                <p class="info-mail">enzo.dimaggio@jadecapitalflow.mx</p>
                                <!--p>+11 234 567 890</p>
                                <p>+11 286 543 850</p-->
                                <div class="title">
                                    <ul class="social">
                                        <li>
                                            <a href="">
                                                <span class="icon-facebook-circled"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="icon-twitter-circled"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="icon-linkedin-circled"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2017 Theme by <a href="http://www.enzomx.com">Jade Capital Flow</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>