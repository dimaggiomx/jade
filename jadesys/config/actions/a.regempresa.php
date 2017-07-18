<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_REG_EMP
{
	var $data=array(); # contains field data
	var $dataNames=""; # contains field names
	var $arrDataNames = array();
	var $display="";   # name of program to process form
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
        $this->tableName = "tempresas";

        require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTempresas();
        $this->arrDataNames = $tmpIns->get_tempresas();
        $this->domain = C_DOMAIN;
     }


	/**
	 * Almacena los datos generales del usuario
	 *
	 */
    function add_data($dato1,$dato2,$dato3,$dato4,$dato5, $dato6, $dato7, $dato8, $dato9, $dato10,
                      $dato11,$dato12,$dato13,$dato14,$dato15, $dato16, $dato17)
    {
        $this->data['data1'] = $dato1; //iduser
        $this->data['data2'] = $dato2; //gnombre
        $this->data['data3'] = $dato3; //gresponsablelegal
        $this->data['data4'] = $dato4; //odireccion
        $this->data['data5'] = $dato5; //ocolonia
        $this->data['data6'] = $dato6; //ociudad
        $this->data['data7'] = $dato7; //oestado
        $this->data['data8'] = $dato8; //opais
        $this->data['data9'] = $dato9; //otelofc
        $this->data['data10'] = $dato10; //otelmovil
        $this->data['data11'] = $dato11; //ogiro
        $this->data['data12'] = $dato12; //oproducto
        $this->data['data13'] = $dato13; //oprodfabricacion
        $this->data['data14'] = $dato14; //oprodcomercializacion
        $this->data['data15'] = $dato15; //oactividades
        $this->data['data16'] = $dato16; //ofechaconstitucion

        $this->data['data17'] = $dato17; //regdate
    }



    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_dataExtra($dato18, $dato19, $dato20,
                      $dato21,$dato22,$dato23,$dato24,$dato25, $dato26, $dato27, $dato28, $dato29, $dato30,
                      $dato31)
    {
        $this->data['data18'] = $dato18; //fventasnetas
        $this->data['data19'] = $dato19; //futilidadneta
        $this->data['data20'] = $dato20; //futilidadventa
        $this->data['data21'] = $dato21; //fcapitaltrabajo
        $this->data['data22'] = $dato22; //findiceliquidez
        $this->data['data23'] = $dato23; //fcostoventas
        $this->data['data24'] = $dato24; //futilidadbruta
        $this->data['data25'] = $dato25; //fdepreciacion

        $this->data['data26'] = $dato26; //fgastosoperacion
        $this->data['data27'] = $dato27; //futilidadoperacion
        $this->data['data28'] = $dato28; //futilidadnetafinal
        $this->data['data29'] = $dato29; //fventasdirectas
        $this->data['data30'] = $dato30; //ranking
        $this->data['data31'] = $dato31; //eval

    }


    /***
     * Inserta los datos generales *
     */
    function ins_datosGenerales($DBcon)
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
                    ," . $this->arrDataNames['data7'] . "," . $this->arrDataNames['data8'] . "
		            ," . $this->arrDataNames['data9'] . "," . $this->arrDataNames['data10'] . "
		            ," . $this->arrDataNames['data11'] . "," . $this->arrDataNames['data12'] . "
                    ," . $this->arrDataNames['data13'] . "," . $this->arrDataNames['data14'] . "
                    ," . $this->arrDataNames['data15'] . "," . $this->arrDataNames['data16'] . "
                    ," . $this->arrDataNames['data17'] . "
		            )
		        VALUES
                    ('" . $this->data['data1'] . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3'] . "','" . $this->data['data4'] . "'
                    ,'" . $this->data['data5'] . "','" . $this->data['data6'] . "'
                    ,'" . $this->data['data7'] . "','" . $this->data['data8'] . "'
		            ,'" . $this->data['data9'] . "','" . $this->data['data10'] . "'
		            ,'" . $this->data['data11'] . "','" . $this->data['data12'] . "'
                    ,'" . $this->data['data13'] . "','" . $this->data['data14'] . "'
                    ,'" . $this->data['data15'] . "','" . $this->data['data16'] . "'
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
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde', 3);
        }

        return $response;

    }


    /***
     * Inserta los datos fiscales /update *
     */
    function upd_datosFiscales($DBcon, $id)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "UPDATE ".$this->tableName."
                    SET
                     " . $this->arrDataNames['data18'] . " ='" . $this->data['data18'] . "'
                    ," . $this->arrDataNames['data19'] . " ='" . $this->data['data19'] . "'
					," . $this->arrDataNames['data20'] . " ='" . $this->data['data20'] . "'
					," . $this->arrDataNames['data21'] . " ='" . $this->data['data21'] . "'
					," . $this->arrDataNames['data22'] . " ='" . $this->data['data22'] . "'
					," . $this->arrDataNames['data23'] . " ='" . $this->data['data23'] . "'
					," . $this->arrDataNames['data24'] . " ='" . $this->data['data24'] . "'
					," . $this->arrDataNames['data25'] . " ='" . $this->data['data25'] . "'
					," . $this->arrDataNames['data26'] . " ='" . $this->data['data26'] . "'
					," . $this->arrDataNames['data27'] . " ='" . $this->data['data27'] . "'
					," . $this->arrDataNames['data28'] . " ='" . $this->data['data28'] . "'
					," . $this->arrDataNames['data29'] . " ='" . $this->data['data29'] . "'
					," . $this->arrDataNames['data30'] . " ='" . $this->data['data30'] . "'
					," . $this->arrDataNames['data31'] . " ='" . $this->data['data31'] . "'
					,estatus='2'";

        $query.="WHERE iduser = '" . $id . "'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['URL'] = $this->domain.'desktop.php';
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, favor de intentrlo nuevamente'.$query, 3);
        }

        return $response;
    }


    /***
     * Confirms a user
     */
    function user_exist($DBcon, $mail)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "SELECT ".$this->arrDataNames['data1']." FROM ".$this->tableName." WHERE ".$this->arrDataNames['data1']."= '".$mail."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Usuario que intenta registrar ya existe', 3);

        } else {
            $response['status'] = 'success'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; Usuario inexistente, puede continuar');
        }

        return $response;

    }


    /***
     * Obtiene los datos del inversionista
     */
    function get_empresa_data($DBcon, $idUser)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $tabla = 'tempresas';

        $query= "SELECT 
                *
                FROM ".$tabla."
                WHERE iduser='".$idUser."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() == 1)
        {
            $obj = $stmt->fetchObject();

            $response['status'] = 'success'; // could not register
            $response['msg'] = 'Se obtuvo la información';
            $response['data'] = $this->display_data_empresa($obj);
        } else {
            $response['status'] = 'error'; // could not register
            $response['msg'] = '¡Ups!, Ocurrio un error';
            $response['data'] = '';
        }

        return $response;
    }


    function display_data_empresa($obj)
    {
        // datos generales
        $display1 .= '<table class="table">
                  <thead><tr><th>#</th><th>Info</th><th>Detail</th></tr></thead><tbody>';
        $display1 .='<tr><td>1</td><td><span class="label label-info">Nombre</span></td><td>'.$obj->gnombre.'</td></tr>';
        $display1 .='<tr><td>2</td><td><span class="label label-info">Responsable Legal</span></td><td>'.$obj->gresponsablelegal.'</td></tr>';
        $display1.='</tbody></table>';

        // datos Oficina
        $display2 .= '<table class="table"><thead><tr><th>#</th><th>Info</th><th>Detail</th></tr></thead><tbody>';
        $display2 .='<tr><td>1</td><td><span class="label label-info">Dirección</span></td><td>'.$obj->odireccion.'</td></tr>';
        $display2 .='<tr><td>2</td><td><span class="label label-info">Colonia</span></td><td>'.$obj->ocolonia.'</td></tr>';
        $display2 .='<tr><td>3</td><td><span class="label label-info">Ciudad</span></td><td>'.$obj->ociudad.'</td></tr>';
        $display2 .='<tr><td>4</td><td><span class="label label-info">Estado</span></td><td>'.$obj->oestado.'</td></tr>';
        $display2 .='<tr><td>5</td><td><span class="label label-info">País</span></td><td>'.$obj->opais.'</td></tr>';
        $display2 .='<tr><td>6</td><td><span class="label label-info">Telefono Oficina</span></td><td>'.$obj->otelofc.'</td></tr>';
        $display2 .='<tr><td>7</td><td><span class="label label-info">Celular</span></td><td>'.$obj->otelmovil.'</td></tr>';
        $display2 .='<tr><td>8</td><td><span class="label label-info">Giro</span></td><td>'.$obj->ogiro.'</td></tr>';
        $display2 .='<tr><td>9</td><td><span class="label label-info">Prod./Servicio</span></td><td>'.$obj->oproducto.'</td></tr>';
        $display2 .='<tr><td>10</td><td><span class="label label-info">Prod. de Fabricacion</span></td><td>'.$obj->oprodfabricacion.'</td></tr>';
        $display2 .='<tr><td>11</td><td><span class="label label-info">Prod. Comercializacion</span></td><td>'.$obj->oprodcomercializacion.'</td></tr>';
        $display2 .='<tr><td>12</td><td><span class="label label-info">Actividades</span></td><td>'.$obj->oactividades.'</td></tr>';
        $display2 .='<tr><td>13</td><td><span class="label label-info">Fecha Constitucion</span></td><td>'.$obj->ofechaconstitucion.'</td></tr>';
        $display2.='</tbody></table>';

        // datos certificacion
        $display3 .= '<table class="table"><thead><tr><th>#</th><th>Info</th><th>Detail</th></tr></thead><tbody>';
        $display3 .='<tr><td>1</td><td><span class="label label-info">Ventas Netas</span></td><td>'.$obj->fventasneta.'</td></tr>';
        $display3 .='<tr><td>2</td><td><span class="label label-info">Utilidad Neta</span></td><td>'.$obj->futilidadneta.'</td></tr>';
        $display3 .='<tr><td>3</td><td><span class="label label-info">Utilidad Venta</span></td><td>'.$obj->futilidadventa.'</td></tr>';
        $display3 .='<tr><td>4</td><td><span class="label label-info">Capital Trabajo</span></td><td>'.$obj->fcapitaltrabajo.'</td></tr>';
        $display3 .='<tr><td>5</td><td><span class="label label-info">Ind. Liquidez</span></td><td>'.$obj->findiceliquidez.'</td></tr>';
        $display3 .='<tr><td>6</td><td><span class="label label-info">Costo Ventas</span></td><td>'.$obj->fcostoventas.'</td></tr>';
        $display3 .='<tr><td>7</td><td><span class="label label-info">Utilidad Bruta</span></td><td>'.$obj->futilidadbruta.'</td></tr>';
        $display3 .='<tr><td>8</td><td><span class="label label-info">Depreciacion</span></td><td>'.$obj->fdepreciacion.'</td></tr>';
        $display3 .='<tr><td>9</td><td><span class="label label-info">Gastos Operacion</span></td><td>'.$obj->fgastosoperacion.'</td></tr>';
        $display3 .='<tr><td>10</td><td><span class="label label-info">Utilidad Operacion</span></td><td>'.$obj->futilidadoperacion.'</td></tr>';
        $display3 .='<tr><td>11</td><td><span class="label label-info">Utilidad Neta Final</span></td><td>'.$obj->futilidadnetafinal.'</td></tr>';
        $display3 .='<tr><td>12</td><td><span class="label label-info">Venas Directas</span></td><td>'.$obj->fventasdirectas.'</td></tr>';
        $display3 .='</tbody></table>';


        $disp = array();
        $disp['1'] = $display1;
        $disp['2'] = $display2;
        $disp['3'] = $display3;

        return $disp;
    }

}
?>