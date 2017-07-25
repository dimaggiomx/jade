<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();

$continue = 0;  //ocurrio algun detalle, 1 = ok

if ($_POST) {

    $var2 = trim($_POST['proyecto']);  // Proyecto
    $var3 = trim($_POST['tipo']);  // tipo de subasta
    $var4 = trim($_POST['daterangesub']);  // rango de fechas

    // separo fechas  (inicial [0] - final [1])
    $arrFechas = explode('-', $var4);

    // formateo fechas
    require_once(C_P_CLASES.'utils/string.functions.php');
    $STR = new STRFN();

    $fechaIni = $STR->checkDate($arrFechas[0]);
    $fechaFin = $STR->checkDate($arrFechas[1]);



        require_once(C_P_CLASES.'actions/a.subasta.php');
        $myReg = new A_SUB("");

        $myReg->add_data($var2,$fechaIni,$fechaFin,$var3);

        $response = $myReg->ins_datos($DBcon);
}

//$response['status'] = 'error'; // could not register
//$response['message'] = '&nbsp; UPs, Ini: '.$fechaIni.'  Fin: '.$fechaFin;

echo json_encode($response);
?>