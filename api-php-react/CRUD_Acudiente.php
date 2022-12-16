<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $verificar_correo = Verificar_correo_acu($data->correo); 
            $conteo = Verificar_cod_Acudiente($data->cod);
            if($verificar_correo == 0){
                if($conteo <= 0){
                    $datos_estu = Verificar_estu_cod_acudiente($data->cod);
                    if(empty($datos_estu)){
                        $devuelta = array("alerta"=>"Estudiante No registrado en la base de datos Favor registrar al estudiante");
                        }else{
                            $devuelta = Guardar_Perfil_Acudiente($data,$datos_estu);
                    }
                }else{
                    $devuelta = array("alerta"=>"El estudiante ya tiene un Acudiente asociado");
                }
            }else {
                $devuelta = array("alerta"=>"El Correo electronico ya se encuentra asociado a una cuenta");
            }
        break;
        case 1:
           $ide =  consultar_estu($data->id);
           $devuelta = Cargar_Estu($ide->estu);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos','datos'=> $data));
}
?>