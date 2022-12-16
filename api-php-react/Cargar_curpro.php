<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $consulta = Buscar_Curpro($data->id);
    $hola = json_encode($consulta);
    echo $hola;
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>