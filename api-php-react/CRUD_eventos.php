<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Crear_evento($data);
        break;
        case 1:
            $devuelta = Contar_eventos($data);
        break;
        case 2:
            $devuelta = Cargar_eventos($data);
        break;
        case 3:
            $devuelta = Crear_par_evento($data);
        break;
        case 4:
            $devuelta = Contar_eventos_p($data);
        break;
        case 5:
            $devuelta = Cargar_eventos_P($data);
        break;
        case 6:
            $devuelta = Borrar_evento($data->id);
        break;
        case 7:
            $devuelta = Cargar_eventos_id($data);
        break;
        case 8:
            $devuelta = verificar_evento_par($data);
        break;
        case 9:
            $num = verificar_evento_lista($data);
            $array = array();
            $i = 1;
            foreach($num as $key){
                $est = array("result"=>$key->result,"id"=>$key->id,
                "Nombre"=>$key->Nombre,
                "Apellido"=>$key->Apellido,
                "nombreC"=>$key->nombreC,
                "Puesto"=>$i);
                array_push($array,$est);
                $i++;  
                }
                $devuelta = array_slice($array,0,5);  
        break;
        case 10:
            $devuelta = Contar_paticipantes($data);
        break;
        case 11:
            $devuelta = verificar_evento_lista($data);
        break;
        case 12:
            $devuelta = Cambiar_puntos($data);
        break;
        
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>