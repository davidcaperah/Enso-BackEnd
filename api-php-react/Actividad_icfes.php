<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    
    $st = $data->d;
    
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Crear_actividad_icfes_m($data);
        break;
        case 1:
            $devuelta = Crear_actividad_icfes_h($data);
        break;
        case 2:
            $devuelta = Cargar_icfes_m($data);
        break;
        case 3:
            $devuelta = Cargar_icfes_p($data);
        break;
        case 4:
            $devuelta = Cargar_icfes_m_all($data);
        break;
        case 5:
            $devuelta = Cargar_icfes_m_alls();
        break;
        case 6:
        break;
        case 7:
            $devuelta = Editar_icfes_m($data);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>
