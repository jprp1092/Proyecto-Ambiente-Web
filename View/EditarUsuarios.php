<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\general.php';
include_once __DIR__ . '\..\Controller\PantallasController.php';
include_once __DIR__ . '\..\Controller\UsuariosController.php';


$datos = ConsultarDatosUsuario($_GET["q"]);

?>

<!DOCTYPE html>

<head>

    <?php
    headerSite();
    ?>

</head>

<body>

    <form action="" method="post">

    <?php
    CargarMenu();
    ?>

    <div class="content">
        <div class="templatemo-panels">
            
            <br /><br />

            <input type="hidden" value="<?php echo $datos["idUsuario"] ?>" id="txtId" name="txtId">

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <label for="lblCedula" class="control-label">Identificación</label>
                    <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required
                        readonly value="<?php echo $datos["cedula"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblNombre" class="control-label">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre"required
                        value="<?php echo $datos["nombre"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblEstado" class="control-label">Estado</label>
                    <input type="text" class="form-control" id="txtEstado" name="txtEstado">

                    
                </div>
            </div>

            <br/>

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">

                    <label for="lblTipoUsuario" class="control-label">Tipo de Usuario</label>
                        <select class="form-control" id="txtTipoUsuario" name="txtTipoUsuario" required>
                                <?php 
                                VerRolesController($datos["idRol"]); 
                                ?>
                        </select>
                </div>

                <div class="col-md-3">
                    <label for="lblContrasenna" class="control-label">Contraseña</label>
                    <input type="password" class="form-control" id="txtContrasenna" name="txtContrasenna" required
                        value="<?php echo $datos["contrasena"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblConfirmarContrasenna" class="control-label">Confirmar</label>
                    <input type="password" class="form-control" id="txtConfirmarContraseña" name="txtConfirmarContraseña" required
                        value="<?php echo $datos["contrasena"] ?>">
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-5">
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-info" value="Actualizar" id="btnActualizar" name="btnActualizar">
                </div>
                <div class="col-md-3">
                    <a href="Usuarios.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>
            </div>
        </div>
    </div>


    <script src="js/usuarios.js"></script>
    </form>
</body>



</html>

