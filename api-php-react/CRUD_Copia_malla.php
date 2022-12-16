<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $devuelta = Cargar_curso();
        break;
        case 1:
            $devuelta = Crear_curso_copia($data);
        break;
        case 2:
            $area = Cargar_area($data);
            $area_cv= Cargar_area_copia($data);
            $contar_a = Contar_areas($data);
            $contar = 0;
            if(empty($area)){
                foreach($area_cv as $var){
                    $valor = Crear_area_a($var,$data->id);
                    if($valor){
                        $contar++;
                    }else{
                        $contar--;
                    }
                    if($contar == $contar_a){
                        $devuelta = true;
                    }else{
                        $devuelta = false;
                    }
                }
            }else{
                $devuelta = Cargar_area($data);
            }

        break;
        case 3:
            $copia = Sacar_copia($data);
            $contar =  copia_materia_contar($copia);

            $contar_cv = 0;
            if(!empty($copia)){
            $consultar = copia_materia($copia);
            foreach($consultar as $var){
                $cc = Crear_materia_copia($var,$data);
                if($cc){
                    $contar_cv++;
                }else{
                    $contar_cv--;
                }
                if($contar_cv == $contar){
                    $devuelta = true;
                }else{
                    $devuelta = false;
                }
            }
            }else{
                $devuelta = "No existen contenido en la materia para ser copiado";
            }
        break;
        case 4:
            $copia = copia_pensamiento($data);
            if(!empty($copia)){
            foreach($copia as $var){
                $devuelta = Crear_pensamiento_copia($var,$data);
            }
            }else{
                $devuelta = "No existen contenido en el pensamiento para ser copiado";
            }
        break;
        case 5:
            $contar_competencia = contar_competencia($data->id_pensamientoc);
            $contar = 0;
            if(!$contar_competencia == 0){
                $copia_pensamiento = sacar_copia_competencia($data->id_pensamientoc);
                foreach($copia_pensamiento as $var){
                    $crear_copia_pensamiento = Guardar_copia_competencia($var,$data->pensamiento);
                    
                    if($crear_copia_pensamiento){
                        $contar++;
                    }else{
                        $contar--;
                    }
                }
                if($contar_competencia == $contar){
                    $res_competencia = "exitoso: Cargaron".$contar." / ".$contar_competencia."competencias";
                }else{
                    $res_competencia = "Error:Cargaron".$contar." / ".$contar_competencia."competencias";
                }
                $devuelta = $res_competencia;
            }else{
                $devuelta = "error al cargar pensamientos llamar a soporte";
            }
        break;
        case 6:
            $contar_competencia = contar_evidencias($data->id_pensamientoc);
            $contar = 0;
            if(!$contar_competencia == 0){
                $copia_pensamiento = sacar_copia_evidencias($data->id_pensamientoc);
                foreach($copia_pensamiento as $var){
                    $crear_copia_pensamiento = Guardar_copia_evidencias($var,$data->pensamiento);
                    if($crear_copia_pensamiento){
                        $contar++;
                    }else{
                        $contar--;
                    }
                }
                if($contar_competencia == $contar){
                    $res_competencia = "exitoso: Cargaron".$contar." / ".$contar_competencia."competencias";
                }else{
                    $res_competencia = "Error:Cargaron".$contar." / ".$contar_competencia."competencias";
                }
                $devuelta = $res_competencia;
            }else{
                $devuelta = "error al cargar pensamientos llamar a soporte";
            }
        break;
        case 7:
            //estandares
            $contar_competencia = contar_estandares($data->id_pensamientoc);
            $contar = 0;
            if(!$contar_competencia == 0){
                $copia_pensamiento = sacar_copia_estandares($data->id_pensamientoc);
                foreach($copia_pensamiento as $var){
                    $crear_copia_pensamiento = Guardar_copia_estandares($var,$data->pensamiento);
                    if($crear_copia_pensamiento){
                        $contar++;
                    }else{
                        $contar--;
                    }
                }
                if($contar_competencia == $contar){
                    $res_competencia = "exitoso: Cargaron ".$contar." / ".$contar_competencia. "estandares";
                }else{
                    $res_competencia = "Error:Cargaron ".$contar." / ".$contar_competencia." estandares";
                }
                $devuelta = $res_competencia;
            }else{
                $devuelta = "Error: al cargar pensamientos llamar a soporte";
            }
        break;
        case 8:
            //derechos_ap
            $contar_competencia = contar_derechos($data->id_pensamientoc);
            $contar = 0;
            if(!$contar_competencia == 0){
                $copia_pensamiento = sacar_copia_derechos($data->id_pensamientoc);
                foreach($copia_pensamiento as $var){
                    $crear_copia_pensamiento = Guardar_copia_derechos($var,$data->pensamiento);
                    if($crear_copia_pensamiento){
                        $contar++;
                    }else{
                        $contar--;
                    }
                }
                if($contar_competencia == $contar){
                    $res_competencia = "exitoso: Cargaron ".$contar." de  ".$contar_competencia. " derechos_ap";
                }else{
                    $res_competencia = "Error:Cargaron ".$contar." de ".$contar_competencia." derechos_ap";
                }
                $devuelta = $res_competencia;
            }else{
                $devuelta = "Error: al cargar pensamientos llamar a soporte";
            }
        break;
        case 9:
            //temas y sub-temas
            $contar = 0;
            $contartemas = 0;
            $contarsubt = 0;
            $contar_subtemas = 0;
            if(!$contar_competencia == 0){
                $copia_pensamiento = sacar_copia_temas_p($data->id_pensamientoc);
                foreach($copia_pensamiento as $var){
                    $Guardar_copia_temas_p = Guardar_copia_temas_p($var,$data->pensamiento);
                    $contar ++;
                    $contar_temas = contar_temas($data->id_pensamientoc,$var->id);
                    if(!$contar_temas == 0){
                        $copia_temas = sacar_copia_temas($data->id_pensamientoc,$var->id);
                        foreach ($copia_temas as $var2){
                            $guardar_copia_temas = Guardar_copia_temas($var2,$data->pensamiento,$Guardar_copia_temas_p);
                            $contartemas ++;
                            $contar_subtemas += contar_subtemas($var2->id);
                            var_dump($contar_subtemas);
                            if(!$contar_subtemas == 0){
                                $copia_subtemas = sacar_copia_subtemas($var2->id);
                                foreach($copia_subtemas as $var3){
                                    $Guardar_subtemas_copia = Guardar_copia_subtemas($var3,$guardar_copia_temas);
                                    $contarsubt ++;
                                }
                            }else{
                                $devuelta = "Error: al cargar sub-temas llamar a soporte";
                            }
                        }
                    }else{
                        $devuelta = "Error: al cargar temas llamar a soporte";
                    }
                }
                if($contar_competencia == $contar){
                    $res_competencia = "exitoso: Cargaron ".$contar." de  ".$contar_competencia. " derechos_ap "
                    ." Cargaron ".$contartemas." temas de ".$contar_temas." y "
                    ." Cargaron ".$contarsubt. " sub-temas de ".$contar_subtemas." fin";
                }else{
                    $res_competencia = "Error:Cargaron ".$contar." de ".$contar_competencia." derechos_ap";
                }
                $devuelta = $res_competencia;
            }else{
                $devuelta = "Error: al cargar temas llamar a soporte";
            }
        break;
        case 10:
        $contar = contar_curso_mallas($data->id);
        if($contar == 0){
            $devuelta = true;
        }else{
            $devuelta = false;
        }
            break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>