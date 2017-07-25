<?php

/**
 * Created by PhpStorm.
 * User: xion
 * Date: 19/07/17
 * Time: 18:37
 */
class A_SUB
{
    var $data=array(); # contains field data
    var $dataNames=""; # contains field names
    var $arrDataNames = array();

    var $display="";   # Desplegar consulta de proyectos
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
        $this->tableName = "tsubastas";

        require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTsubastas();
        $this->arrDataNames = $tmpIns->get_tsubastas();

        $this->domain = C_DOMAIN;
    }

    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($dato1,$dato2,$dato3,$dato4)
    {
        $this->data['data1'] = $dato1; //idProyecto
        $this->data['data2'] = $dato2; //fechaInicio
        $this->data['data3'] = $dato3; //fechaFin
        $this->data['data4'] = $dato4; //tipo
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
                    ," . $this->arrDataNames['data5'] . "
		            )
		        VALUES
                    ('" . $this->data['data1'] . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3'] . "','" . $this->data['data4'] . "'
                    ,'" . $now . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['URL'] = $this->domain.'desktop.php';
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde - '.$query, 3);
            //$response['message'] = $STR->setMsgStyle($query, 3);
        }


        return $response;
    }

}