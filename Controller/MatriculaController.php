<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\..\Model\MatriculaModel.php';

function CargarMatriculasController()
{
    $verdad = true;
    if ($verdad === true) {
        
    }

    $datosMatricula = ListarMatriculasModel($Cedula);

    if($datosMatricula -> num_rows > 0)
    {
        while($resultado = mysqli_fetch_array($datosMatricula))
        {
            echo "<tr>";
            echo "<td>" . $resultado["nombreCurso"] . "</td>";
            echo "<td>" . $resultado["modalidad"] . "</td>";
            echo "<td>" . $resultado["horario"] . "</td>";
            echo '<td> <a class="btnPresionarAcciones"  href="EditarCursos.php?q=' . $resultado["idMatricula"] . '">Editar</a></td>';             
            echo "</tr>";
        }
    }
}

?>