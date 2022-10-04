<?php
include 'View/general.php';
?>

<!doctype html>

<html>

<head>
    <?php
    headerLogin(); ?>
</head>

<body>
    <section id="content">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card">
                        <div class="card-body">
                        <a id="profile"><i class="fa fa-user"></i></a>
                        <h4>Iniciar Sesión</h4>
                            <form role="form" action="View/home.php" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="txtMail" class="control-label"></label>
                                            <div class="input-icon-container">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" id="txtMail" name="txtMail" placeholder="Correo electrónico o matrícula">
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
                                        <input type="submit" value="Ingresar" name="btnIngresar" class="btnIngreso">
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