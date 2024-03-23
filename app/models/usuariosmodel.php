<?php

    include_once "app/models/db.class.php";
    class Usuarios extends BaseDeDatos{
        //creacion del metodo constructor
        public function __construct() {
            parent::conectar();
        }

        public function validarLogin($user,$pass) {
            //Ejecutamos consulta para poder verificar si el usuario existe o no
            $result=$this->conexion->query("select id_user, usuario, nombres, apellidos, tipo from usuarios where 
            usuario='$user' and password=sha1('$pass')");
            if ($record=$result->fetch_assoc()) {
                return $record;
            } else {
                return false;
            }
        }

    }



?>