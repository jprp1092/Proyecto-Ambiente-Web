<?php

function AgregarMatriculamodal($CedulaProfesor,$CedulaEstudiante,$NombreCurso,$Modalidad)
{
    $enlace = OpenDB();

    $procedimiento = "call AgregarMatricula('$CedulaProfesor','$CedulaEstudiante','$NombreCurso','$Modalidad','$Horario');";
    $enlace -> query($procedimiento);

    CloseDB($enlace);
}

?>