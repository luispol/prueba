<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php include_once "app/views/sections/css.php";?>
    <?php include_once "app/views/sections/title.php";?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include_once "app/views/sections/opciones.php";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include_once "app/views/sections/header.php";?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Elaboración de reportes de compras</h3>
                    <!--Inicio de filtros-->
                    <form class="row gy-2 gx-3 align-items-center">
                        <div class="col-auto d-flex">
                            <label class="col-form-label" for="idrestaurante">Restaurante: </label>
                                <select class="form-select" aria-label="Default select example" id="idrestaurante">
                                </select>
                            
                        </div>
                        <div class="col-auto d-flex">
                            <label class="col-form-label" for="idproducto">Producto: </label>
                                <select class="form-select" aria-label="Default select example" id="idproducto">
                        
                                </select>
                        </div>

                        <div class="col-auto d-flex">
                            <label class="col-form-label" for="idproducto">Seleccionar rango:</label>
                                
                        </div>

                        <div class="col-auto d-flex">
                            <label class="col-form-label" for="fechaInicio">Fecha de incio: </label>
                            <input class="form-control" type="date" name="fechaInicio" id="fechaInicio" >
                        </div>

                        <div class="col-auto d-flex">
                            <label class="col-form-label" for="fechaFinal">Fecha final: </label>
                            <input class="form-control" type="date" name="fechaFinal" id="fechaFinal">
                            
                        </div>
                        
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" id="btnViewReport" style="background: rgb(249, 39, 39); border-color:rgb(249, 39, 39);">Ver reporte</button>
                        </div>
                    </form>
                    <!--Fin de filtros-->
                    <!--Inicio cuerpo de reporte-->
                    <div class="row">
                        <iframe src="" frameborder="0" width="100%" height="400" id="frameReport"></iframe>
                    </div>
                    <!--Fin cuerpo de reporte-->
                </div>
            </div>
            <?php include_once "app/views/sections/footer.php";?>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include_once "app/views/sections/scripts.php"?>
    <script src="<?php echo URL;?>public_html/customjs/reportes.js"></script>
</body>

</html>