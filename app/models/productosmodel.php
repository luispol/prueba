<?php

include_once "app/models/db.class.php";
class Productos extends BaseDeDatos{

    //Crear el metodo constructor
    public function __construct() {
        parent::conectar();
    }



    public function getAll(){
        return $this->executeQuery("select idproducto, rt.nombre_restaurante, pr.nombre, pr.precio
        from productos as pr left join restaurantes as rt on pr.idrestaurante = rt.idrestaurante");
    }


    public function getProductoByName($producto){
        return $this->executeQuery("select idproducto, nombre, descripcion, foto1,
        foto2, foto3, precio from productos where nombre='{$producto}'");
    }

    public function save($data,$foto1,$foto2,$foto3)  {
        return $this->executeInsert("
            insert into productos set
            idrestaurante='{$data["idrestaurante"]}',
            nombre='{$data["nombre"]}',
            descripcion='{$data["descripcion"]}',
            foto1='{$foto1}',
            foto2='{$foto2}',
            foto3='{$foto3}',
            precio='{$data["precio"]}'
        ");
    }

    public function saveIngredientes($data)  {
        return $this->executeInsert("
            insert into ingredientes set
            idproducto='{$data["idproducto_ingrediente"]}',
            descripcion='{$data["descripcion"]}',
            costo_adicional='{$data["costoAdicional"]}'
        ");
    }

    public function getOneProducto($id) {
        return $this->executeQuery("select idproducto, idrestaurante, nombre, descripcion, foto1, foto2,
        foto3, precio from productos where idproducto='{$id}'");
    }

    public function update($data,$foto1,$foto2,$foto3)  {
        return $this->executeInsert("
            update productos set
            idrestaurante='{$data["idrestaurante"]}',
            nombre='{$data["nombre"]}',
            descripcion='{$data["descripcion"]}',
            foto1=if('{$foto1}'='',foto1,'{$foto1}'),
            foto2=if('{$foto2}'='',foto2,'{$foto2}'),
            foto3=if('{$foto3}'='',foto3,'{$foto3}'),
            precio='{$data["precio"]}'
            where idproducto='{$data["idproducto"]}'
        ");
    }

    public function deleteProducto($id){
        return $this->executeInsert("delete from productos where idproducto=$id");
    }

}