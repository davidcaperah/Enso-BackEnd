<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Agenda_Cargar($data);
        break;
        case 1:
            $devuelta = Agenda_Crear($data);
        break;
        case 2:
            $devuelta = Agenda_Eliminar($data->id);
        break;
        case 3:
            $devuelta = Cambiar_estado($data);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>