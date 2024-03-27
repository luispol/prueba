<?php
    include_once "app/models/productosmodel.php";
    class ProductosController extends Controller{
        private $producto;

        public function __construct($parametro) {
            $this->producto=new Productos();
            parent::__construct("productos",$parametro, true);
        }

        public function getAll()  {
            $records=$this->producto->getAll();
            $info=array('success'=>true,'records'=>$records);
            echo json_encode($info);
        }

        public function saveIngredientes()  {
            $records=$this->producto->saveIngredientes($_POST);
            $info=array('success'=>true,'records'=>$records);
            echo json_encode($info);
        }


        public function saveProducto()  {
            $foto1=$this->saveImage("foto1");
            $foto2=$this->saveImage("foto2");
            $foto3=$this->saveImage("foto3");

            if ($_POST["idproducto"]=="0") {
                $datosProducto=$this->producto->getProductoByName($_POST["nombre"]);
                if (count($datosProducto)>0) {
                    $info=array('success'=>false,'msg'=>"El producto ya existe");   
                }else {
                    $cod=$this->producto->save($_POST,$foto1,$foto2,$foto3);
                    $info=array('success'=>true,'records' => $_POST, 'idproducto' => $cod);
                }
                
            }else {
                $this->producto->update($_POST,$foto1,$foto2,$foto3);
                $info=array('success'=>true,'msg'=>"Registro actualizado con exito", 'records' => $_POST, 'idproducto' => $cod);
            }
            echo json_encode($info);
        }

        private function saveImage($file){
            $img="";
            if (isset($_FILES)) {
                if (is_uploaded_file($_FILES[$file]["tmp_name"])) {//tmpname, guarda la carpeta temporal que esta en nuestro servidor
                    if (($_FILES[$file]["type"]=="image/png") || ($_FILES[$file]["type"]=="image/jpeg") ) {
                        copy($_FILES[$file]["tmp_name"],__DIR__."/../../public_html/fotos/".$_FILES[$file]["name"]) or die("No se pudo copiar el archivo");//Name e el nombre dela rchivo tal cual nosotros lo subimos desde la aplicacion
                        $img=URL."public_html/fotos/".$_FILES[$file]["name"];//Esta se guarda en la base de datos
                    }
                }
            } 
            return $img;
        }

        public function getOneProducto() {
            $records=$this->producto->getOneProducto($_GET["id"]);
            if (count($records)>0) {
                $info=array('success'=>true,'records'=>$records);
            }else {
                $info=array('success'=>false,'msg'=>"El producto no existe");
            }
            echo json_encode($info);
        }

        public function deleteProducto() {
            $records=$this->producto->deleteProducto($_GET["id"]);
            $info=array('success'=>true,'msg'=>"Producto eliminado con exito");
            echo json_encode($info);
        }

        
}

?>