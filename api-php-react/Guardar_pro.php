<?php
include_once  ('corn.php') ;
$perfil = json_decode(file_get_contents( "php://input" ));
require_once  ('Fuctions.php') ;
$email = db_Buscar_email_pro($perfil->email);
if($email <= 0){
    $resultado = Guardar_Perfil_Pro($perfil);
            if($resultado){

                  $id = Buscar_idpro($perfil->email);
                  echo json_encode($id);
                  
            }else{
                  echo json_encode(array('mensaje'=>'id no encontrada'));
            }
}else{
    echo json_encode(array('mensaje'=>'Email Incorrecto o/u existente'));
};
?>