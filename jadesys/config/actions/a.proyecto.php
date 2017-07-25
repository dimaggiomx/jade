<?php

/**
 * Created by PhpStorm.
 * User: xion
 * Date: 19/07/17
 * Time: 18:37
 */
class A_PROY
{
    var $data = array(); # contains field data
    var $dataNames = ""; # contains field names
    var $arrDataNames = array();

    var $display = "";   # Desplegar consulta de proyectos
    var $query = "";
    var $domain = "";
    var $tableName = "";

    var $DBconection = "";

    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
    function __construct($arrData = array())
    {
        $this->data = $arrData;
        $this->tableName = "tproyectos";

        require_once(C_P_CLASES . 'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTproyectos();
        $this->arrDataNames = $tmpIns->get_tproyectos();

        $this->domain = C_DOMAIN;
    }

    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7)
    {
        $this->data['data1'] = $dato1; //idusuario
        $this->data['data2'] = $dato2; //gnombre
        $this->data['data3'] = $dato3; //actividadEconomica
        $this->data['data4'] = $dato4; //descripcionGeneral
        $this->data['data5'] = $dato5; //video
        $this->data['data6'] = $dato6; //regDate
        $this->data['data7'] = $dato7; //monto

    }


    /***
     * Busqueda de usuarios del sistema
     */
    function ins_datos($DBcon)
    {
        $now = date("Y-m-d H:i:s");
        //create guid for user confirm
        require_once(C_P_CLASES . 'utils/string.functions.php');
        $STR = new STRFN();

        // obtengo el id de la empresa
        $idEmpresa = $this->get_idEmpresa($this->data['data1'], $DBcon);
        // get Video ID
        $videoId = substr($this->data['data5'], strpos($this->data['data5'], "=") + 1);

        $query = "INSERT INTO " . $this->tableName . "
                    (
		            " . $this->arrDataNames['data1'] . "," . $this->arrDataNames['data2'] . "
                    ," . $this->arrDataNames['data3'] . "," . $this->arrDataNames['data4'] . "
                    ," . $this->arrDataNames['data5'] . "," . $this->arrDataNames['data6'] . "
                    ," . $this->arrDataNames['data7'] . " 
		            )
		        VALUES
                    ('" . $idEmpresa . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3'] . "','" . $this->data['data4'] . "'
                    ,'" . $videoId . "','" . $now . "'
                    ,'" . $this->data['data7'] . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ($stmt->execute()) {

            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['URL'] = $this->domain . 'desktop.php';
            $response['lastId'] = $DBcon->lastInsertId();

            // limpio las anteriores
            unset($_SESSION["reg_proy-name"]);
            unset($_SESSION["reg_proy-act"]);
            unset($_SESSION["reg_proy-desc"]);

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde - ' . $query, 3);
            //$response['message'] = $STR->setMsgStyle($query, 3);
        }


        return $response;
    }


    /***
     *  Obtiene el id de empresa
     */
    function get_idEmpresa($iduser, $DBcon)
    {

        $query = "SELECT id FROM tempresas WHERE iduser = '" . $iduser . "'";
        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetchObject();

        return $obj->id;
    }

    function get_proyectos($DBcon, $dataToSelect='*', $where='1')
    {
        $query = "SELECT ".$dataToSelect." FROM ".$this->tableName." WHERE ".$where."";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $total = $stmt->rowCount();

        if ($total > 0)
        {
            $response['status'] = 'success'; // could not register
            $response['data'] = $stmt;
            $response['count'] = $total;
        } else {
            $response['status'] = 'error'; // could not register
            $response['data'] = 'No result';
            $response['count'] = $total;
        }

        return $response;
    }

}