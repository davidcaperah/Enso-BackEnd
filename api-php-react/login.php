<?php
include_once  ('corn.php') ;
$perfil = json_decode(file_get_contents( "php://input" ));
require_once  ('Fuctions.php') ;

if($perfil){
    if($perfil->Estado == 4){
        $pass=login_A($perfil->Email);
        if($pass){
            $verify = $perfil->Pass;
            $pass1= $pass->pass;
            if(password_verify($verify,$pass1)){
                $res = Buscar_codcor($perfil->Email);
                $estado = array("estado"=>"4","id"=>$res->id);
                echo json_encode($estado);
            }else{
                echo json_encode(array('mensaje'=>'Contraseña incorrecta verificar o llamar a soporte'));
            }
        }else{
            echo json_encode(array('mensaje'=>'Usuario no existente verificar o llamar a soporte'));
        }
       
    }else if($perfil->Estado == 3){
        $pass=login_P($perfil->Email);
        if($pass){
            $verify =$perfil->Pass;
            if(password_verify($verify,$pass->pass)){
                $res = Buscar_email_acu($perfil->Email);
                $estado = array("estado"=>"3","id"=>$res->id_a);
                echo json_encode($estado);
            }else{
                echo json_encode(array('mensaje'=>'Contraseña incorrecta verificar o llamar a soporte'));
            }

        }else{
            echo json_encode(array('mensaje'=>'Usuario no existente verificar o llamar a soporte'));
            
        }

    }else if($perfil->Estado == 2){
        $pass=login_D($perfil->Email);
        if($pass){
            $verify =$perfil->Pass;
            if(password_verify($verify,$pass->pass)){
                $res = Buscar_idpro($perfil->Email);
                $estado = array("estado"=>"2","id"=>$res->id,"id_col"=>$res->id_col,"id_m"=>$res->Cod_materia);
                echo json_encode($estado);
            }else{
                echo json_encode(array('mensaje'=>'Contraseña incorrecta verificar o llamar a soporte'));
            }

        }else{
            echo json_encode(array('mensaje'=>'Usuario no existente verificar o llamar a soporte'));
            
        }

    }else if ($perfil->Estado == 1){
        $pass=login_E($perfil->Email);
        if($pass){
            $verify = $perfil->Pass;
            if(password_verify($verify,$pass->pass)){
                $res = Buscar_idestu($perfil->Email);
                $estado_a = 1;
                $estado_activo = cambiar_estado_estu($estado_a,$res->id);
                $array = array("id"=>$res->id,"Id_curso"=>$res->Id_curso,"id_col"=>$res->Id_colegio,"estado"=>$res->ciclo,"estado_a"=>$estado_activo);
                echo json_encode($array);
            }else{
                echo json_encode(array('mensaje'=>'Contraseña incorrecta verificar o llamar a soporte'));
            }

        }else{
            echo json_encode(array('mensaje'=>'Usuario no existente verificar o llamar a soporte'));
        }

    }else{
        echo json_encode(array('mensaje'=>'estado invalido contactar a soporte'));
    }


}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>