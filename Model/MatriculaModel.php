<?php

function AgregarMatriculamodal($CedulaEstudiante,$NombreCurso,$Modalidad)
{
    $enlace = OpenDB();

    $procedimiento = "call AgregarMatricula('$CedulaEstudiante','$NombreCurso','$Modalidad','$Horario');";
    $enlace -> query($procedimiento);

    CloseDB($enlace);
}

function ListarMatriculasModel($Cedula)
{
    $enlace = OpenDB();
    $procedimiento = "CALL ListarMatriculas($Cedula);";
    $datosMatricula = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosMatricula;
}

?>