<?php
    class RestaurantesController extends Controller{
        public function __construct($parametro) {
            parent::__construct("restaurantes",$parametro, true);
        }

    }



?>