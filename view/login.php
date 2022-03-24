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
<script src="js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="js/myscript.js"></script>

<title>Login</title>
</head>
<body>
   <?php 
   
   (TEMPLATE)::login();
   (TEMPLATE)::nav("");
 
   ?>
    
   <div  class="container">
        <h2 class="text-center">Acceso a la aplication</h2>
        <form method="post" action="/login/login" class="form_login">
             <div class="mb-3 mt-3">
               <label for="email" class="form-label">Usuario o email:</label>
               <input type="text" class="form-control" name="usuario" required>
              </div>
               <div class="mb-3">
                  <label for="pwd" class="form-label">Clave:</label>
                  <input type="password" class="form-control"   name="clave" required>
                </div>
        
         
          
            <input type="submit" name="identificar"  class="btn btn-primary" value="Idenficarse">
            
        </form>
        
       
       
    </div> 
    <?php 
    (TEMPLATE)::footer();
    ?>
</body>
</html>