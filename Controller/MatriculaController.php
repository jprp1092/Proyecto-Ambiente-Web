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
            echo "</tr>";
        }
    }
}




?>