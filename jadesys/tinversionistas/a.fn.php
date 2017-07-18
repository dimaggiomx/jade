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
        $var10 = trim($_POST['ogiro']);
        $var11 = $_POST['orubrosinteres'];


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
        //$t_var11 = strip_tags($var11);

        /*
        $tmp = '';

        for ($i=0;$i<count($var11);$i++)
        {
            $tmp .= " =) " . $i . ": " . $var11[$i];
        }
        */


        require_once(C_P_CLASES.'actions/a.reginversionista.php');
            $myReg = new A_REG_INV("");
            $myReg->add_data($t_var1,$t_var2,$t_var3,$t_var4,$t_var5,$t_var6,$t_var7,$t_var8,$t_var9,$t_var10,$var11,"");
            $response = $myReg->ins_datos($DBcon);

    }

    //$response['status'] = 'error'; // could not register
    //$response['message'] = '&nbsp; '.$tmp;

	echo json_encode($response);
?>