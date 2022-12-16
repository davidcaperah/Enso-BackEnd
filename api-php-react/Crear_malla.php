<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $buscar = Crear_area($data);
    echo json_encode(array("estado"=>$buscar));
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>