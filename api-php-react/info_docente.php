<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Editar_Docente($data);
        break;
        case 1:
            if(!$data->nombre == ''){
                $buscador = Buscador_profesores($data);
                if(empty($buscador)){
                    $devuelta = array('mensaje'=>'No a encontrado coincidencia en la base de datos','tipo'=>'1');
                }else{
                    $devuelta = $buscador;
                }
            }else{
                $devuelta = array('mensaje'=>'Esperando busqueda','tipo'=>'2');
            }
        break;
        case 2:
            if(!$data->nombre == ''){
                $buscador = Buscador_estu_pro($data);
                if(empty($buscador)){
                    $devuelta = array('mensaje'=>'No a encontrado coincidencia en la base de datos','tipo'=>'1');
                }else{
                    $devuelta = $buscador;
                }
            }else{
                $devuelta = array('mensaje'=>'Esperando busqueda','tipo'=>'2');
            }
        break;
        case 3:
            $devuelta = Cargar_select_cur($data);
        break;
        case 4:
            $devuelta = Editar_Estudiante($data);
        break;
        case 5:
            $devuelta = Cargar_actividad($data);
        break;
        case 6:
            $aula = Cargar_aula($data);
            $veri = verificar_libro_aula($aula[0]->id);
            if($veri[0]->libro == 0){
               $devuelta = array("estado" => Establecer_libro($data->id_libro,$aula[0]->id) 
               ,"mensaje" => "ya tiene un libro en su aula".$veri[0]->libro); 
               
            }else{
                $devuelta = array("estado" => false ,"mensaje" => "ya tiene un libro en su aula".$veri[0]->libro);
            }
        break;
        case 7:
            $aula = Cargar_aula($data);
            $devuelta = $aula;
            $veri = verificar_libro_aula($aula[0]->id);
            if($veri[0]->libro == 0){
               $devuelta = "";
               
            }else{
                $devuelta =  Cargar_libro_aula($veri[0]->libro); 
            }
        break;
        case 8:
            $aula = Cargar_aula($data);
            $veri = verificar_libro_aula($aula[0]->id);
            if($veri[0]->libro == 0){
                $devuelta = array("estado" => Establecer_libro($data->id_libro,$aula[0]->id) 
                ,"mensaje" => "Libro colocado".$veri[0]->libro); 
            }else{
                $devuelta = array("estado" => false ,"mensaje" => "ya tiene un libro en su aula, eliminar el libro antes de agregar uno nuevo".$veri[0]->libro);
            }
        break;
        case 9:
            $veri = Eliminar_evaluacion_m($data);
            if($veri == true){
                $devuelta = Eliminar_evaluacion($data);    
            }else{
                $devuelta = array("estado" => false
               ,"mensaje" => "fallo consulta ".$veri); 
            }
        break;
        case 10:
            $devuelta = Cargar_notas_e($data);
        break;
        case 11:
            $devuelta = Notas_materias($data);
        break;
        case 12:
             //crear de selecion/obcion multiple
             $devuelta = crear_actividad_docente($data); 
        break;
        case 13:
            $devuelta = Buscar_aulad($data->id);
        break;        
        case 14:
            $devuelta = asignar_curso_eva($data);
        break;
        case 15:
            $devuelta = Cargar_materias();
        break;
        case 16:
            $devuelta = cargar_actividad_aula_cali($data);
            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            foreach($devuelta as &$valor){
                $fecha_entrada = strtotime($valor->fecha_MAX);
                if($fecha_actual > $fecha_entrada)
                {
                    vence_actividad(2,$valor->id); 
                }      
            }
        break;
        case 17:
            $devuelta = ver_nota($data);
        break;
        case 18:
            $devuelta = Notas_materias_curso($data); 
        break;
        case 19:
            $devuelta = Cargar_evaluacion_aulas($data); 
        break;
        case 20:
            $devuelta = Promedio_estudiante_p($data); 
        break;
        case 21:
            $devuelta = Cargar_evaluacion_notas($data); 
        break;
        case 22:
            $devuelta = Cargar_evaluacion_notas($data); 
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>