<?php
session_start();
header('Content-type: application/json');
header("Content-Type: text/html;charset=utf-8");

require_once '../global.config.php';
require_once '../config.php';

$response = array();

require_once(C_P_CLASES.'utils/string.functions.php');
$STR = new STRFN();


if ($_POST) {

    $var1 = trim($_POST['nombre']);
    $var2 = trim($_POST['ae']);
    $var3 = trim($_POST['descripcion']);

    $t_var1 = strip_tags($var1);
    $t_var2 = strip_tags($var2);
    $t_var3 = strip_tags($var3);


    // valido y en su caso guardo en sesion para posteriormente almacenar  paso1 + paso 2
    if($t_var1 != "" && $t_var2 != "" && $t_var3 != "")
    {

        // limpio las anteriores
        unset($_SESSION["reg_proy-name"]);
        unset($_SESSION["reg_proy-act"]);
        unset($_SESSION["reg_proy-desc"]);

        $_SESSION["reg_proy-name"] = $t_var1;
        $_SESSION["reg_proy-act"] = $t_var2;
        $_SESSION["reg_proy-desc"] = $t_var3;

        $response['status'] = 'success'; // could not register
        $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, continue con el paso 2 para terminar!- '.$var3);
    }
    else{
        $response['status'] = 'error'; // could not register
        $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde', 3);
    }

}

//$response['status'] = 'error'; // could not register
//$response['message'] = 'UPS';

echo json_encode($response);
?>