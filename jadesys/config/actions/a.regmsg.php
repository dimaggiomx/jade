<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_REG_MSG
{
    var $data=array(); # contains field data
    var $dataNames=""; # contains field names
    var $arrDataNames = array();
    var $arrDataAlertaNames = array();
    var $display="";   # name of program to process form
    var $query = "";
    var $domain = "";
    var $tableName = "";
    var $table2Name = "";
    var $DBconection = "";
    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
	function __construct($arrData=array())
	{
        $this->data = $arrData;
        $this->tableName = "tmensajes";

        require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTmensajes();
        $this->arrDataNames = $tmpIns->get_tmensajes();
        $this->domain = C_DOMAIN;

        // inicializo tabla de alertas
        $this->table2Name = "talertas";
        $tmpIns->set_dataTalertas();
        $this->arrDataAlertaNames = $tmpIns->get_talertas();
     }


    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($dato1,$dato2,$dato3)
    {
        $this->data['data1'] = $dato1; //idalerta
        $this->data['data2'] = $dato2; //iduser
        $this->data['data3'] = $dato3; //mensaje
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

        $query = "INSERT INTO ".$this->tableName."
                    (
		            " . $this->arrDataNames['data1'] . "," . $this->arrDataNames['data2'] . "
                    ," . $this->arrDataNames['data3'] . "," . $this->arrDataNames['data4'] . "
		            )
		        VALUES
                    ('" . $this->data['data1'] . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3'] . "'
                    ,'" . $now . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
        } else {
            $response['status'] = 'error'; // could not register
            //$response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde', 3);
            $response['message'] = $STR->setMsgStyle($query, 3);
        }

        return $response;
	}


    /***
     * Obtains a user general data
     */
    function msg_data($DBcon, $idalerta)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query= "SELECT ".$this->arrDataAlertaNames['data2']." FROM ".$this->table2Name." WHERE ".$this->arrDataAlertaNames['data1']." = '".$idalerta."' AND ".$this->arrDataAlertaNames['data3']." = '1'";
        $stmt = $DBcon->prepare($query);
        //$stmt->execute();

        // check for successfull registration
        if ( $stmt->execute() ) {
            $obj = $stmt->fetchObject();

            $response['status'] = 'success';
            $response['message'] = 'Msg registered';
            $response['data'] = $obj->descripcion;

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = 'Unable to register msg';
            $response['data'] = 'NO DATA';
        }


        return $response;
    }


    /***
     * Obtiene los ultimos 4 mensajes generados
     */
    function pop_messages($DBcon)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query= "SELECT A.id, A.idalerta, A.iduser, A.mensaje, A.regdate, B.descripcion FROM tmensajes AS A
                 INNER JOIN talertas AS B
                 ON A.idalerta = B.id
                ORDER BY A.id DESC LIMIT 4
                ";

       $stmt = $DBcon->prepare($query);
       $stmt->execute();
        //$obj = $stmt->fetchObject();

        return $stmt;
    }



    /***
     * General el HTML para desplegar los mensajes
     */
    function display_messages($stmt){

        $display = '';

        while ($row = $stmt->fetchObject()) {

            $display.= '
            <section class="accordion-item">
                                <h1>'.$row->idalerta.'</h1>
                                <div class="accordion-item-content">
                                    <p>'.$row->descripcion.' '.$row->mensaje.'</p>
                                    <p>'.$row->regdate.'</p>
                                </div>
                            </section>
            ';
        }

        return $display;
    }

    /***
     * Obtains a user general data
     */
    function push_msg($DBcon, $idalerta, $iduser, $msg)
    {
        $datosMensaje = $this->msg_data($DBcon,$idalerta);

        // si se encontro la alerta (id)
        if($datosMensaje['status'] == 'success' )
        {
            //registro el mensaje
            $this->add_data($idalerta,$iduser,$msg);
            $response = $this->ins_datos($DBcon);
        }
        else{
            $response = $datosMensaje;
        }

        //return $datosMensaje;
        return $response;
    }



}
?>