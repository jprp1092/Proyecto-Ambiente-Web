<?php
    include_once __DIR__ . '/View/general.php';
    include_once __DIR__ .'/Controller/UsuariosController.php';
?>

<!doctype html>

<html>

<head>
    <?php
    headerLogin(); ?>
</head>

<body>
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card">
                        <div class="card-body">
                        <a id="profile"><i class="fa fa-user"></i></a>
                        <h4>Iniciar Sesión</h4>
                            <form role="form" role="form" action="" method="POST">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="txtMail" class="control-label"></label>
                                            <div class="input-icon-container">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" id="txtCedula" name="txtCedula" placeholder="Cedula">
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
                                        <input type="submit" value="Ingresar" id="btnIngresar" name="btnIngresar" class="btnIngreso">
                                    </div>
                                    <div class="form-group">
                                        <a href="registrarse.php" id="btnRegistro" name="btnRegistro" class="">Registrate</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>