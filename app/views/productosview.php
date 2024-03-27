<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php include_once "app/views/sections/css.php";?>
    <?php include_once "app/views/sections/title.php";?>

    <style> 
        .dataTables_scrollBody {
            max-height: 45svh !important;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">
        <?php include_once "app/views/sections/opciones.php";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include_once "app/views/sections/header.php";?>
                <div class="container-fluid">
                    <div id="contentList">
                        <div class="card shadow" style="height: auto;" >
                            <div class="card-header d-inline-flex py-3" style="height: auto;margin-bottom: -32px;">
                                <div class="col-md-6 text-nowrap">
                                    <p class="text-primary m-0 fw-bold" style="padding-right: 10px;">Tabla de información de Productos ingresados</p>
                                </div>
                                <div class="col-md-6 text-nowrap">
                                    <button class="btn btn-primary btn-sm float-end" style="height: 35px;width: 115px;margin-top: 0px;margin-bottom: -1px;padding-left: 0px;padding-right: 0px; background-color:red; border-color:red;" id="btnAgregar">Registrar&nbsp;</button>
                                </div>
                            </div>

                            <div class="card-body mt-3" style="height: auto;">
                                <div class="table-responsive flex-grow-0 flex-shrink-0 table" id="contentTable" role="grid" aria-describedby="dataTable_info" style="width: auto;margin: auto;margin-left: 0px;margin-right: 0px;display: block;position: static;">
                                    <table class="table table-borderless my-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 50px;height: auto;">Corre-lativo</th>
                                                <th style="width: 150px;height: auto;">Nombre de restaurante</th>
                                                <th style="width: auto;height: auto;">Nombre</th>
                                                <th style="width: auto;height: auto;">Precio</th>
                                                <th style="width: auto;">Otras Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                
                                            <tr style="height: auto;width: auto;">
                                                <td style="width: 50px;max-width: 80px;height: auto;">1</td>
                                                <td style="width: auto;max-width: 130px;height: auto;">Pizza Hut</td>
                                                <td style="width: auto;max-width: 130px;height: auto;">Jamon</td>
                                                <td style="width: auto;transform-origin: 57px 247px;max-width: 130px;height: auto;">0.50</td>
                                                <td style="width: 105.0469px;text-align: center;position: static;display: flex;height: auto;"><button class="btn btn-primary gamanet-btn-icon-primary" type="button" style="background: rgb(28,200,138);width: 100px;"><img src="<?php echo URL;?>public_html/assets/img/icons/icons8-edit-50.png?h=c44442844c7a03a126d8156e9370bed5"></button>
                                                    <div class="d-none d-sm-block topbar-divider" style="padding: 3px;"></div><button class="btn btn-primary gamanet-btn-icon-primary-dest" type="button" style="width: 100px;"><img src="<?php echo URL;?>public_html/assets/img/icons/icon_trash-2.svg?h=0038eaaaaf12fe8bfcb4be1c39111dab" width="24" height="24"></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    



                        
                    </div>
                    <div class="container-fluid d-none" id="contentForm">
                        <h3 class="text-dark mb-4">Crear - Registro de Producto</h3>
                        <div class="card shadow">
                            <div class="card-header py-3" style="width: auto;">
                                <p class="text-primary m-0 fw-bold">Ingresar información de Producto</p>
                            </div>
                            <div class="card-body" style="width: auto;height: 1060px;">
                            <form id="formProductos">
                                <div class="col" style="width: auto;">
                                    <div class="card shadow mb-3" style="height: 158px;width: auto;">
                                        <div class="card-header py-3" style="width: auto;padding: 16px;">
                                            <p class="text-primary m-0 fw-bold" style="height: 16px;width: 557.312px;padding: 0px;margin: 0px;">Información principal</p>
                                        </div>
                                        <div class="card-body" style="height: -2px;padding-bottom: 0px;width: 967px;">
                                        <div style="width: auto;height: 255px;">
                                                <div class="row" style="width: auto;">
                                                    <div class="col" style="width: auto;">
                                                        <div class="mb-3"><label class="form-label"><strong>Nombre del producto:&nbsp;<span style="color: rgb(24, 27, 69);">*</span></strong></label>
                                                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Producto" required></div>
                                                        <input type="hidden" name="idproducto" id="idproducto" value="0">
                                                    </div>
                                                    <div class="col" style="padding-top: 20px;width: auto;">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col-xxl-9 me-2" style="width: 340px;"><span class="text-xs"></span></div>
                                                        </div>
                                                        <div class="mb-3"></div>
                                                    </div>
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow" style="width: auto;height: 850px;">
                                        <div class="card-header py-3" style="width: auto;">
                                            <p class="text-primary m-0 fw-bold">Información adicional</p>
                                        </div>
                                        <div class="card-body" style="height: -1px;padding-bottom: 0px;width: 967px;">
                                            <div style="width: auto;height: 400px;">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="restaurante">
                                                            <strong>Restaurante:</strong></label>
                                                            <select class="form-select form-select-sm" style="width: 410px;" id="idrestaurante" name="idrestaurante">
                                                                <option value="Pizza Hut">Pizza Hut</option>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="mb-3"><label class="form-label" for="descripcion"><strong>Descripcion:</strong></label><input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripcion"></div>


                                                        <div class="row">
                                                            <div class="col">
                                                                <div ><label class="form-label" for="foto1"><strong>Foto 1:</strong></label></div>
                                                                <div class="img-thumbnail" id="divFoto1" style="width:200px; height:200px">
                                                                </div>
                                                                <span>
                                                                    Haga click para seleccionar la foto
                                                                </span>
                                                                <input class="form-control d-none" type="file" id="foto1"  name="foto1" >
                                                            </div>               
                                                        </div>



                                                        <div class="row">
                                                            <div class="col">
                                                                <div ><label class="form-label" for="foto2"><strong>Foto 2:</strong></label></div>
                                                                <div class="img-thumbnail" id="divFoto2" style="width:200px; height:200px">
                                                                </div>
                                                                <span>
                                                                    Haga click para seleccionar la foto
                                                                </span>
                                                                <input class="form-control d-none" type="file" id="foto2"  name="foto2" >
                                                            </div>               
                                                        </div>

                        


                                                    </div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div ><label class="form-label" for="foto3"><strong>Foto 3:</strong></label></div>
                                                                <div class="img-thumbnail" id="divFoto3" style="width:200px; height:200px">
                                                                </div>
                                                                <span>
                                                                    Haga click para seleccionar la foto
                                                                </span>
                                                                <input class="form-control d-none" type="file" id="foto3"  name="foto3" >
                                                            </div>               
                                                        </div>
                                                            <div class="mb-3"><label class="form-label" for="precio"><strong>Precio:</strong></label><input class="form-control" type="text" name="precio" id="precio" placeholder="Precio ($)"></div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="mb-3"></div>
                                                <div class="mb-3">
                                                    <button class="btn btn-dark btn-sm mt-3" type="button" name="btnCancelar" id="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                                                    

                                                    <button class="btn btn-danger btn-sm mt-3" type="submit" id="btnIngrediente"
                                                            name="btnIngrediente" data-bs-target="#modalIngredientes"
                                                            data-bs-toggle="modal">
                                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i> Agregar Ingrediente</button>
                                                    <button class="btn btn-danger btn-sm mt-3" type="submit" name="terminar" id="terminar"><i class="fa fa-check" aria-hidden="true"></i> Terminar</button>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </form>

                        
                            <form id="formIngredientes" method="POST">
                                                <div class="modal fade" role="dialog" tabindex="-1" id="modalIngredientes"
                                                    name="modalIngredientes"
                                                    style="/*width: 1294px;*/border-color: rgb(174,175,179);border-top-color: rgb(133,;border-right-color: 135,;border-bottom-color: 150);border-left-color: 135,;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="width: 466px;height: 29.7969px;margin-top: 8px;">
                                                                <h4 class="fs-4">Agrega información de Ingredientes:</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" id="idproducto_ingrediente" name="idproducto_ingrediente"
                                                                    value="0">
                                                            
                                                                <div class="d-flex mb-3"><label class="form-label"
                                                                        style=""><strong>Descripcion:</strong></label><input
                                                                        class="form-control" type="text" id="descripcion"
                                                                        placeholder="Jamon" name="descripcion"
                                                                        style="width: 319px;margin-top: -8px;margin-left: 10px;">
                                                                </div>
                                        
                                                                <div class="d-flex mb-3"><label class="form-label"
                                                                        style="margin-right: 15px;width: 134.312px;"><strong>Costo adicional</strong></label><input
                                                                        class="form-control" type="text" id="costoAdicional"
                                                                        placeholder="$0.00" name="costoAdicional"
                                                                        style="width: 319px;margin-top: -8px;margin-left: 0px;">
                                                                </div>

                                                                <button class="btn btn-primary btn-sm" type="submit"
                                                                    data-bs-target="" data-bs-toggle="" id="btnDetalleModal"
                                                                    name="btnDetalleModal"
                                                                    style="height: 50px;width: 120px;margin-top: 0px;margin-right: 16px;background: rgb(249, 39, 39);border-style: none;">Guardar Ingrediente</button><button class="btn btn-primary btn-sm"
                                                                    type="button" data-bs-dismiss="modal"
                                                                    style="height: 50px;width: 120px;margin-top: 0px;background: rgb(222,222,222);color: rgb(0,0,0);border-color: rgb(254,254,254);">Salir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                            </form>
                            </div>
                        </div> 

                        
                        
                        
                    </div>

                    
                </div>
                
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <?php include_once "app/views/sections/footer.php";?>
    </div>
    <?php include_once "app/views/sections/scripts.php"?>
    <script src="<?php echo URL;?>public_html/customjs/productos.js"></script>
</body>

</html>