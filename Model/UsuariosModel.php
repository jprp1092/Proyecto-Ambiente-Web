<?php
include_once __DIR__ . '\ConnBD.php';

/*Funcion para validar credenciales en login*/

function ValidarUsuario($correo, $contrasena)
{
    $enlace = OpenDB();
    $procedimiento = "CALL ValidarUsuario('$correo', '$contrasena');";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}

/*Fin funcion para validar credenciales en login*/

/*Funcion ver datos usuarios*/ 

function ListarUsuarios()
{
    $enlace = OpenDB();
    $procedimiento = "CALL ListarUsuarios();";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}    

/*Fin funcion ver datos usuarios*/ 

/*Funcion para agregar usuarios nuevos*/

function AgregarUsuario($Cedula,$Nombre,$Apellido,$Contrasenna,$FechaNacimiento,$Direccion,$Telefono,$Correo,$Rol,$Estado)
{
    $enlace = OpenDB();

    $procedimiento = "call AgregarUsuario('$Cedula','$Nombre','$Apellido','$Contrasenna','$FechaNacimiento','$Direccion','$Telefono','$Correo',$Rol, $Estado);";
    $enlace -> query($procedimiento);

    CloseDB($enlace);
}

/*Fin funcion para agregar usuarios nuevos*/

/*Consultar usuario por id*/

function ConsultarDatosUsuarioModel($id)
{
    $enlace = OpenDB();

    $procedimiento = "call ConsultarUsuarioId($id);";
    $datos = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datos;
}

/*Fin consultar usuario por id*/

/*Funcion para poder ver lo roles en la creacion de usuarios*/

function VerRolesModel()
{
    $enlace = OpenDB();
    $procedimiento = "CALL VerRoles();";
    $datosUsuario = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosUsuario;
}

/*Fin funcion para poder ver lo roles en la creacion de usuarios*/

/*Actualizar usuarios*/

function ActualizarUsuarioModel($Nombre,$Apellido,$Contrasenna,$Dirrecion,$Telefono,$TipoUsuario,$IdUsuario)
{
    $enlace = OpenDB();

    $procedimiento = "call ActualizarUsuarios('$Nombre','$Apellido','$Contrasenna','$Dirrecion','$Telefono',$TipoUsuario,$IdUsuario);";
    $enlace -> query($procedimiento);

    CloseDB($enlace);
}

/*Fin actualizar usuarios*/

?>