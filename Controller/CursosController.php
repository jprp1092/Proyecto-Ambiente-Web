<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\..\Model\CursosModel.php';
include_once __DIR__ . '\..\Controller\UsuariosController.php';

function CargarCursos()
{
    $datosCursos = ListarCursos();

    if($datosCursos -> num_rows > 0)
    {
        while($resultado = mysqli_fetch_array($datosCursos))
        {
            echo "<tr>";
            echo "<td>" . $resultado["nombreCurso"] . "</td>";
            echo "<td>" . $resultado["modalidad"] . "</td>";
            echo "<td>" . $resultado["horario"] . "</td>";
            echo '<td> <a class="btnPresionarAcciones"  href="EditarCursos.php?q=' . $resultado["idMatricula"] . '">Eliminar</a></td>';             
            echo "</tr>";
        }
    }
}

function CargarCursosPorDocente()
{
    $datosCursos = ListarCursosDocenteModel($_SESSION["sesionCedula"]);

    if($datosCursos -> num_rows > 0)
    {
        while($resultado = mysqli_fetch_array($datosCursos))
        {
            echo "<tr>";
            echo "<td>" . $resultado["nombreCurso"] . "</td>";
            echo "<td>" . $resultado["modalidad"] . "</td>";
            echo "<td>" . $resultado["horario"] . "</td>";
            echo "<td>" . $resultado["creditos"] . "</td>";

            
            echo "</tr>";
        }
    }
}


function ListarProfesoresController($CedulaUsuario) {
    
    $datos = ListarProfesoresModel();

    if($datos -> num_rows > 0)
    {
        echo '<option selected value=""> Seleccione Profesor... </option>';      
        while($fila = mysqli_fetch_array($datos))
        {
            if($CedulaUsuario == $fila["cedula"])
                echo '<option selected value="' . $fila["cedula"] . '">' . $fila["nombre"] . ' ' . $fila["apellido"] .  '</option>';
            else
                echo '<option value="' . $fila["cedula"] . '">' . $fila["nombre"] . ' ' . $fila["apellido"] .  '</option>';
        }
        
    }
}

function ListarNombreMateriaController($NombreMateria) {
    
    $datos = ListarNombreCursoModel();

    if($datos -> num_rows > 0)
    {
        echo '<option selected value=""> Seleccione Materia... </option>';      
        while($fila = mysqli_fetch_array($datos))
        {
            if($NombreMateria == $fila["nombreMateria"])
                echo '<option selected value="' . $fila["nombreCurso"] . '">' . $fila["nombreCurso"] . '</option>';
            else
                echo '<option value="' . $fila["nombreCurso"] . '">' . $fila["nombreCurso"] . '</option>';
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


if(isset($_POST["btnActualizarCurso"]))
{

    $Nombre = $_POST["txtNombre"];
    $Modalidad = $_POST["cboModalidad"];
    $Horario = $_POST["cboHorario"];
    $Creditos = $_POST["txtCreditos"];
    $Docentes = $_POST["cboProfesor"];
   

    ActualizarCursoModel($Nombre,$Modalidad, $Horario, $Creditos, $Docentes); 
    header("Location: Cursos.php");  
}

?>