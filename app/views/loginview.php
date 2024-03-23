<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php";?>
    <?php include_once "app/views/sections/title.php";?>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 69px;">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex" style="color: rgba(133,135,150,0);">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;<?php echo URL?>public_html/assets/img/shared/portada.PNG&quot;) center / cover no-repeat, #ffffff;color: rgba(133,135,150,0);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Administracion de restaurantes</h4>
                                    </div>
                                    <form class="user" method="post" action="login.php" id="formlogin">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleUsername"  placeholder="Username" name="usuario"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="mb-3">

                                            <div class="alert alert-danger mt-3 d-none" role="alert" id="mensaje">
                                                Mensaje de error
                                            </div>
                                        </div><button class="btn btn-danger d-block btn-user w-100" type="submit" href="<?php echo URL?>dashboard">Iniciar sesión</button>
                        
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL;?>public_html/customjs/api.js"></script>
    <script src="<?php echo URL;?>public_html/customjs/login.js"></script>

</body>

</html>