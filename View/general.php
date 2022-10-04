<?php

function headerLogin()
{
  echo '<title>Título</title>
          <meta name="keywords" content="" />
          <meta name="description" content="" />
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
          <link href="View/css/font-awesome.min.css" rel="stylesheet" type="text/css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    
          <link href="View/css/login.css" rel="stylesheet" type="text/css">';
}

function headerSite()
{
  echo '<title>Título</title>
          <meta name="keywords" content="" />
          <meta name="description" content="" />
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
          <link href="View/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
          <link href="../View/css/style.css" rel="stylesheet" type="text/css">';
}

function menu()
{
  echo '<section class="side-bar">
         <div class="logo">
              <img src="images/logo.png" width="28%">
              <h1>Sistema</h1>
              <h1>Académico</h1>
          </div>  

          <div class="user">
          <a class="icon-profile"><i class="fa fa-user"></i></a>
          <a class="signOut" href="/login.php"><i class="fa fa-sign-out"></i></a>
          <a class="userName">Bernardo Céspedes Martínez</a>
          </div>

          <div class="menu">
					<ul>
					  <li><a href="#">Inicio</a></li>
					  <li></i><a href="#">Matrícula</a></li>
					  <li><a href="#">Usuarios</a></li>
            <li><a href="#">Administrativos</a></li>
					  <li><a href="#">Docentes</a></li>
					  <li><a href="#">Alumnos</a></li>
            <li><a href="#">Carreras</a></li>
					  <li><a href="#">Asignaturas</a></li>
					  <li><a href="#">Grupos</a></li>
					  <li><a href="#">Asistencias</a></li>
					</ul>
          </div>
			  </section>';
}
