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

    require_once(C_P_CLASES.'actions/a.proyecto.php');
    $myReg = new A_PROY("");
    $disp = $myReg->search_proyectos($DBcon,$var2,8,'');
    $disp = $myReg->disp_proyectPage(0);

}


$response['status'] = 'success'; // could not register
$response['message'] = '&nbsp; Buscado..'.$var2.'-'.$var4.'-'.$var3;
$response['result'] =$disp;

echo json_encode($response);
?>