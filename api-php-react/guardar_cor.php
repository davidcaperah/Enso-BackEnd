<?php
include_once  ('corn.php') ;
$perfil = json_decode(file_get_contents( "php://input" ));
require_once  ('Fuctions.php') ;
$codi = db_buscar_codigo_cor($perfil->Codigo);
$email = db_buscar_email($perfil->email);
// $codi = "david";
// $email = "ffsafsafas@gmail.com";
if($email <= 0){
      if($codi == true){
            $resultado = Guardar_Perfil_Cor($perfil);
            $BorrarCod = Borrar_Cod($perfil->Codigo);
            if($resultado){

                  $id = Buscar_codcor($perfil->email);
                  echo json_encode($id);
                  
            }else{
                  echo json_encode(array('mensaje'=>'id no encontrada'));
            }

      }else{
            echo json_encode(array('mensaje'=>'Codigo no valido contactar a Soporte'));
      }
}else{
    echo json_encode(array('mensaje'=>'Email Incorrecto o/u existente'));
};

?>