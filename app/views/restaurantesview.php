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
                                    <p class="text-primary m-0 fw-bold" style="padding-right: 10px;">Tabla de información de Restaurantes ingresados</p>
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
                                                <th style="width: auto;height: auto;">Dirección</th>
                                                <th style="width: 140px;">Teléfono</th>
                                                <th style="width: auto;">Contacto</th>
                                                <th style="width: auto;">Fecha de ingreso</th>
                                                <th style="width: auto;">Otras Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                
                                            <tr style="height: auto;width: auto;">
                                                <td style="width: 50px;max-width: 80px;height: auto;">1</td>
                                                <td style="width: auto;max-width: 130px;height: auto;">Pizza Hut</td>
                                                <td style="width: auto;max-width: 130px;height: auto;">Santa ana, Santa Ana</td>
                                                <td style="width: auto;transform-origin: 57px 247px;max-width: 130px;height: auto;">7898-4959</td>
                                                <td style="width: auto;max-width: 130px;height: auto;">pizzahut@gmail.com</td>
                                                <td style="width: auto;max-width: 130px;height: auto;">23/03/2024</td>
                                                <td style="width: 105.0469px;text-align: center;position: static;display: flex;height: auto;"><button class="btn btn-primary gamanet-btn-icon-primary" type="button" style="background: rgb(28,200,138);width: 100px;"><img src="<?php echo URL;?>public_html/assets/img/icons/icons8-edit-50.png?h=c44442844c7a03a126d8156e9370bed5"><span>Editar</span></button>
                                                    <div class="d-none d-sm-block topbar-divider" style="padding: 3px;"></div><button class="btn btn-primary gamanet-btn-icon-primary-dest" type="button" style="width: 100px;"><img src="<?php echo URL;?>public_html/assets/img/icons/icon_trash-2.svg?h=0038eaaaaf12fe8bfcb4be1c39111dab" width="24" height="24"><span>Eliminar</span></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div id="mapaResumen" class="row">
                            <iframe frameborder="0" width="100%" height="400"
                                width="600"
                                height="450"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/place?key=API_KEY
                                    &q=Space+Needle,Seattle+WA">
                            </iframe>
                        </div>
                    </div>
                    <div class="container-fluid d-none" id="contentForm">
                        <h3 class="text-dark mb-4">Crear - Registro de Restaurante</h3>
                        <div class="card shadow">
                            <div class="card-header py-3" style="width: auto;">
                                <p class="text-primary m-0 fw-bold">Ingresar información de Restaurante</p>
                            </div>
                            <div class="card-body" style="width: auto;height: 700px;">
                            <form id="formRestaurantes">
                                <div class="col" style="width: auto;">
                                    <div class="card shadow mb-3" style="height: 158px;width: auto;">
                                        <div class="card-header py-3" style="width: auto;padding: 16px;">
                                            <p class="text-primary m-0 fw-bold" style="height: 16px;width: 557.312px;padding: 0px;margin: 0px;">Información principal</p>
                                        </div>
                                        <div class="card-body" style="height: -2px;padding-bottom: 0px;width: 967px;">
                                        <div style="width: auto;height: 255px;">
                                                <div class="row" style="width: auto;">
                                                    <div class="col" style="width: auto;">
                                                        <div class="mb-3"><label class="form-label"><strong>Nombre del restaurante:&nbsp;<span style="color: rgb(24, 27, 69);">*</span></strong></label>
                                                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Restaurante" required></div>
                                                        <input type="hidden" name="id_restaurante" id="id_restaurante" value="0">
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
                                    <div class="card shadow" style="width: auto;height: 500px;">
                                        <div class="card-header py-3" style="width: auto;">
                                            <p class="text-primary m-0 fw-bold">Información adicional</p>
                                        </div>
                                        <div class="card-body" style="height: -1px;padding-bottom: 0px;width: 967px;">
                                            <div style="width: auto;height: 400px;">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="direccion"><strong>Direccion:</strong></label><input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion"></div>
                                                        <div class="mb-3"><label class="form-label" for="telefono"><strong>Telefono:</strong></label><input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono"></div>
                                                        <div class="mb-3"><label class="form-label" for="contacto"><strong>Contacto</strong></label><input class="form-control" type="text"  name="contacto" id="contacto" placeholder="Contacto"></div>
                                                        <div class="mb-3"><label class="form-label" for="latitud"><strong>Latitud</strong></label><input class="form-control" type="text"  name="latitud" id="latitud" placeholder="Latitud"></div>
                                                        <div class="mb-3"><label class="form-label" for="longitud"><strong>Longitud</strong></label><input class="form-control" type="text"  name="longitud" id="longitud" placeholder="Longitud"></div>


                                                    </div>
                                                    <div class="col">
                                                    <div class="row">
                                                    <div class="col">
                                                        <div ><label class="form-label" for="foto"><strong>Foto</strong></label></div>
                                                        <div class="img-thumbnail" id="divFoto" style="width:200px; height:200px">
                                                        </div>
                                                        <span>
                                                            Haga click para seleccionar la foto
                                                        </span>
                                                        <input class="form-control d-none" type="file" id="foto"  name="foto" >
                                                        </div>               
                                                    </div>
                                                        <div class="mb-3"><label class="form-label" for="fechaIngreso"><strong>Fecha ingreso</strong></label><input class="form-control" type="date" name="fechaIngreso" id="fechaIngreso" placeholder="Fecha ingreso"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3"></div>
                                                <div class="mb-3">
                                                    <button class="btn btn-dark btn-sm mt-3" type="button" name="btnCancelar" id="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                                                    <button class="btn btn-danger btn-sm mt-3" type="submit"><i class="bi bi-floppy-fill"></i> Guardar</button>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div> 
                        
                        <br>
                        <br>
                        <br>
                        <div id="mapaForm" class="row">
                            <iframe frameborder="0" width="100%" height="400"
                                width="600"
                                height="450"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/place?key=API_KEY
                                    &q=Space+Needle,Seattle+WA">
                             </iframe>
                        </div>
                    </div>
                </div>
                
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <?php include_once "app/views/sections/footer.php";?>
    </div>
    <?php include_once "app/views/sections/scripts.php"?>
    <script src="<?php echo URL;?>public_html/customjs/restaurantes.js"></script>
</body>

</html>