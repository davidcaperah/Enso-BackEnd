<?php
include_once ('corn.php');
include_once ('Hosting.php');
$data = json_decode(file_get_contents('php://input'));
$response = array();
$upload_dir = $_SERVER['DOCUMENT_ROOT']."/EnsoLearningBackend/Archivos_u/Perfil_doc/";
$server_url = "/Archivos_u/Perfil_doc/";
if($_FILES['archivo']){
    $archivo_name = $_FILES["archivo"]["name"];
    $archivos_tmp_Name = $_FILES["archivo"]["tmp_name"];
    $error = $_FILES["archivo"]["error"];
    if ($error > 0){
        $response = array(
            "status" =>"error",
            "error" => true,
            "menssange" => "Error al cargar el archivo"
        );
    }else{
      $ramdom_name = rand(1000,100000)."-".$archivo_name;
      $ramdom_name2 = preg_replace('/\s+/', '-',$ramdom_name);
      $upload_name2 = $upload_dir.strtolower($ramdom_name);
      $upload_name = preg_replace('/\s+/', '-',$upload_name2);
      if(move_uploaded_file($archivos_tmp_Name,$upload_name)){
        $response =array(
            "status" => "success",
            "error" => false,
            "menssage" => "Foto de perfil subida correctamente",
            "url" => $server_url.$ramdom_name2
        );
      }else{
        $response = array(
            "status" => "error",
            "error" => true,
            "menssage" => "Error al cargar el archivo!"
        );
      }
    }
}else{
    json_encode(array("mensaje"=>"No hay datos"));
}
echo json_encode($response);
?>