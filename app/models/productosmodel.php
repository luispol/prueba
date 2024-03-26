<?php

include_once "app/models/db.class.php";
class Productos extends BaseDeDatos{

    //Crear el metodo constructor
    public function __construct() {
        parent::conectar();
    }


}