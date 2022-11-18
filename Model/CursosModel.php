<?php
include_once __DIR__ . '\ConnBD.php';

function ListarCursos()
{
    $enlace = OpenDB();
    $procedimiento = "CALL ListarCursos();";
    $datosCursos = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datosCursos;
}    

function AgregarCurso($Nombre,$Modalidad,$Naturaleza,$Creditos,$Asistencia,$Duracion)
{
    $enlace = OpenDB();

    $procedimiento = "call AgregarUsuario('$Nombre','$Modalidad','$Naturaleza','$Creditos','$Asistencia','$Duracion');";
    $enlace -> query($procedimiento);

    CloseDB($enlace);
}