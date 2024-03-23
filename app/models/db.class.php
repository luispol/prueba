<?php

    class BaseDeDatos{

        protected $conexion;
        protected $isConnected=false;

       
        //Metodo para establecer la conexion a la base de datos
        public function conectar(){
            $this->conexion=new mysqli("localhost","userrestaurante","123456","pedidos");
            if ($this->conexion->connect_errno) {
                echo "Error de conexion{$this->conexion->connect_error}";
                $this->isConnected=false;
            }else {
                $this->isConnected=true;
            }
            return $this->isConnected;
        }

    }


?>