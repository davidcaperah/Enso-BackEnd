<?php
date_default_timezone_set('America/Bogota');
//qrs
function Borrar_qr($date){
  $db = obtenerConexion();
  $consulta = $db ->prepare("DELETE FROM qr WHERE id = :id");
  $consulta -> bindParam(':id',$date->id,PDO::PARAM_INT);
  $consulta ->execute();
  return $consulta->fetchAll();
}
function Crear_qr($data){
  $fecha = date("Y-m-d");
  $db = obtenerConexion();
  $consulta = $db -> prepare("INSERT INTO qr (`Nombre`, `link`, `fecha`,`Usuario`, Tipo,carac ) VALUES
  (:Nombre,:link,:fecha,:Usuario,:Tipo,:carac)");
  $consulta -> bindParam(':Nombre',$data->Nombre,PDO::PARAM_STR);
  $consulta -> bindParam(':link',$data->link,PDO::PARAM_STR);
  $consulta -> bindParam(':fecha',$fecha,PDO::PARAM_STR);
  $consulta -> bindParam(':carac',$data->caracter,PDO::PARAM_STR);
  $consulta -> bindParam(':Usuario',$data->user,PDO::PARAM_STR);
  $consulta -> bindParam(':Tipo',$data->tipo,PDO::PARAM_INT);
  return $consulta ->execute();
  // return $fecha;
}
function Cargar_qr($tipe){
  $db = obtenerConexion();
  $consulta = $db ->prepare("SELECT * FROM qr");
  $consulta ->execute();
  return $consulta->fetchAll();
}
function Cargar_qr_id($id){
  $db = obtenerConexion();
  $consulta = $db ->prepare("SELECT * FROM qr WHERE id=:id");
  $consulta -> bindParam(':id',$id,PDO::PARAM_STR);
  $consulta ->execute();
  return $consulta->fetchAll();
}

//fuction
function cargar_cokies($tipe){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM cokies WHERE cokies_tipe = :cokies");
    $consulta -> bindParam(':cokies',$tipe,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchObject();
}
//login
function login_super($correo){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM admin WHERE Correo = :correo");
    $consulta -> bindParam(':correo',$correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchObject();
}
function Ver_super_correo($correo){
  $db = obtenerConexion();
  $consulta = $db -> prepare("SELECT * FROM admin WHERE Correo = :correo");
  $consulta -> bindParam(':correo',$correo,PDO::PARAM_STR);
  $consulta ->execute();
  return $consulta->rowCount();
}
//correos
function correo_cambio($data){
  $fecha = date("d-m-Y");
  $db = obtenerConexion();
  $consulta = $db -> prepare("INSERT INTO recuperar (`codigo`, `correo`, `fecha`,`tipo` ) VALUES
  (:codigo,:correo,:fecha,:tipo)");
  $consulta -> bindParam(':codigo',$data->cod,PDO::PARAM_STR);
  $consulta -> bindParam(':correo',$data->correo,PDO::PARAM_STR);
  $consulta -> bindParam(':fecha',$fecha,PDO::PARAM_STR);
  $consulta -> bindParam(':tipo',$data->Tipo,PDO::PARAM_INT);
  return $consulta ->execute();
 
}
function token_verfi($data){
    $db = obtenerConexion();
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM recuperar WHERE codigo = :correo");
    $consulta -> bindParam(':correo',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
   
  }
  function token_verfi_t($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM recuperar WHERE codigo = :correo");
    $consulta -> bindParam(':correo',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
   
  }
  function Eliminar_token_r($data){
    $db = obtenerconexion();
    $sentencia = $db -> prepare("DELETE FROM recuperar WHERE codigo = :codigo");
    $sentencia -> bindParam(':codigo',$data,PDO::PARAM_STR);
    return $sentencia->execute();
   
  }
  function Cambiar_contra($Pass,$Correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE admin SET Pass = :Pass WHERE Correo =:Correo");
    $consulta ->bindParam(':Pass',$Pass,PDO::PARAM_STR);
    $consulta ->bindParam(':Correo',$Correo,PDO::PARAM_STR);
    return $consulta -> execute();
  }
// base de datos conect

function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}

function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = "db_admin";
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
?>