<?php
include_once __DIR__ .'\..\Model\UsuariosModel.php';
if (session_status() == PHP_SESSION_NONE)
session_start();

if(isset($_POST["btnIngresar"]))
{
    $cedula = $_POST["txtCedula"];
    $contrasenna = $_POST["txtPass"];

    $datosUsuario = ValidarCredenciales($cedula, $contrasenna);

    if($datosUsuario -> num_rows > 0)
    {

        $resultado = mysqli_fetch_array($datosUsuario);

        $_SESSION["sessionNombre"] = $resultado["nombre"];
        $_SESSION["sessionTipoRol"] = $resultado["tipoRol"];
        header("Location: View\home.php");
    }
    else
    {
        header("Location: index.php");
    }
}

?>