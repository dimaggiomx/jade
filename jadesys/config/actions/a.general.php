<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: GENERAL
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_REG_GEN
{
    var $data=array(); # contains field data
    var $dataNames=""; # contains field names
    var $arrDataNames = array();
    var $display="";   # name of program to process form
    var $query = "";
    var $domain = "";
    var $DBconection = "";
    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
    function __construct($arrData=array())
    {
        $this->data = $arrData;
        //$this->tableName = "tmensajes";

        //require_once(C_P_CLASES.'utils/tables.names.php');
        //inicializo nombres de campos de tabla
        //$tmpIns = new A_TABLENAMES("");
        //$tmpIns->set_dataTmensajes();
        //$this->arrDataNames = $tmpIns->get_tmensajes();
        $this->domain = C_DOMAIN;

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
     * Verifica si el registro esta completo o aún faltan el tercer paso de formularios a llenar
     */
    function check_status_record($DBcon, $tipoUser, $idUser)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $tabla = 'tempresas';
        if($tipoUser=='B')
        {
            $tabla='tinversionistas';
        }

        // estatus = 1 significa que falta completar el 3er formulario
        // estatus = 2 significa que el registro esta completo
       $query= "SELECT id, estatus FROM ".$tabla."
                WHERE iduser='".$idUser."'";

        $stmt = $DBcon->prepare($query);
        $stmt->execute();


        if ($stmt->rowCount() == 1) {

            // obtengo estatus del registro
            // 0 = inactivo, 1=activo, 2 = completo, 3=validado
            $obj = $stmt->fetchObject();
            $estatus = $obj->estatus;

            if($estatus == 1)
            {
                $response['URL'] = 'Recuerda <a href="step3_'.$tabla.'.php" target="_self"> COMPLETAR </a> tu registro';
            }elseif ($estatus == 2)
            {
                $response['URL'] = '¡Tu registro esta siendo validado!';
            }elseif ($estatus == 3)
            {
                $response['URL'] = '¡Felicidades!, tu registro esta Completo.   =)';
            }


            $response['status'] = 'success'; // could not register


        } else {
            $response['status'] = 'error'; // could not register
            $response['URL'] = '¡Ups!, Ocurrio un error';

        }

        return $response;
    }


}
?>