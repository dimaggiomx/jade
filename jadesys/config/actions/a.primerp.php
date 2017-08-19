<?php

/**
 * Created by PhpStorm.
 * User: xion
 * Date: 19/07/17
 * Time: 18:37
 */
class A_PRIMERP
{
    var $data = array(); # contains field data
    var $preg = ""; # contains field names
    var $arrDataNames = array();

    var $display = "";   # Desplegar consulta de proyectos
    var $query = "";
    var $domain = "";
    var $tableName = "";

    var $DBconection = "";
    var $queryResult = ""; // resultado de un query
    var $paginatorLinks = "";   //  lo que guarda las ligas que paginan
    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
    function __construct($arrData = array())
    {
        $this->preg = $arrData;
        $this->tableName = "tprimer_p";

        require_once(C_P_CLASES . 'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTprimer_p();
        $this->arrDataNames = $tmpIns->get_tprimer_p();

        $this->domain = C_DOMAIN;
    }

    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($dato1, $dato2, $dato3, $dato4, $dato5, $dato6, $dato7, $dato8, $dato9)
    {
        $this->preg['data1'] = $dato1; //idusuario
        $this->preg['data2'] = $dato2; //preg1
        $this->preg['data3'] = $dato3; //preg2
        $this->preg['data4'] = $dato4; //preg3
        $this->preg['data5'] = $dato5; //preg4
        $this->preg['data6'] = $dato6; //preg5
        $this->preg['data7'] = $dato7; //preg6
        $this->preg['data8'] = $dato8; //preg7
        $this->preg['data9'] = $dato9; //preg8

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


        $query = "INSERT INTO " . $this->tableName . "
                    (
		            " . $this->arrDataNames['data1'] . "," . $this->arrDataNames['data2'] . "
                    ," . $this->arrDataNames['data3'] . "," . $this->arrDataNames['data4'] . "
                    ," . $this->arrDataNames['data5'] . "," . $this->arrDataNames['data6'] . "
                    ," . $this->arrDataNames['data7'] . "," . $this->arrDataNames['data8'] . "
                    ," . $this->arrDataNames['data9'] . "," . $this->arrDataNames['data10'] . "
		            )
		        VALUES
                    ('" . $this->preg['data1'] . "','" . $this->preg['data2'] . "'
                    ,'" . $this->preg['data3'] . "','" . $this->preg['data4'] . "'
                    ,'" . $this->preg['data5'] . "','" . $this->preg['data6'] . "'
                    ,'" . $this->preg['data7'] . "','" . $this->preg['data8'] . "'
                    ,'" . $this->preg['data9'] . "','" . $now . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // set URL
        $URL = "desktop.php";
        if($this->preg['data2'] == "SI")
        {
            $URL = "step3_tempresas.php";
        }

        // check for successfull registration
        if ($stmt->execute()) {

            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['URL'] = $this->domain . $URL;

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde - ', 3);
        }


        return $response;
    }




    function set_paginatorLinks($string)
    {
        $this->paginatorLinks = $string;
    }

    function get_paginatorLinks()
    {
        return $this->paginatorLinks;
    }

    function set_queryResult($query)
    {
        $this->queryResult = $query;
    }

    function get_queryResult()
    {
        return $this->queryResult;
    }


}