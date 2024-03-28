<?php

    require_once "app/models/reportesmodel.php";
    //require_once "app/views/sections/css.php";
    require_once "vendor/autoload.php";
    class ReportesController extends Controller{
        private $reporte;
        public function __construct($parametro) {
            $this->reporte=new Reportes();
            parent::__construct("reportes",$parametro,true);
        }

        public function getReport(){
            $records=$this->reporte->getRestaurantesReport($_GET);
            //print_r($records);
            $htmlHeader="
                <h1>Administración de Restaurantes</h1>
                <h3>Listado de productos por restaurante</h3>
                ";
                //Cuerpo del reporte
                $html="
                    <table width='800px' cellspacing='0' border='1'>
                        <thead>
                            <tr style='color:black; background-color:#E0E0E0'>
                                <th>Corr</th>
                                <th>Nombre de restaurantes</th>
                                <th>Productos</th>
                            </tr>
                        </thead>
                        <tbody>
                ";
                foreach ($records as $key => $value) {
                    $html.="
                        <tr>
                            <td>".($key+1)."</td>
                            <td>{$value["nombre_restaurante"]}</td>
                            <td>{$value["Productos"]}</td>
                        </tr>
                    ";
                }
                $html.="</tbody></table>";
                //echo $htmlHeader.$html;
                $mpdfConfig=array(
                    'mode'=>'utf-8',
                    'format'=>'Letter',
                    'default_font_size'=>0,
                    'default_font'=>'',
                    'margin_left'=>10,
                    'margin_right'=>10,
                    'margin_top'=>40,
                    'margin_header'=>10,
                    'margin_footer'=>20,
                    'orientation'=>'P'
                );
                $mpdf=new \Mpdf\Mpdf($mpdfConfig);
                $mpdf->SetHTMLHeader($htmlHeader);
                $mpdf->WriteHTML($html);
                $mpdf->Output('reporteRestaurantes.pdf','I');
        }

    }


?>