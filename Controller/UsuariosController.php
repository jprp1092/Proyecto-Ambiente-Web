<?php
include_once 'Model/UsuariosModel.php';

if(isset($_POST["btnIngresar"]))
{
    $cedula = $_POST["txtCedula"];
    $contrasenna = $_POST["txtPass"];

    $datosUsuario = ValidarCredenciales($cedula, $contrasenna);

    if($datosUsuario -> num_rows > 0)
    {
        header("Location: View\home.php");
    }
    else
    {
        header("Location: index.php");
    }
}

?>