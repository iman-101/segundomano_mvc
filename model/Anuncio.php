<?php
class Anuncio extends Model{
    
    
    
    public function errorDeValidacion():array{
        $errores =[];
        
        
        
        
        if(strlen($this->titol)<1 || strlen($this->titol) >64){
            $errores[] = "Error en la longitud del titulo";
        }
        
       
        
        return $errores;
    }
    
    
   
    public function getIdUsuario(){
      
        
        $consulta = "SELECT nombre, apellido1, apellido2, cp, poblacion from v_anuncio_usuario where id=$this->id";
        
        return DB::select($consulta,'Anuncio');
    }
 
    
    
    
}