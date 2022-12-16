<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();


include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\PantallasController.php';
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

    <div class="home">

        <div class="banner">
            <img src="images/students.jpg" width="100%" height="350px">
            <h1>SISTEMA ACADEMICO</h1>
        </div>

        <?php
        mostrarBienvenida();
        ?>

        <h4>El sistema academico posee muchas funciones que ayudan a los estudintes y profesores <br>
         en los labores realizados de la institucion educativa.</h4>

        <div class="box-container">

            <div class="box">
                <a class="homeIcon"><i class="fa fa-bolt"></i></a>
                <h3>Agilidad</h3>
                <p>Ayuda a agilizar los procesos de matricula.</p>
            </div>
            <div class="box">
                <a class="homeIcon"><i class="fa fa-gem"></i></a>
                <h3>Eficiencia</h3>
                <p>Ofrece servicios que mejoran los procesos academicos.</p>
            </div>
            <div class="box">
                <a class="homeIcon"><i class="fa fa-lightbulb"></i></a>
                <h3>Desempeño</h3>
                <p>Ayuda a los profesores y estudiantes a tener un mejor desempeño.</p>
            </div>
        </div>
    </div>

    <?php
    modal();
    ?>

    <?php
    footerSite();
    ?>

</body>

</html>