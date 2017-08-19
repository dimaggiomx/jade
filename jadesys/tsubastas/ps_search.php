<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_POST) {

    //$var1 = trim($_POST['sproyecto']);
    $var2 = $_POST['page'];
    //$var3 = $_POST['pageData'];

    //$t_var1 = strip_tags($var1);

    require_once(C_P_CLASES.'actions/a.subasta.php');
    $myReg = new A_SUB("");
    $disp = $myReg->search_subastas($DBcon,$var2,3);
    $disp = $myReg->disp_subastaPage(1);

}


$response['status'] = 'success'; // could not register
$response['message'] = '&nbsp; Buscado..'.$var2.'-'.$var4.'-'.$var3;
$response['result'] =$disp;

echo json_encode($response);
?>