<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\..\Model\UsuariosModel.php';

if(isset($_POST["btnIngresar"]))
{
    $correo = $_POST["txtMail"];
    $contrasena = $_POST["txtPass"];

    $datosUsuario = ValidarUsuario($correo, $contrasena);

    if($datosUsuario -> num_rows > 0)
    {
        $resultado = mysqli_fetch_array($datosUsuario);

        $_SESSION["sessionNombre"] = $resultado["nombre"] . " " . $resultado["apellido"];
        $_SESSION["sessionTipoRol"] = $resultado["tipoRol"];
        header("Location: View\home.php");
    }

    else
    {
        header("Location: index.php");
    }
}

function CargarUsuarios()
{
    $datosUsuarios = ListarUsuarios();

    if($datosUsuarios -> num_rows > 0)
    {
        while($resultado = mysqli_fetch_array($datosUsuarios))
        {
            echo "<tr>";
            echo "<td>" . $resultado["cedula"] . "</td>";
            echo "<td>" . $resultado["nombre"] . "</td>";
            echo "<td>" . $resultado["descripcion"] . "</td>";
            echo "<td>" . $resultado["descripcionEstado"] . "</td>";
            echo '<td><a href="EditarUsuarios.php" class="btnPresionar">Editar</a></td>';
            echo "</tr>";
        }
    }
}

?>