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

function ListarProfesoresModel() {
    $enlace = OpenDB();

    $procedimiento = "call ListarProfesor();";
    $datos = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datos;
}

function AgregarCurso($Nombre,$Modalidad,$Horario,$Creditos,$Docente)
{
    $enlace = OpenDB();

    $procedimiento = "call AgregarCurso('$Nombre','$Modalidad','$Horario','$Creditos','$Docente');";
    $enlace -> query($procedimiento);

    CloseDB($enlace);
}

function ConsultaCursoModel($id)
{
    $enlace = OpenDB();

    $procedimiento = "call consultarCursoId($id);";
    $datos = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datos;
}

function ActualizarCursoModel($Nombre,$Modalidad, $Horario, $Creditos, $Docentes,$id)
{
    $enlace = OpenDB();

    $procedimiento = "call ActualizarCursos('$Nombre','$Modalidad','$Horario', $Creditos,$Docentes,$id);";
    $datos = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datos;
}