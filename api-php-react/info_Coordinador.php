<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $compara = Comparar_cursopro($data);
            if(!$compara){
                $inicio =  Guardar_Curso_materia($data);
                if($inicio){
                    $aulab = Buscar_aula($data->idDocente);
                    if($aulab){
                        $fin = crear_aulaest($aulab,$data->curso);
                        if($fin){
                            $devuelta =array('mensaje'=>'Cambio guardado correctamente');
            
                        }else{
                            $devuelta = array('mensaje'=>'Falla al guardar los datos');
                        }
                    }else{
                        $devuelta = array('mensaje'=>'Ocurrio un error al guardar datos (aula) verifique los campos');
                    }
                }else{
                    $devuelta =array('mensaje'=>'Ocurrio un error al guardar datos verifique los campos');
                }
        
            }else{
                $devuelta = array('mensaje'=>'Este curso ya tiene La materia asignada');
            }
        break;
        case 1:
            $compara = Comparar_cursopro($data);
            if(!$compara){
                $devuelta = array('mensaje'=>'edita con esas varibles');
            }else{
                $devuelta = array('mensaje'=>'Este curso ya tiene La materia asignada');
            }
        break;
        case 2:
            $devuelta = Cargar_Estucur($data->curso);
        break;
        case 3:
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>