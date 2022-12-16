<?php 
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
require_once  ('config.php') ;
$devuelta = '';
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
           $devuelta = Crear_qr($data);  
        break;
        case 1:
            $devuelta = Cargar_qr($data);  
        break;
        case 2:
            $devuelta = Cargar_qr_id($data->id);  
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos','datos'=> $data));
}

?>