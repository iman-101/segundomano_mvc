
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="../../mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="../../js/jquery.js"></script>
<!--bootstrap js-->
<script src="../../js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script type="text/javascript" src="../../js/myscript.js"></script>

<title>Biblioteca</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
    <div class="container">
        <h2 class="me-3 text-info w-4">Detalles del anuncio</h2>
        <h3 class="m-3"><?=$anuncio->titol?></h3>
        <figure class="p-3">
           <?php 
           echo $anuncio->imagen ? "<img height='100' src='/$anuncio->imagen' alt='$anuncio->titol'>" :
                 "<img height='100' src='/img/libros/default.png' alt='$anuncio->titol'>";
           
           
           ?>
        
        </figure>
        
        <p><b>Titulo : </b><?=$anuncio->titol?></p>
        <p><b>Descripcion : </b><?=$anuncio->descripcion?></p>
      
        <p><b>Precio : </b><?=$anuncio->preu?></p>
      
     
       
        <h2>usuario</h2>
       
       <p><b>Usuario : </b><?=$u->nombre?></p>
        
       <p><b>Apellido2 : </b><?=$u->apellido1?></p>  
        
       <p><b>Apellido2 : </b><?=$u->apellido2?></p>

       <p><b>CP : </b><?=$u->cp?></p>
       
       <p><b>Poblacion : </b><?=$u->poblacion?></p>
     
  </div>
   <?php 
     (TEMPLATE)::footer();
     
     ?> 
   </body>
   </html>
      