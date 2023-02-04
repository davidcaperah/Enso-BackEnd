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
function Ver_super($id){
  $db = obtenerConexion();
  $consulta = $db -> prepare("SELECT admin.id,admin.Apellido,admin.Correo,admin.Tipo,admin.Nombre, roles.Nombre as rol, roles.Descripcion 
  FROM admin 
  INNER JOIN roles ON admin.Tipo = roles.id  
  WHERE admin.id = :id");
  $consulta -> bindParam(':id',$id,PDO::PARAM_STR);
  $consulta ->execute();
  return $consulta->fetch();
}
//Reseller
function Crear_Reseller($data){
  $fecha = date("d-m-Y");
  $db = obtenerConexion();
  $consulta = $db -> prepare("INSERT INTO recuperar (`Nombre`, `Apellido`, `Correo`,`Pass` ) VALUES
  (:Nombre,:Apellido,:Correo,:Pass,:Tipo)");
  $consulta -> bindParam(':Nombre',$data->cod,PDO::PARAM_STR);
  $consulta -> bindParam(':Apellido',$data->correo,PDO::PARAM_STR);
  $consulta -> bindParam(':Correo',$fecha,PDO::PARAM_STR);
  $consulta -> bindParam(':Pass',$fecha,PDO::PARAM_STR);
  $consulta -> bindParam(':Tipo',$data->Tipo,PDO::PARAM_INT);
  return $consulta ->execute();
 
}
function db_agregar_col($data){
  $db = obtenerConexion();
  $super = "1";
  $fecha = date("d-m-Y");
  $fecha_vencimiento = date("d-m-Y",strtotime($fecha."+ 1 month"));
  $pago = "1";
  $cupos = "0";
  $cuposMax ="0";
  $pro ="0";
  $info = preg_replace('([^A-Za-z0-9 ])', ' ', $data->Info);
  $consulta = $db ->prepare("INSERT INTO colegios (NombreC,supervisor,Cordinador,contacto,fecha_creación,pago,cupos,cupos_max,profesores,id_cod,info,fecha_vencimiento) 
  VALUES (:Nombre,:Super,:Cordinador,:contacto,:fecha_creación,:pago,:cupos,:cupos_max,:profesores,:id_cod,:info,:fecha_vencimiento)");
  $consulta -> bindValue(":Nombre",$data->Nombre,PDO::PARAM_STR);
  $consulta -> bindValue(":Super",$super,PDO::PARAM_STR);
  $consulta -> bindValue(":Cordinador",$data -> id,PDO::PARAM_STR);
  $consulta -> bindValue(":contacto",$data -> Telefono,PDO::PARAM_STR);
  $consulta -> bindValue(":fecha_creación",$fecha,PDO::PARAM_STR);
  $consulta -> bindValue(":pago",$pago,PDO::PARAM_INT);
  $consulta -> bindValue(":cupos",$cupos,PDO::PARAM_INT);
  $consulta -> bindValue(":cupos_max",$cuposMax,PDO::PARAM_INT);
  $consulta -> bindValue(":profesores",$pro,PDO::PARAM_INT);
  $consulta -> bindValue(":id_cod",$data -> Codigo,PDO::PARAM_STR);
  $consulta -> bindValue(":info",$info,PDO::PARAM_STR);
  $consulta -> bindValue(":fecha_vencimiento",$fecha_vencimiento,PDO::PARAM_STR);
  return $consulta->execute();
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
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");;
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
?>