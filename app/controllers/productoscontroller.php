<?php
    include_once "app/models/productosmodel.php";
    class ProductosController extends Controller{
        private $producto;

        public function __construct($parametro) {
            $this->producto=new Productos();
            parent::__construct("productos",$parametro, true);
        }
}

?>