<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();

$continue = 0;  //ocurrio algun detalle, 1 = ok

if ($_POST) {

    $var1 = $_SESSION["ses_id"];  //id del usuario para obtener el id de empresa
    $var2 = trim($_POST['video']);  // URL del video
    $var3 = trim($_POST['monto']);  // monto

    $video = strip_tags($var2);
    $monto = strip_tags($var3);


    //obtengo variables de sesion
    if(isset($_SESSION["reg_proy-name"]))
    {
        $nombre = $_SESSION["reg_proy-name"];
        $continue = 1;
    }

    if(isset($_SESSION["reg_proy-act"]))
    {
        $actividad = $_SESSION["reg_proy-act"];
        $continue = 1;
    }

    if(isset($_SESSION["reg_proy-desc"]))
    {
        $descripcion = $_SESSION["reg_proy-desc"];
        $continue = 1;
    }


    if($continue == 1)
    {

        require_once(C_P_CLASES.'actions/a.proyecto.php');
        $myReg = new A_PROY("");

        $myReg->add_data($var1,$nombre,$actividad,$descripcion,$video,'',$monto);

        $response = $myReg->ins_datos($DBcon);



    }
    else{
        $response['status'] = 'error'; // could not register
        $response['message'] = '&nbsp; UPs, Ocurrio algun error';
    }

}

//$response['status'] = 'error'; // could not register
//$response['message'] = '&nbsp; UPs, Ocurrio algun error';

echo json_encode($response);
?>