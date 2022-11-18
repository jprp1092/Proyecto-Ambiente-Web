<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\general.php';
include_once __DIR__ . '\..\Controller\PantallasController.php';
include_once __DIR__ . '\..\Controller\CursosController.php';
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
                                        <th>Nombre</th>
                                        <th>Modalidad</th>
                                        <th>Naturaleza</th>
                                        <th>Creditos</th>
                                        <th>Asistencia</th>
                                        <th>Duracion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    CargarCursos();
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <a href="CrearCursos.php" class="btnPresionar">Agregar</a>
            </div>
        </div>
    </div>
</body>

</html>