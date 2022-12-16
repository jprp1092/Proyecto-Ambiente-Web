<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

include_once __DIR__ . '\..\Model\PantallasModel.php';
include_once __DIR__ . '\UtilitariosController.php';

function CargarMenu()
{
    $datosMenu = ConsultarMenu($_SESSION["sessionTipoRol"]);

    if($datosMenu -> num_rows > 0)
    {
        echo 
        
        '<section class="sideBar">
        <div class="logo">
             <img src="images/logo.png" width="120px">

        </div>
        
        <br>
        <br>
        <br>

        <div>
            <a class="icon-profile"><i class="fa fa-user"></i></a>
            <a class="userName">', $_SESSION["sessionNombre"], '</a>
        </div>
        
        <div class="menu">
            <ul>
                <li>
                   <i class="fa fa-house"></i>
                   <a href="home.php">Inicio</a>
                </li>';

        while($resultado = mysqli_fetch_array($datosMenu))
        {
            echo        
             
            '<li>
                <i class="' . $resultado["icono"] . '"></i>
                <a href="' . $resultado["redireccion"] . '">' . $resultado["texto"] . '</a>
            </li>';
        }
        
        echo 
           '        
           <li>
           <i class="fa fa-sign-out"></i>
           <a href="" data-toggle="modal" data-target="#confirmModal" data-keyboard="false"><i></i>Cerrar Sesión</a></li>
           </ul>
          </div>
        </section>';
    }
}

function mostrarBienvenida(){
    echo 
        '<div class="title">
          <h2>¡Bienvenido al sistema academico ', $_SESSION["sessionNombre"], '!</h2>
        </div>';
}