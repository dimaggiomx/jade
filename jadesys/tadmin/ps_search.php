<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_POST) {

    $var2 = $_POST['page'];

    require_once(C_P_CLASES.'actions/a.jade.php');
    $myReg = new A_JADE("");
    $disp = $myReg->search_proyectos($DBcon,$var2,8,'');
    $disp = $myReg->disp_proyectPage(0);

}


$response['status'] = 'success'; // could not register
$response['message'] = '&nbsp; Buscado..'.$var2.'-'.$var4.'-'.$var3;
$response['result'] =$disp;

echo json_encode($response);
?>