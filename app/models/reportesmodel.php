<?php

    include_once "app/models/db.class.php";
    class Reportes extends BaseDeDatos{

        //Crear el metodo constructor
        public function __construct() {
            parent::conectar();
        }

        public function getRestaurantesReport($data){
            $condicion="";
            if ($data["idrestaurante"]!="0") {
                $condicion.=" and rt.idrestaurante={$data["idrestaurante"]}";
            }

            if ($data["idproducto"] != "0") {
                $condicion.=" and pr.idproducto={$data["idproducto"]}";
            }

            if ($data["fechaInicio"] != "" && $data["fechaFinal"] != "") {
                $fechaInicio = $data["fechaInicio"];
                $fechaFinal = $data["fechaFinal"];
                $condicion.=" and rt.fecha_ingreso BETWEEN '$fechaInicio' and '$fechaFinal'";
            } else {
                $condicion.=" ";
            }

            return $this->executeQuery("SELECT rt.nombre_restaurante,
                IFNULL(GROUP_CONCAT(DISTINCT pr.nombre SEPARATOR ', '), 'Sin producto agregados' ) AS 'Productos'
                from restaurantes as rt left join productos as pr on rt.idrestaurante=pr.idrestaurante
                where 1=1 $condicion
                GROUP BY rt.nombre_restaurante");
        }

        
    }

?>
