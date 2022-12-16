<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = C_autor($data);
        break;
        case 1:
            $devuelta = Crear_autor($data);
        break;
        case 2:
            $devuelta = Editar_Autor($data);
        break;
    }
    echo json_encode($devuelta); 
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>