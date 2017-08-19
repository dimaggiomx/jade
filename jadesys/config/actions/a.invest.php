<?php

/**
 * Created by PhpStorm.
 * User: xion
 * Date: 19/07/17
 * Time: 18:37
 */
class A_INV
{
    var $data = array(); # contains field data
    var $dataNames = ""; # contains field names
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
        $this->data = $arrData;
        $this->tableName = "tinv_sub";

        $this->domain = C_DOMAIN;
    }

    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($idInv, $idSub, $monto, $porcentaje)
    {
        $this->data['data1'] = $idInv; //
        $this->data['data2'] = $idSub; //
        $this->data['data3'] = $monto; //
        $this->data['data4'] = $porcentaje; //

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
                    idinv, idsub, monto, porcentaje, regDate
		            )
		        VALUES
                    ('" . $this->data['data1']  . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3']  . "','" . $this->data['data4']  . "'
                    ,'" . $now . "'
                    );";

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ($stmt->execute()) {

            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['URL'] = $this->domain . 'desktop.php';
            $response['lastId'] = $DBcon->lastInsertId();

        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde - ' . $query, 3);
            //$response['message'] = $STR->setMsgStyle($query, 3);
        }


        return $response;
    }



    /***
     * Obtiene los datos del inversionista
     */
    function search_inversiones($DBcon, $page, $noRowsDisplay)
    {
        require_once(C_P_CLASES . 'utils/paginator.php');

        //$query = 'SELECT * FROM tproyectos';
        $query = "SELECT A.*, B.gnombre FROM " . $this->tableName ." AS A 
        INNER JOIN tempresas AS B ON A.idEmpresa = B.id";
        $where = "";
        if ($idEmpresa != "")
        {
            $where = " WHERE A." . $this->arrDataNames['data1'] . " = '" . $idEmpresa . "'";
        }

        $query.= $where;

        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $total = $stmt->rowCount();

        $num_rows = $total;

        $a = new Paginator($page,$num_rows);


        $a->set_Limit($noRowsDisplay);
        $a->set_Links();
        $limit1 = $a->getRange1();
        $limit2 = $a->getRange2();
        $query .= " LIMIT $limit1 , $limit2 ";

        $stmt2 = $DBcon->prepare($query);
        //$stmt2->execute();
        //$total2 =  $stmt2->rowCount();

        // guardo el resultado
        $this->set_queryResult($stmt2);

        //Paginador
        if($a->getTotalPages()>1)
        {
            $paginatorLinks = $a->paintLinks('paginateMe',$a->getFirst(),$a->getLast(),$a->getLinkArr(),$a->getCurrent());
            //guardo el string del paginador
            $this->set_paginatorLinks($paginatorLinks);
        }


        return $query;
    }

    function disp_proyectPage($showEmpresa=0)
    {
        $stmt = $this->get_queryResult();
        $stmt->execute();
        $total = $stmt->rowCount();

        $disp = '';
        $headerTable = ''; //nombres de columnas
        $footerTable = ''; // nombres de columnas
        $dataTable = ''; // info de la tabla
        $acciones = ''; // para borrar editar
        $displinks = ''; // pra mostrar las ligas de paginacion
        $logoEmpresa = ''; // la accion de subir logo para la empresa

        $cont = 0; // contador general

        $nameEmpresa = '';
        $columnEmpresa = '';
        $estatus = '';

        if($showEmpresa != 0)
        {
            $columnEmpresa = '<th>Empresa</th>';
        }

        $headerTable = '<thead><tr>'.$columnEmpresa.'<th>Nombre</th><th>Act. Econ.</th><th>Monto</th><th>Estatus</th><th>Accion</th></tr></thead>';
        $footerTable = '<tfoot><tr>'.$columnEmpresa.'<th>Nombre</th><th>Act. Econ.</th><th>Monto</th><th>Estatus</th><th>Accion</th></tr></tfoot>';



        while ($row = $stmt->fetchObject()) {

            $logoEmpresa = '<a href="#" onclick="setIdProyecto(\''.$row->id.'\')" data-toggle="modal" data-target="#myModal"> <i class="fa fa-photo text-inverse m-r-10"></i> </a>';

            if($showEmpresa != 0)
            {
                $nameEmpresa = '<td>'.$row->gnombre.'</td>';
                $logoEmpresa = '';
            }

            // set estatus
            $estatus = '<span class="label label-info">Activo</span>';
            if($row->status == 0)
            {
                $estatus = '<span class="label label-danger">Inactivo</span>';
            }

            if($row->status == 2)
            {
                $estatus = '<span class="label label-success">Aprobado</span>';
            }


            if($row->status == 3)
            {
                $estatus = '<span class="label label-warning">Rechazado</span>';
            }


            $acciones = '<td><a href="#" onclick="detailMe(\''.$row->id.'\')" data-toggle="modal" data-target="#modalUpd"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>'.$logoEmpresa.' 
                         <a href="#" data-toggle="tooltip" data-original-title="Close" onclick="setStatus(\''.$row->id.'\',0)"> <i class="fa fa-close text-danger"></i> </a>
                         </td>';

            $dataTable.='<tr>'.$nameEmpresa.'<td>'.$row->nombre.'</td><td>'.$row->actividadEconomica.'</td><td>'.$row->monto.'</td><td>'.$estatus.'</td>'.$acciones.'</tr>';

            $cont++;
        }

        $displinks.=$this->get_paginatorLinks();

        $disp = '<table id="example" class="table display">'.$headerTable.$footerTable.'<tbody>'.$dataTable.'</tbody></table>'.$displinks;

         //$my_file = 'file.txt';
         //$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

         //fwrite($handle, $disp);

        return $disp;

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