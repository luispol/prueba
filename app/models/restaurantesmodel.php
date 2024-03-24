<?php

include_once "app/models/db.class.php";
class Restaurantes extends BaseDeDatos{

    //Crear el metodo constructor
    public function __construct() {
        parent::conectar();
    }

    public function getAll(){
        return $this->executeQuery("select idrestaurante, nombre_restaurante, direccion, telefono, 
        contacto, fecha_ingreso from restaurantes order by idrestaurante");
    }

    public function getRestauranteByName($restaurante){
        return $this->executeQuery("select idrestaurante, nombre_restaurante, direccion, telefono,
        contacto, foto, fecha_ingreso, latitud, longitud from restaurantes where nombre_restaurante='{$restaurante}'");
    }

    public function save($data,$img) {
        return $this->executeInsert("insert into restaurantes set 
            nombre_restaurante='{$data["nombre"]}',
            direccion='{$data["direccion"]}',
            telefono='{$data["telefono"]}',
            contacto='{$data["contacto"]}',
            foto='{$img}',
            fecha_ingreso='{$data["fechaIngreso"]}',
            latitud='{$data["latitud"]}',
            longitud='{$data["longitud"]}'
        ");
    }


}


?>