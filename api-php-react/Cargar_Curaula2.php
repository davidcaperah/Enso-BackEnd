<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $estu = Cargar_Estucur($data);
    $hola = json_encode($estu);
    echo $hola;
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>