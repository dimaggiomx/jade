<?php
/**
 * Created by PhpStorm.
 * User: Enzo
 * Date: 15/01/17
 * Time: 17:48
 */

header('Content-Type: text/html');

require_once '../global.config.php';
require_once '../config.php';

$response = array();


if ($_GET) {

    $usuario = trim($_GET['user']);
    $id = trim($_GET['id']);

    $t_usuario = strip_tags($usuario);
    $t_id = strip_tags($id);


        // sha256 password hashing
        $hashed_password = hash('sha256', $t_password);

        require_once(C_P_CLASES.'actions/a.reguser.php');
        $myIns = new A_REG_USER("");


    $response = $myIns->confirm_user($DBcon,$t_usuario, $t_id);
    if($response['status']=='success')
    {
        $link = '<a href="'.C_DOMAIN.'login.html">Iniciar Sesión</a>';
    }
    else{
        $link = '<a href="'.C_DOMAIN.'register.html">Página de registro</a>';
    }
}

//$response['status'] = 'error'; // could not register
//$response['message'] = '&nbsp; No se pudo registrar, intente nuevamente más tarde 4 '.C_P_CLASES.'actions/a.reguser.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../plugins/images/favicon.png">
    <title>JADE CAPITAL FLOW - Confirmacion de registro</title>

    <style type="text/css">
    body
    {
    font-family: sans-serif;
    font-size: 100%;
    margin: 10px;
    color: #3f729b;
    background-color: #fff;
        font-size: 16px;
    }

    a { color: #2b669a; }

    p {
        font-size: 20px;
        position: relative;
        top: 10%;

    }

    img.ri
    {
    position: absolute;
    max-width: 80%;
    top: 10%;
    left: 10%;
    border-radius: 3px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.9);
    }

    img.ri:empty
    {
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }

    @media screen and (orientation: portrait) {
    img.ri {
    max-width: 90%;
    }
    }

    @media screen and (orientation: landscape) {
    img.ri {
    max-height: 90%;
    }
    }
    </style>

</head>
<body>
<img src="http://www.jadecapitalflow.com/images/jade.png" class="ri" />
<p align="center">
<?php
echo $response['message'];
echo '<br/>';
echo $link;
?>

</p>
</body>
</html>
