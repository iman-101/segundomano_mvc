
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

        <h2>Formulario de edicion</h2>
        
        
        <?=empty($GLOBALS['mensaje'])? "" : "<p>".$GLOBALS['mensaje']."</p>"?>
        
        
        
        <form method="POST" action="/anuncio/update" enctype="multipart/form-data">
           
           <input type="hidden" name="id" value="<?=$anuncio->id?>">
         
          
           
           <figure>
              <figcaption>Imagen actual</figcaption>
              <?php 
              if(($anuncio->imagen)){
                  echo "<img height='100' src='/$anuncio->imagen' alt='$anuncio->titol'><br>";
                  echo "<input type='checkbox' name='eleminarimagen' value='1'>";
                  echo "<label>Eleminar la imagen</label><br>";
              }else{
                  echo "<img height='100' src='/img/libros/default.png' alt='$anuncio->titol'><br>";
              }
              
              ?>
           
           
           
           </figure>
           <label>Nueva imagen: </label>
           <input type="file" name="imagen" accept="image/*">
           <span>(no indicar si no se desea cambiar)</span><br>
           
            <label>Titulo</label>
           <input type="text" name="titol" value="<?=$anuncio->titol?>"><br>
           
           <label>Descripcion</label>
           <input type="text" name="descripcion" value="<?=$anuncio->descripcion?>"><br>
           
           <label>Precio</label>
           <input type="text" name="preu" value="<?=$anuncio->preu?>"><br>
           
          
         
           
          
           
           <input type="submit" name="actualizar"  value="Actualizar"><br>
        
        </form>
        <a href="/anuncio/show/<?=$anuncio->id?>">Detalles</a>
        <a href="/anuncio">Volver al listado</a>
    </div>
     <?php 
     (TEMPLATE)::footer();
     
     ?> 
</body>
</html>