<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_LOG_IN
{
	var $data=array(); # contains field data
	var $dataNames=""; # contains field names
	var $arrDataNames = array();
	var $display="";   # name of program to process form
	var $query = "";
	var $domain = "";
	var $tableName = "";
	var $DBconection = "";
    var $loggedData = array();
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
     * Confirms a user
     */
    function user_exist($DBcon, $mail, $pass)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE ".$this->arrDataNames['data1']."= '".$mail."' 
         AND ".$this->arrDataNames['data2']."='".$pass."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $response['status'] = 'success'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Bienvenido, puede continuar');

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Usuario / contraseña equivocada', 3);

            //$response['message'] = $query;

        }

        return $response;

    }


    /***
     * Obtains a user general data
     */
    function user_data($DBcon, $mail)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();


        $query= "SELECT id,usuario,privilegio,nombre FROM tblusers WHERE usuario = '".$mail."' AND estatus <> '0'";
        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetchObject();

        return $obj;
    }

    /***
     * Obtains a user general data
     */
    function user_permisos($DBcon, $idUsuario)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();


        $query= "SELECT * FROM permisos_usr WHERE idusuario = '".$idUsuario."'";
        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    /***
     * Verifies a users first time loggin
     */
    function user_firstLogin($DBcon, $iduser, $privilege)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $tabla = '';

        if($privilege == 'D' || $privilege == 'E') // es Jade user o admin
        {
            $response['status'] = 'success'; // ya ha registrado datos extra
            $response['URL'] = $this->domain.'desktop.php';
            $response['message'] = $STR->setMsgStyle('&nbsp; Bienvenido, puede continuar');
            $response['other'] = 1;
        }else{

            if($privilege == 'C') // es empresa
            {
                $tabla = 'tempresas';
            }

            if($privilege == 'B') // es empresa
            {               // es inversionista
                $tabla = 'tinversionistas';
            }

            $query = "SELECT id FROM ".$tabla." WHERE iduser = '".$iduser."'";

            $stmt = $DBcon->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $response['status'] = 'success'; // ya ha registrado datos extra
                $response['URL'] = $this->domain.'desktop.php';
                $response['message'] = $STR->setMsgStyle('&nbsp; Bienvenido, puede continuar');
                $response['other'] = 1;
            } else {
                $response['status'] = 'success'; // no ha registrado datos extra
                $response['URL'] =  $this->domain.'step2_'.$tabla.'.php';
                $response['message'] = $STR->setMsgStyle('&nbsp; Bienvenido, por favor complete su registro');
                $response['other'] = 0;
            }
        }

        return $response;

    }
}
?>