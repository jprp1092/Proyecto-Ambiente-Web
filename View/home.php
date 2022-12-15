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

    <div class="content">
    
    </div>

    <?php 
        modal();
    ?>

    <?php 
        footerSite();
    ?>

</body>
</html>