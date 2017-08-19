<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();

require_once(C_P_CLASES.'utils/string.functions.php');
$STR = new STRFN();


if ($_POST) {

    $var1 = trim($_POST['tpreg1']);
    $var2 = trim($_POST['tpreg2']);
    $var3 = trim($_POST['tpreg3']);
    $var4 = trim($_POST['tpreg4']);
    $var5 = trim($_POST['tpreg5']);
    $var6 = trim($_POST['tpreg6']);
    $var7 = trim($_POST['tpreg7']);
    $var8 = trim($_POST['tpreg8']);

    $t_var1 = strip_tags($var1);
    $t_var2 = strip_tags($var2);
    $t_var3 = strip_tags($var3);
    $t_var4 = strip_tags($var4);
    $t_var5 = strip_tags($var5);
    $t_var6 = strip_tags($var6);
    $t_var7 = strip_tags($var7);
    $t_var8 = strip_tags($var8);

    require_once(C_P_CLASES.'actions/a.primerp.php');
    $myReg = new A_PRIMERP("");

    $myReg->add_data($_SESSION["ses_id"],$t_var1,$t_var2,$t_var3,$t_var4,$t_var5,$t_var6,$t_var7,$t_var8);
    $response = $myReg->ins_datos($DBcon);

}

//$response['status'] = 'error'; // could not register
//$response['message'] = 'UPS';

echo json_encode($response);
?>