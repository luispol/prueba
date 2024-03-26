<?php
    include_once "app/models/restaurantesmodel.php";
    class RestaurantesController extends Controller{
        private $restaurante;
        public function __construct($parametro) {
            $this->restaurante=new Restaurantes();
            parent::__construct("restaurantes",$parametro, true);
        }

        public function getAll()  {
            $records=$this->restaurante->getAll();
            $info=array('success'=>true,'records'=>$records);
            echo json_encode($info);
        }


        

        public function save()  {
            $img="";
            if (isset($_FILES)) {
                if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
                    if ($_FILES["foto"]["type"]=="image/png" || $_FILES["foto"]["type"]=="image/jpeg") {
                        copy($_FILES["foto"]["tmp_name"],__DIR__."/../../public_html/fotos/".$_FILES["foto"]["name"])
                        or die("No se pudo copiar el archivo");
                        $img=URL."public_html/fotos/".$_FILES["foto"]["name"];
                    }
                }
            }
            if ($_POST["idrestaurante"]=="0") {
                $datosRestaurante=$this->restaurante->getRestauranteByName($_POST["nombre"]);
                if (count($datosRestaurante)>0) {
                    $info=array('success'=>false,'msg'=>"El restaurante ya existe");   
                }else {
                    $cod=$this->restaurante->save($_POST,$img);
                    $info=array('success'=>true,'msg'=>"Registro guardado con exito");
                }
                
            }else {
                $this->restaurante->update($_POST,$img);
                $info=array('success'=>true,'msg'=>"Registro actualizado con exito");
            }
            echo json_encode($info);
        }

        public function getOneRestaurante(){
            $records=$this->restaurante->getOneRestaurante($_GET["id"]);
            if (count($records)>0) {
                $info=array('success'=>true,'records'=>$records);
            }else {
                $info=array('success'=>false,'msg'=>"El restaurante no existe");
            }
            echo json_encode($info);
        }

        public function deleteRestaurante() {
            $records=$this->restaurante->deleteRestaurante($_GET["id"]);
            $info=array('success'=>true,'msg'=>"Restaurante eliminado con exito");
            echo json_encode($info);
        }

    }



?>