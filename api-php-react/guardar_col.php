<?php
include_once ('corn.php');
$datos = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
if($datos){
        $resultado = db_agregar_col($datos);
       if($resultado){
                $id = Buscar_col($datos->Nombre);
                echo json_encode($id);
       }else{
        echo json_encode(array('mensaje'=>'id no encontrada'));
       }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>