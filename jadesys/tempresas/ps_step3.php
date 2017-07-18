<?php
session_start();
	header('Content-type: application/json');
    header("Content-Type: text/html;charset=utf-8");

    require_once '../global.config.php';
    require_once '../config.php';

	$response = array();



	if ($_POST) {

		$var1 = $_SESSION["ses_id"];
		$var2 = trim($_POST['vn']);
        $var3 = trim($_POST['un']);
        $var4 = trim($_POST['uv']);
        $var5 = trim($_POST['ct']);
        $var6 = trim($_POST['il']);
        $var7 = trim($_POST['cv']);
        $var8 = trim($_POST['ub']);
        $var9 = trim($_POST['dp']);
        $var10 = trim($_POST['go']);
        $var11 = trim($_POST['uo']);
        $var12 = trim($_POST['unf']);
        $var13 = trim($_POST['vd']);

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


        require_once(C_P_CLASES.'actions/a.regempresa.php');
            $myReg = new A_REG_EMP("");
            $myReg->add_dataExtra($t_var2,$t_var3,$t_var4,$t_var5,$t_var6,$t_var7,$t_var8,$t_var9,$t_var10,$t_var11, $t_var12, $t_var13, "", "");
            $response = $myReg->upd_datosFiscales($DBcon,$var1);

    }

    //$response['status'] = 'error'; // could not register
    //$response['message'] = '&nbsp; '.$_SESSION["ses_id"];

	echo json_encode($response);
?>