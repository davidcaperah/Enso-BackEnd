<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = anuncios_Editar($data);
        break;
        case 1:
            $devuelta = anuncios_Borrar($data);
        break;
        case 2:
            $devuelta = anuncios_Crear($data);
        break;
        case 3:
            $devuelta = anuncios_Cargar($data);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>