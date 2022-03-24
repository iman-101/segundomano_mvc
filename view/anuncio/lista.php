
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
    
       

      <div class="con text-white border p-4">
          <form method="post" action="/anuncio/buscar">
             
             <label>Camp:</label>
             
          <select name="campo">
             
                  <option value="titol" <?=!empty($campo) && $campo=='titol'? ' selected ' :'';?>>
                  
                  titulo</option>
                  
               
                  
                  <option value="preu" <?=!empty($campo) && $campo=='preu'? ' selected ' :'';?>>
                  
                  Precio</option>
                  
             </select>
             
            <label>Valor:</label>
            
            <input type="text" name="valor" value=""<?=!empty($valor)? $valor : '';?>>
            
             <label>Orden:</label> 
             
              <select name="orden">
                 <option value="titol" <?=!empty($orden) && $orden=='titol'? ' selected ' :'';?>>
                  
                  titulo</option>
                  
               
                  
                  <option value="preu" <?=!empty($orden) && $orden=='preu'? ' selected ' :'';?>>
                  
                  Precio</option>
              </select>
              
             <input type="radio" name="sentido" value="ASC"  
             <?=empty($sentido) || $sentido=='ASC'? ' checked ' :'';?>>
            <label>ascedente</label>
            
             <input type="radio" name="sentido" value="DESC"  
             <?=!empty($sentido) && $sentido=='DESC'? ' checked ' :'';?>>
             
             <input type="submit" name="buscar" value="Buscar">
          </form>
      </div>
       <h2>Lista de anuncios</h2>
       
      <div class=" text-white border p-4">
         
      
         <table border='1'  class="table table-striped">
              <tr>
                 <th scope="col">Imagen</th>
                 <th scope="col">Titulo</th>
                 <th scope="col">Descripcion</th>
                 <th scope="col">Preu</th>
                 <th scope="col">Operaciones</th>
              </tr>
              
              
              <?php 
              $u= login::get();
              foreach($anuncios as $anuncio){
                  if($u==null){
                      
                      echo "<tr>";
                      echo "<td>";
                      echo $anuncio->imagen ? "<img height='50' src='/$anuncio->imagen' alt='$anuncio->titol'>" :
                      "<img height='50' src='/img/libros/default.png' alt='$anuncio->titol'>";
                      echo "</td>";
                      echo " <td>$anuncio->titol</td>";
                      echo " <td>$anuncio->descripcion</td>";
                      echo " <td>$anuncio->preu</td>";
                      echo " <td>";
                      echo " <a href='/anuncio/show/$anuncio->id'>ver</a>";
                   
                      echo "</td>";
                      echo "</tr>";
                  }else{
                     
                      if($u->id==$anuncio->idusuario){
                          echo "<tr>";
                          echo "<td>";
                          echo $anuncio->imagen ? "<img height='50' src='/$anuncio->imagen' alt='$anuncio->titol'>" :
                          "<img height='50' src='/img/libros/default.png' alt='$anuncio->titol'>";
                          echo "</td>";
                          echo " <td>$anuncio->titol</td>";
                          echo " <td>$anuncio->descripcion</td>";
                          echo " <td>$anuncio->preu</td>";
                          echo " <td>";
                          echo " <a href='/anuncio/show/$anuncio->id'>ver</a>";
                          echo " <a href='/anuncio/edit/$anuncio->id'>Actualizar</a>";
                          echo " <a href='/anuncio/delete/$anuncio->id'>Borrar</a>";
                          echo "</td>";
                          echo "</tr>";
                      }else{
                          
                          echo "<tr>";
                          echo "<td>";
                          echo $anuncio->imagen ? "<img height='50' src='/$anuncio->imagen' alt='$anuncio->titol'>" :
                          "<img height='50' src='/img/libros/default.png' alt='$anuncio->titol'>";
                          echo "</td>";
                          echo " <td>$anuncio->titol</td>";
                          echo " <td>$anuncio->descripcion</td>";
                          echo " <td>$anuncio->preu</td>";
                          echo " <td>";
                          echo " <a href='/anuncio/show/$anuncio->id'>ver</a>";
                          if(Login::isAdmin() || Login::hasPrivilege(500)){
                              echo " <a href='/anuncio/edit/$anuncio->id'>Actualizar</a>";
                              echo " <a href='/anuncio/delete/$anuncio->id'>Borrar</a>";
                          }
                          
                          echo "</td>";
                          echo "</tr>";
                      }
                  }
               
              }
              ?>
         </table>
         

    </div>
     <?php 
     (TEMPLATE)::footer();
     
     ?> 
  </body>
 </html> 
   