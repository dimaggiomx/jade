<?php

header('Content-type: application/json');

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_POST) {

    $usuario = trim($_POST['user']);
    $password = trim($_POST['pass']);
    $passconfirm = trim($_POST['inputPasswordConfirm']);
    $privilegio = trim($_POST['type']);
    $nombre = trim($_POST['name']);


    $t_usuario = strip_tags($usuario);
    $t_password = strip_tags($password);
    $t_privilegio = $privilegio;
    $t_estatus = '2';
    $t_nombre = strip_tags($nombre);

    if($password == $passconfirm)
    {

        // sha256 password hashing
        $hashed_password = hash('sha256', $t_password);

        require_once(C_P_CLASES.'actions/a.reguser.php');
        $myIns = new A_REG_USER("");
        $myIns->add_data($t_usuario,$hashed_password,$t_privilegio, $t_estatus, '', $t_nombre, '');

        $response = $myIns->user_exist($DBcon, $t_usuario);
        if($response['status'] == 'success'){
            $response = $myIns->ins_datos($DBcon);
        }

    }else{

        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $response['status'] = 'error'; // could not register
        $response['message'] = $STR->setMsgStyle('&nbsp; Contraseñas no coinciden!', 3);
    }




}

//$response['status'] = 'error'; // could not register
//$response['message'] = '&nbsp; No se pudo registrar, intente nuevamente más tarde 4 '.C_P_CLASES.'actions/a.reguser.php';

echo json_encode($response);
?>