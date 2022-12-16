<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Cargar_cor_admim();
        break;
        case 1:
            $devuelta = Cargar_col_admim($data);
            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            foreach($devuelta as &$valor){
               $fecha_entrada = strtotime($valor->fecha_vencimiento);
               if($fecha_actual > $fecha_entrada)
                    {
                       colegio_vence(0,$valor->id);
                    }else{
                        colegio_vence(1,$valor->id);
                    } 
                }
        break;
        case 2:
            $devuelta = Crear_codigo($data);
        break;
        case 3:
            $devuelta = Cargar_codigo($data);
        break;
        case 4:
            $devuelta = Cargar_icfes_m_all($data);
        break;
        case 5:
            $devuelta = Cargar_cur_admim($data);
        break;
        case 6:
            $devuelta = Crear_Codigo_libro($data);
            // $devuelta = true;
        break;
        case 7:
            $devuelta = Cargar_codigo_libro($data);
        break;
        case 8:
            $devuelta = colegio_vence(1,$data->id);
        break;
        case 9:
            $devuelta = Cargar_actividades_all();
        break;
        case 10:
            $devuelta = Eliminar_actividad_hyg($data->id);
        break;
        case 11:
            $devuelta = colegio_cupos($data->cupos,$data->id);
        break;
        case 12:
            $devuelta = colegio_vence_renovar($data->id);
        break;
        case 13:
            $devuelta = Cargar_materias();
        break;
        case 14:
            //crear de selecion/obcion multiple
            $devuelta = $data;
            if($data->tipo_p === 1){
                $PDF = null;
                $video = null;
                $imagen = null;
                $ICFES = null;
                $n_icfes = null;
                $D_es = 0;
                $id_Profesor = 0;
                $devuelta = crear_actividad_malla($data,$PDF,$video,$imagen,$ICFES,$n_icfes,$D_es,$id_Profesor);
            }else{
                $datos = $data->recurso;
                $filter = $datos->recurso;
                $PDF = null;
                $video = null;
                $imagen = null;
                $ICFES = null;
                $n_icfes = null;
                $D_es = 0;
                $id_Profesor = 0;
                switch (intval($filter->tipo)) {
                    case 1:
                        $PDF = $filter->PDF;
                        $devuelta = crear_actividad_malla($data,$PDF,$video,$imagen,$ICFES,$n_icfes,$D_es,$id_Profesor);
                        break;
                    case 2:
                        $video =$filter->video;
                        $devuelta = crear_actividad_malla($data,$PDF,$video,$imagen,$ICFES,$n_icfes,$D_es,$id_Profesor);
                        break;
                    case 3:
                        $devuelta = $filter->IMG;
                        $devuelta = crear_actividad_malla($data,$PDF,$video,$imagen,$ICFES,$n_icfes,$D_es,$id_Profesor);
                        break;
                    default:
                        $devuelta = false ;
                        break;
                }
            }   
        break;
        case 15:
            $devuelta = cambiar_curso_actividad($data);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>