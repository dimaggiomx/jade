<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: TABLAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_TABLENAMES
{
    var $tblusers=array(); # contains field names
    var $tempresas=array(); # contains field names
    var $tinversionistas=array(); # contains field names
    var $tproyectos=array(); # contains field names
    var $tmensajes=array(); # contains field names
    var $tmsgtype=array(); # contains field names
    var $tnotify=array(); # contains field names
    var $tsubastas=array(); # contains field names
    var $tinv_giro=array(); # contains field names
    var $tuploads=array(); # contains field names
    var $tuplproy=array(); # contains field names
    var $tprimer_p=array(); # contains field names

    /* Constructor: User passes in the name of the script where
    * form data is to be sent ($processor) and the value to show
    * on the submit button.
    */
    function __construct($arrData=array())
    {
        //$this->data = $arrData;

        $arrTblusers=array();
        $arrTempresas=array();
        $arrTinversionistas=array();
        $arrTproyectos=array();
        $arrTmensajes=array();
        $arrTmsgtype=array();
        $arrTnotify=array();
        $arrTsubastas=array();
        $arrTinv_giro=array();
        $arrTuploads = array();
        $arrTuplproy = array();
        $arrTprimer_p = array();

        //inicializa nombres de tablas
        $this->tblusers = $arrTblusers;
        $this->tempresas = $arrTempresas;
        $this->tinversionistas = $arrTinversionistas;
        $this->tproyectos = $arrTproyectos;
        $this->tmensajes = $arrTmensajes;
        $this->tmsgtype = $arrTmsgtype;
        $this->tnotify = $arrTnotify;
        $this->tsubastas = $arrTsubastas;
        $this->tinv_giro=$arrTinv_giro;
        $this->tuploads=$arrTuploads;
        $this->tuplproy=$arrTuplproy;
        $this->tprimer_p=$arrTprimer_p;

    }

    /**
     * Almacena los datos de la tabla tempresas
     */
    function set_dataTempresas()
    {
        $this->tempresas['data1'] = 'iduser';
        $this->tempresas['data2'] = 'gnombre';
        $this->tempresas['data3'] = 'gresponsablelegal';
        $this->tempresas['data4'] = 'odireccion';
        $this->tempresas['data5'] = 'ocolonia';
        $this->tempresas['data6'] = 'ociudad';
        $this->tempresas['data7'] = 'oestado';
        $this->tempresas['data8'] = 'opais';
        $this->tempresas['data9'] = 'otelofc';
        $this->tempresas['data10'] = 'otelmovil';
        $this->tempresas['data11'] = 'ogiro';
        $this->tempresas['data12'] = 'oproducto';
        $this->tempresas['data13'] = 'oprodfabricacion';
        $this->tempresas['data14'] = 'oprodcomercializacion';
        $this->tempresas['data15'] = 'oactividades';
        $this->tempresas['data16'] = 'ofechaconstitucion';

        $this->tempresas['data17'] = 'regdate';

        $this->tempresas['data18'] = 'fventasneta';
        $this->tempresas['data19'] = 'futilidadneta';
        $this->tempresas['data20'] = 'futilidadventa';
        $this->tempresas['data21'] = 'fcapitaltrabajo';
        $this->tempresas['data22'] = 'findiceliquidez';
        $this->tempresas['data23'] = 'fcostoventas';
        $this->tempresas['data24'] = 'futilidadbruta';
        $this->tempresas['data25'] = 'fdepreciacion';

        $this->tempresas['data26'] = 'fgastosoperacion';
        $this->tempresas['data27'] = 'futilidadoperacion';
        $this->tempresas['data28'] = 'futilidadnetafinal';
        $this->tempresas['data29'] = 'fventasdirectas';
        $this->tempresas['data30'] = 'ranking';
        $this->tempresas['data31'] = 'eval';

        $this->tempresas['data32'] = 'cuenta';

    }

    /**
     * Almacena los datos de la tabla tinversionistas
     */
    function set_dataTinversionistas()
    {
        $this->tinversionistas['data1'] = 'iduser';
        $this->tinversionistas['data2'] = 'gnombre';
        $this->tinversionistas['data3'] = 'gresponsablelegal';
        $this->tinversionistas['data4'] = 'odireccion';
        $this->tinversionistas['data5'] = 'ocolonia';
        $this->tinversionistas['data6'] = 'ociudad';
        $this->tinversionistas['data7'] = 'oestado';
        $this->tinversionistas['data8'] = 'opais';
        $this->tinversionistas['data9'] = 'otelofc';
        $this->tinversionistas['data10'] = 'ogiro';

        $this->tinversionistas['data11'] = 'crfc';
        $this->tinversionistas['data12'] = 'cocupacion';
        $this->tinversionistas['data13'] = 'cnacionalidad';
        $this->tinversionistas['data14'] = 'ccurp';
        $this->tinversionistas['data15'] = 'cdireccionparticular';
        $this->tinversionistas['data16'] = 'cciudad';
        $this->tinversionistas['data17'] = 'ccp';
        $this->tinversionistas['data18'] = 'ctelcasa';
        $this->tinversionistas['data19'] = 'cmovil';
        $this->tinversionistas['data20'] = 'cestadocivil';
        $this->tinversionistas['data21'] = 'cnombreconyugue';
        $this->tinversionistas['data22'] = 'ccurpconyugue';
        $this->tinversionistas['data23'] = 'cregimen';
        $this->tinversionistas['data24'] = 'crfcconyugue';
        $this->tinversionistas['data25'] = 'clugarnacimientoconyugue';
        $this->tinversionistas['data26'] = 'cdomicilioconyugue';
        $this->tinversionistas['data27'] = 'ranking';
        $this->tinversionistas['data28'] = 'regdate';

        $this->tinversionistas['data29'] = 'cuenta';


    }

    /**
     * Almacena los datos de la tabla tinversionistas
     */
    function set_dataTproyectos()
    {
        $this->tproyectos['data1'] = 'idEmpresa';
        $this->tproyectos['data2'] = 'nombre';
        $this->tproyectos['data3'] = 'actividadEconomica';
        $this->tproyectos['data4'] = 'descripcionGeneral';
        $this->tproyectos['data5'] = 'video';
        $this->tproyectos['data6'] = 'regDate';
        $this->tproyectos['data7'] = 'monto';
    }

    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTblusers()
    {
        $this->tblusers['data1'] = 'usuario';
        $this->tblusers['data2'] = 'password';
        $this->tblusers['data3'] = 'privilegio';
        $this->tblusers['data4'] = 'estatus';
        $this->tblusers['data5'] = 'regDate';
        $this->tblusers['data6'] = 'nombre';
        $this->tblusers['data7'] = 'guid';
    }

    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTmensajes()
    {
        $this->tmensajes['data1'] = 'iduser';
        $this->tmensajes['data2'] = 'title';
        $this->tmensajes['data3'] = 'mensaje';
        $this->tmensajes['data4'] = 'regDate';
        $this->tmensajes['data5'] = 'estatus';
    }


    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTmsgtype()
    {
        $this->tmsgtype['data1'] = 'id';
        $this->tmsgtype['data2'] = 'tipo';
        $this->tmsgtype['data3'] = 'msg';
        $this->tmsgtype['data4'] = 'estatus';
    }

    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTnotify()
    {
        $this->tnotify['data1'] = 'id';
        $this->tnotify['data2'] = 'idusuario';
        $this->tnotify['data3'] = 'idmsgtype';
        $this->tnotify['data4'] = 'regDate';
        $this->tnotify['data5'] = 'link';
        $this->tnotify['data6'] = 'estatus';
        $this->tnotify['data7'] = 'complemento';
    }

    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTprimer_p()
    {
        $this->tprimer_p['data1'] = 'idUsuario';
        $this->tprimer_p['data2'] = 'preg1';
        $this->tprimer_p['data3'] = 'preg2';
        $this->tprimer_p['data4'] = 'preg3';
        $this->tprimer_p['data5'] = 'preg4';
        $this->tprimer_p['data6'] = 'preg5';
        $this->tprimer_p['data7'] = 'preg6';
        $this->tprimer_p['data8'] = 'preg7';
        $this->tprimer_p['data9'] = 'preg8';
        $this->tprimer_p['data10'] = 'regDate';
    }



    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTsubastas()
    {
        $this->tsubastas['data1'] = 'idProyecto';
        $this->tsubastas['data2'] = 'fechaInicio';
        $this->tsubastas['data3'] = 'fechaFin';
        $this->tsubastas['data4'] = 'tipo';
        $this->tsubastas['data5'] = 'regDate';
        $this->tsubastas['data6'] = 'estatus';
    }

    /**
     * Almacena los datos de la tabla tlbusers
     */
    function set_dataTinv_giro()
    {
        $this->tinv_giro['data1'] = 'idinv';
        $this->tinv_giro['data2'] = 'idgiro';
    }


    /**
     * Almacena los datos de la tabla tuploads
     */
    function set_dataTuploads()
    {
        $this->tuploads['data1'] = 'idUsuario';
        $this->tuploads['data2'] = 'filePath';
        $this->tuploads['data3'] = 'regDate';
        $this->tuploads['data4'] = 'status';
        $this->tuploads['data5'] = 'tipo';
    }


    /**
     * Almacena los datos de la tabla tuplproy
     */
    function set_dataTuplproy()
    {
        $this->tuplproy['data1'] = 'idProyecto';
        $this->tuplproy['data2'] = 'idUpload';
    }

    function get_tempresas()
    {
        return $this->tempresas;
    }

    function get_tuploads()
    {
        return $this->tuploads;
    }


    function get_tprimer_p()
    {
        return $this->tprimer_p;
    }


    function get_tuplproy()
    {
        return $this->tuplproy;
    }

    function get_tinversionistas()
    {
        return $this->tinversionistas;
    }

    function get_tproyectos()
    {
        return $this->tproyectos;
    }

    function get_tblusers()
    {
        return $this->tblusers;
    }

    function get_tmensajes()
    {
        return $this->tmensajes;
    }


    function get_tmsgtype()
    {
        return $this->tmsgtype;
    }

    function get_tnotify()
    {
        return $this->tnotify;
    }

    function get_tsubastas()
    {
        return $this->tsubastas;
    }

    function get_tinv_giro()
    {
        return $this->tinv_giro;
    }

}
?>