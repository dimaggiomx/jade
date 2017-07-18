<?php

	header('Content-type: application/json');

    require_once '../global.config.php';
    require_once '../config.php';


	$response = array();


	if ($_POST) {

		$usuario = trim($_POST['email']);
		$password = trim($_POST['pass']);


        $t_usuario = strip_tags($usuario);
        $t_password = strip_tags($password);


            // sha256 password hashing
            $hashed_password = hash('sha256', $t_password);


            require_once(C_P_CLASES.'actions/a.login.php');

            $myLogin = new A_LOG_IN("");
            $response = $myLogin->user_exist($DBcon, $t_usuario, $hashed_password);

            // si es exitoso el loggeo, obten datos del usuario y verifica si es la primera vez que entra
            if($response['status'] == 'success')
            {
                $objDatosUsr = $myLogin->user_data($DBcon,$t_usuario);

                // aqui debo iniciar SESSION
                session_start();

                $_SESSION["ses_id"]	= $objDatosUsr->id;
                $_SESSION["ses_usr"] = $objDatosUsr->usuario;
                $_SESSION["ses_priv"] = $objDatosUsr->privilegio;  // el privilegio es el tipo de user (inversionista B, Empresa C)
                $_SESSION["ses_name"] = $objDatosUsr->nombre;
                $_SESSION["ses_tipo"] = 'Empresa';
                if($_SESSION["ses_priv"]=='B')
                {
                    $_SESSION["ses_tipo"] = 'Inversionista';
                }

                // Verifica si es primera vez que entra
                $response = $myLogin->user_firstLogin($DBcon,$objDatosUsr->id,$objDatosUsr->privilegio);

            }

    }


    //$response['status'] = 'success'; // could not register
    //$response['message'] = $hashed_password;

	echo json_encode($response);
?>