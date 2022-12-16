<?php
include_once ('corn.php');
$datos = json_decode(file_get_contents( "php://input" ));
include_once  ('Fuctions.php');
include_once  ('enviar_correo_recuperar.php');
$devuelta = "";
if(isset($datos)){
    $con = ver_correo_dd($datos->correo);
    if($con == 1){

        $cod = rand(5, 105);
        $hash = password_hash($cod, PASSWORD_DEFAULT, [15]);
        $obj = array('cod'=>$hash,'correo'=>$perfil->Correo);
        $var = "https://enso-learning.com.co/CambiarContra?token=".$hash;
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
        $devuelta = "Este correo no existe verificar o llamar a soporte";
    }
    echo json_encode($devuelta);
}else{
    echo json_encode(array('mensaje'=>'no llegaron datos contactar a soporte'));
}
?>
