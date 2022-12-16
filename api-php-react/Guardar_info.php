<?php
include_once ('corn.php');
$datos = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
if(isset($datos)){
    $sql = crear_aula($datos);
    if($sql){
        $id_aula = Buscar_aula($datos->idDoc);
        if(isset($id_aula)){
            $fin = Editar_pro($datos,$id_aula->id);
            $datap = Buscar_Proid($datos->idDoc);
            $guardar_curso = Editar_Curpro($datos,$datap);
            echo json_encode($guardar_curso);
        }else{
            echo json_encode(array('mensaje'=>'error al crear aula contactar a soporte'));
        }

    }else{
        echo json_encode(array('mensaje'=>'error al crear aula contactar a soporte'));
    }

}else{
    echo json_encode(array('mensaje'=>'no llegaron datos contactar a soporte'));
}
?>