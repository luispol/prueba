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


        public function executeQuery($query) {
            $result=$this->conexion->query($query);
            echo $this->conexion->error;
            $records=array();
            while ($record=$result->fetch_assoc()) {
                $records[]=$record;
            }
            return $records;
        }

        public function executeInsert($query){
            $result=$this->conexion->query($query);
            echo $this->conexion->error;
            return $this->conexion->insert_id;
        }

    }


?>