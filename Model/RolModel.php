<?php
if (session_status() == PHP_SESSION_NONE)
session_start();

include_once __DIR__ . '\..\Controller\UsuariosController.php';
include_once __DIR__ . '\ConnDB.php';


function ConsultarPantalla($tipoRol)
{
    $enlace = OpenDB();
    $procedimiento = "CALL ConsultarPantalla('$tipoRol');";
    $datosPantalla = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosPantalla;
}

?>