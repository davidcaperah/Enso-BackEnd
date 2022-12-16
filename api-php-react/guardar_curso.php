<?php
include_once  ('corn.php'); 
$curso = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
if($curso){ 
    $resultado = db_agregar_cur($curso);
    echo  json_encode($resultado);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>