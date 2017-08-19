<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once("config.php"); // para BD
require_once('sescheck.php'); // para la sesion

require_once(C_P_CLASES.'utils/string.functions.php');
$STR = new STRFN();

// obtengo los datos de los GIROS
// ejecuto query y pinto resultados
$salida = '';
$query = 'SELECT * FROM tgiro WHERE estatus = 1';
$stmt = $DBcon->prepare($query);
$stmt->execute();

while ($row = $stmt->fetchObject()) {

  $salida.= '<option value="'.$row->id.'">'.$row->giro.'</option>';
}
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
  <title>JADE Capital Flow</title>
  <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <!-- Custom CSS -->
  <link href="css/customfvsd.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/blue.css" id="theme"  rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register2">
  <div class="login-box2">
    <div class="white-box">
      <!-- json response will be here -->
      <div id="errorDiv" class="errorDiv" align="center"></div>
      <!-- json response will be here -->
      <form class="form-horizontal form-material" id="loginform" action="tinversionistas/a.fn.php" method="post">
        <input type="hidden" id="iduser" name="iduser" value="<?php echo $_SESSION["ses_id"]; ?>" required>
        <h3 class="box-title m-b-20">Concluir Registro</h3>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Nombre o Razón Social" name="gnombre" id="gnombre">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Responsable Legal" name="gresponsablelegal" id="gresponsablelegal">
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12">Dirección (calle y número)</label>
          <div class="col-xs-12">
            <textarea class="form-control" rows="5" id="odireccion" name="odireccion" ></textarea>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Colonia" name="ocolonia" id="ocolonia">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Ciudad" name="ociudad" id="ociudad">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Estado</label>
          <div class="col-sm-12">
            <select class="form-control" name="oestado"  id="oestado">
              <option value="">Seleccione...</option>
              <option value="Otro">Otro</option>
              <option value="Aguascalientes">Aguascalientes</option>
              <option value="Baja California">Baja California</option>
              <option value="Baja California Sur">Baja California Sur</option>
              <option value="Campeche">Campeche</option>
              <option value="Chiapas">Chiapas</option>
              <option value="Chihuahua">Chihuahua</option>
              <option value="Coahuila">Coahuila</option>
              <option value="Colima">Colima</option>
              <option value="Distrito Federal">Distrito Federal</option>
              <option value="Durango">Durango</option>
              <option value="Estado de M&eacute;xico">Estado de M&eacute;xico</option>
              <option value="Guanajuato">Guanajuato</option>
              <option value="Guerrero">Guerrero</option>
              <option value="Hidalgo">Hidalgo</option>
              <option value="Jalisco">Jalisco</option>
              <option value="Michoac&aacute;n">Michoac&aacute;n</option>
              <option value="Morelos">Morelos</option>
              <option value="Nayarit">Nayarit</option>
              <option value="Nuevo Le&oacute;n">Nuevo Le&oacute;n</option>
              <option value="Oaxaca">Oaxaca</option>
              <option value="Puebla">Puebla</option>
              <option value="Quer&eacute;taro">Quer&eacute;taro</option>
              <option value="Quintana Roo">Quintana Roo</option>
              <option value="San Luis Potos&iacute;">San Luis Potos&iacute;</option>
              <option value="Sinaloa">Sinaloa</option>
              <option value="Sonora">Sonora</option>
              <option value="Tabasco">Tabasco</option>
              <option value="Tamaulipas">Tamaulipas</option>
              <option value="Tlaxcala">Tlaxcala</option>
              <option value="Veracruz">Veracruz</option>
              <option value="Yucat&aacute;n">Yucat&aacute;n</option>
              <option value="Zacatecas">Zacatecas</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">País</label>
          <div class="col-sm-12">
            <select class="form-control" name="opais"  id="opais">
              <option value="">Seleccione...</option>
              <option value="Mexico">Mexico</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Telefono Oficina" name="otelofc" id="otelofc">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Cuenta de banco" name="cuenta" id="cuenta">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-12">Rubros de Interés</label>
          <div class="col-xs-12">
            <select class="form-control" multiple style="height: 400px;" name="orubrosinteres[]" id="orubrosinteres[]">
              <?php echo $salida;  ?>
            </select>
          </div>
        </div>



        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" id="btn-signup" name="btn-signup">Registrar</button>
          </div>
        </div>

      </form>

    </div>
  </div>
</section>
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
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script src="tinversionistas/ps_step2.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
