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

function VerRolesController($rol)
{
    $datos = VerRolesModel();   

    if($datos -> num_rows > 0)
    {
        echo '<option selected value=""> Seleccione... </option>';

        while($fila = mysqli_fetch_array($datos))
        {
            if($rol == $fila["idRol"])
                echo '<option selected value="' . $fila["idRol"] . '">' . $fila["descripcion"] . '</option>';
            else
                echo '<option value="' . $fila["idRol"] . '">' . $fila["descripcion"] . '</option>';
        }
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

if(isset($_POST["btnAgregar"]))
{ 
    $Cedula = $_POST["txtIdentificacion"];
    $Nombre = $_POST["txtNombre"];
    $Apellido = $_POST["txtApellido"];
    $FechaNacimiento = $_POST["txtFechaNacimiento"];
    $Contrasenna = $_POST["txtContraseña"];
    $Contrasenna2 = $_POST["txtConfirmarContraseña"];
    $Direccion = $_POST["txtDireccion"];
    $Telefono = $_POST["txtTelefono"];
    $Correo = $_POST["txtEmail"];
    $Rol = $_POST["cboTipoUsuario"];
    $Estado = $_POST["cboEstado"];

    if ($Contrasenna === $Contrasenna2) {
        AgregarUsuario($Cedula,$Nombre,$Apellido,$FechaNacimiento,$Contrasenna,$Direccion,$Telefono,$Correo,$Rol,$Estado);
        header("Location: Usuarios.php");
    }else{
        header("Location: CrearUsuarios.php");
    }
}

?>