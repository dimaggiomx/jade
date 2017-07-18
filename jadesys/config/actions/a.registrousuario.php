<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: USUARIOS
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
	var $queryResult = array();
	var $paginatorLinks = "";
	var $mysql = "";
	var $tableName = "";
	var $DBconection = "";
	/* Constructor: User passes in the name of the script where
	* form data is to be sent ($processor) and the value to show
	* on the submit button.
	*/
	function __construct($arrData=array())
	{
            $this->data = $arrData;
            require_once C_P_DB;
			
			$this->DBconection = $DBcon;
			
			require_once(C_P_CLASES.'utils/tables.names.php');
			
			$this->tableName = "tblusers";
		
			//inicializo nombres de campos de tabla
			$tmpIns = new A_TABLENAMES("");
			
			$tmpIns->set_dataTblusers();
			
			$this->arrDataNames = $tmpIns->get_tblusers();
     }


	/**
	 * Almacena los datos generales del usuario
	 *
	 */
	function add_data($dato1,$dato2,$dato3,$dato4,$dato5, $dato6)
	{
		$this->data['data1'] = $dato1; //usuario
		$this->data['data2'] = $dato2; //password
		$this->data['data3'] = $dato3; //privilegio
		$this->data['data4'] = $dato4; //estatus
		$this->data['data5'] = $dato5; //regDate
		$this->data['data6'] = $dato6; //nombre
	}

	/***
     * Busqueda de usuarios del sistema
    */ 
	function ins_datos()
	{
		$now = date("Y-m-d H:i:s");

        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $tmpIns = new STRFN();

        $guid = $tmpIns->gen_uuid();

		$query = "INSERT INTO ".$this->tableName."(".$this->arrDataNames['data1'].",".$this->arrDataNames['data2'].",".$this->arrDataNames['data3'].",".$this->arrDataNames['data4']."
					,".$this->arrDataNames['data5'].",".$this->arrDataNames['data6'].",".$this->arrDataNames['data7'].") 
					VALUES
					(
					'" . $this->data['data1'] ."','". $this->data['data2'] . "'
                    ,'" . $this->data['data3'] ."','2','". $now . "'
                    ,'" . $this->data['data6']."','" . $guid ."'
					)";
		
		$stmt = $this->DBconection->prepare( $query );

		// check for successfull registration
		
        if ( $stmt->execute() ) {
			$response['status'] = 'success';
			$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; registered sucessfully, you may login now';
            $response['guid'] = $guid;
        } else {
            $response['status'] = 'error'; // could not register
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; could not register, try again later';
            $response['guid'] = '-';
        }
		

		return $response;		
	}


    /***
     * Busqueda de usuarios del sistema
     */
    function upd_pass($DBcon, $id,$oldpass,$pass)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $tmpIns = new STRFN();


        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE id = '".$id."' and password = '".$oldpass."'";


       $stmt = $DBcon->prepare( $query );
       $stmt->execute();

        if ($stmt->rowCount() == 1) {

            $query = "UPDATE ".$this->tableName." SET password = '".$pass."' WHERE id = '".$id."'";

            $stmt = $DBcon->prepare( $query );

            // check for successfull registration

            if ( $stmt->execute() ) {
                $response['status'] = 'success';
                $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; Updated sucessfully';
            } else {
                $response['status'] = 'error'; // could not register
                $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; could not update, try again later';
            }

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Contraseña no coincide ';
        }

       // $response['status'] = 'error'; // could not register
       // $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; UPS'.$query;

        return $response;
    }


	/***
     * Envio de correo de liga de acceso al usuario recien registrado para actualizar su registro
     */
	function send_regMail($from, $to, $guid)
    {
        $subject = 'Bienvenido a Jade Capital Flow';

        $link = 'www.jadecapitalflow.com/confirm.php?';
        $link .= 'user='.$to.'&id='.$guid;


        $message = 'Por favor de click en la siguiente liga para complementar su registro: <br/><br/>';
        $message .= $link;


        $mail = mail($from, $subject, $message,
            "From: ".$to." <".$to.">\r\n"
            ."cc: Creator<dimaggiomx@gmail.com>\r\n"
            ."Reply-To: ".$from."\r\n"
            ."X-Mailer: PHP/" . phpversion());

        if($mail)
        {
            $response['status'] = 'success';
            $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; registered sucessfully, you may continue now';
        }

    }


    /***
     * Confirms a user
     */
    function confirm_user($mail, $guid)
    {
        $email = trim($mail);
        $email = strip_tags($email);

        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE ".$this->arrDataNames['data1']."= '".$email."' 
        and ".$this->arrDataNames['data4']."='2' and ".$this->arrDataNames['data7']."='".$guid."'";

        $stmt = $this->DBconection->prepare( $query );
        $stmt->execute();

        if ($stmt->rowCount() == 1) {

            // actualizar estatus de usuario a confirmado (estatus = 1)
            $response = $this->upd_userconfirm($email,$guid);

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; could not register, try again later';
        }

        return $response;

    }


    /***
     * Busqueda de usuarios del sistema
     */
    function upd_userconfirm($mail, $guid)
    {
        $query = "UPDATE ".$this->tableName." SET ".$this->arrDataNames['data4']." = '1' 
                    WHERE ".$this->arrDataNames['data1']."  = '".$mail."' 
                    AND ".$this->arrDataNames['data7']." = '".$guid."'
					";

        $stmt = $this->DBconection->prepare( $query );
        //$stmt->bindParam(':name', $full_name);
        //$stmt->bindParam(':email', $user_email);
        //$stmt->bindParam(':pass', $hashed_password);

        // check for successfull registration

        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; registered sucessfully, you may login now';
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; could not register, try again later';
        }

        return $response;
    }


    /***
     * Obtiene los datos del usuario
     */
    function get_usuario_data($DBcon, $idUser)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $tabla = 'tblusers';

        $query= "SELECT 
                *
                FROM ".$tabla."
                WHERE id='".$idUser."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1)
        {
            $obj = $stmt->fetchObject();

            $response['status'] = 'success'; // could not register
            $response['msg'] = 'Se obtuvo la información';
            $response['data'] = $obj;
        } else {
            $response['status'] = 'error'; // could not register
            $response['msg'] = '¡Ups!, Ocurrio un error';
            $response['data'] = '';
        }

        return $response;
    }


}
?>