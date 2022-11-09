<?php
include_once __DIR__ . '\ConnBD.php';

function ConsultarMenu($tipoRol)
{
    $enlace = OpenDB();
    $procedimiento = "CALL ConsultarMenu($tipoRol);";
    $datosPantalla = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosPantalla;
}

?>