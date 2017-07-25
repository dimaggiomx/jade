<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads';   //2

//establezco el path del archivo destino
// idUsuario/idEmpresa-idInversionista/archivo

$dir1 = $_SESSION["ses_id"];
$dir2 = $_SESSION["ses_idEmp"];

if($_SESSION["ses_priv"] == 'B')
{
    $dir2 =  $_SESSION["ses_idInv"];
}


//Check if the directory already exists. (idUsuario)
if(!is_dir($storeFolder.$ds.$dir1)){
    //Directory does not exist, so lets create it.
    mkdir($storeFolder.$ds.$dir1, 0755);
}


//Check if the directory already exists. (idEmpresa/idInversionista)
if(!is_dir($storeFolder.$ds.$dir1.$ds.$dir2)){
    //Directory does not exist, so lets create it.
    mkdir($storeFolder.$ds.$dir1.$ds.$dir2, 0755);
}




if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    //$targetFile =  $targetPath. $_FILES['file']['name'];  //5

    $targetFile = $targetPath.$dir1.$ds.$dir2.$ds.$_FILES['file']['name']; //5
    $bdFilePath = $storeFolder . $ds .$dir1.$ds.$dir2.$ds.$_FILES['file']['name'];

    move_uploaded_file($tempFile,$targetFile); //6

    // almaceno en BD la info
    require_once(C_P_CLASES.'actions/a.upload.php');
    $myReg = new A_UPL("");
    $myReg->add_data($_SESSION["ses_id"],$bdFilePath,2,$_SESSION["ses_lastId"]);

    // registro foto
    $response = $myReg->ins_datos($DBcon);

    //registro liga con proyecto
    $fotos = $myReg->ins_datosProy($DBcon,$response['idUploaded']);

    // limpio la sesion del ultimo id registrado
    // unset($_SESSION["ses_lastId"]);

   // $_SESSION["ses_tmp"] = $fotos;
}
?>