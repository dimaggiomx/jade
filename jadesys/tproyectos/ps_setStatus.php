<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_POST) {

    $var1 = $_POST['idProyecto'];
    $var2 = $_POST['valor'];

    require_once(C_P_CLASES.'actions/a.proyecto.php');
    $myReg = new A_PROY("");
    $response = $myReg->set_statusProyecto($DBcon,$var1, $var2);
}

/*
$response['status'] = 'success'; // could not register
$response['message'] = '&nbsp; Buscado..'.$var2;
$response['result'] =$disp;
*/

echo json_encode($response);
?>