<?php

function Matricular($id,$Materia,$Horario,$Modalidad)
{
    $enlace = OpenDB();

    $procedimiento = "call AgregarMatricula($id,'$Materia','$Horario','$Modalidad');";
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