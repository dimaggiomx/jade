<?php
session_start();
	header('Content-type: application/json');
    header("Content-Type: text/html;charset=utf-8");

    require_once '../global.config.php';
    require_once '../config.php';

	$response = array();



	if ($_POST) {

		$var1 = $_SESSION["ses_id"];
		$var2 = trim($_POST['rfc']);
        $var3 = trim($_POST['ocupacion']);
        $var4 = trim($_POST['curp']);
        $var5 = trim($_POST['nacionalidad']);
        $var6 = trim($_POST['direccion']);
        $var7 = trim($_POST['ciudad']);
        $var8 = trim($_POST['cp']);
        $var9 = trim($_POST['tel']);
        $var10 = trim($_POST['cel']);
        $var11 = trim($_POST['estadocivil']);
        $var12 = trim($_POST['nombre_c']);
        $var13 = trim($_POST['curp_c']);
        $var14 = trim($_POST['regimen']);
        $var15 = trim($_POST['rfc_c']);
        $var16 = trim($_POST['lugarnacimiento_c']);
        $var17 = trim($_POST['domicilio_c']);


        //$t_var1 = strip_tags($var1);
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
        $t_var17 = strip_tags($var17);




        require_once(C_P_CLASES.'actions/a.reginversionista.php');
            $myReg = new A_REG_INV("");
            $myReg->add_dataExtra($t_var2,$t_var3,$t_var4,$t_var5,$t_var6,$t_var7,$t_var8,$t_var9,$t_var10,$t_var11, $t_var12, $t_var13, $t_var14, $t_var15, $t_var16, $t_var17);
            $response = $myReg->upd_datosFiscales($DBcon,$var1);

    }

    //$response['status'] = 'error'; // could not register
    //$response['message'] = '&nbsp; '.$_SESSION["ses_id"];

	echo json_encode($response);
?>