

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
        <h2>Confiramar borrado</h2>
    
        <form method="post" action="/anuncio/destroy">
           <p>Confirmar el borrado del anuncio<?=$anuncio->titol ?></p>
           <input type="hidden" name="id" value="<?=$id?>">
           <figure>
           
           <?php 
           echo $anuncio->imagen ?
                  "<img height='100' src='/$anuncio->imagen' alt='$anuncio->titol'>" :
                  "<img  height='100' src='/img/libros/default.png' alt='$anuncio->titol' >";
           
           ?>
           </figure>
           <input type="submit" name="borrar" value="Borrar">
        </form>
        
        
        <a href="/libro/list">Volver al listado</a>
   </div>
</body>
</html>