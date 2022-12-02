<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\general.php';
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

<form action="" method="post">
    <div class="content">
        <div class="templatemo-panels">

            <br /><br />

            <input type="hidden" value="<?php echo $datos["idCurso"] ?>" id="txtId" name="txtId"> 
            
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <label for="lblNombre" class="control-label">Nombre del curso</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre"  required
                         value="<?php echo $datos["nombre"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblModalidad" class="control-label">Modalidad</label>
                    <select class="form-control" name="cboModalidad" id="cboModalidad" required>
                            <option value="">Seleccione Modalidad...</option>
                            <option value="Virtual">Presencial</option>
                            <option value="Presencial">Virtual</option>
                        </select>
                </div>

                <div class="col-md-3">
                    <label for="lblHorario" class="control-label">Horarios</label>
                    <select class="form-control" name="cboHorario" id="cboHorario" required>
                            <option value="">Seleccione Horario...</option>
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
                    <input type="text" class="form-control" id="txtCreditos" name="txtCreditos" required
                         value="<?php echo $datos["creditos"] ?>">
                </div>

                <div class="col-md-3">
                    <label for="lblDocente" class="control-label">Docentes</label>
                    <select class="form-control" id="cboProfesor" name="cboProfesor" required>
                                <?php 
                                ListarProfesoresController($datos["idUsuario"]); 
                                ?>
                        </select>
                </div>            
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
                <a href="Cursos.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
    </div>
    </form>
</body>

</html>