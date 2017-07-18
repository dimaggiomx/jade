<?php
header('Content-type: application/json');

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_POST) {

    $usuario = trim($_POST['id']);
    $password = trim($_POST['pass']);
    $passconfirm = trim($_POST['confirm']);
    $oldpass = trim($_POST['passactual']);


    $t_usuario = strip_tags($usuario);
    $t_password = strip_tags($password);
    $t_oldpass = strip_tags($oldpass);


    if($password == $passconfirm)
    {

        // sha256 password hashing
        $hashed_passold = hash('sha256', $t_oldpass);
        $hashed_passnew = hash('sha256', $t_password);

        require_once(C_P_CLASES.'actions/a.registrousuario.php');
        $myIns = new A_REG_USER("");
        //$myIns->add_data('','','', '', '', '', '');
        $response = $myIns->upd_pass($DBcon, $t_usuario, $hashed_passold, $hashed_passnew);

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