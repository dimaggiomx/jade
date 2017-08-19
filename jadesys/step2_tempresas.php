<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
require_once("global.config.php");
require_once('sescheck.php'); // para la sesion
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
<title>JADE CAPITAL FLOW - Completar registro de empresa</title>
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
      <div id="errorDiv"></div>
      <form class="form-horizontal form-material" id="loginform" action="index.html">
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
            <input class="form-control" type="text" required="" placeholder="Movil" name="otelmovil" id="otelmovil">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Giro de la Empresa</label>
          <div class="col-sm-12">
            <select class="form-control" name="ogiro"  id="ogiro">
              <option value="">Seleccione...</option>
              <option value="ACONDICIONAMIENTO DE EDIFICIOS">ACONDICIONAMIENTO DE EDIFICIOS</option>
              <option value="ACTIVIDADES AUXILIARES DE LA INTERMEDIACIÓN FINANCIERA">ACTIVIDADES AUXILIARES DE LA INTERMEDIACI&Oacute;N FINANCIERA</option>
              <option value="ACTIVIDADES DE ARQUITECTURA E INGENIER&Iacute;A Y ACTIVIDADES CONEXAS DE ASESORAMIENTO T&Eacute;CNICO">ACTIVIDADES DE ARQUITECTURA E INGENIER&Iacute;A Y ACTIVIDADES CONEXAS DE ASESORAMIENTO T&Eacute;CNICO</option>
              <option value="ACTIVIDADES DE CONTABILIDAD, TENEDUR&Iacute;A DE LIBROS Y AUDITORIA; ASESORAMIENTO EN MATERIA DE IMPUESTOS">ACTIVIDADES DE CONTABILIDAD, TENEDUR&Iacute;A DE LIBROS Y AUDITORIA; ASESORAMIENTO EN MATERIA DE IMPUESTOS</option>
              <option value="ACTIVIDADES DE EDICI&Oacute;N E IMPRESI&Oacute;N Y DE REPRODUCCI&Oacute;N DE GRABACIONES">ACTIVIDADES DE EDICI&Oacute;N E IMPRESI&Oacute;N Y DE REPRODUCCI&Oacute;N DE GRABACIONES</option>
              <option value="ACTIVIDADES DE ESPARCIMIENTO Y ACTIVIDADES CULTURALES Y DEPORTIVAS">ACTIVIDADES DE ESPARCIMIENTO Y ACTIVIDADES CULTURALES Y DEPORTIVAS</option>
              <option value="ACTIVIDADES DE M&Eacute;DICOS Y ODONT&Oacute;LOGOS">ACTIVIDADES DE M&Eacute;DICOS Y ODONT&Oacute;LOGOS</option>
              <option value="ACTIVIDADES DE SERVICIOS AGRICOLAS Y GANADEROS, EXCEPTO LAS ACTIVIDADES VETERINARIAS">ACTIVIDADES DE SERVICIOS AGRICOLAS Y GANADEROS, EXCEPTO LAS ACTIVIDADES VETERINARIAS</option>
              <option value="ACTIVIDADES DE TRANSPORTE COMPLEMENTARIAS Y AUXILIARES; ACTIVIDADES DE AGENCIAS DE VIAJES">ACTIVIDADES DE TRANSPORTE COMPLEMENTARIAS Y AUXILIARES; ACTIVIDADES DE AGENCIAS DE VIAJES</option>
              <option value="ACTIVIDADES INMOBILIARIAS">ACTIVIDADES INMOBILIARIAS</option>
              <option value="ACTIVIDADES JUR&Iacute;DICAS">ACTIVIDADES JUR&Iacute;DICAS</option>
              <option value="ACTIVIDADES TEATRALES Y MUSICALES Y OTRAS ACTIVIDADES ART&iacute;STICAS">ACTIVIDADES TEATRALES Y MUSICALES Y OTRAS ACTIVIDADES ART&iacute;STICAS</option>
              <option value="ACTIVIDADES VETERINARIAS">ACTIVIDADES VETERINARIAS</option>
              <option value="ADMINISTRACI&Oacute;N P&Uacute;BLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA">ADMINISTRACI&Oacute;N P&Uacute;BLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA</option>
              <option value="AGRICULTURA, GANADER&Iacute;A, CAZA Y SILVICULTURA">AGRICULTURA, GANADER&Iacute;A, CAZA Y SILVICULTURA</option>
              <option value="ALQUILER DE MAQUINARIA Y EQUIPO SIN OPERARIOS Y DE EFECTOS PERSONALES Y ENSERES DOMESTICOS">ALQUILER DE MAQUINARIA Y EQUIPO SIN OPERARIOS Y DE EFECTOS PERSONALES Y ENSERES DOMESTICOS</option>
              <option value="COMERCIO AL POR MAYOR Y EN COMISI&Oacute;N, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS">COMERCIO AL POR MAYOR Y EN COMISI&Oacute;N, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS</option>
              <option value="COMERCIO AL POR MENOR, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; REPARACI&Oacute;N DE EFECTOS PERSONALES Y ENSERES DOM&Eacute;STICOS">COMERCIO AL POR MENOR, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; REPARACI&Oacute;N DE EFECTOS PERSONALES Y ENSERES DOM&Eacute;STICOS</option>
              <option value="CONSTRUCCI&Oacute;N">CONSTRUCCI&Oacute;N</option>
              <option value="CONSTRUCCI&Oacute;N DE EDIFICIOS COMPLETOS Y DE PARTES DE EDIFICIOS; OBRAS DE INGENIER&Iacute;A CIVIL">CONSTRUCCI&Oacute;N DE EDIFICIOS COMPLETOS Y DE PARTES DE EDIFICIOS; OBRAS DE INGENIER&Iacute;A CIVIL</option>
              <option value="CORREO Y TELECOMUNICACIONES">CORREO Y TELECOMUNICACIONES</option>
              <option value="CR&Iacute;A DE GANADO VACUNO Y DE OVEJAS, CABRAS, CABALLOS, ASNOS, MULAS Y BURD&Eacute;GANOS; CR&Iacute;A DE GANADO LECHERO">CR&Iacute;A DE GANADO VACUNO Y DE OVEJAS, CABRAS, CABALLOS, ASNOS, MULAS Y BURD&Eacute;GANOS; CR&Iacute;A DE GANADO LECHERO</option>
              <option value="CR&Iacute;A DE OTROS ANIMALES; ELABORACI&Oacute;N DE PRODUCTOS ANIMALES, NO CLASIFICADOS EN OTRA PARTE">CR&Iacute;A DE OTROS ANIMALES; ELABORACI&Oacute;N DE PRODUCTOS ANIMALES, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="CULTIVO DE CEREALES Y OTROS CULTIVOS, NO CLASIFICADOS EN OTRA PARTE">CULTIVO DE CEREALES Y OTROS CULTIVOS, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="CULTIVO DE FRUTAS, NUECES, PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS, Y ESPECIAS">CULTIVO DE FRUTAS, NUECES, PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS, Y ESPECIAS</option>
              <option value="CULTIVO DE HORTALIZAS Y LEGUMBRES, ESPECIALIDADES HORT&Iacute;COLA Y PRODUCTOS DE VIVERO">CULTIVO DE HORTALIZAS Y LEGUMBRES, ESPECIALIDADES HORT&Iacute;COLA Y PRODUCTOS DE VIVERO</option>
              <option value="CURTIDO Y ADOBO DE CUEROS; FABRICACI&Oacute;N DE MALETAS, BOLSOS DE MANO, ART&Iacute;CULOS DE TALABARTER&Iacute;A Y GUARNICIONER&Iacute;A, Y CALZADO">CURTIDO Y ADOBO DE CUEROS; FABRICACI&Oacute;N DE MALETAS, BOLSOS DE MANO, ART&Iacute;CULOS DE TALABARTER&Iacute;A Y GUARNICIONER&Iacute;A, Y CALZADO</option>
              <option value="ELABORACI&Oacute;N DE AZ&Uacute;CAR">ELABORACI&Oacute;N DE AZ&Uacute;CAR</option>
              <option value="ELABORACI&Oacute;N DE PRODUCTOS ALIMENTICIOS Y BEBIDAS">ELABORACI&Oacute;N DE PRODUCTOS ALIMENTICIOS Y BEBIDAS</option>
              <option value="ELABORACI&Oacute;N Y CONSERVACI&Oacute;N DE FRUTAS, LEGUMBRES Y HORTALIZAS">ELABORACI&Oacute;N Y CONSERVACI&Oacute;N DE FRUTAS, LEGUMBRES Y HORTALIZAS</option>
              <option value="ENSE&Nacute;ANZA">ENSE&Nacute;ANZA</option>
              <option value="EXPLOTACI&Oacute;N DE OTRAS MINAS Y CANTERAS">EXPLOTACI&Oacute;N DE OTRAS MINAS Y CANTERAS</option>
              <option value="EXTRACCI&Oacute;N DE CARB&Oacute;N Y LIGNITO; EXTRACCI&Oacute;N DE TURBA">EXTRACCI&Oacute;N DE CARB&Oacute;N Y LIGNITO; EXTRACCI&Oacute;N DE TURBA</option>
              <option value="EXTRACCI&Oacute;N DE MINERALES METAL&Iacute;FEROS">EXTRACCI&Oacute;N DE MINERALES METAL&Iacute;FEROS</option>
              <option value="EXTRACCI&Oacute;N DE PETR&Oacute;LEO CRUDO Y GAS NATURAL; ACTIVIDADES DE TIPO SERVICIO RELACIONADAS CON LA EXTRACCI&Oacute;N DE PETR&Oacute;LEO Y GAS, EXCEPTO LAS ACTIVIDADES DE PROSPECCI&Oacute;N">EXTRACCI&Oacute;N DE PETR&Oacute;LEO CRUDO Y GAS NATURAL; ACTIVIDADES DE TIPO SERVICIO RELACIONADAS CON LA EXTRACCI&Oacute;N DE PETR&Oacute;LEO Y GAS, EXCEPTO LAS ACTIVIDADES DE PROSPECCI&Oacute;N</option>
              <option value="FABRICACION DE CEMENTO, CAL Y YESO">FABRICACION DE CEMENTO, CAL Y YESO</option>
              <option value="FABRICACI&Oacute;N DE COQUE, PRODUCTOS DE LA REFINACI&Oacute;N DEL PETR&Oacute;LEO Y COMBUSTIBLE NUCLEAR">FABRICACI&Oacute;N DE COQUE, PRODUCTOS DE LA REFINACI&Oacute;N DEL PETR&Oacute;LEO Y COMBUSTIBLE NUCLEAR</option>
              <option value="FABRICACI&Oacute;N DE EQUIPO Y APARATOS DE RADIO, TELEVISI&Oacute;N Y COMUNICACIONES">FABRICACI&Oacute;N DE EQUIPO Y APARATOS DE RADIO, TELEVISI&Oacute;N Y COMUNICACIONES</option>
              <option value="FABRICACI&Oacute;N DE INSTRUMENTOS M&Eacute;DICOS, &Oacute;PTICOS Y DE PRECISI&Oacute;N Y FABRICACI&Oacute;N DE RELOJES">FABRICACI&Oacute;N DE INSTRUMENTOS M&Eacute;DICOS, &Oacute;PTICOS Y DE PRECISI&Oacute;N Y FABRICACI&Oacute;N DE RELOJES</option>
              <option value="FABRICACI&Oacute;N DE MAQUINARIA Y APARATOS EL&Eacute;CTRICOS, NO CLASIFICADOS EN OTRA PARTE">FABRICACI&Oacute;N DE MAQUINARIA Y APARATOS EL&Eacute;CTRICOS, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="FABRICACI&Oacute;N DE MAQUINARIA Y EQUIPO, NO CLASIFICADOS EN OTRA PARTE">FABRICACI&Oacute;N DE MAQUINARIA Y EQUIPO, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="FABRICACI&Oacute;N DE METALES COMUNES">FABRICACI&Oacute;N DE METALES COMUNES</option>
              <option value="FABRICACI&Oacute;N DE MUEBLES; INDUSTRIAS MANUFACTURERAS, NO CLASIFICADOS EN OTRA PARTE">FABRICACI&Oacute;N DE MUEBLES; INDUSTRIAS MANUFACTURERAS, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="FABRICACI&Oacute;N DE OTROS PRODUCTOS MINERALES NO MET&Aacute;LICOS">FABRICACI&Oacute;N DE OTROS PRODUCTOS MINERALES NO MET&Aacute;LICOS</option>
              <option value="FABRICACI&Oacute;N DE OTROS TIPOS DE EQUIPO DE TRANSPORTE">FABRICACI&Oacute;N DE OTROS TIPOS DE EQUIPO DE TRANSPORTE</option>
              <option value="FABRICACI&Oacute;N DE PAPEL Y DE PRODUCTOS DE PAPEL">FABRICACI&Oacute;N DE PAPEL Y DE PRODUCTOS DE PAPEL</option>
              <option value="FABRICACION DE PRENDAS DE VESTIR; ADOBO Y TEJIDO DE PIELES">FABRICACION DE PRENDAS DE VESTIR; ADOBO Y TEJIDO DE PIELES</option>
              <option value="FABRICACI&Oacute;N DE PRODUCTOS DE CAUCHO Y PL&Aacute;STICO">FABRICACI&Oacute;N DE PRODUCTOS DE CAUCHO Y PL&Aacute;STICO</option>
              <option value="FABRICACI&Oacute;N DE PRODUCTOS ELABORADOS DE METAL, EXCEPTO MAQUINARIA Y EQUIPO">FABRICACI&Oacute;N DE PRODUCTOS ELABORADOS DE METAL, EXCEPTO MAQUINARIA Y EQUIPO</option>
              <option value="FABRICACI&Oacute;N DE PRODUCTOS TEXTILES">FABRICACI&Oacute;N DE PRODUCTOS TEXTILES</option>
              <option value="FABRICACI&Oacute;N DE SUSTANCIAS Y PRODUCTOS QU&Iacute;MICOS">FABRICACI&Oacute;N DE SUSTANCIAS Y PRODUCTOS QU&Iacute;MICOS</option>
              <option value="FABRICACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES, REMOLQUES Y SEMIRREMOLQUES">FABRICACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES, REMOLQUES Y SEMIRREMOLQUES</option>
              <option value="FINANCIACION DE PLANES DE SEGUROS Y DE PENSIONES, EXCEPTO LOS PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA">FINANCIACION DE PLANES DE SEGUROS Y DE PENSIONES, EXCEPTO LOS PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA</option>
              <option value="HOTELES Y RESTAURANTES">HOTELES Y RESTAURANTES</option>
              <option value="INFORMATICA Y ACTIVIDADES CONEXAS">INFORMATICA Y ACTIVIDADES CONEXAS</option>
              <option value="INTERMEDIACI&Oacute;N FINANCIERA, EXCEPTO LA FINANCIACI&Oacute;N DE PLANES DE SEGUROS Y DE PENSIONES">INTERMEDIACI&Oacute;N FINANCIERA, EXCEPTO LA FINANCIACI&Oacute;N DE PLANES DE SEGUROS Y DE PENSIONES</option>
              <option value="INVESTIGACI&Oacute;N Y DESARROLLO">INVESTIGACI&Oacute;N Y DESARROLLO</option>
              <option value="MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES">MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES</option>
              <option value="OTRAS ACTIVIDADES EMPRESARIALES/PROFESIONALES">OTRAS ACTIVIDADES EMPRESARIALES/PROFESIONALES</option>
              <option value="OTROS TIPOS DE INTERMEDIACI&Oacute;N FINANCIERA, NO CLASIFICADOS EN OTRA PARTE">OTROS TIPOS DE INTERMEDIACI&Oacute;N FINANCIERA, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="OTROS TIPOS DE INTERMEDIACI&Oacute;N MONETARIA">OTROS TIPOS DE INTERMEDIACI&Oacute;N MONETARIA</option>
              <option value="PELUQUER&Iacute;A Y OTROS TRATAMIENTOS DE BELLEZA">PELUQUER&Iacute;A Y OTROS TRATAMIENTOS DE BELLEZA</option>
              <option value="PESCA, EXPLOTACI&Oacute;N DE CRIADEROS DE PECES Y GRANJAS PISC&Iacute;COLAS; ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA PESCA">PESCA, EXPLOTACI&Oacute;N DE CRIADEROS DE PECES Y GRANJAS PISC&Iacute;COLAS; ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA PESCA</option>
              <option value="PREPARACI&Oacute;N DEL TERRENO (CONSTRUCCI&Oacute;N)">PREPARACI&Oacute;N DEL TERRENO (CONSTRUCCI&Oacute;N)</option>
              <option value="PRODUCCI&Oacute;N DE MADERA Y FABRICACI&Oacute;N DE PRODUCTOS DE MADERA Y CORCHO, EXCEPTO MUEBLES; FABRICACI&Oacute;N DE ART&Iacute;CULOS DE PAJA Y DE MATERIALES TRENZABLES">PRODUCCI&Oacute;N DE MADERA Y FABRICACI&Oacute;N DE PRODUCTOS DE MADERA Y CORCHO, EXCEPTO MUEBLES; FABRICACI&Oacute;N DE ART&Iacute;CULOS DE PAJA Y DE MATERIALES TRENZABLES</option>
              <option value="RECICLAMIENTO">RECICLAMIENTO</option>
              <option value="SERVICIOS SOCIALES Y DE SALUD">SERVICIOS SOCIALES Y DE SALUD</option>
              <option value="SUMINISTRO DE ELECTRICIDAD, GAS, VAPOR Y AGUA CALIENTE">SUMINISTRO DE ELECTRICIDAD, GAS, VAPOR Y AGUA CALIENTE</option>
              <option value="TERMINACI&Oacute;N DE EDIFICIOS">TERMINACI&Oacute;N DE EDIFICIOS</option>
              <option value="TRANSPORTE POR V&Iacute;A ACU&Aacute;TICA">TRANSPORTE POR V&Iacute;A ACU&Aacute;TICA</option>
              <option value="TRANSPORTE POR V&Iacute;A A&Eacute;REA">TRANSPORTE POR V&Iacute;A A&Eacute;REA</option>
              <option value="TRANSPORTE POR V&Iacute;A TERRESTRE; TRANSPORTE POR TUBER&Iacute;AS">TRANSPORTE POR V&Iacute;A TERRESTRE; TRANSPORTE POR TUBER&Iacute;AS</option>
              <option value="VENTA AL POR MAYOR DE COMBUSTIBLES S&Oacute;LIDOS, L&Iacute;QUIDOS Y GASEOSOS Y PRODUCTOS CONEXOS">VENTA AL POR MAYOR DE COMBUSTIBLES S&Oacute;LIDOS, L&Iacute;QUIDOS Y GASEOSOS Y PRODUCTOS CONEXOS</option>
              <option value="VENTA, MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES">VENTA, MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Producto / Servicio</label>
          <div class="col-sm-12">
            <select class="form-control" name="oproducto"  id="oproducto">
              <option value="">Seleccione...</option>
              <option value="AGRICULTURA, GANADER&Iacute;A, CAZA Y SILVICULTURA">AGRICULTURA, GANADER&Iacute;A, CAZA Y SILVICULTURA</option>
              <option value="CULTIVO DE CEREALES Y OTROS CULTIVOS, NO CLASIFICADOS EN OTRA PARTE">CULTIVO DE CEREALES Y OTROS CULTIVOS, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="CULTIVO DE HORTALIZAS Y LEGUMBRES, ESPECIALIDADES HORT&Iacute;COLA Y PRODUCTOS DE VIVERO">CULTIVO DE HORTALIZAS Y LEGUMBRES, ESPECIALIDADES HORT&Iacute;COLA Y PRODUCTOS DE VIVERO</option>
              <option value="CULTIVO DE FRUTAS, NUECES, PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS, Y ESPECIAS">CULTIVO DE FRUTAS, NUECES, PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS, Y ESPECIAS</option>
              <option value="CR&Iacute;A DE GANADO VACUNO Y DE OVEJAS, CABRAS, CABALLOS, ASNOS, MULAS Y BURD&Eacute;GANOS; CR&Iacute;A DE GANADO LECHERO">CR&Iacute;A DE GANADO VACUNO Y DE OVEJAS, CABRAS, CABALLOS, ASNOS, MULAS Y BURD&Eacute;GANOS; CR&Iacute;A DE GANADO LECHERO</option>
              <option value="CR&Iacute;A DE OTROS ANIMALES; ELABORACI&Oacute;N DE PRODUCTOS ANIMALES, NO CLASIFICADOS EN OTRA PARTE">CR&Iacute;A DE OTROS ANIMALES; ELABORACI&Oacute;N DE PRODUCTOS ANIMALES, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="ACTIVIDADES DE SERVICIOS AGRICOLAS Y GANADEROS, EXCEPTO LAS ACTIVIDADES VETERINARIAS">ACTIVIDADES DE SERVICIOS AGRICOLAS Y GANADEROS, EXCEPTO LAS ACTIVIDADES VETERINARIAS</option>
              <option value="PESCA, EXPLOTACI&Oacute;N DE CRIADEROS DE PECES Y GRANJAS PISC&Iacute;COLAS; ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA PESCA">PESCA, EXPLOTACI&Oacute;N DE CRIADEROS DE PECES Y GRANJAS PISC&Iacute;COLAS; ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA PESCA</option>
              <option value="EXTRACCI&Oacute;N DE CARB&Oacute;N Y LIGNITO; EXTRACCI&Oacute;N DE TURBA">EXTRACCI&Oacute;N DE CARB&Oacute;N Y LIGNITO; EXTRACCI&Oacute;N DE TURBA</option>
              <option value="EXTRACCI&Oacute;N DE PETR&Oacute;LEO CRUDO Y GAS NATURAL; ACTIVIDADES DE TIPO SERVICIO RELACIONADAS CON LA EXTRACCI&Oacute;N DE PETR&Oacute;LEO Y GAS, EXCEPTO LAS ACTIVIDADES DE PROSPECCI&Oacute;N">EXTRACCI&Oacute;N DE PETR&Oacute;LEO CRUDO Y GAS NATURAL; ACTIVIDADES DE TIPO SERVICIO RELACIONADAS CON LA EXTRACCI&Oacute;N DE PETR&Oacute;LEO Y GAS, EXCEPTO LAS ACTIVIDADES DE PROSPECCI&Oacute;N</option>
              <option value="EXTRACCI&Oacute;N DE MINERALES METAL&Iacute;FEROS">EXTRACCI&Oacute;N DE MINERALES METAL&Iacute;FEROS</option>
              <option value="EXPLOTACI&Oacute;N DE OTRAS MINAS Y CANTERAS">EXPLOTACI&Oacute;N DE OTRAS MINAS Y CANTERAS</option>
              <option value="ELABORACI&Oacute;N DE PRODUCTOS ALIMENTICIOS Y BEBIDAS">ELABORACI&Oacute;N DE PRODUCTOS ALIMENTICIOS Y BEBIDAS</option>
              <option value="ELABORACI&Oacute;N Y CONSERVACI&Oacute;N DE FRUTAS, LEGUMBRES Y HORTALIZAS">ELABORACI&Oacute;N Y CONSERVACI&Oacute;N DE FRUTAS, LEGUMBRES Y HORTALIZAS</option>
              <option value="ELABORACI&Oacute;N DE AZ&Uacute;CAR">ELABORACI&Oacute;N DE AZ&Uacute;CAR</option>
              <option value="FABRICACI&Oacute;N DE PRODUCTOS TEXTILES">FABRICACI&Oacute;N DE PRODUCTOS TEXTILES</option>
              <option value="FABRICACION DE PRENDAS DE VESTIR; ADOBO Y TEJIDO DE PIELES">FABRICACION DE PRENDAS DE VESTIR; ADOBO Y TEJIDO DE PIELES</option>
              <option value="CURTIDO Y ADOBO DE CUEROS; FABRICACI&Oacute;N DE MALETAS, BOLSOS DE MANO, ART&Iacute;CULOS DE TALABARTER&Iacute;A Y GUARNICIONER&Iacute;A, Y CALZADO">CURTIDO Y ADOBO DE CUEROS; FABRICACI&Oacute;N DE MALETAS, BOLSOS DE MANO, ART&Iacute;CULOS DE TALABARTER&Iacute;A Y GUARNICIONER&Iacute;A, Y CALZADO</option>
              <option value="PRODUCCI&Oacute;N DE MADERA Y FABRICACI&Oacute;N DE PRODUCTOS DE MADERA Y CORCHO, EXCEPTO MUEBLES; FABRICACI&Oacute;N DE ART&Iacute;CULOS DE PAJA Y DE MATERIALES TRENZABLES">PRODUCCI&Oacute;N DE MADERA Y FABRICACI&Oacute;N DE PRODUCTOS DE MADERA Y CORCHO, EXCEPTO MUEBLES; FABRICACI&Oacute;N DE ART&Iacute;CULOS DE PAJA Y DE MATERIALES TRENZABLES</option>
              <option value="FABRICACI&Oacute;N DE PAPEL Y DE PRODUCTOS DE PAPEL">FABRICACI&Oacute;N DE PAPEL Y DE PRODUCTOS DE PAPEL</option>
              <option value="ACTIVIDADES DE EDICI&Oacute;N E IMPRESI&Oacute;N Y DE REPRODUCCI&Oacute;N DE GRABACIONES">ACTIVIDADES DE EDICI&Oacute;N E IMPRESI&Oacute;N Y DE REPRODUCCI&Oacute;N DE GRABACIONES</option>
              <option value="FABRICACI&Oacute;N DE COQUE, PRODUCTOS DE LA REFINACI&Oacute;N DEL PETR&Oacute;LEO Y COMBUSTIBLE NUCLEAR">FABRICACI&Oacute;N DE COQUE, PRODUCTOS DE LA REFINACI&Oacute;N DEL PETR&Oacute;LEO Y COMBUSTIBLE NUCLEAR</option>
              <option value="FABRICACI&Oacute;N DE SUSTANCIAS Y PRODUCTOS QU&Iacute;MICOS">FABRICACI&Oacute;N DE SUSTANCIAS Y PRODUCTOS QU&Iacute;MICOS</option>
              <option value="FABRICACI&Oacute;N DE PRODUCTOS DE CAUCHO Y PL&Aacute;STICO">FABRICACI&Oacute;N DE PRODUCTOS DE CAUCHO Y PL&Aacute;STICO</option>
              <option value="FABRICACI&Oacute;N DE OTROS PRODUCTOS MINERALES NO MET&Aacute;LICOS">FABRICACI&Oacute;N DE OTROS PRODUCTOS MINERALES NO MET&Aacute;LICOS</option>
              <option value="FABRICACION DE CEMENTO, CAL Y YESO">FABRICACION DE CEMENTO, CAL Y YESO</option>
              <option value="FABRICACI&Oacute;N DE METALES COMUNES">FABRICACI&Oacute;N DE METALES COMUNES</option>
              <option value="FABRICACI&Oacute;N DE PRODUCTOS ELABORADOS DE METAL, EXCEPTO MAQUINARIA Y EQUIPO">FABRICACI&Oacute;N DE PRODUCTOS ELABORADOS DE METAL, EXCEPTO MAQUINARIA Y EQUIPO</option>
              <option value="FABRICACI&Oacute;N DE MAQUINARIA Y EQUIPO, NO CLASIFICADOS EN OTRA PARTE">FABRICACI&Oacute;N DE MAQUINARIA Y EQUIPO, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="FABRICACI&Oacute;N DE MAQUINARIA Y APARATOS EL&Eacute;CTRICOS, NO CLASIFICADOS EN OTRA PARTE">FABRICACI&Oacute;N DE MAQUINARIA Y APARATOS EL&Eacute;CTRICOS, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="FABRICACI&Oacute;N DE EQUIPO Y APARATOS DE RADIO, TELEVISI&Oacute;N Y COMUNICACIONES">FABRICACI&Oacute;N DE EQUIPO Y APARATOS DE RADIO, TELEVISI&Oacute;N Y COMUNICACIONES</option>
              <option value="FABRICACI&Oacute;N DE INSTRUMENTOS M&Eacute;DICOS, &Oacute;PTICOS Y DE PRECISI&Oacute;N Y FABRICACI&Oacute;N DE RELOJES">FABRICACI&Oacute;N DE INSTRUMENTOS M&Eacute;DICOS, &Oacute;PTICOS Y DE PRECISI&Oacute;N Y FABRICACI&Oacute;N DE RELOJES</option>
              <option value="FABRICACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES, REMOLQUES Y SEMIRREMOLQUES">FABRICACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES, REMOLQUES Y SEMIRREMOLQUES</option>
              <option value="FABRICACI&Oacute;N DE OTROS TIPOS DE EQUIPO DE TRANSPORTE">FABRICACI&Oacute;N DE OTROS TIPOS DE EQUIPO DE TRANSPORTE</option>
              <option value="FABRICACI&Oacute;N DE MUEBLES; INDUSTRIAS MANUFACTURERAS, NO CLASIFICADOS EN OTRA PARTE">FABRICACI&Oacute;N DE MUEBLES; INDUSTRIAS MANUFACTURERAS, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="RECICLAMIENTO">RECICLAMIENTO</option>
              <option value="SUMINISTRO DE ELECTRICIDAD, GAS, VAPOR Y AGUA CALIENTE">SUMINISTRO DE ELECTRICIDAD, GAS, VAPOR Y AGUA CALIENTE</option>
              <option value="CONSTRUCCI&Oacute;N">CONSTRUCCI&Oacute;N</option>
              <option value="PREPARACI&Oacute;N DEL TERRENO (CONSTRUCCI&Oacute;N)">PREPARACI&Oacute;N DEL TERRENO (CONSTRUCCI&Oacute;N)</option>
              <option value="CONSTRUCCI&Oacute;N DE EDIFICIOS COMPLETOS Y DE PARTES DE EDIFICIOS; OBRAS DE INGENIER&Iacute;A CIVIL">CONSTRUCCI&Oacute;N DE EDIFICIOS COMPLETOS Y DE PARTES DE EDIFICIOS; OBRAS DE INGENIER&Iacute;A CIVIL</option>
              <option value="ACONDICIONAMIENTO DE EDIFICIOS">ACONDICIONAMIENTO DE EDIFICIOS</option>
              <option value="TERMINACI&Oacute;N DE EDIFICIOS">TERMINACI&Oacute;N DE EDIFICIOS</option>
              <option value="VENTA, MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES">VENTA, MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES</option>
              <option value="MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES">MANTENIMIENTO Y REPARACI&Oacute;N DE VEH&Iacute;CULOS AUTOMOTORES</option>
              <option value="COMERCIO AL POR MAYOR Y EN COMISI&Oacute;N, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS">COMERCIO AL POR MAYOR Y EN COMISI&Oacute;N, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS</option>
              <option value="VENTA AL POR MAYOR DE COMBUSTIBLES S&Oacute;LIDOS, L&Iacute;QUIDOS Y GASEOSOS Y PRODUCTOS CONEXOS">VENTA AL POR MAYOR DE COMBUSTIBLES S&Oacute;LIDOS, L&Iacute;QUIDOS Y GASEOSOS Y PRODUCTOS CONEXOS</option>
              <option value="COMERCIO AL POR MENOR, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; REPARACI&Oacute;N DE EFECTOS PERSONALES Y ENSERES DOM&Eacute;STICOS">COMERCIO AL POR MENOR, EXCEPTO EL COMERCIO DE VEH&Iacute;CULOS AUTOMOTORES Y MOTOCICLETAS; REPARACI&Oacute;N DE EFECTOS PERSONALES Y ENSERES DOM&Eacute;STICOS</option>
              <option value="HOTELES Y RESTAURANTES">HOTELES Y RESTAURANTES</option>
              <option value="TRANSPORTE POR V&Iacute;A TERRESTRE; TRANSPORTE POR TUBER&Iacute;AS">TRANSPORTE POR V&Iacute;A TERRESTRE; TRANSPORTE POR TUBER&Iacute;AS</option>
              <option value="TRANSPORTE POR V&Iacute;A ACU&Aacute;TICA">TRANSPORTE POR V&Iacute;A ACU&Aacute;TICA</option>
              <option value="TRANSPORTE POR V&Iacute;A A&Eacute;REA">TRANSPORTE POR V&Iacute;A A&Eacute;REA</option>
              <option value="ACTIVIDADES DE TRANSPORTE COMPLEMENTARIAS Y AUXILIARES; ACTIVIDADES DE AGENCIAS DE VIAJES">ACTIVIDADES DE TRANSPORTE COMPLEMENTARIAS Y AUXILIARES; ACTIVIDADES DE AGENCIAS DE VIAJES</option>
              <option value="CORREO Y TELECOMUNICACIONES">CORREO Y TELECOMUNICACIONES</option>
              <option value="INTERMEDIACI&Oacute;N FINANCIERA, EXCEPTO LA FINANCIACI&Oacute;N DE PLANES DE SEGUROS Y DE PENSIONES">INTERMEDIACI&Oacute;N FINANCIERA, EXCEPTO LA FINANCIACI&Oacute;N DE PLANES DE SEGUROS Y DE PENSIONES</option>
              <option value="OTROS TIPOS DE INTERMEDIACI&Oacute;N MONETARIA">OTROS TIPOS DE INTERMEDIACI&Oacute;N MONETARIA</option>
              <option value="OTROS TIPOS DE INTERMEDIACI&Oacute;N FINANCIERA, NO CLASIFICADOS EN OTRA PARTE">OTROS TIPOS DE INTERMEDIACI&Oacute;N FINANCIERA, NO CLASIFICADOS EN OTRA PARTE</option>
              <option value="FINANCIACION DE PLANES DE SEGUROS Y DE PENSIONES, EXCEPTO LOS PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA">FINANCIACION DE PLANES DE SEGUROS Y DE PENSIONES, EXCEPTO LOS PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA</option>
              <option value="ACTIVIDADES AUXILIARES DE LA INTERMEDIACI&Oacute;N FINANCIERA">ACTIVIDADES AUXILIARES DE LA INTERMEDIACI&Oacute;N FINANCIERA</option>
              <option value="ACTIVIDADES INMOBILIARIAS">ACTIVIDADES INMOBILIARIAS</option>
              <option value="ALQUILER DE MAQUINARIA Y EQUIPO SIN OPERARIOS Y DE EFECTOS PERSONALES Y ENSERES DOMESTICOS">ALQUILER DE MAQUINARIA Y EQUIPO SIN OPERARIOS Y DE EFECTOS PERSONALES Y ENSERES DOMESTICOS</option>
              <option value="INFORMATICA Y ACTIVIDADES CONEXAS">INFORMATICA Y ACTIVIDADES CONEXAS</option>
              <option value="INVESTIGACI&Oacute;N Y DESARROLLO">INVESTIGACI&Oacute;N Y DESARROLLO</option>
              <option value="OTRAS ACTIVIDADES EMPRESARIALES/PROFESIONALES">OTRAS ACTIVIDADES EMPRESARIALES/PROFESIONALES</option>
              <option value="ACTIVIDADES JUR&Iacute;DICAS">ACTIVIDADES JUR&Iacute;DICAS</option>
              <option value="ACTIVIDADES DE CONTABILIDAD, TENEDUR&Iacute;A DE LIBROS Y AUDITORIA; ASESORAMIENTO EN MATERIA DE IMPUESTOS">ACTIVIDADES DE CONTABILIDAD, TENEDUR&Iacute;A DE LIBROS Y AUDITORIA; ASESORAMIENTO EN MATERIA DE IMPUESTOS</option>
              <option value="ACTIVIDADES DE ARQUITECTURA E INGENIER&Iacute;A Y ACTIVIDADES CONEXAS DE ASESORAMIENTO T&Eacute;CNICO">ACTIVIDADES DE ARQUITECTURA E INGENIER&Iacute;A Y ACTIVIDADES CONEXAS DE ASESORAMIENTO T&Eacute;CNICO</option>
              <option value="ADMINISTRACI&Oacute;N P&Uacute;BLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA">ADMINISTRACI&Oacute;N P&Uacute;BLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACI&Oacute;N OBLIGATORIA</option>
              <option value="ENSE&Nacute;ANZA">ENSE&Nacute;ANZA</option>
              <option value="SERVICIOS SOCIALES Y DE SALUD">SERVICIOS SOCIALES Y DE SALUD</option>
              <option value="ACTIVIDADES DE M&Eacute;DICOS Y ODONT&Oacute;LOGOS">ACTIVIDADES DE M&Eacute;DICOS Y ODONT&Oacute;LOGOS</option>
              <option value="ACTIVIDADES VETERINARIAS">ACTIVIDADES VETERINARIAS</option>
              <option value="ACTIVIDADES DE ESPARCIMIENTO Y ACTIVIDADES CULTURALES Y DEPORTIVAS">ACTIVIDADES DE ESPARCIMIENTO Y ACTIVIDADES CULTURALES Y DEPORTIVAS</option>
              <option value="ACTIVIDADES TEATRALES Y MUSICALES Y OTRAS ACTIVIDADES ART&Iacute;STICAS">ACTIVIDADES TEATRALES Y MUSICALES Y OTRAS ACTIVIDADES ART&Iacute;STICAS</option>
              <option value="PELUQUER&Iacute;A Y OTROS TRATAMIENTOS DE BELLEZA">PELUQUER&Iacute;A Y OTROS TRATAMIENTOS DE BELLEZA</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12">Descripción de actividades</label>
          <div class="col-xs-12">
            <textarea class="form-control" rows="5" id="oactividades" name="oactividades" ></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Producto de Fabricación</label>
          <div class="col-sm-12">
            <select class="form-control" name="oprodfabricacion"  id="oprodfabricacion">
              <option value="">Seleccione...</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Producto de Comercialización</label>
          <div class="col-sm-12">
            <select class="form-control" name="oprodcomercializacion"  id="oprodcomercializacion">
              <option value="">Seleccione...</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Cuenta de banco" name="cuenta" id="cuenta">
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
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<script src="tempresas/ps_step2.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
