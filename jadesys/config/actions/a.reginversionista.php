<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_REG_INV
{
    var $data=array(); # contains field data
    var $dataNames=""; # contains field names
    var $arrDataNames = array();
    var $arrDataNames2 = array();
    var $display="";   # name of program to process form
    var $query = "";
    var $domain = "";
    var $tableName = "";
    var $tableName2 = "";
    var $DBconection = "";
    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
	function __construct($arrData=array())
	{
        $this->data = $arrData;
        $this->tableName = "tinversionistas";
        $this->tableName2 = "tinv_giro";

        require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        $tmpIns = new A_TABLENAMES("");
        $tmpIns->set_dataTinversionistas();
        $this->arrDataNames = $tmpIns->get_tinversionistas();

        $tmpIns->set_dataTinv_giro();
        $this->arrDataNames2 = $tmpIns->get_tinv_giro();

        $this->domain = C_DOMAIN;
     }


    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_data($dato1,$dato2,$dato3,$dato4,$dato5, $dato6, $dato7, $dato8, $dato9, $dato10,
                      $dato11,$dato13)
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
        $this->data['data10'] = $dato10; //ogiro
        $this->data['data11'] = $dato11; //orubrosinteres
        $this->data['data13'] = $dato13; //regdate
    }


    /**
     * Almacena los datos generales del usuario
     *
     */
    function add_dataExtra($dato12, $dato14, $dato15, $dato16, $dato17, $dato18, $dato19, $dato20, $dato21, $dato22, $dato23, $dato24, $dato25,
                           $dato26, $dato27, $dato28)
    {
        $this->data['data12'] = $dato12; //crfc
        $this->data['data14'] = $dato14; //cocupacion
        $this->data['data15'] = $dato15; //cnacionalidad
        $this->data['data16'] = $dato16; //ccurp
        $this->data['data17'] = $dato17; //cdireccionparticular
        $this->data['data18'] = $dato18; //cciudad
        $this->data['data19'] = $dato19; //ccp
        $this->data['data20'] = $dato20; //ctelcasa
        $this->data['data21'] = $dato21; //cmovil
        $this->data['data22'] = $dato22; //cestadocivil
        $this->data['data23'] = $dato23; //cnombreconyugue
        $this->data['data24'] = $dato24; //ccurpconyugue
        $this->data['data25'] = $dato25; //cregimen
        $this->data['data26'] = $dato26; //crfcconyugue
        $this->data['data27'] = $dato27; //clugarnacimientoconyugue
        $this->data['data28'] = $dato28; //cdomicioconyugue

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
                    ," . $this->arrDataNames['data7'] . "," . $this->arrDataNames['data8'] . "
		            ," . $this->arrDataNames['data9'] . "," . $this->arrDataNames['data10'] . "
		            ," . $this->arrDataNames['data13'] . "
		            )
		        VALUES
                    ('" . $this->data['data1'] . "','" . $this->data['data2'] . "'
                    ,'" . $this->data['data3'] . "','" . $this->data['data4'] . "'
                    ,'" . $this->data['data5'] . "','" . $this->data['data6'] . "'
                    ,'" . $this->data['data7'] . "','" . $this->data['data8'] . "'
		            ,'" . $this->data['data9'] . "','" . $this->data['data10'] . "'
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
            //$response['message'] = $STR->setMsgStyle($query, 3);
        }

        $lastId = $DBcon->lastInsertId();

        // inserto los giros seleccionados
        $response = $this->ins_datosGiro($DBcon,$this->data['data11'],$lastId);

        return $response;
	}


    /***
     * Busqueda de usuarios del sistema
     */
    function ins_datosGiro($DBcon,$giros, $idInv)
    {
        //create guid for user confirm
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = "INSERT INTO tinv_giro 
                    (
		            " . $this->arrDataNames2['data1'] . "," . $this->arrDataNames2['data2'] . "
		            )
		        VALUES ";

        $cuantos = count($giros);
        $cuantos = $cuantos -1;
        for ($i=0;$i<count($giros);$i++)
        {
            $query.= " ('" . $idInv . "','" . $giros[$i] . "')";
            if($cuantos == $i)
            {
                $query.= ";";
            }
            else{
                $query.=",";
            }
        }

        $stmt = $DBcon->prepare($query);

        // check for successfull registration
        if ( $stmt->execute() ) {
            $response['status'] = 'success';
            $response['message'] = $STR->setMsgStyle('&nbsp; Registro exitoso, Gracias!');
            $response['URL'] = $this->domain.'desktop.php';
        } else {
            $response['status'] = 'error'; // could not register
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, intente nuevamente más tarde', 3);
            $response['message'] = $STR->setMsgStyle($query, 3);
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
                     " . $this->arrDataNames['data11'] . " ='" . $this->data['data12'] . "'
                    ," . $this->arrDataNames['data12'] . " ='" . $this->data['data14'] . "'
					," . $this->arrDataNames['data13'] . " ='" . $this->data['data16'] . "'
					," . $this->arrDataNames['data14'] . " ='" . $this->data['data15'] . "'
					," . $this->arrDataNames['data15'] . " ='" . $this->data['data17'] . "'
					," . $this->arrDataNames['data16'] . " ='" . $this->data['data18'] . "'
					," . $this->arrDataNames['data17'] . " ='" . $this->data['data19'] . "'
					," . $this->arrDataNames['data18'] . " ='" . $this->data['data20'] . "'
					," . $this->arrDataNames['data19'] . " ='" . $this->data['data21'] . "'
					," . $this->arrDataNames['data20'] . " ='" . $this->data['data22'] . "'
					," . $this->arrDataNames['data21'] . " ='" . $this->data['data23'] . "'
					," . $this->arrDataNames['data22'] . " ='" . $this->data['data24'] . "'
					," . $this->arrDataNames['data23'] . " ='" . $this->data['data25'] . "'
					," . $this->arrDataNames['data24'] . " ='" . $this->data['data26'] . "'
					," . $this->arrDataNames['data25'] . " ='" . $this->data['data27'] . "'
					," . $this->arrDataNames['data26'] . " ='" . $this->data['data28'] . "'
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
            $response['message'] = $STR->setMsgStyle('&nbsp; No se pudo registrar, favor de intentar nuevamente.', 3);
            //$response['message'] = $STR->setMsgStyle('&nbsp; '.$query, 3);
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
    function get_inverionista_data($DBcon, $idUser)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $tabla = 'tinversionistas';

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
            $response['data'] = $this->display_data_inversionista($obj);
        } else {
            $response['status'] = 'error'; // could not register
            $response['msg'] = '¡Ups!, Ocurrio un error';
            $response['data'] = '';
        }

        return $response;
    }


    function display_data_inversionista($obj)
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
        $display2 .='<tr><td>6</td><td><span class="label label-info">País</span></td><td>'.$obj->otelofc.'</td></tr>';
        $display2.='</tbody></table>';

        // datos certificacion
        $display3 .= '<table class="table"><thead><tr><th>#</th><th>Info</th><th>Detail</th></tr></thead><tbody>';
        $display3 .='<tr><td>1</td><td><span class="label label-info">RFC</span></td><td>'.$obj->crfc.'</td></tr>';
        $display3 .='<tr><td>2</td><td><span class="label label-info">CURP</span></td><td>'.$obj->ccurp.'</td></tr>';
        $display3 .='<tr><td>3</td><td><span class="label label-info">Ocupacion</span></td><td>'.$obj->cocupacion.'</td></tr>';
        $display3 .='<tr><td>4</td><td><span class="label label-info">Nacionalidad</span></td><td>'.$obj->cnacionalidad.'</td></tr>';
        $display3 .='<tr><td>5</td><td><span class="label label-info">Dirección Particular</span></td><td>'.$obj->opais.'</td></tr>';
        $display3 .='<tr><td>6</td><td><span class="label label-info">Ciudad</span></td><td>'.$obj->cciudad.'</td></tr>';
        $display3 .='<tr><td>7</td><td><span class="label label-info">C.P.</span></td><td>'.$obj->ccp.'</td></tr>';
        $display3 .='<tr><td>8</td><td><span class="label label-info">Tel. Casa</span></td><td>'.$obj->ctelcasa.'</td></tr>';
        $display3 .='<tr><td>9</td><td><span class="label label-info">Celular</span></td><td>'.$obj->cmovil.'</td></tr>';
        $display3 .='<tr><td>10</td><td><span class="label label-info">Estado Civil</span></td><td>'.$obj->cestadocivil.'</td></tr>';
        $display3 .='<tr><td>11</td><td><span class="label label-info">Nombre Conyugue</span></td><td>'.$obj->cnombreconyugue.'</td></tr>';
        $display3 .='<tr><td>12</td><td><span class="label label-info">RFC Conyugue</span></td><td>'.$obj->crfcconyugue.'</td></tr>';
        $display3 .='<tr><td>13</td><td><span class="label label-info">CURP Conyugue</span></td><td>'.$obj->ccurpconyugue.'</td></tr>';
        $display3 .='<tr><td>14</td><td><span class="label label-info">Regimen</span></td><td>'.$obj->cregimen.'</td></tr>';
        $display3 .='<tr><td>15</td><td><span class="label label-info">Dirección Conyugue</span></td><td>'.$obj->cdomicilioconyugue.'</td></tr>';
        $display3 .='<tr><td>16</td><td><span class="label label-info">Lugar Nacimiento</span></td><td>'.$obj->clugarnacimientoconyugue.'</td></tr>';
        $display3 .='</tbody></table>';


        $disp = array();
        $disp['1'] = $display1;
        $disp['2'] = $display2;
        $disp['3'] = $display3;

        return $disp;
    }

}
?>