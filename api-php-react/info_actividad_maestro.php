<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Crear_actvidad_d($data);
        break;
        case 1:
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
        case 2:
            $devuelta = Editar_actividad_d($data);
        break;
        case 3:
            $devuelta = cargar_actividad_d($data);
             $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            foreach($devuelta as &$valor){
                $fecha_entrada = strtotime($valor->fecha_MAX);
                if($fecha_actual > $fecha_entrada)
                {
                    vence_actividad(2,$valor->id); 
                }      
            }
        break;
        case 4:
            $devuelta = Cargar_icfes_m_all($data);
        break;
        case 5:
            $devuelta = Editar_actividad_dd($data);
        break;
        case 6:
            $devuelta = Eliminar_actividad($data);
        break;
        case 7:
            $devuelta = cargar_actividad_cd($data);
        break;
        case 8:
            $devuelta = vence_actividad_estado($data);
        break;       
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>