<?
header("Content-Type: text/html;charset=utf-8");
/* Class name: BODAS
* Description: realiza funciones de las empresas del sistema
* Busqueda, Insercion, Actualizacion, Activar/desactivar usuario
*/
class A_MARKET
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
        //$tmpIns = new A_TABLENAMES("");
        //$tmpIns->set_dataTempresas();
        //$this->arrDataNames = $tmpIns->get_tempresas();
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
     * Obtiene los datos del inversionista
     */
    function get_market($DBcon)
    {
        require_once(C_P_CLASES.'utils/string.functions.php');
        $STR = new STRFN();

        $query = 'SELECT
A.id, A.gnombre, A.ranking, A.eval,
B.id, B.idEmpresa, B.nombre, B.descripcionGeneral, B.video,
C.id, C.idProyecto, C.fechaInicio, C.fechaFin, C.tipo, C.estatus
FROM tempresas AS A
INNER JOIN tproyectos AS B ON A.id = B.idEmpresa
INNER JOIN tsubastas AS C ON B.id = C.idProyecto';

        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $total = $stmt->rowCount();

        if ($total > 0)
        {
            $response['status'] = 'success'; // could not register
            $response['msg'] = 'Se obtuvo la información';
            //$response['data'] = $query;
            $response['data'] = $this->display_data_market($stmt, $total);
        } else {
            $response['status'] = 'error'; // could not register
            $response['msg'] = '¡Ups!, Ocurrio un error';
            $response['data'] = '';
        }

        return $response;
    }


    function display_data_market($stmt, $total)
    {
        // datos generales
        $disp = '';
        $disp1 = ''; //despliega el preview
        $disp2 = ''; // despliega el detalle con video incrustado

        $contLinea = 1;  //por cada 4 se reinicia para linea nueva
        $cont = 0; // contador general
        $endLinea = '</div>';
        $starLinea = '<div class="row">';

        //$disp1.=$starLinea;  //nuevo row
        while ($row = $stmt->fetchObject()) {
            if($contLinea == 1){
                $disp1.=$starLinea;  //nuevo row
            }

            $disp1 .= '<div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="../plugins/images/big/img1.jpg">
                    <div class="white-box">
                        <div class="text-muted"><span class="m-r-10">'.$row->fechaInicio.'</span> <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i>'.$row->fechaFin.'</a></div>
                        <h3 class="m-t-20 m-b-20">'.$row->nombre.'</h3>
                        <p>'.substr($row->descripcionGeneral, 0, 30).'...</p>
                        <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal'.$cont.'" data-whatever="@mdo">Ver más</button>
                      </div>
                    </div>';

            if($contLinea == 4 || $cont == $total) //reinicio contador de row
            {
                $contLinea = 1;
                $disp1.=$endLinea;  //termino row
            }

            $disp2.='<div class="modal fade bs-example-modal-lg" id="exampleModal'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel1">'.$row->nombre.'</h4>
                          </div>
                          <div class="modal-body">
                            <iframe width="98%" height="315" src="'.$row->video.'" frameborder="0" allowfullscreen></iframe>
                            <h4>'.$row->gnombre.'</h4>
                            <p>'.$row->descripcionGeneral.'</p>
                            <div class="demo-tooltip">
                              <div class="tooltip top" role="tooltip">
                                <div class="tooltip-arrow"></div>
                                <div class="tooltip-inner"> '.$row->tipo.' </div>
                              </div>
                              <div class="tooltip top tooltip-primary" role="tooltip">
                                <div class="tooltip-arrow"></div>
                                <div class="tooltip-inner">Inicio: '.$row->fechaInicio.' </div>
                              </div>
                              <div class="tooltip top tooltip-success" role="tooltip">
                                <div class="tooltip-arrow"></div>
                                <div class="tooltip-inner"> Fin: '.$row->fechaFin.' </div>
                              </div>
                              <div class="tooltip top tooltip-warning" role="tooltip">
                                <div class="tooltip-arrow"></div>
                                <div class="tooltip-inner"> '.$row->estatus.' </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">PITCH</button>
                          </div>
                        </div>
                      </div>
                    </div>';
            $contLinea++;
            $cont++;
        }

        $disp = $disp1.$disp2;

        return $disp;
    }

}
?>