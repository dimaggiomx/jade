<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();

$continue = 0;  //ocurrio algun detalle, 1 = ok

if ($_POST) {

    $var2 = trim($_POST['monto']);  // URL del video
    $var3 = trim($_POST['inversion']);  // monto
    $idSub = trim($_POST['ids']);

    $inversion = strip_tags($var2);
    $monto = strip_tags($var3);

        require_once(C_P_CLASES.'actions/a.invest.php');
        $myReg = new A_INV("");

        $myReg->add_data($_SESSION["ses_idInv"],$idSub, $monto, $inversion);

        $response = $myReg->ins_datos($DBcon);

}

//$response['status'] = 'error'; // could not register
//$response['message'] = '&nbsp; UPs, Ocurrio algun error';

echo json_encode($response);
?>