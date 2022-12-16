<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){   
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $cargar = Cargar_Actividad_admin($data);
            if(isset($cargar)){
                $devuelta = json_encode($cargar);
            }else{
                $devuelta = json_encode(array('mensaje'=>false));
            }
            $devuelta = json_encode($cargar);
        break;
        case 1:
        break;
        case 3:
             $borrar = Borrar_activdad_admin($data->id);
             if($borrar){
               if(!$data->idM == NULL){
                    $editar = Editar_icfes_m($data);
                    if($editar){
                        $devuelta = json_encode(array('mensaje'=>'se a elimando la actividad correctamente tiene tipo icfes'));
                    }else{
                        $devuelta = json_encode(array('mensaje'=>'fallo el editar la tipo icfes'));
                    }
               }else{
                $devuelta = json_encode(array('mensaje'=>'se a eliminado la actividad no contiene tipo icfes'));
               }
             }else{
                $devuelta = json_encode(array('mensaje'=>'error al borrar la actividad'));
             }

             break;
    }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>