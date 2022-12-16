<?php
include_once ('corn.php');
$datos = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
if(isset($datos)){
    if($datos->d == 1){
        $cargar = Cargar_curso();
        echo json_encode($cargar);
    }else{
        if($datos->d == 2){
            $cargar = Crear_curso($datos);
            echo json_encode($cargar);
        }else{
            if($datos->d == 3){
                $cargar = Borrar_Curso($datos);
                $borrar = borrar_materia_area($datos->id);
                echo json_encode($cargar);
            }else{
                echo json_encode(array('mensaje'=>'parametro erroneo'));
            }
        }
    }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos contactar a soporte'));
}
?>