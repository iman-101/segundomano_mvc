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
<script type="text/javascript" src="../../js/activeClass.js"></script> 
<title>Biblioteca</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
    
    <div class="container">
        <h2 class="text-center">Nuevo anuncio</h2>
        
        <form class="form_login"method="POST" action="/anuncio/store" enctype="multipart/form-data">
          
            <?php 
          
            
            $u=Login::get();
          
          ?>
             <input type="hidden" name="idusuario" value="<?=$u->id?>"><br>
           <div class="mb-3 mt-3">
                   <label class="form-label" >Titulo</label>
                   <input type="text" name="titol" class="form-control"   >
             </div>
            <div class="mb-3 mt-3"> 
              <label class="form-label" >Descripcion</label>
             
              <textarea class="form-control" rows="5"  name="descripcion"></textarea>
             </div> 
            <div class="mb-3 mt-3">
              <label class="form-label" >Imagen</label>
              <input type="file"  class="form-control" accept="image/*" name="imagen"><br>
            </div>
         
           <div class="mb-3 mt-3">
             <label class="form-label" >Precio</label>
             <input type="text" name="preu" class="form-control" ><br>
           </div>
           
           <input type="submit" name="guardar" class="btn btn-primary" value="Guardar"><br>
           <a href="/anuncio/list">Volver al listado</a>
        </form>
     
                
        
     </div>
      <?php 
     (TEMPLATE)::footer();
     
     ?> 
</body>
</html>