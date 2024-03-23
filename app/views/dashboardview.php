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
            <div id="content" class="text-center">
                <?php include_once "app/views/sections/header.php";?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <img src="<?php echo URL;?>/public_html/assets/img/shared/imgDashboard.PNG" alt="Imagen principal" style="width:700px">
                </div>
            </div>
            <?php include_once "app/views/sections/footer.php";?>
        </div>
    <!--<img src="/System_FC/public_html/fotos/construccion.png" alt="Parte en construccion" style="width:700px"> -->
    </div>  
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include_once "app/views/sections/scripts.php"?>
</body>

</html>