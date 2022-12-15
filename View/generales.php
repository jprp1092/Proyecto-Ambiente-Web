<?php 

  function headerLogin()
  {
    echo '<title>Sistema Academico</title>
          <meta name="keywords" content="" />
          <meta name="description" content="" />
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
          <link href="View/css/font-awesome.min.css" rel="stylesheet" type="text/css">
          <link href="View/css/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href="View/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
          <link href="View/css/bootstrap-social.css" rel="stylesheet" type="text/css">	    
          <link href="View/css/templatemo_style.css" rel="stylesheet" type="text/css">';
  }

  function headerSite()
  {
    echo '<title>Sistema Academico</title>
          <meta name="keywords" content="" />
          <meta name="description" content="" />
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="View/css/font-awesome.min.css" rel="stylesheet" type="text/css">
          <link href="View/css/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href="View/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
          <link href="View/css/bootstrap-social.css" rel="stylesheet" type="text/css">	    
          <link href="../View/css/templatemo_main.css" rel="stylesheet" type="text/css">
          <link href="../View/css/menu.css" rel="stylesheet" type="text/css">
          <script src="https://kit.fontawesome.com/a1b472f1fb.js" crossorigin="anonymous"></script>';

       
  }

  function navBar()
  {
    echo '<div class="navbar navbar-inverse" role="navigation">
				  <div class="navbar-header">
					<div class="logo"><h1>Proyecto</h1></div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
				  </div>   
				  </div>';
  }

  function modal()
  {
    /*
    echo '<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>¿Está seguro que quiere cerrar sesión?</h4>
              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-primary">Sí</a>
                <button type="button" class="btn btn-default" data-dismi  ss="modal">No</button>
              </div>
            </div>
          </div>
        </div>';  */
        
        
        echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>';
  }

  function modalCursos(){



  echo   ' <div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Título del modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>El texto del cuerpo modal va aquí.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar cambios</button>
        </div>
        </div>
    </div>
    </div> ';


  }




  function footerSite()
  {
      echo '<footer class="templatemo-footer" >
            <div class="templatemo-copyright">
            <p>Derechos Reservados &copy;</p>
            </div>
            </footer>
            <script src="../View/js/jquery.min.js"></script>
            <script src="../View/js/bootstrap.min.js"></script>
            <script src="../View/js/templatemo_script.js"></script>'; 
            echo '<script src="../View/js/jquery.min.js"></script>';
  }

  function footerLogin()
  {
      echo '<script src="../View/js/jquery.min.js"></script>
            <script src="../View/js/bootstrap.min.js"></script>'; 
  }

?>