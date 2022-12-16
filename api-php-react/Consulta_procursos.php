<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $compara = Comparar_cursopro($data);
    if(!$compara){
        $inicio =  Guardar_Curso_materia($data);
        if($inicio){
            $aulab = Buscar_aula($data->idDocente);
            if($aulab){
                $fin = crear_aulaest($aulab,$data->curso);
                if($fin){
                    echo json_encode(array('mensaje'=>'Cambio guardado correctamente'));
    
                }else{
                    echo json_encode(array('mensaje'=>'Falla al guardar los datos'));
                }
            }else{
                echo json_encode(array('mensaje'=>'Ocurrio un error al guardar datos (aula) verifique los campos'));
            }
        }else{
            echo json_encode(array('mensaje'=>'Ocurrio un error al guardar datos verifique los campos'));
        }

    }else{
        echo json_encode(array('mensaje'=>'Este curso ya tiene La materia asignada'));
    }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>