<?php
include_once 'ConnDB.php';

function ValidarCredenciales($cedula, $contrasenna)
{
    $enlace = OpenDB();
    $procedimiento = "CALL validar_credenciales('$cedula', '$contrasenna');";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}

?>