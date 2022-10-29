<?php

include_once __DIR__ . '\general.php';
include_once __DIR__ . '\..\Controller\RolController.php';
?>

<!DOCTYPE html>

    <head>
        <?php
           
           headerSite();

        ?>
    </head>

    <body>
        <?php
        
            menu();
            CargarRol();
       
            
                      
        ?>

        <div class="content">
        </div>
        <script src="../View/js/jquery.min.js"></script>
        <script src="../View/js/bootstrap.min.js"></script>
    </body>

</html>