<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_POST) {

    $var2 = $_POST['idProyecto'];

    require_once(C_P_CLASES.'actions/a.jade.php');
    $myReg = new A_JADE("");
    $disp = $myReg->detail_proyecto($DBcon,$var2);
    $disp = $myReg->disp_detailProyecto();

}


$response['status'] = 'success'; // could not register
$response['message'] = '&nbsp; Buscado..'.$var2;
$response['result'] =$disp;

echo json_encode($response);
?>