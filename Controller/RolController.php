<?php

include_once __DIR__ . '\..\Model/RolModel.php';


function CargarRol()
{
    
    
    $datosPantalla = ConsultarPantalla($_SESSION["sessionTipoRol"]);

    if($datosPantalla -> num_rows > 0)
    {


    }

}

?>