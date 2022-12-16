<?php
include_once ('corn.php');
$datos = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
if($datos){
    $email = db_buscar_email_estu($datos->Email);
    if($email<= 0){
        $consulta = Guardar_Perfil_Estu($datos);
        $id = Buscar_idestu($datos->Email);
        $borrar = Borrar_cod_estu($datos->id);
        if($borrar){
            echo json_encode($borrar);
        }else{
            echo json_encode(array('mensaje'=>'error verifique codigo con el soporte error #16'));
        }
    }else{
        echo json_encode(array('mensaje'=>'Correo electronico invalido u/o existente'));
    }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>