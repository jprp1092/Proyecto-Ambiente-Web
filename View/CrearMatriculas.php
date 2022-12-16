<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\PantallasController.php';
include_once __DIR__ . '\..\Controller\CursosController.php';
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
        <br>
        <hr>
        <h2>Agregar Matricula</h2>
        <hr>
        <br>

        <form class="form-horizontal templatemo-login-form-2" role="form" action="" method="post">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                <label for="lblProfesor" class="control-label">Seleccione la materia</label>
                    <select class="form-control" id="cboProfesor" name="cboProfesor" required>
                                <?php 
                                ListarNombreMateriaController($datos["nombreCurso"]); 
                                ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="lblHorario" class="control-label">Horario</label>
                    <select class="form-control" id="cboHorario" name="cboHorario" required>
                        <option value="Manaña">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="lblModalidad" class="control-label">Modalidad</label>
                    <select class="form-control" id="cboModalidad" name="cboModalidad" required>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-8 margin-bottom-15">
                </div>

                <div class="col-md-3 margin-bottom-15">
                    <input type="submit" class="btn btn-info" value="Agregar" id="btnAgregar" name="btnAgregar">
                    <a href="Usuarios.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>

                <div class="col-md-1 margin-bottom-15">
                </div>
            </div>
        </form>
    </div>
</body>

</html>