<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\PantallasController.php';
include_once __DIR__ . '\..\Controller\CursosController.php';

$datos = consultarCursoId($_GET["q"]);

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
        <h2>Actualizar Cursos</h2>
        <hr>
        <br>

       
        <input type="hidden" value="<?php echo $datos["nombreCurso"] ?>" id="txtNombreCurso" name="txtNombreCurso">


        <form class="form-horizontal templatemo-login-form-2" role="form" action="" method="post">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <label for="lblNombre" class="control-label">Nombre Curso</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $datos["nombreCurso"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblModalidad" class="control-label">Modalidad</label>
                    <select class="form-control" id="cboModalidad" name="cboModalidad" value="<?php echo $datos["modalidad"] ?>" required>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="lblHorario" class="control-label">Horario</label>
                    <select class="form-control" id="cboHorario" name="cboHorario" value="<?php echo $datos["horario"] ?>" required>
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
                    <label for="lblCreditos" class="control-label">Numero de creditos</label>
                    <input type="text" class="form-control" id="txtCreditos" name="txtCreditos" value="<?php echo $datos["creditos"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblProfesor" class="control-label">Asignar profesor</label>
                    <select class="form-control" id="cboProfesor" name="cboProfesor" value="<?php echo $datos["docente"] ?>" required>
                                <?php 
                                ListarProfesoresController($datos["cedula"]); 
                                ?>
                    </select>
                </div>

                <div class="col-md-3">
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-8 margin-bottom-15">
                </div>

                <div class="col-md-3 margin-bottom-15">
                    <input type="submit" class="btn btn-info" value="Agregar" id="btnActualizarCurso"name="btnActualizarCurso">
                    <a href="Cursos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>

                <div class="col-md-1 margin-bottom-15">
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

<?php 
        footerSite();
    ?>

</html>