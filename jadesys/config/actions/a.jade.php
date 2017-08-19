<?php

/**
 * Created by PhpStorm.
 * User: xion
 * Date: 19/07/17
 * Time: 18:37
 */
class A_JADE
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



    /***
     * Obtiene los datos del inversionista
     */
    function search_proyectos($DBcon, $page, $noRowsDisplay, $idEmpresa="")
    {
        require_once(C_P_CLASES . 'utils/paginator.php');

        //$query = 'SELECT * FROM tproyectos';
        $query = "SELECT A.*, B.gnombre FROM " . $this->tableName ." AS A 
        INNER JOIN tempresas AS B ON A.idEmpresa = B.id";
        $where = "";

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

    function detail_proyecto($DBcon, $idProyecto)
    {
        $query = "SELECT * FROM ".$this->tableName." WHERE id = '" . $idProyecto . "'";
        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetchObject();

        $this->set_queryResult($obj);

        //return $obj->id;

        return 'Ok';
    }


    function disp_detailProyecto()
    {
        $obj = $this->get_queryResult();

            $otherActions = '<button type="button" class="btn btn-info btn-circle" onclick="setStatus(\''.$obj->id.'\',2)"><i class="fa fa-check"></i> </button>
            <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times" onclick="setStatus(\''.$obj->id.'\',3)"></i> </button>';

        $subasta= '';
        // boton para crear subasta de un proyecto, si esta aprobado (2) entonces muestra boton
        if($obj->status == 2)
        {
           $subasta= '<a href="step_subastas.php?idProyecto='.$obj->id.'" target="_self" class="btn btn-default">Crear Subasta</button>';
        }

        $disp= '<div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel1">'.$obj->nombre.'</h4>
            </div>
            <div class="modal-body">
            <img alt="img" class="thumb-lg img-circle" src="documents/'.$obj->logo.'">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Actividad Economica:</label>
                  <input type="text" class="form-control" id="recipient-name1" value="'.$obj->actividadEconomica.'">
                </div>
                <div class="form-group">
                  <label for="message-text" class="control-label">Descripción:</label>
                  <textarea class="form-control" id="message-text1">'.$obj->descripcionGeneral.'</textarea>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Video:</label> <a href="https://www.youtube.com/watch?v='.$obj->video.'" target="_blank">(ver video)</a>
                  <input type="text" class="form-control" id="recipient-name1" value="'.$obj->video.'">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Fecha de Registro:</label>
                  <input type="text" class="form-control" id="recipient-name1" value="'.$obj->regDate.'">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Monto:</label>
                  <input type="text" class="form-control" id="recipient-name1" value="'.$obj->monto.'">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              '.$otherActions.$subasta.'.
              <a href="documentos.php?idProyecto='.$obj->id.'" target="_self" class="btn btn-default">Ver Doctos</button>
              <a href="gallery.php?idProyecto='.$obj->id.'" target="_self" class="btn btn-default">Ver Fotos</button>
            </div>';

        return $disp;
    }


    function set_statusProyecto($DBcon, $idProyecto, $valor)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "UPDATE ".$this->tableName." SET status='".$valor."'";
        $query.=" WHERE id = '" . $idProyecto . "'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, favor de intentrlo nuevamente', 3);
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