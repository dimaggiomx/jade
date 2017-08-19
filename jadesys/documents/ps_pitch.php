<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads/pitch';   //2

$idProyecto = $_SESSION["ses_lastId"];

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    //$targetFile =  $targetPath. $_FILES['file']['name'];  //5

    $targetFile = $targetPath. $idProyecto.'_'.$_FILES['file']['name']; //5
    $bdFilePath = $storeFolder.$ds.$idProyecto.'_'.$_FILES['file']['name'];

    move_uploaded_file($tempFile,$targetFile); //6

    // almaceno en BD la info
    require_once(C_P_CLASES.'actions/a.upload.php');
    $myReg = new A_UPL("");


    // registro logo
    //$response = $myReg->ins_datos($DBcon);
    $response = $myReg->upd_pitchProyecto($DBcon, $idProyecto, $bdFilePath);

    // limpio la sesion del ultimo id registrado
    // unset($_SESSION["ses_lastId"]);

    //$_SESSION["ses_tmp"] = $bdFilePath;
}
?>