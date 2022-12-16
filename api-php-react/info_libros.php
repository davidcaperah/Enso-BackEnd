<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Crear_libros($data);
        break;
        case 1:
            if(!$data->nombre == ''){
                $buscador = Buscador_libros($data);
                if(empty($buscador)){
                    $devuelta = array('mensaje'=>'No a encontrado ningún libro con ese titulo','tipo'=>'1');
                }else{
                    $devuelta = $buscador;
                }
            }else{
                $devuelta = array('mensaje'=>'Esperando busqueda','tipo'=>'2');
            }
        break;
        case 2:
            $desi = Cargar_voto($data);
            if(empty($desi->libro)){
                $contar = 0;
            }else{
                $contar = $desi->libro;
            }
           if($contar == $data->id){
            $devuelta = array('mensaje'=>'Solo puede votar 1 vez por libro','tipo'=>'1','varibles'=>$data->id,'2varaible'=>$contar);
           }else{
            $datos = Cargar_cali_libro($data);
            $info = array('ant_estrellas'=>$datos->estrellas,'nuevas_estrellas'=>$data->estre);
            $fin_estre = Calificar_libro_estrellas($info,$data);
            if($fin_estre){
                $datos1 = Cargar_cali_libro_p($data);
                $info = array('ant_estrellas'=>$datos1->personas);
                $fin_per = Calificar_libro_p($info,$data);
                $devuelta = array('1'=>$fin_estre,'2'=>$fin_per);
                if($fin_per){
                   $guardarv = Guardar_voto($data);
                    if($guardarv){ 
                        $devuelta = array('mensaje'=>'Gracias por votar','tipo'=>'2','varibles'=>$data->id,'2varaible'=>$contar);
                    }else{
                        $devuelta = array('mensaje'=>'error al votar','tipo'=>'1');
                    }
                }else{
                    $devuelta = array('mensaje'=>'error al sumar peronas','tipo'=>'1');
                }
            }else{
                $devuelta = array('mensaje'=>'error al calificar','tipo'=>'1');
            }
           }
            // $devuelta = $info;
        break;
        case 3:
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>