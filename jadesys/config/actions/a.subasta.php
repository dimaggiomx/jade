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
    var $queryResult = ""; // resultado de un query
    var $paginatorLinks = "";   //  lo que guarda las ligas que paginan
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
                    ," . $this->arrDataNames['data5'] . "," . $this->arrDataNames['data6'] . "
		            )
		        VALUES
                    ('" . $this->data['data1'] . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3'] . "','" . $this->data['data4'] . "'
                    ,'" . $now . "',1
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

    /***
     * Obtiene los datos de las subastas (consulta)
     */
    function search_subastas($DBcon, $page, $noRowsDisplay)
    {
        require_once(C_P_CLASES . 'utils/paginator.php');

        //Busco subastas que esten asignadas a proyectos y empresas
        $query = "SELECT A.*, B.gnombre FROM " . $this->tableName ." AS A 
        INNER JOIN tempresas AS B ON A.idEmpresa = B.id";


        $query = 'SELECT
A.id, A.gnombre, A.ranking, A.eval,
B.id, B.idEmpresa, B.nombre, B.descripcionGeneral, B.video,
C.id, C.idProyecto, C.fechaInicio, C.fechaFin, C.tipo, C.estatus, B.logo
FROM tempresas AS A
INNER JOIN tproyectos AS B ON A.id = B.idEmpresa
INNER JOIN tsubastas AS C ON B.id = C.idProyecto';

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

    function disp_subastaPage($showEmpresa=0)
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

        $cont = 0; // contador general

        $nameEmpresa = '';
        $columnEmpresa = '';
        $estatus = '';

        if($showEmpresa != 0)
        {
            $columnEmpresa = '<th>Empresa</th>';
        }

        $headerTable = '<thead><tr>'.$columnEmpresa.'<th>Proyecto</th><th>T. Subasta</th><th>Fecha Fin</th><th>Estatus</th><th>Accion</th></tr></thead>';
        $footerTable = '<tfoot><tr>'.$columnEmpresa.'<th>Proyecto</th><th>Act. Econ.</th><th>Fecha Fin</th><th>Estatus</th><th>Accion</th></tr></tfoot>';



        while ($row = $stmt->fetchObject()) {


            if($showEmpresa != 0)
            {
                $nameEmpresa = '<td>'.$row->gnombre.'</td>';
            }

            // set estatus
            $estatus = '<span class="label label-info">Activa</span>';
            if($row->estatus != 1)
            {
                $estatus = '<span class="label label-danger">Inactiva</span>';
            }

            $acciones = '<td><a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> 
                         <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                         </td>';

            $dataTable.='<tr>'.$nameEmpresa.'<td>'.$row->nombre.'</td><td>'.$row->tipo.'</td><td>'.$row->fechaFin.'</td><td>'.$estatus.'</td>'.$acciones.'</tr>';

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