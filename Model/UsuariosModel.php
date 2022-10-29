<?php
include_once __DIR__ . '\ConnDB.php';

function ValidarCredenciales($cedula, $contrasena)
{
    $enlace = OpenDB();
    $procedimiento = "CALL ValidarCredenciales('$cedula', '$contrasena');";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}

?>