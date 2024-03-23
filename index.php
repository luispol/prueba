<?php
define("URL","/prueba/");
include_once("app/controllers/controller.php");
include_once("app/controllers/errorescontroller.php");
$url=$_GET["action"] ?? "";
$url=rtrim($url,"/");
//Transformacion a vector para poder separarlo
$url=explode("/",$url);
//print_r($url);
if (empty($url[0])) {
    //echo "Metodo main";
    $archivoController="app/controllers/dashboard";
    $url[0]="dashboard";
}else {
    $archivoController="app/controllers/{$url[0]}";
}

$archivoController.="controller.php";
//echo $archivoController;
if (file_exists($archivoController)) {
    require_once $archivoController;
    $url[0].="controller";
    $parametro=$url[1] ?? "";
    new $url[0]($parametro);
} else {
    new ErroresController();
}




?>