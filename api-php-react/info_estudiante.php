<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $estu = Cargar_Estu_contr($data);
            $pro = Cargar_director_curso($data);
            $devuelta = array('profesor'=>$pro,'estu'=>$estu);
        break;
        case 1:
            $devuelta = Cargar_actividades($data);
            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            foreach($devuelta as &$valor){
                $fecha_entrada = strtotime($valor->fecha_MAX);
                if($fecha_actual > $fecha_entrada)
                {
                    vence_actividad(2,$valor->id); 
                }      
            }
        break;
        case 2:
            $numero = verificar_actividad($data);
            $devuelta = $numero;
            if($numero == 0){
                $devuelta = Cargar_actividad_resolver($data);
            }else{
                $devuelta = array('mensaje'=>'!Esta actividad fue subida con exito¡');
            }
        break;
        case 3:
            $numero = Entregar_actividad($data);
            $devuelta = array('id_tarea'=>$numero,'estu'=>'true');
        break;
        case 4:
            $numero = verificar_actividad($data);
            $devuelta = array('cantidad'=>$numero);
        break;
        case 5:
            $devuelta = Cargar_docentes_estu($data->col);
        break;
        case 6:
            $promedios = Medir_promedios($data->col);
            arsort($promedios);
            $array = array();
            $i = 1;
            foreach($promedios as $key){
                $est = array("Promedio"=>$key->promedio,"id"=>$key->id,
                "Nombre"=>$key->Nombre,
                "Apellido"=>$key->Apellido,
                "imagen"=>$key->imagen,
                "Curso_Nu"=>$key->Curso_Nu,
                "puesto"=>$i);
                array_push($array,$est);
                $i++;
                $devuelta = array_slice($array,0,5);    
                }  
        break;
        case 7:
            $devuelta = Cagar_info_aula($data);
        break;
        case 8:
            $devuelta = cargar_curso_niño($data);
        break;
        case 9:
            $devuelta = cargar_estu_cur($data);
        break;
        case 10:
            $devuelta = Cargar_libro_aula($data);
        break;
        case 11:
            $devuelta = Cargar_Estu_contr($data);
        break;
        case 12:
            $devuelta = Verificar_estado_privacidad($data);
        break;
        
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>