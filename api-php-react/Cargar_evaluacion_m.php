<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Cargar_evaluacion_m($data);
            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            foreach($devuelta as &$valor){
                $fecha_entrada = strtotime($valor->fecha_max);
                if($fecha_actual > $fecha_entrada)
                {
                    vence_eva(2,$valor->id,null); 
                }      
            }
        break;
        case 1:
            $devuelta = Cargar_evaluacion_E($data);
            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            foreach($devuelta as &$valor){
                $fecha_entrada = strtotime($valor->fecha_max);
                if($fecha_actual > $fecha_entrada)
                {
                    vence_eva(2,$valor->id,null); 
                }      
            }
        break;
        case 2:
            $devuelta = Cargar_preguntas_eva($data->idm);
        break;
        case 3:
            $h = intval($data->horas);
            $m = intval($data->minutos);
            $s = intval($data->segundos);
            $hs = $h*3600;
            $ms = $m*60;
            $time_restado = intval($data->tiempoSalio); 
            $time = $hs + $ms + $s - $time_restado;
            $hrs = round($time / 3600);
            $puntos = $devuelta = Cargar_preguntas_eva($data->id_eva);
            $correctas = 0;
            $abiertas = 0;
            $TOTAL_puntos = 0;
            $datos = [];
            foreach ($puntos as $key => $valuep) {
                foreach ($data->respuesta as $key => $value) {
                    if($value[0] === $valuep->id){
                        $TOTAL_puntos++;
                        if($valuep->Tipo == 1){
                            if( $value[1] == $valuep->respuesta){
                                $correctas++;
                            }
                        }else if($valuep->Tipo == 2){
                            $abiertas++;
                                $datos = [...$datos,$valuep->Tipo=>$value];
                            
                        }
                    }
                }
            }
            $min = round(($time /60) % 60); 
            $segus = round($time % 60);
            $tiempo = $hrs.":".$min.":".$segus;
            if($TOTAL_puntos >= 0){
                $devuelta = Crear_nota_eva($data,$correctas,$abiertas,$TOTAL_puntos,$tiempo,$datos);
            }else{
                $devuelta = "error al calculo";
            }
            break;
        case 4:
            $devuelta = Cargar_preguntas_eva_individual($data->idp);
            break;
        case 5:
            $contar = veri_eva($data);
            if($contar == 0){
                $devuelta = array("estado"=>true);
            }else{
                $datos = veri_eva_t($data);
                $devuelta = array("estado"=>false,"estado_n"=>$datos[0]->estado,"nota"=>$datos[0]->nota);
            }
            break;
        case 6:
            $devuelta = vence_eva($data->estado,$data->id,$data->fecha);
            break;
        case 7:
            $devuelta = Cargar_evaluacion_notas($data->id);
            break;
        
        
    }
    echo json_encode($devuelta);

}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>
    