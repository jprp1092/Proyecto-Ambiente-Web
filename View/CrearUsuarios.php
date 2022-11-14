<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\general.php';
include_once __DIR__ . '\..\Controller\PantallasController.php';
include_once __DIR__ . '\..\Controller\UsuariosController.php';
?>

<!DOCTYPE html>

<head>

    <?php
    headerSite();
    ?>

</head>

<body>

    <?php
    CargarMenu();
    ?>

    <div class="content">
        <div class="templatemo-panels">

            <br /><br />
            <form class="form-horizontal templatemo-login-form-2" role="form" action="" method="post">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <label for="lblCedula" class="control-label">Identificación</label>
                        <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion">
                    </div>

                    <div class="col-md-3">
                        <label for="lblNombre" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                    </div>

                    <div class="col-md-3">
                        <label for="lblEstado" class="control-label">Apellidos</label>
                        <input type="text" class="form-control" id="txtApellido" name="txtApellido">
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <label for="lblTipoUsuario" class="control-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento">
                    </div>

                    <div class="col-md-3">
                        <label for="lblContrasenna" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" id="txtContraseña" name="txtContraseña">
                    </div>

                    <div class="col-md-3">
                        <label for="lblConfirmarContrasenna" class="control-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="txtConfirmarContraseña" name="txtConfirmarContraseña">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <label for="lblDireccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
                    </div>

                    <div class="col-md-3">
                        <label for="lblTelefono" class="control-label">Teléfono</label>
                        <input type="text" class="form-control" id="txtTelefono" name="txtTelefono">
                    </div>

                    <div class="col-md-3">
                        <label for="lblCorreo" class="control-label">Correo eléctronico</label>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-3">
                        <label for="lblRol" class="control-label">Rol de Usuario</label>
                        <select class="form-control" id="cboTipoUsuario" name="cboTipoUsuario" required>
                                <?php 
                                VerRolesController($datos["idRol"]); 
                                ?>
                        </select>
                    </div>

                    <div class="col-md-3 margin-bottom-15">
                            <label for="lblEstado" class="control-label">Estado</label>
                            <select class="form-control" id="cboEstado" name="cboEstado" required>
                                <option value=1>Activo</option>
                                <option value=0>Inactivo</option>
                            </select>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-info" value="Agregar" id="btnAgregar" name="btnAgregar">
                        <a href="Usuarios.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>