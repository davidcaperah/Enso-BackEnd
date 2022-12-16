<?php 
include_once  ('corn.php') ;
$perfil = json_decode(file_get_contents( "php://input" ));
require_once  ('config.php') ;
$devuelta = "";
if(isset($perfil)){
    $opt = [
        'const' =>12,
    ];
    $contra = password_hash($perfil->clave,PASSWORD_BCRYPT,$opt);
    $eliminar = Eliminar_token_r($perfil->infotoken[0]->codigo);
    if($eliminar){
       
        $devuelta = Cambiar_contra($contra,$perfil->infotoken[0]->correo);
    }else{
        
    }   
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>