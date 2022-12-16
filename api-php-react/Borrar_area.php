<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $buscar = Borrar_area($data->id);
    if($buscar){
        $borrar = borrar_materia_area($data->id);
        if($borrar){
            echo json_encode($borrar);
        }else{
            echo json_encode(array('mensaje'=>'no existe el objeto que intenta borrar'));
        }
    }else{
        echo json_encode(array('mensaje'=>'no existe el objeto que intenta borrar'));
    }  
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>