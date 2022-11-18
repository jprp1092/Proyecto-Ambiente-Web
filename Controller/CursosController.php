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
            echo "<td>" . $resultado["naturaleza"] . "</td>";
            echo "<td>" . $resultado["creditos"] . "</td>";
            echo "<td>" . $resultado["asistencia"] . "</td>";
            echo "<td>" . $resultado["duracion"] . "</td>";
            echo '<td><a href="EditarCursos.php" class="btnPresionar">Editar</a></td>';
            echo "</tr>";
        }
    }
}

if(isset($_POST["btnAgregarCurso"]))
{ 
    $Nombre = $_POST["txtNombre"];
    $Modalidad = $_POST["txtModalidad"];
    $Naturaleza = $_POST["txtNaturaleza"];
    $Creditos = $_POST["txtCreditos"];
    $Asistencia = $_POST["txtAsistencia"];
    $Duracion = $_POST["txtDuracion"];

    AgregarCurso($Nombre,$Modalidad,$Naturaleza,$Creditos,$Asistencia,$Duracion);
    header("Location: Cursos.php");
}


?>