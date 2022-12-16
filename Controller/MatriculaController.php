<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\..\Model\MatriculaModel.php';
include_once __DIR__ . '\..\Controller\UsuariosController.php';

function CargarMatriculasController()
{
    $datosMatricula = ListarMatriculasModel($_SESSION["sesionCedula"]);

    if($datosMatricula -> num_rows > 0)
    {
        while($resultado = mysqli_fetch_array($datosMatricula))
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

if(isset($_POST["btnAgregarMatri"]))
{ 
    $id = $_SESSION["sesionCedula"];
    $Materia = $_POST["cboCurso"];
    $Horario = $_POST["cboHorario"];
    $Modalidad = $_POST["cboModalidad"];

    
    Matricular($id,$Materia,$Horario,$Modalidad);
    header("Location: Matriculas.php");
    
}

?>