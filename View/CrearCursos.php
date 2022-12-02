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
            <form class="form-horizontal templatemo-login-form-2" role="form" action="" method="post">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <label for="lblNombre" class="control-label">Nombre Materia</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                    </div>

                    <div class="col-md-3">
                        <label for="lblModalidad" class="control-label">Modalidad</label>
                        <select class="form-control" name="cboModalidad" id="cboModalidad" required>
                            <option value="Virtual">Presencial</option>
                            <option value="Presencial">Virtual</option>
                        </select>

                    </div>

                    <div class="col-md-3">
                        <label for="lblHorario" class="control-label">Horario</label>
                        <select class="form-control" name="cboHorario" id="cboHorario" required>
                            <option value="Manaña">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                        </select>
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

                    <div class="col-md-3 margin-bottom-15">
                        <label for="lblProfesor" class="control-label">Profesor</label>
                        <select class="form-control" id="cboProfesor" name="cboProfesor" required>                       
                                <?php 
                                ListarProfesoresController($datos["idUsuario"]); 
                                ?>
                        </select>
                    </div>

                </div>
                <br />

                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-info" value="Agregar curso" id="btnAgregarCurso" name="btnAgregarCurso">
                        <a href="Cursos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>