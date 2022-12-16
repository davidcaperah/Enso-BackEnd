<?php
include_once ('corn.php');
$perfil = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
include_once  ('../api-php-react/enviar.php') ;
if(isset($perfil)){
    $st = $perfil->d;
    $devuelta = '';
    switch($st){
        case 0:
            $ver = Ver_Correo_estu($perfil);
            if(!$ver == 0){
                $cod = rand(5, 105);
                $hash = password_hash($cod, PASSWORD_DEFAULT, [15]);
                $obj =(object) array('cod'=>$hash,'correo'=>$perfil->Correo,'Tipo'=>$perfil->tipousuario);
                $var = "https://enso-learning.com.co/CambiarContraEstudiante?token=".$hash;
                $consulta = correo_cambio($obj);
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
                            <h1 style="text-align: center; font-size: 2em; color: #34495e;">Cambio de contraseña</h1>
                        </div>
                        <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;">
                            <h2 style="color: #343a40; margin: 0 0 7px">Hola!</h2>
                            <p style="margin: 2px; font-size: 15px">
                                Este correo es para realizar las modificaciones correspondientes a tu contraseña, ya
                                que nos haz solicitado recuperar esta, por favor dale click al siguiente boton y
                                realicemos el proceso juntos.
                                <br><br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium. 
                                Et dolorem inventore veniam dolores quod obcaecati maxime at quas dignissimos omnis doloremque dolorum architecto
                                , tenetur numquam eaque nihil culpa!                    
                            </p>
                
                            <div style="width: 100%; text-align: center; margin-top: 25px; margin-bottom: 35px;">
                                <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white;
                                background-color: #007bff; box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);"  href="'.$var.'">Cambiar</a>
                            </div>
                        </div>
                    </td>
                </tr>
                </table>';
                $devuelta = enviar_correo($correo,$perfil->Correo);
            }else{
                $devuelta = "Correo no existente, Verificar o llamar a soporte";
            }
        break;
        case 1:
            $pass = token_verfi($perfil->token);
                if(!$pass == 0){
                    $devuelta = token_verfi_t($perfil->token);
                }else{
                    $devuelta = false;
                }
            break;
        case 2:
            $opt = [
                'const' =>12,
            ];
            $contra = password_hash($perfil->clave,PASSWORD_BCRYPT,$opt);
            $eliminar = Eliminar_token_r($perfil->infotoken[0]->codigo);
            if($eliminar){
                $devuelta = Cambiar_contra_e($contra,$perfil->infotoken[0]->correo);
            }else{
                $devuelta = "error al eliminar token";
            }
            break;
            case 3:
                $opt = [
                    'const' =>12,
                ];
                $contra = password_hash($perfil->clave,PASSWORD_BCRYPT,$opt);
                $eliminar = Eliminar_token_r($perfil->infotoken[0]->codigo);
                if($eliminar){
                    $devuelta = Cambiar_contra_p($contra,$perfil->infotoken[0]->correo);
                }else{
                    $devuelta = "error al eliminar token";
                }
                break;
            case 4:
                $opt = [
                    'const' =>12,
                ];
                $contra = password_hash($perfil->clave,PASSWORD_BCRYPT,$opt);
                $eliminar = Eliminar_token_r($perfil->infotoken[0]->codigo);
                if($eliminar){
                    $devuelta = Cambiar_contra_a($contra,$perfil->infotoken[0]->correo);
                }else{
                    $devuelta = "error al eliminar token";
                }
                break;   
            case 5:
                $opt = [
                    'const' =>12,
                ];
                $contra = password_hash($perfil->clave,PASSWORD_BCRYPT,$opt);
                $eliminar = Eliminar_token_r($perfil->infotoken[0]->codigo);
                if($eliminar){
                    $devuelta = Cambiar_contra_c($contra,$perfil->infotoken[0]->correo);
                }else{
                    $devuelta = "error al eliminar token";
                }
                break; 
                case 6:
                    $ver = Ver_Correo_cor($perfil);
                    if(!$ver == 0){
                        $cod = rand(5, 105);
                        $hash = password_hash($cod, PASSWORD_DEFAULT, [15]);
                        $obj =(object) array('cod'=>$hash,'correo'=>$perfil->Correo,'Tipo'=>$perfil->tipousuario);
                        $var = "https://enso-learning.com.co/CambiarContraAdmin?token=".$hash;
                        $consulta = correo_cambio($obj);
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
                                    <h1 style="text-align: center; font-size: 2em; color: #34495e;">Cambio de contraseña</h1>
                                </div>
                                <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;">
                                    <h2 style="color: #343a40; margin: 0 0 7px">Hola!</h2>
                                    <p style="margin: 2px; font-size: 15px">
                                        Este correo es para realizar las modificaciones correspondientes a tu contraseña, ya
                                        que nos haz solicitado recuperar esta, por favor dale click al siguiente boton y
                                        realicemos el proceso juntos.
                                        <br><br>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium. 
                                        Et dolorem inventore veniam dolores quod obcaecati maxime at quas dignissimos omnis doloremque dolorum architecto
                                        , tenetur numquam eaque nihil culpa!                    
                                    </p>
                        
                                    <div style="width: 100%; text-align: center; margin-top: 25px; margin-bottom: 35px;">
                                        <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white;
                                        background-color: #007bff; box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);"  href="'.$var.'">Cambiar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </table>';
                        $devuelta = enviar_correo($correo,$perfil->Correo);
                    }else{
                        $devuelta = "Correo no existente, Verificar o llamar a soporte";
                    }
                break;
                case 7:
                    $ver = Ver_Correo_pro($perfil);
                    if(!$ver == 0){
                        $cod = rand(5, 105);
                        $hash = password_hash($cod, PASSWORD_DEFAULT, [15]);
                        $obj =(object) array('cod'=>$hash,'correo'=>$perfil->Correo,'Tipo'=>$perfil->tipousuario);
                        $var = "https://enso-learning.com.co/CambiarContraDocente?token=".$hash;
                        $consulta = correo_cambio($obj);
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
                                    <h1 style="text-align: center; font-size: 2em; color: #34495e;">Cambio de contraseña</h1>
                                </div>
                                <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;">
                                    <h2 style="color: #343a40; margin: 0 0 7px">Hola!</h2>
                                    <p style="margin: 2px; font-size: 15px">
                                        Este correo es para realizar las modificaciones correspondientes a tu contraseña, ya
                                        que nos haz solicitado recuperar esta, por favor dale click al siguiente boton y
                                        realicemos el proceso juntos.
                                        <br><br>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium. 
                                        Et dolorem inventore veniam dolores quod obcaecati maxime at quas dignissimos omnis doloremque dolorum architecto
                                        , tenetur numquam eaque nihil culpa!                    
                                    </p>
                        
                                    <div style="width: 100%; text-align: center; margin-top: 25px; margin-bottom: 35px;">
                                        <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white;
                                        background-color: #007bff; box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);"  href="'.$var.'">Cambiar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </table>';
                        $devuelta = enviar_correo($correo,$perfil->Correo);
                    }else{
                        $devuelta = "Correo no existente, Verificar o llamar a soporte";
                    }
                break;
                case 8:
                    $ver = Ver_Correo_acu($perfil);
                    if(!$ver == 0){
                        $cod = rand(5, 105);
                        $hash = password_hash($cod, PASSWORD_DEFAULT, [15]);
                        $obj =(object) array('cod'=>$hash,'correo'=>$perfil->Correo,'Tipo'=>$perfil->tipousuario);
                        $var = "https://enso-learning.com.co/CambiarContraAcudiente?token=".$hash;
                        $consulta = correo_cambio($obj);
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
                                    <h1 style="text-align: center; font-size: 2em; color: #34495e;">Cambio de contraseña</h1>
                                </div>
                                <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;">
                                    <h2 style="color: #343a40; margin: 0 0 7px">Hola!</h2>
                                    <p style="margin: 2px; font-size: 15px">
                                        Este correo es para realizar las modificaciones correspondientes a tu contraseña, ya
                                        que nos haz solicitado recuperar esta, por favor dale click al siguiente boton y
                                        realicemos el proceso juntos.
                                        <br><br>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium. 
                                        Et dolorem inventore veniam dolores quod obcaecati maxime at quas dignissimos omnis doloremque dolorum architecto
                                        , tenetur numquam eaque nihil culpa!                    
                                    </p>
                        
                                    <div style="width: 100%; text-align: center; margin-top: 25px; margin-bottom: 35px;">
                                        <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white;
                                        background-color: #007bff; box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);"  href="'.$var.'">Cambiar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </table>';
                        $devuelta = enviar_correo($correo,$perfil->Correo);
                    }else{
                        $devuelta = "Correo no existente, Verificar o llamar a soporte";
                    }
                break;    
            }
        
    
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos'));
}
?>