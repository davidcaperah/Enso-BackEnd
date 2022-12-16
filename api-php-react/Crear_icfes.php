<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    if($data->tipo == 0){
       $crear =  Crear_actividad_icfes_h($data);
        echo json_encode($crear);
    }else{
        echo json_encode(array('mensaje'=>'no es el tipo exacto'));
    }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>