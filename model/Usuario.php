<?php
class Usuario extends model{
 
    
    
    public static function identificar(string $u='',string $p=''):?Usuario{
        
        $consulta="SELECT * FROM usuarios WHERE (usuario='$u' or email='$u')
        and clave='$p'";
        
        return DB::select($consulta,self::class);
    }
    
    

   
}