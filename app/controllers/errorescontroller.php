<?php

    class ErroresController{
        public function __construct($error="Page not found")  {
            echo "<h1>$error</h1>";
        }
    }


?>