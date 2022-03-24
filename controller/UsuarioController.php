<?php
class UsuarioController{
    
    
    public function index(){
        
        $this->list();
    }
    
    public function list(){
        if(!Login::isAdmin())
            throw  new Exception("No tiene permiso para hacern esto.");
        
        $usuarios =Usuario::get();
        
        include '../view/usuario/lista.php';
    }
    
    public function  show(int $id=0){
        
        if(!(Login::isAdmin() || Login::get()->id=$id))
            throw  new Exception("No tiene permiso para hacern esto.");
        
        
        
        if(!$usuario = Usuario::getById($id))
             throw  new Exception("No se puede recuperar el usuario.");
        
             include '../view/usuario/detalles.php';
    }
    
    
    public function  create(){
       
            
            include '../view/usuario/nuevo.php';
    }
    
    public function store(){
        
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
          $usuario= new Usuario();
         
          
           
            $usuario->usuario =$_POST['usuario'];
            $usuario->clave =md5($_POST['clave']);
            $usuario->nombre =$_POST['nombre'];
            $usuario->apellido1 =$_POST['apellido1'];
            $usuario->apellido2 =$_POST['apellido2'];
            $usuario->poblacion =$_POST['poblacion'];
            $usuario->cp =$_POST['cp'];
            $usuario->privilegio =intval($_POST['privilegio']);
            $usuario->administrador =empty($_POST['administrador'])? 0 : 1;
     
            $usuario->email =$_POST['email'];
            echo "<pre>";
            var_dump($usuario);
            echo "</pre>";
           /* $errores =$usuario->errorDeValidacion();
            
            if(sizeof($errores)){
                throw new Exception(join('<br>', $errores));
            }*/
            if(Upload::arrive('imagen'))
                $usuario->imagen = Upload::save(
                    'imagen', 'img/libros', true,0,'image/*','book_');
                
                if(!$usuario->guardar()){
                    @unlink($usuario->imagen);
                    throw new Exception("No se pudo guardar $usuario->nombre");
                }
              
       
                
                
                $mensaje="Guardar del id $usuario correcto.";
                include '../view/exito.php';
    }
    
    
    
    
    public function edit(int $id=0){
        
        $usuario = Usuario::getById($id);
        
        if(!$usuario)
            throw new Exception('No se indico el usuario.');
            

            
           /* if(!$socio)
                throw new Exception("No existe el usuario .");*/
                
                
                
                include '../view/usuario/actualizar.php';
    }
    
    
    public function update(){
        
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .');
       
            
            $id = intval($_POST['id']);
            if(!$usuario = Usuario::getById($id))
                throw new Exception('No existe el usuario $id .');
            $usuario->usuario =$_POST['usuario'];
            
            $usuario->nombre =$_POST['nombre'];
            $usuario->apellido1 =$_POST['apellido1'];
            $usuario->apellido2 =$_POST['apellido2'];
            $usuario->privilegio =intval($_POST['privilegio']);
            $usuario->administrador =empty($_POST['administrador'])? 0 : 1;
            $usuario->email =$_POST['email'];
            
            
           
            if(!empty($_POST['clave']))
               $usuario->clave = md5($_POST['clave']);
        
           if($usuario->actualizar()===false)
               throw new Exception('No se actualizar %usuario->usuario  .');
    
                
            $GLOBALS['mensaje'] ="Actualizar del socio $usuario->id correcta.";
                
           $this->edit($usuario->id);
    }
    
    
    public function delete(int $id=0){
        
      
        
        
        
        if(! $usuario=Usuario::getById($id)){
            throw new Exception("No se existe el socio $id.");
        }
        
        include '../view/usuario/borrar.php';
    }
    
    public function destroy(){
        
        $id=empty($_POST['id'])? 0 :intval($_POST['id']);
        
        
        if(!Usuario::borrar($id))
            throw new Exception('No se pudo dar baja el usuario $id  .');
            
           
  
                
                
                $mensaje="El usuario ha sido dado de baja correctamente  .";
                include '../view/exito.php';
                
    }
    
    
    
    
    
    
    
}