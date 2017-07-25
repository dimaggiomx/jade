<?php

/**
 * Created by PhpStorm.
 * User: xion
 * Date: 19/07/17
 * Time: 18:37
 */
class A_UPL
{
    var $data = array(); # contains field data
    var $dataNames = ""; # contains field names
    var $arrDataNames = array();
    var $tblUplpro=array();

    var $display = "";   # Desplegar consulta de proyectos
    var $query = "";
    var $domain = "";
    var $tableName = "";
    var $tableName2 = "";

    var $DBconection = "";

    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
    function __construct($arrData = array())
    {
        $this->data = $arrData;
        $this->tableName = "tuploads";
        $this->tableName2 = "tuplproy";

        require_once(C_P_CLASES . 'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTuploads();
        $this->arrDataNames = $tmpIns->get_tuploads();
        $tmpIns->set_dataTuplproy();
        $this->tblUplpro = $tmpIns->get_tuplproy();

        $this->domain = C_DOMAIN;
    }

    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($idUsuario, $filePath, $tipo="", $idProyecto="")
    {
        $this->data['data1'] = $idUsuario;
        $this->data['data2'] = $filePath;
        $this->data['data3'] = $tipo;
        $this->data['data4'] = $idProyecto;
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

        $query2 = '';
        // verifico si ya existe el archivo en la BD
        $existe = $this->file_exist($DBcon,$this->data['data1'],$this->data['data2']);
        if($existe > 0)
        {
            $query2 = $this->file_delete($DBcon,$this->data['data1'],$this->data['data2']);
        }

        $query = "INSERT INTO " . $this->tableName . "
                    (
		            " . $this->arrDataNames['data1'] . "," . $this->arrDataNames['data2'] . "
                    ," . $this->arrDataNames['data3'] . "," . $this->arrDataNames['data4'] . "
		            ," . $this->arrDataNames['data5'] . "
		            )
		        VALUES
                    ('" . $this->data['data1'] . "','" . $this->data['data2'] . "'
                    ,'" . $now . "','1', '" . $this->data['data3'] . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ($stmt->execute()) {

            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['idUploaded'] = $DBcon->lastInsertId();

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde - ', 3);
            //$response['message'] = $STR->setMsgStyle($query, 3);
        }

        return $response;
    }


    /***
     * Confirms a file exists
     */
    function file_exist($DBcon, $idUsuario, $filePath)
    {
        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE ".$this->arrDataNames['data1']."= '".$idUsuario."' 
         AND ".$this->arrDataNames['data2']."='".$filePath."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
       // return $query;

    }


    /***
     * Confirms a file exists
     */
    function file_delete($DBcon, $idUsuario, $filePath)
    {
        $query = "UPDATE  ".$this->tableName." SET ".$this->arrDataNames['data4']." = 0 WHERE ".$this->arrDataNames['data1']."= '".$idUsuario."' 
         AND ".$this->arrDataNames['data2']."='".$filePath."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        return $query;
    }

    /***
     * Busqueda de usuarios del sistema
     */
    function ins_datosProy($DBcon, $idUpload)
    {
        $query = "INSERT INTO " . $this->tableName2 . "
                    (
		            " . $this->tblUplpro['data1'] . "," . $this->tblUplpro['data2'] . "
		            )
		        VALUES
                    ('" . $this->data['data4'] . "','" . $idUpload . "'
                    );";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        return $query;
    }

}