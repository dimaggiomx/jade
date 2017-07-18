<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$emp = 0;

if(isset($_GET['emp']))
{
	$emp = 1;
}


// set filePath
$archivos = '/jade/jadesys/files/proyectos/';



/*
function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);
	return $dias;
}
// Ejemplo de uso:
echo dias_transcurridos('2012-07-01','2012-07-18');
// Salida : 17

 */

require "bd.php";
// ejecuto query y pinto resultados
$query = 'SELECT
A.id, A.gnombre, A.ranking, A.eval,
B.id, B.idEmpresa, B.nombre, B.descripcionGeneral, B.video,
C.id, C.idProyecto, C.fechaInicio, C.fechaFin
FROM tempresas AS A
INNER JOIN tproyectos AS B ON A.id = B.idEmpresa
INNER JOIN tsubastas AS C ON B.id = C.idProyecto';

$salida = '';
$salida2= '';

if ($resultado = $mysqli->query($query)) {
    while ($fila = $resultado->fetch_row()) {
        // directorio actual
        $doctos =


        $salida .= '<div id="slidingDiv" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="images/Portfolio01.png" alt="project 1" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>'.$fila[1].' / '.$fila[6].'</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Rating</span> - </div>
                                    <div>
                                        <span>78%</span>Ranking: '.$fila[2].' </div>
                                    <div>
                                        <span>56%</span>Evaluacion: '.$fila[3].'</div>
                                    <div>
                                        <span>12d</span> '.$fila[11].' - '.$fila[12].'</div>
                                    <div>
                                        <span>URL</span>'.$fila[8].'</div>
                                </div>
                                <p>'.$fila[7].'</p>
                                <p><a href="#" class="button2">Invertir</a> <a href="#" class="button2">Pitch</a></p>
                            </div>
                        </div>
                    </div>';

        $salida2 .= '<li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/Portfolio01.png" alt="project 1">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>'.$fila[1].' / '.$fila[6].'</h3>
                                <p>'.substr($fila[7], 0, 100).'</p>
                                <div class="mask"></div>
                            </div>
                        </li>';

    }
}


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
    
    <body style="background-image: images/Slider.png; background-repeat: repeat-x; background-repeat: repeat-y;">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="index.php" class="brand">
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
                          <?php include('menu.php'); ?>
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
                    <?php
                    if($emp==1)
                    {
                        include('banner_emp.php');
                    }
                    else  // es inversionista
                    {
                        include('banner_inv.php');
                    }
                    ?>
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
        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <!--div class="title">
                    <h1>¿Cómo Funciona el Match-Funding?</h1>
                    <!-- Section's title goes here -->
                    <!--p>Explicación de cada etapa del proceso.</p>
                    <!--Simple description for section goes here. -->
                <!--/div-->
               <?php
			    if($emp==1)
				{
					include('mf_emp.php');
					}
					else  // es inversionista
					{
						include('mf_inv.php');
						}
			   ?>
                </div>
            </div>
        </div>
        <!-- Service section end -->
        
        
        
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Mercado</h1>
                    <p>Descubra todos los proyectos que se ofrecen, es una ¡inversión segura!</p>
                </div>
                <ul class="nav nav-pills">
                    <li class="filter" data-filter="all">
                        <a href="#noAction">Todas</a>
                    </li>
                    <li class="filter" data-filter="web">
                        <a href="#noAction">CAPITAL</a>
                    </li>
                    <li class="filter" data-filter="photo">
                        <a href="#noAction">DEUDA</a>
                    </li>
                    <li class="filter" data-filter="identity">
                        <a href="#noAction">MIXTOS</a>
                    </li>
                </ul>
                <!-- Start details for portfolio project 1 -->
                <div id="single-project">


                    <?php echo $salida; ?>
                    <!-- End details for portfolio project 1 -->
                    <ul id="portfolio-grid" class="thumbnails row">
                       <?php echo $salida2; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Portfolio section end -->

       
        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Contacto</h1>
                        <p>Para dudas, aclaraciones, comentarios, puedes acercarte con nosotros por cualquiera de estos medios:.</p>
                        <p><?php echo $salida; ?></p>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="map-canvas" id="map-canvas" >
                        <!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.4335710531013!2d-99.1767918489928!3d19.393663986842096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff718f4416e1%3A0x6e35698f0852629c!2sWorld+Trade+Center+Ciudad+de+M%C3%A9xico!5e0!3m2!1ses-419!2smx!4v1483119123151" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe-->
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span5 contact-form centered">
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
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="span9 center contact-info">
                        <!--p>123 Fifth Avenue, 12th,Belgrade,SRB 11000</p-->
                        <p class="info-mail">angel.hernandez@jadecapitalflow.mx</p>
                        <p class="info-mail">oliver.moreno@jadecapitalflow.mx</p>
                        <p class="info-mail">arnoldo.gutierrez@jadecapitalflow.mx</p>
                        <p class="info-mail">victor.trillo@jadecapitalflow.mx</p>
                        <p class="info-mail">enzo.dimaggio@jadecapitalflow.mx</p>
                        <!--p>+11 234 567 890</p>
                        <p>+11 286 543 850</p-->
                        <div class="title">
                            <h3>Redes Sociales</h3>
                        </div>
                    </div>
                    <div class="row-fluid centered">
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