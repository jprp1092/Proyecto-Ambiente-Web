<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\generales.php';
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
        <br>
        <hr>
        <h2>Cursos</h2>
        <hr>
        <br>

        <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-3">
				<div class="card">
					<div class="card-body">
                     <a href="CrearCurso.php" style="float: right;" class="btnPresionar">Agregar</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    

                
                        
            <div class="container" style="margin-top: 40px">
        
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>Nombre Curso</th>
                                        <th>Modalidad</th>
                                        <th>Horario</th>
                                        <th>Creditos</th>
                                        <th>Profesor Asignado</th>
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
                        
                    </div>
                </div>
            </div>
        </body>

            <?php 
            footerSite();
            ?>
          
    <?php 
        modal();
    ?>


</html>