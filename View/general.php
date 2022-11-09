<?php

 function headerSite()
 {
   echo '<title>Título</title>
           <meta name="keywords" content="" />
           <meta name="description" content="" />
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="../View/css/menu.css" rel="stylesheet" type="text/css">
           <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
           <script src="https://kit.fontawesome.com/a1b472f1fb.js" crossorigin="anonymous"></script>';
 }

 function modal()
 {
   echo '<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
           <div class="modal-content">
           
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
               <h4 class="modal-title" id="myModalLabel"></h4>¿Está seguro que quiere cerrar sesión?</h4>
             </div>

             <div class="modal-footer">
               <a href="" class="btn btn-primary">Sí</a>
               <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
             </div>

           </div>
         </div>
       </div>';    
 }
