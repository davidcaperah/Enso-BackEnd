<?php 
include_once  ('corn.php') ;
include_once ('enviar.php');
$perfil = json_decode(file_get_contents( "php://input" ));
require_once  ('config.php');
$devuelta = "";
if(isset($perfil)){
    $pass = token_verfi($perfil->token);
    if(!$pass == 0){
        $devuelta = token_verfi_t($perfil->token);
    }else{
        $devuelta = false;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>