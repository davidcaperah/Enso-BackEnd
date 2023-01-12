<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Crear_actividad_libro($data);
        break;
        case 1:
            $devuelta = Cargar_actividad_libro($data);
        break;
        case 2:
            $devuelta = Editar_actividad_libro($data);
        break;
        case 3:
            $devuelta = Borrar_actividad_libro($data);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>