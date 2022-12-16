<?php
include_once ('Fuctions.php');
include_once ('corn.php');
function Generar_token(){
    return bin2hex(random_bytes((60-(60 %2))/2));
}
function Crear_token($userid, $tipo_u){
    $fecha = date('y-m-d');
    $hora = date('G:i:s A');
    $token = Generar_token();
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `api-tokens` (userid, tipo_u, token,fecha,hora) 
    VALUES (:userid,:tipo_u,:token,:fecha,:hora)");
    $consulta->bindValue("userid",$userid,PDO::PARAM_INT);
    $consulta->bindValue("tipo_u",$tipo_u,PDO::PARAM_INT);
    $consulta->bindValue("token",$token,PDO::PARAM_INT);
    $consulta->bindValue("fecha",$fecha,PDO::PARAM_INT);
    $consulta->bindValue("hora",$hora,PDO::PARAM_INT);
    if($consulta ->execute()){
        return $db->lastInsertId();
    }else{
        return $consulta ->execute();
    }
    
}
function Borrar_token($id){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM `api-tokens` WHERE id =:id");
    $consulta -> bindValue(':id',$id,PDO::PARAM_INT);
    return $consulta->execute();
}
function Consultar_Token($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM `api-tokens` WHERE id = :id");
    $consulta->bindValue(":id",$id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
function Consultar_Token_verificar($userid){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM `api-tokens` WHERE userid = :id");
    $consulta->bindValue(":id",$userid,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->rowCount();
}
function Consultar_Tokens(){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM `api-tokens`");
    $consulta -> execute();
    return $consulta->fetchAll();
}
// Crear_token(2,2);
// Borrar_token(1);
// print_r(Consultar_Token(2)); 
?>