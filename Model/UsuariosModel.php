<?php
include_once __DIR__ . '\ConnBD.php';

function ValidarUsuario($correo, $contrasena)
{
    $enlace = OpenDB();
    $procedimiento = "CALL ValidarUsuario('$correo', '$contrasena');";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}

function ListarUsuarios()
{
    $enlace = OpenDB();
    $procedimiento = "CALL ListarUsuarios();";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}

?>