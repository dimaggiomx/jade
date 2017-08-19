<?php
ob_start();
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php");
require_once('sescheck.php'); // para la sesion

// limpio la sesion del ultimo id registrado
unset($_SESSION["ses_lastId"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>JADE Capital - DESKTOP</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!--My admin Custom CSS -->
    <link href="../plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/customfvsd.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-sidebar">
<!-- json response will be here -->
<div id="errorDiv" class="errorDiv" align="center"></div>
<!-- json response will be here -->
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
  <!-- Top Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="desktop.php"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        <li>
          <form role="search" class="app-search hidden-xs">
            <input type="text" placeholder="Search..." class="form-control">
            <a href=""><i class="fa fa-search"></i></a>
          </form>
        </li>
      </ul>
        <?php include 'd_top.php' ?>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
  <!-- End Top Navigation -->
  <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <?php include 'd_left_menu.php' ?>
    </div>
  </div>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Registro de Proyectos</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
              <li><a href="desktop.php">Escritorio</a></li>
              <!--li><a href="#">Ui Elements</a></li-->
              <li class="active"><?php echo $_SESSION["ses_tipo"]; ?></li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge success" id="preg1"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 1</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>¿Tu proyecto se encuentra en etapa de operación?  (¿Genera ingresos?)</h2>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('SI',1)" href="#preg2">SI</button>
                                    <button class="fcbtn btn btn-success btn-outline btn-1b" onclick="setValue('NO',1)" href="#preg8">NO</button>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success" id="preg2"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 2</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>¿Cuentas con una empresa constituida?</h2>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('SI',2)" href="#preg4">SI</button>
                                    <button class="fcbtn btn btn-success btn-outline btn-1b" onclick="setValue('NO',2)" href="#preg3">NO</button>
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="timeline-badge success" id="preg3"><i class="fa fa-chevron-down"></i> </div>

                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 3</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>*¿Cuentas con información financiera?</h2>
                                    <br/>
                                    <button class="fcbtn btn btn-block btn-primary btn-1b" data-toggle="modal" data-target="#modalUpd" onclick="setTipoDocto('1_infoFin_');">SUBIR DOCTO</button>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('SI',3)" href="#preg7">SI</button>
                                    <button class="fcbtn btn btn-success btn-outline btn-1b" onclick="setValue('NO',3)" href="#preg7">NO</button>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success" id="preg4"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 4</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>*Proporciona tu RFC</h2>
                                    <br/>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rfc" placeholder="RFC" required>
                                        </div>
                                        <button class="fcbtn btn btn-block btn-primary btn-1b" data-toggle="modal" data-target="#modalUpd" onclick="setTipoDocto('1_RFC_');">SUBIR DOCTO</button>
                                        <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('NEXT',4)" href="#preg5">Continuar</button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge success" id="preg5"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 5</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>*¿Cuentas con EEF.FF?</h2>
                                    <br/>
                                    <button class="fcbtn btn btn-block btn-primary btn-1b" data-toggle="modal" data-target="#modalUpd" onclick="setTipoDocto('1_EEF-FF_');">SUBIR DOCTO</button>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('SI',5)" href="#preg6">SI</button>
                                    <button class="fcbtn btn btn-success btn-outline btn-1b" onclick="setValue('NO',5)" href="#preg6">NO</button>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success" id="preg6"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 6</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>*¿Cuentas con proyecciones financieras?</h2>
                                    <br/>
                                    <button class="fcbtn btn btn-block btn-primary btn-1b" data-toggle="modal" data-target="#modalUpd" onclick="setTipoDocto('1_proyFin_');">SUBIR DOCTO</button>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('SI',6)" href="#preg7">SI</button>
                                    <button class="fcbtn btn btn-success btn-outline btn-1b" onclick="setValue('NO',6)" href="#preg7">NO</button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge success" id="preg7"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 7</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>¿Cual es tu forma de financiamiento actual? (amigos, prestamistas, bancos, fondos personales, otros)</h2>
                                    <br/>
                                    <div class="form-group">
                                        <textarea id="formaFin" class="form-control" required></textarea>
                                    </div>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('NEXT',7)" href="#preg8">Continuar</button>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success" id="preg8"><i class="fa fa-chevron-down"></i> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pregunta 8</h4>
                                </div>
                                <div class="timeline-body">
                                    <h2>*Cuentanos el proyecto (Sector, mercado objetivo, productos, equipo de trabajo, necesidades de financiamiento, uso de los recursos a obtener), proyecciones, documentos que nos ayuden a entender mejor tu proyecto</h2>
                                    <br/>
                                    <div class="form-group">
                                        <textarea id="cuentanos" class="form-control"  required></textarea>
                                    </div>
                                    <br/>
                                    <button class="fcbtn btn btn-block btn-primary btn-1b" data-toggle="modal" data-target="#modalUpd" onclick="setTipoDocto('1_cuentanos_');">SUBIR DOCTO</button>
                                    <br/>
                                    <button class="fcbtn btn btn-info btn-outline btn-1b" onclick="setValue('NEXT',8)" data-toggle="modal" data-target=".bs-example-modal-sm" >Continuar</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- sample modal content -->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="mySmallModalLabel">Confirmacion</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="tproyectos/ps_first_project.php"  id="first_projectForm">
                                        <button class="fcbtn btn btn-info btn-outline btn-1b" id="completar1st" >Guardar Datos</button>
                                        <input name="tpreg1" id="tpreg1" type="hidden" value="" />
                                        <input name="tpreg2" id="tpreg2" type="hidden" value="" />
                                        <input name="tpreg3" id="tpreg3" type="hidden" value="" />
                                        <input name="tpreg4" id="tpreg4" type="hidden" value="" />
                                        <input name="tpreg5" id="tpreg5" type="hidden" value="" />
                                        <input name="tpreg6" id="tpreg6" type="hidden" value="" />
                                        <input name="tpreg7" id="tpreg7" type="hidden" value="" />
                                        <input name="tpreg8" id="tpreg8" type="hidden" value="" />
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </div>
            </div>
        </div>
        <!-- /.row -->
        <!--  modal para subir lgo -->
        <div id="modalUpd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Subir</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted m-b-30"> Seleccionar o arrastrar Documentos</p>
                        <form action="documents/ps_first_project.php" class="dropzone" id="dropzoneLogo">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                            <input name="idP" id="idP" type="hidden" value="W" />
                        </form>

                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.container-fluid -->
      <?php include 'footer.php' ?>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Form Wizard JavaScript -->
<script src="../plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
<!-- FormValidation -->
<link rel="stylesheet" href="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
<script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script src="tproyectos/ps_first_proyect.js"></script>
<script src="../plugins/bower_components/dropzone-master/dist/dropzone.js"></script>


<script>
    $(function(){
        Dropzone.options.dropzoneLogo = {
            maxFilesize: 5,
            addRemoveLinks: true,
            dictResponseError: 'Server not Configured',
            acceptedFiles: ".doc,.docx,.pdf,.ppt,.xls,.xslx",
            maxFiles: 1,
            init:function(){
                var self = this;
                // config
                self.options.addRemoveLinks = true;
                self.options.dictRemoveFile = "Delete";
                //New file added
                self.on("addedfile", function (file) {
                    console.log('new file added ', file);
                });
                // Send file starts
                self.on("sending", function (file, xhr, formData) {

                    var name = this.element.querySelector('input[name=idP]').value;

                    formData.append('primer', name);

                    console.log('upload started', file);
                    $('.meter').show();
                });

                // File upload Progress
                self.on("totaluploadprogress", function (progress) {
                    console.log("progress ", progress);
                    $('.roller').width(progress + '%');
                });

                self.on("queuecomplete", function (progress) {
                    $('.meter').delay(999).slideUp(999);
                });

                // On removing file
                self.on("removedfile", function (file) {
                    console.log(file);
                });
            }
        };
    })


function setValue(valor, preg)
{
    switch (preg)
    {
        case 1:
            document.getElementById("tpreg1").value = valor;
            break;

        case 2:
            document.getElementById("tpreg2").value = valor;
            break;

        case 3:
            document.getElementById("tpreg3").value = valor;
            break;

        case 4:
            document.getElementById("tpreg4").value = document.getElementById("rfc").value;
            break;

        case 5:
            document.getElementById("tpreg5").value = valor;
            break;

        case 6:
            document.getElementById("tpreg6").value = valor;
            break;

        case 7:
            document.getElementById("tpreg7").value = document.getElementById("formaFin").value;
            break;

        case 8:
            document.getElementById("tpreg8").value = document.getElementById("cuentanos").value;
            break;

        default: alert('Default');
    }

}

function setTipoDocto(valor) {
    document.getElementById("idP").value = valor;
}

// Para hacer scrool a un ancla (smooth)
    $('button[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
</script>

<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
