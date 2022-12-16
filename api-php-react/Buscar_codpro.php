<?php
include_once ('corn.php');
$datos = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
if(isset($datos)){
    $resultado = Buscar_colcod($datos->Codigo);
    echo json_encode($resultado);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos contactar a soporte'));
}
?>
