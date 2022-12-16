<?php 
include_once  ('corn.php') ;
include_once ('enviar.php');
$perfil = json_decode(file_get_contents( "php://input" ));
require_once  ('config.php') ;
if(isset($perfil)){
    $pass = login_super($perfil->email);
    if($pass){
        $verify = $perfil->pass;
        $pass1 = $pass->Pass;
        if(password_verify($verify,$pass1)){

            $estado = array("estado"=>"8","id"=>$pass->id,"pass"=>$pass1);
            echo json_encode($estado);
        }else{
            echo json_encode(array('mensaje'=>'Contraseña Incorrecta',"pass"=>$pass1));
        }
    }else{
        echo json_encode(array('mensaje'=>'no existe el usuario'));
    }
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>