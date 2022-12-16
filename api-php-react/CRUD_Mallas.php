<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Crear_pensamiento($data);
        break;
        case 1:
            $devuelta = Cargar_Pensamiento($data);
        break;
        case 2:
            $devuelta = Borrar_Pensamiento($data->id);
        break;
        case 3:
            $devuelta = Crear_evidencias_mallas($data);
        break;
        case 4:
            $devuelta = Cargar_evidencias_mallas($data);
        break;
        case 5:
            $devuelta = Borrar_evidencias_mallas($data->id);
        break;
        case 6:
            $devuelta = Crear_Competencias($data);
        break;
        case 7:
            $devuelta = Cargar_Competencias($data);
        break;
        case 8:
            $devuelta = Borrar_Competencias($data->id);
        break;
        case 9:
            $devuelta = Crear_Derechos($data);
        break;
        case 10:
            $devuelta = Cargar_Derechos($data);
        break;
        case 11:
            $devuelta = Borrar_Derechos($data->id);
        break;
        case 12:
            $devuelta = Crear_estandares($data);
        break;
        case 13:
            $devuelta = Cargar_estandares($data);
        break;
        case 14:
            $devuelta = Borrar_estandares($data->id);
        break;
        case 15:
            if(!$data->nombre == ''){
                $buscador = Buscador_actividad($data);
                if(empty($buscador)){
                    $devuelta = array('mensaje'=>'No encontro nada que coincida','tipo'=>'1');
                }else{
                    $devuelta = $buscador;
                }
            }else{
                $devuelta = array('mensaje'=>'Esperando busqueda','tipo'=>'2');
            }
        break;
        case 16:
            $tema = $data->sub_tema;
            $id = $data->id;
            $devuelta = Update_actividad_subtema($tema,$id);
        break;
        case 17:
            $devuelta = Cargar_actividad_malla_sub($data->sub_tema);
            break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>