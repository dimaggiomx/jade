<?php
session_start();
	header('Content-type: application/json');
    header("Content-Type: text/html;charset=utf-8");

    require_once '../global.config.php';
    require_once '../config.php';

	$response = array();


	if ($_POST) {

		$var1 = trim($_POST['iduser']);
		$var2 = trim($_POST['gnombre']);
        $var3 = trim($_POST['gresponsablelegal']);
        $var4 = trim($_POST['odireccion']);
        $var5 = trim($_POST['ocolonia']);
        $var6 = trim($_POST['ociudad']);
        $var7 = trim($_POST['oestado']);
        $var8 = trim($_POST['opais']);
        $var9 = trim($_POST['otelofc']);
        $var10 = trim($_POST['otelmovil']);
        $var11 = trim($_POST['ogiro']);
        $var12 = trim($_POST['oproducto']);
        $var13 = trim($_POST['oprodfabricacion']);
        $var14 = trim($_POST['oprodcomercializacion']);
        $var15 = trim($_POST['oactividades']);
        $var16 = trim($_POST['ofechaconstitucion']);
        $var32 = trim($_POST['cuenta']);  // se agrega el dato de numero de cuenta de banco

        $t_var1 = strip_tags($var1);
        $t_var2 = strip_tags($var2);
        $t_var3 = strip_tags($var3);
        $t_var4 = strip_tags($var4);
        $t_var5 = strip_tags($var5);
        $t_var6 = strip_tags($var6);
        $t_var7 = strip_tags($var7);
        $t_var8 = strip_tags($var8);
        $t_var9 = strip_tags($var9);
        $t_var10 = strip_tags($var10);
        $t_var11 = strip_tags($var11);
        $t_var12 = strip_tags($var12);
        $t_var13 = strip_tags($var13);
        $t_var14 = strip_tags($var14);
        $t_var15 = strip_tags($var15);
        $t_var16 = strip_tags($var16);

        $t_var32 = strip_tags($var32);


            require_once(C_P_CLASES.'actions/a.regempresa.php');
            $myReg = new A_REG_EMP("");
            $myReg->add_data($t_var1,$t_var2,$t_var3,$t_var4,$t_var5,$t_var6,$t_var7,$t_var8,$t_var9,$t_var10,$t_var11,$t_var12,$t_var13,$t_var14,$t_var15,$t_var16,"",$t_var32);
            $response = $myReg->ins_datosGenerales($DBcon);

    }

    //$response['status'] = 'success'; // could not register
    //$response['message'] = '&nbsp; No se pudo registrar, intente nuevamente más tarde 4 '.$var1;

	echo json_encode($response);
?>