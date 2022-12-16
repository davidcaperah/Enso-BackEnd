<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
include_once('../api-php-react/Enviar_correo_alerta.php');
date_default_timezone_set('America/Bogota');
if(isset($data)){
    $st = $data->d;
    $devuelta = '';
    switch($st){
        case 0:
            $pass = Verificar_cambio_contra($data);
            $pass1 = $pass->pass;
            $fecha = date('d,m,Y G:i:s a');
            $correo = '<table style="max-width: 600px; padding: 20px; margin: auto; border-collapse: collapse; font-family: Raleway, sans-serif;"">
                <tr>
                    <td style="background-color: #343a40; text-align: center; padding: 0; display: flex;">
                        <a>
                            <img src="https://enso-learning.com.co/static/media/VBBV.77385f60.svg"
                                style="width:25%; display: block; margin:auto;" alt="" srcset="">
                        </a>
                        <h2 style="width: 100%; color: white;">Enso Learning</h2>
                    </td>
                </tr>
                
                
                <tr>
                    <td style="background-color: #ecf0f1">
                        <div style="color: white;">
                            <h1 style="text-align: center; font-size: 2em; color: #34495e;">Alerta: Cambio de contraseña</h1>
                        </div>
                        <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;">
                            <h2 style="color: #343a40; margin: 0 0 7px">Hola!</h2>
                            <p style="margin: 2px; font-size: 15px">
                                Este correo es para Notificarle que el usuario '.$pass->Nombre.' '.$pass->Apellido.' a cambiado su contraseña el dia
                                '.$fecha.'
                                <br><br>
                                Si considera que esto fue error reportar a soporte : soporte@enso-learning.com.co                 
                            </p>
                        </div>
                    </td>
                </tr>
                </table>';
            if(password_verify($data->clave_actual,$pass1)){
                $cambiar = Cambiar_clave($data);
                $enviar_correo = enviar_correo($correo,$pass->Correo);
                $devuelta = array("pass"=>$pass,"cambiar"=>$cambiar,"correo"=>$enviar_correo);
            }else{
                $devuelta = array("mensaje"=>"No conincide la password", "error"=>false,"pasword"=>$data->clave_actual);
            }
            

        break;
        case 1:
            
            $pass = Verificar_cambio_contra($data);
            $pass1 = $pass->pass;
            $cambio_n ='';
            $cambio_c= '';
            $cambio_a = '';
            $fecha = date('d,m,Y G:i:s a');
            if ($pass->Nombre !== $data->Nombres){
                $cambio_n ='A realizado el cambio de Nombre en la plataforma enso learning a '.$data->Nombres.' si considera que fue un realice nuevamente el cambio o si de lo contrario
                no fue usted el que realizo el cambio reporte a soporte';

            }else{
                $cambio_n ='';
            }
            if($pass->Correo !== $data->Correo){
                $cambio_c ='por lo tanto el presente correo, sera el ultimo remitido a esta dirección de correo electronico, si desea realizar
                el cambio del correo al anterior, regrese al formulario en la plataforma y realice nuevamente el cambio.
                En caso de perder el acceso al sitio considere reportar su cuenta via soporte : soporte@enso-learning.com.co  ';
            }else{
                $cambio_c= '';
            }
            if($pass->Apellido !== $data->Apellidos){
                $cambio_a ='Realizo el cambio de apellido a '.$data->Apellidos.' si considera que fue un error realice nuevamente el cambio o si de lo contrario
                no fue usted el que realizo el cambio reporte a soporte';
            }else{
                $cambio_a = '';
            }
            $correo = '<table style="max-width: 600px; padding: 20px; margin: auto; border-collapse: collapse; font-family: Raleway, sans-serif;"">
                <tr>
                    <td style="background-color: #343a40; text-align: center; padding: 0; display: flex;">
                        <a>
                            <img src="https://enso-learning.com.co/static/media/VBBV.77385f60.svg"
                                style="width:25%; display: block; margin:auto;" alt="" srcset="">
                        </a>
                        <h2 style="width: 100%; color: white;">Enso Learning</h2>
                    </td>
                </tr>
                
                
                <tr>
                    <td style="background-color: #ecf0f1">
                        <div style="color: white;">
                            <h1 style="text-align: center; font-size: 2em; color: #34495e;">Alerta: Cambio de contraseña</h1>
                        </div>
                        <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;">
                            <h2 style="color: #343a40; margin: 0 0 7px">Hola!</h2>
                            <p style="margin: 2px; font-size: 15px">
                                Este correo es para Notificarle que el usuario '.$pass->Nombre.' '.$pass->Apellido.' a cambiado sus datos el dia
                                '.$fecha.'. 
                                '.$cambio_n.'
                                '.$cambio_c.'
                                '.$cambio_a.'   
                                <br><br>
                                Si considera que esto fue error reportar a soporte : soporte@enso-learning.com.co                 
                            </p>
                        </div>
                    </td>
                </tr>
                </table>';
                if(isset($data->clave_actual)){
                    if(password_verify($data->clave_actual,$pass1)){
                        $cambiar = Editar_for_Estudiante($data); 
                        $enviar_correo = enviar_correo($correo,$pass->Correo);
                        $devuelta = array("pass"=>$pass,"correo"=>$enviar_correo);
                    }else{
                        $devuelta = array("mensaje"=>"No coincide la password", "error"=>true,"pasword"=>$data->clave_actual,"data"=>$data);
                    }
                }else{
                    $devuelta = array("mensaje"=>" No a ingresado la contraseña", "error"=>true,"data"=>$data);
                }
        break;
        case 2:
            $devuelta = cambiar_estado_privacidad($data);
        break;
        case 3:
            $devuelta = Cambiar_estado($data);
        break;
        case 4:
            $estado = 0;
            $devuelta = cambiar_estado_estu($estado,$data->id);
        break;
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>