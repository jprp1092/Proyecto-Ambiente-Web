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

            <br /><br />

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <label for="lblNombre" class="control-label">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                </div>

                <div class="col-md-3">
                    <label for="lblModalidad" class="control-label">Modalidad</label>
                    <input type="text" class="form-control" id="txtModalidad" name="txtModalidad">
                </div>

                <div class="col-md-3">
                    <label for="lblNaturaleza" class="control-label">Naturaleza</label>
                    <input type="text" class="form-control" id="txtNaturaleza" name="txtNaturaleza">
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <label for="lblCreditos" class="control-label">Creditos</label>
                    <input type="text" class="form-control" id="txtCreditos" name="txtCreditos">
                </div>

                <div class="col-md-3">
                    <label for="lblAsistencia" class="control-label">Asistencia</label>
                    <input type="password" class="form-control" id="txtAsistencia" name="txtAsistencia">
                </div>

                <div class="col-md-3">
                    <label for="lblDuracion" class="control-label">Duracion</label>
                    <input type="password" class="form-control" id="txtDuracion" name="txtDuracion">
                </div>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-3">
                <input type="submit" class="btn btn-info" value="Procesar" id="btnProcesar" name="btnProcesar">
            </div>
            <div class="col-md-3">
                <a href="Cursos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>