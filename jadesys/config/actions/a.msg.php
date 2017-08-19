<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_MSG
{
	var $data=array(); # contains field data
	var $data2=array(); # contains field names
	var $campos1 = array();
    var $campos2 = array();
	var $display="";   # name of program to process form
	var $query = "";
	var $domain = "";
	var $tableName = "";
    var $tableName2 = "";
	var $DBconection = "";
    var $loggedData = array();
	/* Constructor: User passes in the name of the script where
	* form data is to be sent ($processor) and the value to show
	* on the submit button.
	*/
	function __construct($arrData=array())
	{
        $this->data = $arrData;
        $this->tableName = "tnotify";
        $this->tableName2 = "tmsgtype";

        require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTnotify();
        $this->campos1 = $tmpIns->get_tnotify();

        $tmpIns->set_dataTmsgtype();
        $this->campos2 = $tmpIns->get_tmsgtype();

        $this->domain = C_DOMAIN;
     }


	/**
	 * Almacena los datos generales del usuario
	 *
	 */
    function add_data($idusuario,$idmsgtype,$regDate,$link,$estatus,$msgComplemento)
    {
        $this->data['data2'] = $idusuario; //idusuario
        $this->data['data3'] = $idmsgtype; //idmsgtype
        $this->data['data4'] = $regDate; //regDate
        $this->data['data5'] = $link; //link
        $this->data['data6'] = $estatus; //estatus
        $this->data['data7'] = $msgComplemento; //complemento del mensaje
    }


    /***
     * Confirms a user
     */
    function get_msgs($DBcon, $subquery)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "SELECT A.*, B.tipo, B.msg, B.titulo, B.estatus
                FROM tnotify AS A INNER JOIN tmsgtype AS B ON A.idmsgtype = B.id";
        $query.=$subquery;

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        $disp = '';
        while ($row = $stmt->fetchObject()) {
            $estatus = '<span class="label label-info m-r-10">Nuevo</span>';
            if($row->estatus == 2)
            {
                $estatus = '<span class="label label-warning m-r-10">Leido</span>';
            }
            $disp.='  <tr class="unread">
                      <td><div class="checkbox m-t-0 m-b-0">
                          <input  type="checkbox">
                          <label for="checkbox0"></label>
                        </div>
                      </td>
                        
                      <td class="hidden-xs" colspan="2">'.$row->titulo.'</td>
                      <td class="max-texts" colspan="2"> <a href="'.$row->link.'" >'.$estatus.' '.$row->msg.'</a></td>
                      <td class="text-right"> '.$row->regDate.'</td></tr>';
        }

        return $disp;
    }


    /***
     * Obtains a user general data
     */
    function ins_msg($DBcon)
    {
        $now = date("Y-m-d H:i:s");
        //create guid for user confirm
        require_once(C_P_CLASES . 'utils/string.functions.php');
        $STR = new STRFN();

        $query = "INSERT INTO " . $this->tableName . "
                    (
		             " . $this->campos1['data2'] . "," . $this->campos1['data3'] . "
                    ," . $this->campos1['data4'] . "," . $this->campos1['data5'] . "
                    ," . $this->campos1['data7'] . "
		            )
		        VALUES
                    ('" . $this->data['data2'] . "','" . $this->data['data3'] . "'
                    ,'" . $now . "','" . $this->data['data5'] . "'
                    ,'" . $this->data['data7'] . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ($stmt->execute()) {

            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!'.$query);

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde - '.$query, 3);
        }


        return $response;
    }

}
?>