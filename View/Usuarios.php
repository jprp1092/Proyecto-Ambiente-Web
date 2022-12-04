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
            <div class="container" style="margin-top: 40px">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Tipo Usuario</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    CargarUsuarios();
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <a href="CrearUsuarios.php" class="btnPresionar">Agregar</a>
            </div>
        </div>
    </div>

    <?php
    modal();
    ?>

    <!-- Modal -->
    <div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>¿Está seguro que quiere inactivar el usuario?</h4>
                </div>
                <div class="modal-footer">

                <input type="hidden" id="cedula" name="cedula" value=""/>     
                    <input type="button" class="btn btn-primary" value="SI" id="btnInactivar" name="btnInactivar" onclick="InactivarUsuario()">
                </div>
            </div>
        </div>
    </div>

    <script src="js/usuarios.js"></script>';

</body>

</html>

<script src="../View/js/login.js"></script>';