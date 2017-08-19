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
                $_SESSION["ses_tipo"] = '';
                if($_SESSION["ses_priv"]=='B')
                {
                    $_SESSION["ses_tipo"] = 'Inversionista';
                }

                if($_SESSION["ses_priv"]=='D')
                {
                    $_SESSION["ses_tipo"] = 'Admin';
                }

                if($_SESSION["ses_priv"]=='E')
                {
                    $_SESSION["ses_tipo"] = 'Jade Agent';
                }

                if($_SESSION["ses_priv"]=='C')
                {
                    $_SESSION["ses_tipo"] = 'Empresa';
                }



                // obtengo permisos
                $objPermisos = $myLogin->user_permisos($DBcon, $objDatosUsr->id);
                $cont = 1;
                while ($row = $objPermisos->fetchObject()) {

                    $_SESSION["ses_p_".$cont] = $row->cpermis;
                    $cont++;
                }


                // Verifica si es primera vez que entra
                $response = $myLogin->user_firstLogin($DBcon,$objDatosUsr->id,$objDatosUsr->privilegio);

                //verificar si no esta establecido el idEmpresa / idInversionista, se establece
                if($response['other'] == 1)
                {
                    require_once(C_P_CLASES.'actions/a.general.php');
                    $myReg = NEW A_REG_GEN("");

                    if(!isset($_SESSION["ses_idEmp"]))
                    {
                        $_SESSION["ses_idEmp"] = $myReg->get_idEmpresa($objDatosUsr->id, $DBcon);
                    }

                    if(!isset($_SESSION["ses_idInv"]))
                    {
                        $_SESSION["ses_idInv"] = $myReg->get_idInversionista($objDatosUsr->id, $DBcon);
                    }


                }

            }

    }


    //$response['status'] = 'success'; // could not register
    //$response['message'] = $hashed_password;

	echo json_encode($response);
?>