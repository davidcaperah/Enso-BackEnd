<?php
include_once  ('Fuctions.php');
$pass = "1001285573Da";
$perfil = "davidcaperh@gmail.com";
$numeros ="1";
$texto = "hola$''que se dice''";
$dato = "ingles";
$estu = "1";
$num2 = "5";
$coso = "ac2";
$array = json_encode(array("materias"=>"6","NumeroCurso"=>"1001"));
echo $texto;
echo " ";
$texto = preg_replace('([^A-Za-z0-9 ])', ' ', $texto);
echo $texto;
    // $data = json_decode($array);
    // $consulta = Verificar_Nota($dato,$estu);
    // $inicio = $consulta->$dato;
    // if($inicio == 0){
    //     $crear = Crear_Nota($dato,$estu,$estu);
    //     $insertar = Insertar_dbnotas($dato,$crear,$estu);
    //     if($insertar){
    //         $fin = Buscar_notas($dato,$crear);
    //         echo $fin;
    //     }else{
    //         echo "error";
    //     }
    // }else{
    //     $fin = Buscar_notas($dato,$inicio);
    //     echo json_encode($fin);
    // }
    // $hola = verificar_Actividad($num2);
    // if($hola->$coso == null){
    //         echo "este campo esta vacio".$hola->$coso;
    // }else{
    //     echo "ya esta lleno";
    // }
    // $json = json_encode($consulta);
    // echo $json;
 $hola = pos_id($num2);
 echo $hola;
 
?>