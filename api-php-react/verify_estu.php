<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
        $verify = Verify_cod($data->Codigo);
        if($verify){
                $consulta = cod_estu($data->Codigo);
                echo json_encode($consulta);

       }else{
        echo json_encode(array('mensaje'=>'Codigo incorrecto verificar'));
       }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>