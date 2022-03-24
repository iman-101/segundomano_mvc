
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="../mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="../js/jquery.js"></script>
<!--bootstrap js-->
<script src="../js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="../css/style.css">

       
<script type="text/javascript" src="../js/activeClass.js"></script>  


<title>Tienda de segund mano</title>
<script src="https://www.google.com/recaptcha/api.js?h1=ca"></script>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../");
  
    ?>
    <div class="container">
       <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/foto2.jpg" class="d-block w-100" alt="reloj">
               <div class="carousel-caption d-none d-md-block">
                 <!--<h5 class="animated bouceInRight fs-1 fw-2 text-danger" style="animation-delay:1s">Relojes de lujo</h5>-->
                <p class="animated bouceInLeft" style="animation-delay:2s">Disponemos de relojes de segunda mano de las mejores marcas a precio de oportunidad.</p>
              </div>
        </div>
        <div class="carousel-item">
      
          <img src="img/foto4.jpg" class="d-block w-100" alt="...">
           <div class="carousel-caption d-none d-md-block">
               <!-- <h5 class="animated bouceInRight fs-1 fw-2 text-danger" style="animation-delay:1s">Relojes de lujo</h5>-->
                <p class="animated bouceInLeft" style="animation-delay:2s">Disponemos de relojes de segunda mano de las mejores marcas a precio de oportunidad.</p>
              </div>
        </div>
        <div class="carousel-item">
          <img src="img/foto1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
           <!--  <h5 class="animated bouceInRight fs-1  fw-2 text-danger" style="animation-delay:1s">Relojes de lujo</h5>-->
                <p class="animated bouceInLeft" style="animation-delay:2s">Disponemos de relojes de segunda mano de las mejores marcas a precio de oportunidad.</p>
              </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>  
     <?php 
     (TEMPLATE)::footer();
     
     ?> 

    
    </body>
</html>
