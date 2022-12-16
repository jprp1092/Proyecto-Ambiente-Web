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
        <h2> Cursos asignados</h2>
            
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
                                        <th>creditos</th>
                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    CargarCursosPorDocente();
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

</html>