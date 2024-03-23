<?php

    class MainController extends Controller{
        public function __construct($parametro) {
            parent::__construct("main",$parametro);
            
        }


        public function listar() {
            echo "Generando un listado de restaurantes";
        }

    }



?>