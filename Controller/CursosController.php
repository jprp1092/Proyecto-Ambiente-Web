<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\..\Model\CursosModel.php';

function CargarCursos()
{
    $datosCursos = ListarCursos();

    if($datosCursos -> num_rows > 0)
    {
        while($resultado = mysqli_fetch_array($datosCursos))
        {
            echo "<tr>";
            echo "<td>" . $resultado["nombre"] . "</td>";
            echo "<td>" . $resultado["modalidad"] . "</td>";
            echo "<td>" . $resultado["horario"] . "</td>";
            echo "<td>" . $resultado["creditos"] . "</td>";
            echo "<td>" . $resultado["nombreProfe"] . '  ' . $resultado["apellidoProfe"] . "</td>";
            echo '<td> <a class="btnPresionar"  href="EditarCursos.php?q=' . $resultado["idCurso"] . '">Editar</a></td>';        
            echo "</tr>";
        }
    }
}

function ListarProfesoresController($idUsuario) {
    
    $datos = ListarProfesoresModel();

    if($datos -> num_rows > 0)
    {
        echo '<option selected value=""> Seleccione Profesor... </option>';      
        while($fila = mysqli_fetch_array($datos))
        {
            if($idUsuario == $fila["idUsuario"])
                echo '<option selected value="' . $fila["idUsuario"] . '">' . $fila["nombre"] . ' ' . $fila["apellido"] .  '</option>';
            else
                echo '<option value="' . $fila["idUsuario"] . '">' . $fila["nombre"] . ' ' . $fila["apellido"] .  '</option>';
        }
        
    }
}

if(isset($_POST["btnAgregarCurso"]))
{ 
    $Nombre = $_POST["txtNombre"];
    $Modalidad = $_POST["cboModalidad"];
    $Horario = $_POST["cboHorario"];
    $Creditos = $_POST["txtCreditos"];
    $Profesor = $_POST["cboProfesor"];

    AgregarCurso($Nombre,$Modalidad,$Horario,$Creditos,$Profesor);
    header("Location: Cursos.php");
}



function consultarCursoId($id)
{
    $datos = ConsultaCursoModel($id);   
    return mysqli_fetch_array($datos);
}


if(isset($_POST["btnActualizar"]))
{

    $Nombre = $_POST["txtNombre"];
    $Modalidad = $_POST["cboModalidad"];
    $Horario = $_POST["cboHorario"];
    $Creditos = $_POST["txtCreditos"];
    $Docentes = $_POST["cboProfesor"];
    $id = $_POST["txtId"];
   

    ActualizarCursoModel($Nombre,$Modalidad, $Horario, $Creditos, $Docentes,$id); 
    header("Location: Cursos.php");  
}

?>