<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $estado_evares = "no es eva";
            $res = Crear_Nota($data);
            if($res){
                $envia = $data;
                if(!empty($data->eva)){
                    $estado_evares = cambiar_estado_evares($data);
                }
                $cambiar_e = Cambiar_estado_act(5,$data->id_solucion);
                $C_notas = Contar_Notas($data->id_estu,$data->id_materia);
                $C_notas_e = contar_notas_e($data->id_estu);
                $C_promedio = Contar_promedio_Cur($data->id_curso);
                $C_promedio_col =  Contar_promedio_Col($data->id_colegio);
                if($C_promedio_col > 0){
                    $s_promedio_col = sacar_promedio_Col($data->id_colegio);
                    $suma = 0;
                    foreach($s_promedio_col as &$nota){
                        $resultado =  $suma + $nota->promedio;
                        $suma = $resultado;
                    }
                    $promedio = $resultado/$C_promedio_col;
                    if(isset($promedio)){
                        $promedio_col = cambiar_promedio_Col($data->id_colegio,$promedio);
                    }else{
                        $devuelta = array('mensaje error'=>'error al cargar');
                    }
                }else{
                    $devuelta = array('mensaje error'=>$C_promedio_col);
                }
                if($C_promedio > 0){
                    $s_promedio = sacar_promedio_cur($data->id_curso);
                    $suma = 0;
                    foreach($s_promedio as &$nota){
                        $resultado =  $suma + $nota->promedio;
                        $suma = $resultado;
                    }
                    $promedio = $resultado/$C_promedio;
                    if(isset($promedio)){
                        $promedio_cur = cambiar_promedio_Cur($data->id_curso,$promedio);
                    }else{
                        $devuelta = array('mensaje error'=>'error al cargar');
                    }
                }else{
                    $devuelta = array('mensaje error'=>$C_promedio);
   
                }
                if($C_notas_e > 0){
                    $notas = sacar_notas_e($data->id_estu);
                    $suma = 0;
                    foreach($notas as &$nota){
                        $resultado =  $suma + $nota->id_nota;
                        $suma = $resultado;
                    }
                    $promedio = $resultado/$C_notas_e;
                    if(isset($promedio)){
                        $promedio_estu =cambiar_promedio_e($data->id_estu,$promedio);
                    }else{
                        $devuelta = array('mensaje error'=>'error al cargar');
                    }
                }else{
                    $devuelta = array('mensaje error'=>$C_notas);
                }

                if($C_notas > 0){
                    $notas = Sacar_nota($data->id_estu,$data->id_materia);
                    $suma = 0;
                    foreach($notas as &$nota){
                        $resultado =  $suma + $nota->id_nota;
                        $suma = $resultado;
                    }
                    $promedio = $resultado/$C_notas;
                    if(isset($promedio)){
                        $detectar = detectar_promedio($data->id_estu,$data->id_materia);
                        if($detectar > 0){
                            $promedio_m_e = cambiar_promedio($data->id_estu,$promedio,$data->id_materia);
                        }else{
                            $promedio_m_e = insertar_promedio($data,$promedio);
                        }
                    }else{
                        $devuelta = array('mensaje error'=>'error al cargar');
                    }
                }else{
                    $devuelta = array('mensaje error'=>$C_notas);
                }
            }else{
                $devuelta = array('mensaje'=>'error al cargar Notas');
            }
            $devuelta = array('promedio_m'=>$promedio_m_e,'promedio_e'=>$promedio_estu,'promedio_cur'=>$promedio_cur,'promedio_col'=>$promedio_col,'estadode'=>$cambiar_e,'estado'=>5,'evares'=> $estado_evares);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>