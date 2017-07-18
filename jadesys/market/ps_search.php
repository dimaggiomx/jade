<?php
session_start();
	header('Content-type: application/json');
    header("Content-Type: text/html;charset=utf-8");

    require_once '../global.config.php';
    require_once '../config.php';

	$response = array();


	if ($_POST) {

		$var1 = trim($_POST['sproyecto']);
		$var2 = $_POST['page'];

        $t_var1 = strip_tags($var1);

        //require_once(C_P_CLASES.'actions/a.regempresa.php');
        //    $myReg = new A_REG_EMP("");
        //    $myReg->add_dataExtra($t_var2,$t_var3,$t_var4,$t_var5,$t_var6,$t_var7,$t_var8,$t_var9,$t_var10,$t_var11, $t_var12, $t_var13, "", "");
        //    $response = $myReg->upd_datosFiscales($DBcon,$var1);

    }


    $response['status'] = 'error'; // could not register
    $response['message'] = '&nbsp; Buscado..'.$t_var1.'-'.$var2;

	echo json_encode($response);
?>