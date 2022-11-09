<?php
include_once __DIR__ . '\Controller\UsuariosController.php';
?>

<!doctype html>

<html>

<head>
    <title>Título</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a1b472f1fb.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a1b472f1fb.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="View/css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <section id="content">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <a id="profile"><i class="fa fa-user-tie"></i></a>
                            <h4>Iniciar Sesión</h4>
                            <form role="form" action="" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="txtMail" class="control-label"></label>
                                            <div class="input-icon-container">
                                                <i class="fa fa-envelope"></i>
                                                <input type="text" class="form-control" id="txtMail" name="txtMail" placeholder="Correo electrónico" onblur="ValidarDatos();">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="txtPass" class="control-label"></label>
                                            <div class="input-icon-container">
                                                <i class="fa fa-lock"></i>
                                                <input type="password" class="form-control" id="txtPass" name="txtPass" placeholder="Contraseña">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Ingresar" name="btnIngresar" id="btnIngresar" class="btnIngreso">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>