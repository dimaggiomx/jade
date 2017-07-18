<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_REG_USER
{
	var $data=array(); # contains field data
	var $dataNames=""; # contains field names
	var $arrDataNames = array();
	var $display="";   # name of program to process form
	var $query = "";
	var $domain = "";
	var $tableName = "";
	var $DBconection = "";
	/* Constructor: User passes in the name of the script where
	* form data is to be sent ($processor) and the value to show
	* on the submit button.
	*/
	function __construct($arrData=array())
	{
        $this->data = $arrData;
        $this->tableName = "tblusers";

        require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTblusers();
        $this->arrDataNames = $tmpIns->get_tblusers();
        $this->domain = C_DOMAIN;
     }


	/**
	 * Almacena los datos generales del usuario
	 *
	 */
    function add_data($dato1,$dato2,$dato3,$dato4,$dato5, $dato6, $dato7)
    {
        $this->data['data1'] = $dato1; //usuario
        $this->data['data2'] = $dato2; //password
        $this->data['data3'] = $dato3; //privilegio
        $this->data['data4'] = $dato4; //estatus
        $this->data['data5'] = $dato5; //regDate
        $this->data['data6'] = $dato6; //nombre
        $this->data['data7'] = $dato7; //guid
    }

	/***
     * Busqueda de usuarios del sistema
    */ 
	function ins_datos($DBcon)
	{
		$now = date("Y-m-d H:i:s");

        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $guid = $STR->gen_uuid();

        $query = "INSERT INTO ".$this->tableName."(".$this->arrDataNames['data1'].",".$this->arrDataNames['data2'].",".$this->arrDataNames['data3'].",".$this->arrDataNames['data4']."
					,".$this->arrDataNames['data5'].",".$this->arrDataNames['data6'].",".$this->arrDataNames['data7'].") 
					VALUES
					(
					'" . $this->data['data1'] ."','". $this->data['data2'] . "'
                    ,'" . $this->data['data3'] ."','2','". $now . "'
                    ,'" . $this->data['data6']."','" . $guid ."'
					)";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['guid'] = $guid;
            //if($ambiente == 'PRO')
            //{
            $this->send_regMail('info@jadecapitalflow.com',$this->data['data1'],$guid);
            //}
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde', 3);
            $response['guid'] = '-';
        }

		return $response;		
	}

    /***
     * Confirms a user
     */
    function confirm_user($DBcon, $mail, $guid)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $email = trim($mail);
        $email = strip_tags($email);

        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE ".$this->arrDataNames['data1']."= '".$email."' 
        and ".$this->arrDataNames['data4']."='2' and ".$this->arrDataNames['data7']."='".$guid."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            // actualizar estatus de usuario a confirmado (estatus = 1)
            $response = $this->upd_userconfirm($DBcon,$email,$guid);

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Usuario no existe, favor de registrarse:', 3);
        }

        return $response;

    }


    /***
     * Busqueda de usuarios del sistema
     */
    function upd_userconfirm($DBcon, $mail, $guid)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "UPDATE ".$this->tableName." SET ".$this->arrDataNames['data4']." = '1' 
                    WHERE ".$this->arrDataNames['data1']."  = '".$mail."' 
                    AND ".$this->arrDataNames['data7']." = '".$guid."'
					";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias! favor de iniciar sesion:');
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, favor de registrarse: <br/>http://www.jadecapitalflow.com/', 3);
        }

        return $response;
    }


    /***
     * Confirms a user
     */
    function user_exist($DBcon, $mail)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $email = trim($mail);
        $email = strip_tags($email);

        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE ".$this->arrDataNames['data1']."= '".$email."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Usuario que intenta registrar ya existe', 3);

        } else {
            $response['status'] = 'success'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Usuario inexistente, puede continuar');
        }

        return $response;

    }


	/***
     * Envio de correo de liga de acceso al usuario recien registrado para actualizar su registro
     */
	function send_regMail($from, $to, $guid)
    {
        $subject = 'Bienvenido a Jade Capital Flow';

        $link = $this->domain.'tblusers/confirm.php?';
        $link .= 'user='.$to.'&id='.$guid;


        $message = 'Por favor de click en la siguiente liga para complementar su registro: ';
        $message .= $link;


        $mail = mail($from, $subject, $message,
            "From: Jade-Capital-Flow <".$from.">\r\n"
            ."To: User<".$to.">\r\n"
            ."cc: Creator<dimaggiomx@gmail.com>\r\n"
            ."Reply-To: ".$from."\r\n"
            ."X-Mailer: PHP/" . phpversion());

        if($mail)
        {
            $res = 'OK';
        }
    }

}
?>