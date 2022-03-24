<?php
class AnuncioController{
    
    
    
    
        public function index(){
            $this->list();
          
        }
        
        
        
        public function list(){
            $anuncios = Anuncio::get();
            
            
            include '../view/anuncio/lista.php';
        }
        
        
        public function show(int $id=0){
            if(!$id)
                throw new Exception("No se indicó el anuncio .");
                
            $anuncio=Anuncio::getById($id);
            
         
            
            if(!$anuncio)
                throw new Exception("No se ha encontrado el anuncio $id .");
           
           $u=$anuncio->getIdUsuario();
              
           include '../view/anuncio/detalles.php';
                    
        }
        
        
        public function create(){
            
            if(Login::get()== NULL)
                throw  new Exception("No tiene permiso para hacern esto.");
                
                include '../view/anuncio/nuevo.php';
                
        }
        
        public function store(){
            
            if(Login::get()== NULL)
                throw  new Exception("No tiene permiso para hacern esto.");
                
                if(empty($_POST['guardar']))
                    throw new Exception('No se recibieron datos');
                    
                    $anuncio = new Anuncio();
                    $anuncio->idusuario =DB::escape($_POST['idusuario']);
                    $anuncio->titol =DB::escape($_POST['titol']);
                    $anuncio->descripcion =DB::escape($_POST['descripcion']);
                    $anuncio->preu =DB::escape($_POST['preu']);
                   
               
                    
                    $errores =$anuncio->errorDeValidacion();
                    
                    if(sizeof($errores)){
                        throw new Exception(join('<br>', $errores));
                    }
                    if(Upload::arrive('imagen'))
                        $anuncio->imagen = Upload::save(
                            'imagen', 'img/libros', true,0,'image/*','book_');
                        
                        if(!$anuncio->guardar()){
                            @unlink($anuncio->imagen);
                            throw new Exception("No se pudo guardar $anuncio->titulo");
                        }
                        
                        $mensaje="Guardar del ibro $anuncio correcto.";
                        include '../view/exito.php';
        }
        
        
        
        public function edit(int $id=0){
            
            if(!$id)
                throw new Exception('No se indico el anuncio.');
                
                
                $anuncio = Anuncio::getById($id);
                
                if(Login::get()->id!== $anuncio->idusuario && Login::isAdmin()==false)
                    throw new Exception('No tienes permiso para esta operacion');
                
                if(!$anuncio)
                    throw new Exception("No existe el anuncio $id");
                    
                    
                    
                    include '../view/anuncio/actualizar.php';
        }
        
        public function update(){
            
            if(empty($_POST['actualizar']))
                throw new Exception('No se recibieron datos .');
            
                
                $anuncio =Anuncio::getById(intval($_POST['id']));
                
                if(Login::get()->id!== $anuncio->idusuario && Login::isAdmin()==false)
                    throw new Exception('No tienes permiso para esta operacion');
                
                    
                if(!$anuncio)
                    throw new Exception('No existe el libro.');
                 
                    
                    $anuncio->titol =$_POST['titol'];
                    $anuncio->descripcion =$_POST['descripcion'];
                    $anuncio->preu =$_POST['preu'];
                  
                    if(!empty($_POST['eleminarimagen'])){
                        $imagenABorrar =$anuncio->imagen;
                        $anuncio->imagen =NULL;
                    }
                    if(Upload::arrive('imagen')){
                        $imagenASustituir = $anuncio->imagen;
                        $anuncio->imagen =Upload::save('imagen', 'img/libros', true,0,'image/*','book_');
                    }
                    
                    $errores =$anuncio->errorDeValidacion();
                    
                    if(sizeof($errores)){
                        throw new Exception(join('<br>', $errores));
                    }
                    
                    
                    if($anuncio->actualizar() === false)
                        
                        throw  new Exception("No se pudo actualizar $anuncio->titol");
                        
                        $GLOBALS['mensaje'] ="Actualizar del libro $anuncio->titol correcta.";
                        
                        $this->edit($anuncio->id);
        }
        
        
        public function delete(int $id=0){
            
  
            if(!$id){
                throw new Exception("No se indico el anuncio a borrar.");
            }
            
            $anuncio=Anuncio::getById($id);
           
            if(Login::get()->id!== $anuncio->idusuario && Login::isAdmin()==false)
                throw new Exception('No tienes permiso para esta operacion');
            if(!$anuncio){
                throw new Exception("No se existe el anuncion $id.");
            }
            
            include '../view/anuncio/borar.php';
        }
        
        
        public function destroy(){
            
        
            if(empty($_POST['borrar']))
                throw new Exception('No se recibio  confirmación .');
                
                $id = intval($_POST['id']);
                
                if(!$anuncio = Anuncio::getById($id))
                    throw new Exception("No existe el anuncio $id");
                
                    if(Login::get()->id!== $anuncio->idusuario && Login::isAdmin()==false)
                        throw new Exception('No tienes permiso para esta operacion');
                    
                        
                    if(Anuncio::borrar($id)===false)
                        throw new Exception("No se pudo borrar.");
                        
                        @unlink($anuncio->imagen);
                        
                        $mensaje="Borrado  del anuncio $id correcto.";
                        include '../view/exito.php';
                        
        }
        
        
        
        
        public function buscar(){
            
            if(empty($_POST['buscar'])){
                $this->list();
                return;
            }
            
            
            
            $campo=$_POST['campo'];
            $valor=$_POST['valor'];
            $orden=$_POST['orden'];
            $sentido =empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
            
            $anuncios =Anuncio::getFiltred($campo, $valor, $orden, $sentido);
            
            require_once '../view/anuncio/lista.php';
            
            
        }
        
      
}