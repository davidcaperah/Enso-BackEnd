<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Consultar_Curso_id($data);
        break;
        case 1:
            $devuelta = Consultar_Cursos_Colegio($data);
        break;
        case 2:
            $devuelta = Borrar_curso_id($data);
        break;
        case 3:
            $devuelta = Editar_Curso_id($data);
            
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>