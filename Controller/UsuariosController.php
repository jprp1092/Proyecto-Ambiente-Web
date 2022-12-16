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
        $_SESSION["sesionCedula"] = $resultado["cedula"];
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

function ConsultarDatosUsuario($Cedula)
{
    $datos = ConsultarDatosUsuarioModel($Cedula);   
    return mysqli_fetch_array($datos);
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
            echo "<td>" . $resultado["nombre"] . '  ' . $resultado["apellido"] . "</td>";
            echo "<td>" . $resultado["descripcion"] . "</td>";
            echo "<td>" . $resultado["descripcionEstado"] . "</td>";

            if($_SESSION["sesionCedula"] != $resultado["cedula"])
                echo '<td><a class="btn" href="EditarUsuarios.php?q=' . $resultado["cedula"] . '">Actualizar<a/>';
            else
                echo '<td><a class="btn" style="cursor: not-allowed">Actualizar<a/>';

            if($resultado["estado"] == 1 && $_SESSION["sesionCedula"] != $resultado["cedula"])
              
                echo '<a class="btn" data-toggle="modal" data-target="#DeleteUserModal" data-id=' . $resultado["cedula"] . '>Inactivar</a></td>';
            else
                echo '<a class="btn" style="cursor: not-allowed">Inactivar</a></td>';
     

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
        AgregarUsuario($Cedula,$Nombre,$Apellido,$Contrasenna,$FechaNacimiento,$Direccion,$Telefono,$Correo,$Rol,$Estado);
        header("Location: Usuarios.php");
    }else{
        header("Location: CrearUsuarios.php");
    }
}

if(isset($_POST["btnActualizar"]))
{
    $Nombre = $_POST["txtNombre"];
    $Apellido = $_POST["txtApellido"];
    $Contrasenna = $_POST["txtContrasenna"];
    $Dirrecion = $_POST["txtDireccion"];
    $Telefono = $_POST["txtTelefono"];
    $Correo = $_POST["txtTelefono"];
    $TipoUsuario = $_POST["cboTipoUsuario"];
    $Contrasenna = $_POST["txtContrasenna"];
    $ContrasennaConfirmar = $_POST["txtConfirmarContraseña"];
    $Cedula = $_POST["txtCedula"];

    if ($Contrasenna === $ContrasennaConfirmar) {
        ActualizarUsuarioModel($Nombre,$Apellido,$Contrasenna,$Dirrecion,$Telefono,$TipoUsuario,$Cedula); 
    } 
    
    header("Location: Usuarios.php");  
}

if(isset($_POST["InactivarUsuario"]))
{
    $Id = $_POST["Cedula"];
    InactivarUsuarioModel($Cedula);  
}

?>


