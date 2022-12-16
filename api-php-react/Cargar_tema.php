<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
   if($data->d == 1){
        $todos = Cargar_tema_todos($data);
    if($todos){
        echo json_encode($todos);       
    }else{
        echo json_encode(array('mensaje'=>'d no esta bien definido'));
    }
   }else{
    $buscar = Cargar_tema($data);
    if($buscar){
        echo json_encode($buscar);       
    }else{
        echo json_encode(array());
    }  
   }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>