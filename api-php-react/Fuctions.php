<?php
date_default_timezone_set('America/Bogota');
// login
function login_A($cuenta){
    $db = obtenerConexion();
    $sentencia = $db->prepare("SELECT pass FROM  cordinador WHERE correo = ?");
    $sentencia -> bindValue(1,$cuenta,PDO::PARAM_STR);
    $sentencia-> execute();
    return $sentencia ->fetchObject();
}
function login_D($cuenta){
    $db = obtenerConexion();
    $sentencia = $db->prepare("SELECT pass FROM  profesores WHERE Correo = ?");
    $sentencia -> bindValue(1,$cuenta,PDO::PARAM_STR);
    $sentencia-> execute();
    return $sentencia ->fetchObject();
}
function login_E($cuenta){
    $db = obtenerConexion();
    $sentencia = $db->prepare("SELECT pass FROM  estudiantes WHERE Correo = ?");
    $sentencia -> bindValue(1,$cuenta,PDO::PARAM_STR);
    $sentencia-> execute();
    return $sentencia->fetchObject();
}
function login_P($cuenta){
    $db = obtenerConexion();
    $sentencia = $db->prepare("SELECT pass FROM  acudientes WHERE Correo = ?");
    $sentencia -> bindValue(1,$cuenta,PDO::PARAM_STR);
    $sentencia-> execute();
    return $sentencia->fetchObject();

}
// partado cordinador
function Borrar_Cod($params){
    $db = obtenerconexion();
    $sentencia = $db -> prepare("DELETE FROM  codigos_cor WHERE codigo_cor = ?");
    $sentencia -> bindValue(1,$params,PDO::PARAM_STR);
    return $sentencia->execute();
}

function Buscar_codcor($d){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id FROM cordinador WHERE correo = ?");
    $consulta -> bindValue(1,$d);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Guardar_Perfil_Cor($perfil){
    $db = obtenerconexion();
    $opt = [
        'const' =>12,
    ];
    $contra = password_hash($perfil->pass1,PASSWORD_BCRYPT,$opt);
    $sentencia = $db->prepare("INSERT INTO cordinador (nombre,pass,correo,documento,apellido,codigo) VALUES (?, ?, ? ,? ,? ,?)");
    $sentencia -> bindValue(1,$perfil->Nombres,PDO::PARAM_STR);
    $sentencia -> bindParam(2,$contra,PDO::PARAM_STR);
    $sentencia -> bindValue(3,$perfil->email,PDO::PARAM_STR);
    $sentencia -> bindValue(4,$perfil->CC,PDO::PARAM_INT);
    $sentencia -> bindValue(5,$perfil->Apellidos,PDO::PARAM_STR);
    $sentencia -> bindValue(6,$perfil->Codigo,PDO::PARAM_STR);
    return $sentencia->execute();
}
function db_buscar_email($dato){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cordinador WHERE correo = ?");
    $consulta -> execute([$dato]);
    $fin = $consulta->rowCount();
    return $fin;
}
function db_buscar_codigo_cor($date){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id FROM codigos_cor WHERE codigo_cor = ?");
    $consulta -> execute([$date]);
    $fin = $consulta->rowCount();
    return $fin;
}
function Buscador_estu_pro($data){
    $db =obtenerConexion();
    $sql = 'SELECT id,Id_curso,Nombre,Apellido,imagen FROM estudiantes WHERE id_colegio ='.$data->col;
    $seach_terms = isset($data->nombre) ? $data->nombre :' ';
    $buscar_array = explode(' ',$seach_terms);

    $array_sql_term = array();
    $n = 0;
    foreach($buscar_array as $seach_term )
    {

        $sql .= " AND Nombre LIKE :search{$n}  ";
        $array_sql_term[":search{$n}"] = '%' .$seach_term. '%';
        $n++;
    }
    $statement = $db->prepare($sql);
    $statement->execute($array_sql_term);
    $results = $statement->fetchAll();
    return $results;
}
function Cargar_select_cur($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT id,Curso_Nu FROM cursos WHERE IdCol = :iddoc ");
    $consulta -> bindParam(':iddoc',$data->col,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
// cotar curso
function contar_curso_mallas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM curso WHERE id_curso =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
// copia de mallas
function Crear_curso_copia($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO curso (Nombre,id_curso,id_col) VALUES
    (:nombre,:id_curso,:id_col)");
    $consulta -> bindParam(':nombre',$data->curso,PDO::PARAM_STR);
    $consulta -> bindParam(':id_curso',$data->id_curso,PDO::PARAM_STR);
    $consulta -> bindParam(':id_col',$data->id_col,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_area_copia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM areas WHERE curso =:curso");
    $consulta -> bindParam(':curso',$data->id_copia,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Contar_areas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM areas WHERE curso =:curso");
    $consulta -> bindParam(':curso',$data->id_copia,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function Sacar_copia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT id FROM areas WHERE nombre_a =:nombre_a AND curso = :curso");
    $consulta -> bindParam(':nombre_a',$data->N_copia,PDO::PARAM_STR);
    $consulta -> bindParam(':curso',$data->id_copia,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchColumn();
}
function copia_materia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM materias_malla WHERE area =:area");
    $consulta -> bindParam(':area',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function copia_materia_contar($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM materias_malla WHERE area =:area");
    $consulta -> bindParam(':area',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function Crear_materia_copia($data,$d){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO materias_malla (nombre_m,area) VALUES
    (:nombre_m,:area)");
    $consulta -> bindParam(':nombre_m',$data->nombre_m,PDO::PARAM_STR);
    $consulta -> bindValue(':area',$d->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function copia_pensamiento($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM pensamientos WHERE id =:id");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_pensamiento_copia($data,$inf){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `pensamientos` (Nombre,Materias,Periodo) 
    VALUES
    (:Nombre,:Materias,:Periodo)");
    $consulta -> bindParam(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindValue(':Materias',$inf->materiac,PDO::PARAM_STR);
    $consulta -> bindParam(':Periodo',$inf->periodo,PDO::PARAM_STR);
    return $consulta -> execute();
}
function contar_competencia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM competencias WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_competencia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM competencias WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_competencia($data,$pensamiento){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `competencias` (id_pensamiento,Descri,A,B,C) 
    VALUES
    (:id_pensamiento,:Descri,:A,:B,:C)");
    $consulta -> bindValue(':id_pensamiento',$pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':Descri',$data->Descri,PDO::PARAM_STR);
    $consulta -> bindParam(':A',$data-> A,PDO::PARAM_STR);
    $consulta -> bindParam(':B',$data-> B,PDO::PARAM_STR);
    $consulta -> bindParam(':C',$data-> C,PDO::PARAM_STR);
    return $consulta -> execute();
}
//evidencias
function contar_evidencias($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM evidencias WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_evidencias($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM evidencias WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_evidencias($data,$pensamiento){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `evidencias` (id_pensamiento,Texto) 
    VALUES
    (:id_pensamiento,:Texto)");
    $consulta -> bindValue(':id_pensamiento',$pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':Texto',$data->Texto,PDO::PARAM_STR);
    return $consulta -> execute();
}
//estandares
function contar_estandares($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM estandares WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_estandares($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM estandares WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_estandares($data,$pensamiento){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `estandares` (id_pensamiento,Texto) 
    VALUES
    (:id_pensamiento,:Texto)");
    $consulta -> bindValue(':id_pensamiento',$pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':Texto',$data->Texto,PDO::PARAM_STR);
    return $consulta -> execute();
}
//derechos
function contar_derechos($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM derechos_ap WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_derechos($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM derechos_ap WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_derechos($data,$pensamiento){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `derechos_ap` (id_pensamiento,Texto) 
    VALUES
    (:id_pensamiento,:Texto)");
    $consulta -> bindValue(':id_pensamiento',$pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':Texto',$data->Texto,PDO::PARAM_STR);
    return $consulta -> execute();
}
// temas_p
function contar_temas_p($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM tema_p WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_temas_p($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM tema_p WHERE id_pensamiento =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_temas_p($data,$pensamiento){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `tema_p` (id_pensamiento,Nombre) 
    VALUES
    (:id_pensamiento,:Nombre)");
    $consulta -> bindValue(':id_pensamiento',$pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
// temas
function contar_temas($data,$data2){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM temas WHERE id_pensamiento =:id AND id_temap = :id_temap");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta -> bindParam(':id_temap',$data2,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_temas($data,$data2){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM temas WHERE id_pensamiento =:id AND id_temap = :id_temap");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta -> bindParam(':id_temap',$data2,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_temas($data,$pensamiento,$temas){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `temas` (id_pensamiento,nombre,id_temap,descr) 
    VALUES
    (:id_pensamiento,:nombre,:id_temap,:descr)");
    $consulta -> bindValue(':id_pensamiento',$pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':nombre',$data->nombre,PDO::PARAM_STR);
    $consulta -> bindValue(':id_temap',$temas,PDO::PARAM_INT);
    $consulta -> bindValue(':descr',$data->descr,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
//recuerperacion
function ver_correo_dd($correo){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM profesores WHERE Correo = :Correo");
    $consulta -> bindParam(':Correo',$correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function ver_correo_d($correo){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM profesores WHERE Correo = :Correo");
    $consulta -> bindParam(':Correo',$correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
//subtemas
function contar_subtemas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM `sub-temas` WHERE tema =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function sacar_copia_subtemas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM `sub-temas` WHERE tema =:id");
    $consulta -> bindParam(':id',$data,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Guardar_copia_subtemas($data,$tema){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `sub-temas` (nombre_sub,descrip,tema) 
    VALUES
    (:nombre_sub,:descrip,:tema)");
    $consulta -> bindValue(':nombre_sub',$data -> nombre_sub,PDO::PARAM_INT);
    $consulta -> bindValue(':descrip',$data->descrip,PDO::PARAM_STR);
    $consulta -> bindValue(':tema',$tema,PDO::PARAM_INT);
    return $consulta -> execute();
}
// colegio
function colegio_vence($vence,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE colegios SET pago = :pago WHERE colegios.id =:id");
    $consulta ->bindParam(':pago',$vence,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function colegio_editar($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE colegios SET nombreC = :nombreC, contacto = :contacto, info = :info, imagen = :imagen WHERE colegios.id =:id");
    $consulta ->bindParam(':nombreC',$data->Nombre,PDO::PARAM_STR);
    $consulta ->bindParam(':contacto',$data->contacto,PDO::PARAM_STR);
    $consulta ->bindParam(':info',$data->info,PDO::PARAM_STR);
    $consulta ->bindParam(':imagen',$data->imagen,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_STR);
    return $consulta -> execute();
}
function colegio_vence_renovar($id){
    $fecha = date("d-m-Y");
    $fecha_vencimiento = date("d-m-Y",strtotime($fecha."+ 1 month"));
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE colegios SET fecha_vencimiento = :fecha_vencimiento WHERE colegios.id =:id");
    $consulta ->bindParam(':fecha_vencimiento',$fecha_vencimiento,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function colegio_cupos($Cupos_max,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE colegios SET Cupos_max = :Cupos_max WHERE colegios.id =:id");
    $consulta ->bindParam(':Cupos_max',$Cupos_max,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    return $consulta -> execute();
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
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $consulta -> bindValue(1,$data -> Nombre,PDO::PARAM_STR);
    $consulta -> bindValue(2,$super,PDO::PARAM_STR);
    $consulta -> bindValue(3,$data -> id,PDO::PARAM_STR);
    $consulta -> bindValue(4,$data -> Telefono,PDO::PARAM_STR);
    $consulta -> bindValue(5,$fecha,PDO::PARAM_STR);
    $consulta -> bindValue(6,$pago,PDO::PARAM_INT);
    $consulta -> bindValue(7,$cupos,PDO::PARAM_INT);
    $consulta -> bindValue(8,$cuposMax,PDO::PARAM_INT);
    $consulta -> bindValue(9,$pro,PDO::PARAM_INT);
    $consulta -> bindValue(10,$data -> Codigo,PDO::PARAM_STR);
    $consulta -> bindValue(11,$info,PDO::PARAM_STR);
    $consulta -> bindValue(12,$fecha_vencimiento,PDO::PARAM_STR);
    return $consulta->execute();
}
function Buscar_col($d){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id FROM colegios WHERE nombreC = ?");
    $consulta -> bindValue(1,$d,PDO::PARAM_STR);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Buscar_colcor($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM colegios WHERE Cordinador =?");
    $consulta -> bindValue(1,$id->id,PDO::PARAM_STR);
    $consulta -> execute();
    return $consulta->fetchObject();

}
function Buscar_colcod($cod){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM Cursos WHERE cod = ?");
    $consulta -> bindValue(1,$cod);
    $consulta -> execute();
    return $consulta -> fetchObject();
}
function Buscar_colid($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM colegios WHERE id = ?");
    $consulta -> bindValue(1,$id);
    $consulta -> execute();
    return $consulta -> fetchObject();
}
//eventos
function Crear_evento($data){
    $estado = 1;
    $db = obtenerConexion();
    $consulta = $db -> prepare("INSERT INTO eventos_a (`Nombre`, `img`, `fecha_i`,`fecha_f`,`cupos`,`des`,`estado`,`asignatura`) VALUES
    (:Nombre,:img, :fecha_i,:fecha_f,:cupos,:descr,:estado,:asignatura)");
    $consulta -> bindParam(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindParam(':img',$data->img,PDO::PARAM_STR);
    $consulta -> bindParam(':fecha_i',$data->fecha_i,PDO::PARAM_STR);
    $consulta -> bindParam(':fecha_f',$data->fecha_f,PDO::PARAM_STR);
    $consulta -> bindParam(':cupos',$data->cupos,PDO::PARAM_STR);
    $consulta -> bindParam(':descr',$data->des,PDO::PARAM_STR);
    $consulta -> bindParam(':estado',$estado,PDO::PARAM_STR);
    $consulta -> bindParam(':asignatura',$data->asignatura,PDO::PARAM_STR);
    return $consulta ->execute();
   
  }
  function Contar_eventos(){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM eventos_a");
    $consulta ->execute();
    return $consulta->rowCount();
  }
  function Cargar_eventos(){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM eventos_a");
    $consulta ->execute();
    return $consulta->fetchAll();
  }
  function Cargar_eventos_id($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM eventos_a WHERE id = :id");
    $consulta -> bindParam(':id',$data->id_E,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchObject();
  }
  function Crear_par_evento($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("INSERT INTO evento_r (id_estu,evento,result) VALUES
    (:id_estu,:evento,:result)");
    $consulta -> bindParam(':id_estu',$data->id,PDO::PARAM_STR);
    $consulta -> bindParam(':evento',$data->id_E,PDO::PARAM_STR);
    $consulta -> bindParam(':result',$data->r,PDO::PARAM_STR);
    return $consulta ->execute(); 
  }
  function verificar_evento_par($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM evento_r WHERE id_estu = :id AND evento = :evento");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':evento',$data->evento,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->rowCount();
  }
  function verificar_evento_lista($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT evento_r.*,E.Nombre,E.Apellido,E.id_colegio,C.nombreC FROM evento_r
    INNER JOIN estudiantes E ON evento_r.id_estu = E.id
    INNER JOIN colegios C ON E.id_colegio = C.id
     WHERE evento = :evento");
    $consulta -> bindParam(':evento',$data->evento,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
  }
  function Contar_eventos_p($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM eventos_a WHERE id = :id");
    $consulta -> bindParam(':id',$data->Nombre,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->rowCount();
  }
  function Contar_paticipantes($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM evento_r WHERE evento = :evento");
    $consulta -> bindParam(':evento',$data->evento,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->rowCount(); 
  }
  function Cambiar_puntos($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE evento_r SET result = :result WHERE id = :id AND evento =:evento");
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_STR);
    $consulta ->bindParam(':evento',$data->evento,PDO::PARAM_STR);
    $consulta ->bindParam(':result',$data->result,PDO::PARAM_STR);
    return $consulta -> execute();
}
  function Cargar_eventos_P($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM eventos_a WHERE id = :id");
    $consulta -> bindParam(':id',$data->Nombre,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
  }
  function Borrar_evento($params){
    $db = obtenerconexion();
    $sentencia = $db -> prepare("DELETE FROM eventos_a WHERE id = ?");
    $sentencia -> bindValue(1,$params,PDO::PARAM_INT);
    return $sentencia->execute();
}
//cambiar claves
function Cambiar_clave($data){
    $db = obtenerconexion();
    $opt = [
        'const' =>12,
    ];
    $contra = password_hash($data->claveconfimar,PASSWORD_BCRYPT,$opt);
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET Pass = :Pass WHERE id =:id");
    $consulta ->bindParam(':Pass',$contra,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function cambiar_estado_privacidad($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET estado_p = :estado_p WHERE id =:id");
    $consulta ->bindParam(':estado_p',$data->estado,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function cambiar_estado_estu($estado,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET estado = :estado WHERE id =:id");
    $consulta ->bindParam(':estado',$estado,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Verificar_estado_privacidad($data){
    $db = obtenerConexion();
    $sentencia = $db->prepare("SELECT estado_p FROM  estudiantes WHERE id = :id");
    $sentencia -> bindValue(':id',$data->id,PDO::PARAM_STR);
    $sentencia-> execute();
    return $sentencia ->fetchObject();
}
function Verificar_cambio_contra($data){
    $db = obtenerConexion();
    $sentencia = $db->prepare("SELECT pass,Nombre,Apellido,Correo FROM  estudiantes WHERE id = :id");
    $sentencia -> bindValue(':id',$data->id,PDO::PARAM_STR);
    $sentencia-> execute();
    return $sentencia ->fetchObject();
}

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
function Ver_Correo_estu($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM estudiantes WHERE Correo = :correo");
    $consulta -> bindParam(':correo',$data->Correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
  }
function Ver_Correo_cor($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM cordinador WHERE correo = :correo");
    $consulta -> bindParam(':correo',$data->Correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
  }
function Ver_Correo_acu($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM acudientes WHERE correo = :correo");
    $consulta -> bindParam(':correo',$data->Correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
}
function Ver_Correo_pro($data){
    $db = obtenerConexion();
    $consulta = $db -> prepare("SELECT * FROM profesores WHERE Correo = :correo");
    $consulta -> bindParam(':correo',$data->Correo,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->rowCount();
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
function Cambiar_contra_e($Pass,$Correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET Pass = :Pass WHERE Correo =:Correo");
    $consulta ->bindParam(':Pass',$Pass,PDO::PARAM_STR);
    $consulta ->bindParam(':Correo',$Correo,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cambiar_contra_p($Pass,$Correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE profesores SET pass = :Pass WHERE Correo =:Correo");
    $consulta ->bindParam(':Pass',$Pass,PDO::PARAM_STR);
    $consulta ->bindParam(':Correo',$Correo,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cambiar_contra_a($Pass,$Correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE acudientes SET pass = :Pass WHERE correo =:Correo");
    $consulta ->bindParam(':Pass',$Pass,PDO::PARAM_STR);
    $consulta ->bindParam(':Correo',$Correo,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cambiar_contra_c($Pass,$Correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE cordinador SET pass = :Pass WHERE correo =:Correo");
    $consulta ->bindParam(':Pass',$Pass,PDO::PARAM_STR);
    $consulta ->bindParam(':Correo',$Correo,PDO::PARAM_STR);
    return $consulta -> execute();
}
// Acudientes
function Guardar_Perfil_Acudiente($perfil,$datos_estu){
    $db = obtenerconexion();
    $fecha = date("d-m-Y H:i:00");
    $opt = [
        'const' =>12,
    ];
    $contra = password_hash($perfil->pass1,PASSWORD_BCRYPT,$opt);
    $sentencia = $db->prepare("INSERT INTO acudientes 
    (Nombre, Apellido, curso, estu, correo, pass, cod, id_col,Fecha_c) 
    VALUES (:Nombre,:Apellido,:curso,:estu,:correo,:pass,:cod,:id_col,:Fecha_c)");
    $sentencia -> bindParam(":Nombre",$perfil->Nombres,PDO::PARAM_STR);
    $sentencia -> bindParam(":Apellido",$perfil->Apellido,PDO::PARAM_STR);
    $sentencia -> bindValue(":curso",$datos_estu->Id_curso ,PDO::PARAM_INT);
    $sentencia -> bindValue(":estu",$datos_estu->id,PDO::PARAM_INT);
    $sentencia -> bindParam(":correo",$perfil->correo,PDO::PARAM_STR);
    $sentencia -> bindParam(":pass",$contra,PDO::PARAM_STR);
    $sentencia -> bindParam(":cod",$perfil->cod,PDO::PARAM_STR);
    $sentencia -> bindParam(":id_col",$datos_estu->id_colegio,PDO::PARAM_INT );
    $sentencia -> bindParam(":Fecha_c",$fecha,PDO::PARAM_STR);

    return $sentencia->execute();
}
function Verificar_cod_Acudiente($cod){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM acudientes WHERE Cod = :Cod");
    $consulta -> BindValue(':Cod',$cod,PDO::PARAM_STR); 
    $consulta ->execute();
    return $consulta -> rowCount();

}
function Verificar_estu_cod_acudiente($cod){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id,Id_curso,id_colegio FROM estudiantes WHERE Cod = :Cod");
    $consulta -> BindValue(':Cod',$cod,PDO::PARAM_STR); 
    $consulta ->execute();
    return $consulta -> fetchObject();
}
function Buscar_email_acu($correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id_a FROM acudientes WHERE correo = :correo");
    $consulta -> BindValue(':correo',$correo,PDO::PARAM_STR); 
    $consulta ->execute();
    return $consulta -> fetchObject();
}
function Verificar_correo_acu($correo){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM acudientes WHERE correo = :correo");
    $consulta -> BindValue(':correo',$correo,PDO::PARAM_STR); 
    $consulta ->execute();
    return $consulta -> rowCount();
}
function consultar_estu($ida){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT estu FROM acudientes WHERE id_a = :id_a");
    $consulta -> BindValue(':id_a',$ida,PDO::PARAM_STR); 
    $consulta ->execute();
    return $consulta -> fetchObject();
}
function consultar_id_estu(){

}
//cursos
function db_agregar_cur($curso){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO cursos (IdCol,Can_Est,Curso_Nu,Cod,dias,horas,materias,jornada,ciclos) VALUES (?, ?, ?, ?, ?, ?, ? ,?, ?)"); 
    $consulta -> bindValue(1, $curso->idColegio,PDO::PARAM_STR);
    $consulta -> bindValue(2,$curso->Estudiantes,PDO::PARAM_STR);
    $consulta -> bindValue(3,$curso->Curso,PDO::PARAM_INT);
    $consulta -> bindValue(4,$curso->Codigo,PDO::PARAM_INT);
    $consulta -> bindValue(5,$curso->Dias,PDO::PARAM_INT);
    $consulta -> bindValue(6,$curso->Horas,PDO::PARAM_INT);
    $consulta -> bindValue(7,$curso->Materias,PDO::PARAM_INT);
    $consulta -> bindValue(8,$curso->Jornada,PDO::PARAM_INT);
    $consulta ->bindValue(9,$curso->Ciclo,PDO::PARAM_STR);
    return $consulta -> execute();
} 
function Editar_Curpro($datos,$n){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE cursos SET IdPro =:idpro, Nombres = :n, Apellidos = :a WHERE cursos.id =:id");
    $consulta ->bindParam(':idpro',$datos->idDoc,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$datos->idCurso,PDO::PARAM_STR);
    $consulta ->bindParam(':n',$n->Nombre,PDO::PARAM_STR);
    $consulta ->bindParam(':a',$n->apellido,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Buscar_Curcol($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cursos WHERE IdCol = :idcol");
    $consulta -> BindValue('idcol',$datos,PDO::PARAM_INT); 
    $consulta ->execute();
    return $consulta->fetchAll();
}  
function Buscar_Curpro($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cursos WHERE IdPro = :idpro");
    $consulta -> BindValue('idpro',$datos,PDO::PARAM_INT); 
    $consulta ->execute();
    return $consulta->fetchObject();
} 
function Buscar_Curid($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cursos WHERE id = :id");
    $consulta -> BindValue('id',$datos,PDO::PARAM_INT); 
    $consulta ->execute();
    return $consulta->fetchObject();
}  
// estudiante
function Guardar_Perfil_Estu($perfil){
    $db = obtenerconexion();
    $fecha = date("y-m-d");
    $puntos = 1;
    $opt = [
        'const' =>12,
    ];
    $contra = password_hash($perfil->pass1,PASSWORD_BCRYPT,$opt);
    $sentencia = $db->prepare("INSERT INTO estudiantes 
    (Nombre, Apellido, Id_curso, id_colegio, Correo, pass, Puntos, Ciclo, Cod, Curso, fecha_reg) 
    VALUES (?, ?, ? ,? ,? , ?, ?, ?, ?, ?, ?)");
    $sentencia -> bindValue(1,$perfil->Nombres,PDO::PARAM_STR);
    $sentencia -> bindValue(2,$perfil->Apellido,PDO::PARAM_STR);
    $sentencia -> bindValue(3,$perfil->Curso,PDO::PARAM_STR);
    $sentencia -> bindValue(4,$perfil->Id_Col,PDO::PARAM_INT);
    $sentencia -> bindValue(5,$perfil->Email,PDO::PARAM_STR);
    $sentencia -> bindValue(6,$contra,PDO::PARAM_STR);
    $sentencia -> bindValue(7,$puntos,PDO::PARAM_STR);
    $sentencia -> bindValue(8,$perfil->Ciclo,PDO::PARAM_INT);
    $sentencia -> bindValue(9,$perfil->Codigo,PDO::PARAM_STR);
    $sentencia -> bindValue(10,$perfil->Curso,PDO::PARAM_STR);
    $sentencia -> bindValue(11,$fecha,PDO::PARAM_STR);
    return $sentencia->execute();
}
function Verify_cod($date){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id FROM cod_lib WHERE Cod = ?");
    $consulta -> execute([$date]);
    $fin = $consulta->rowCount();
    return $fin;
}
function cod_estu($date){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cod_lib WHERE Cod = ?");
    $consulta -> execute([$date]);
    return $consulta -> fetchObject();
}
function db_buscar_email_estu($dato){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM estudiantes WHERE Correo = ?");
    $consulta -> execute([$dato]);
    $fin = $consulta->rowCount();
    return $fin;
}
function Buscar_idestu($d){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id,Id_curso,Id_colegio,ciclo FROM estudiantes WHERE Correo = ?");
    $consulta -> bindValue(1,$d,PDO::PARAM_STR);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Cargar_Estu($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT estudiantes.id,estudiantes.Nombre,estudiantes.Apellido,estudiantes.Id_curso,estudiantes.id_colegio,estudiantes.Correo,estudiantes.Puntos,estudiantes.Ciclo,estudiantes.Curso,estudiantes.promedio,estudiantes.fecha_reg,cur.Curso_Nu FROM estudiantes 
    INNER JOIN cursos cur ON estudiantes.Id_curso = cur.id
    WHERE estudiantes.id = :id");
    $consulta -> bindValue(":id",$id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Cargar_Estucur($id_curso){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM estudiantes WHERE Id_curso = ?");
    $consulta -> bindValue(1,$id_curso,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
function Cargar_Estu_contr($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT Nombre,Apellido,Correo,Puntos,Ciclo,imagen FROM estudiantes WHERE id = ?");
    $consulta -> bindValue(1,$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Cargar_director_curso($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT Nombres,Apellidos FROM cursos WHERE id = ?");
    $consulta -> bindValue(1,$data->idcurso,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Buscar_estu_cur($data){
    $db =obtenerConexion();
    $sql = "SELECT id,Nombre,Apellido,imagen FROM estudiantes WHERE Id_curso =".$data->id;
    $seach_terms = isset($data->nombre) ? $data->nombre :' ';
    $buscar_array = explode(' ',$seach_terms);

    $array_sql_term = array();
    $n = 0;
    foreach($buscar_array as $seach_term )
    {

        $sql .= " AND Nombre LIKE :search{$n}  ";
        $array_sql_term[":search{$n}"] = '%' .$seach_term. '%';
        $n++;
    }
    $statement = $db->prepare($sql);
    $statement->execute($array_sql_term);
    $results = $statement->fetchAll();
    return $results;
}
function Borrar_cod_estu($params){
    $db = obtenerconexion();
    $sentencia = $db -> prepare("DELETE FROM cod_lib WHERE id = ?");
    $sentencia -> bindValue(1,$params,PDO::PARAM_STR);
    return $sentencia->execute();
}
function Editar_Estudiante($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET Nombre = :nombre, Apellido = :Apellido, Id_curso = :Id_curso, Ciclo = :Ciclo
    WHERE estudiantes.id =:id");
    $consulta ->bindParam(':id',$datos->id,PDO::PARAM_INT);
    $consulta ->bindParam(':nombre',$datos->nombre,PDO::PARAM_STR);
    $consulta ->bindParam(':Apellido',$datos->apellido,PDO::PARAM_STR);
    $consulta ->bindParam(':Id_curso',$datos->curso,PDO::PARAM_INT);
    $consulta ->bindParam(':Ciclo',$datos->ciclo,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Editar_for_Estudiante($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET Nombre = :nombre, Apellido = :Apellido, Correo = :Correo
    WHERE estudiantes.id =:id");
    $consulta ->bindParam(':id',$datos->id,PDO::PARAM_INT);
    $consulta ->bindParam(':nombre',$datos->Nombres,PDO::PARAM_STR);
    $consulta ->bindParam(':Apellido',$datos->Apellidos,PDO::PARAM_STR);
    $consulta ->bindParam(':Correo',$datos->Correo,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Cargar_actividades($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT actividad.*,esa.nombre as estado_name ,m.N_Materia as materia_name, m.imagen FROM actividad 
    INNER JOIN estado_actividad esa ON actividad.estado_d = esa.id_a
    INNER JOIN materias m ON actividad.id_materia = m.id
    WHERE id_curso = :id_curso AND estado_d != '2' ");
    $consulta->bindParam(':id_curso',$datos->curso,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function Cargar_actividad_resolver($datos){
    $db = ObtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM actividad_hyg 
    WHERE id = :id");
    $consulta->bindParam(':id',$datos->id,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function Entregar_actividad($datos){
    $db = ObtenerConexion();
    $fecha = date("y-m-d H:i:s");
    $consulta = $db ->prepare("INSERT INTO solucion 
    (id_maestra,evidencia,comentario,id_estu,fecha_entrega,id_curso,respuestas)	 
    VALUES (:id_maestra,:evidencia,:comentario,:id_estu,:fecha_entrega,:id_curso,:respuestas)");
    $consulta->bindParam(':id_maestra',$datos->id_act,PDO::PARAM_INT);
    $consulta->bindParam(':evidencia',$datos->tarea,PDO::PARAM_STR);
    $consulta->bindParam(':comentario',$datos->comentario,PDO::PARAM_STR);
    $consulta->bindParam(':id_estu',$datos->iduser,PDO::PARAM_INT);
    $consulta->bindParam(':fecha_entrega',$fecha,PDO::PARAM_STR);
    $consulta->bindParam(':id_curso',$datos->curso,PDO::PARAM_INT);
    $consulta->bindParam(':respuestas',$datos->resjson,PDO::PARAM_STR);
    $consulta->execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_actividad($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT solucion.*, es.Nombre as Nombree,es.Apellido as Apellidoe, est.nombre as n_estado, curso.Curso_Nu as n_curso, Act.puntos as puntos FROM solucion
    INNER JOIN estudiantes es ON solucion.id_estu = es.id
    INNER JOIN estado_actividad est ON solucion.estado = est.id_a
    INNER JOIN cursos curso ON solucion.id_curso = curso.id
    INNER JOIN actividad acr ON solucion.id_maestra = acr.id
    INNER JOIN actividad_hyg Act ON acr.id_acti = Act.id  
    WHERE id_maestra = :idm");
    $consulta->bindParam(':idm',$datos->id,PDO::PARAM_INT);
    $consulta->execute();
    $fin = $consulta->fetchAll();
    return $fin;
}
function verificar_actividad($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM solucion WHERE id_estu = :idestu AND id_maestra = :idm");
    $consulta->bindParam(':idestu',$datos->iduser,PDO::PARAM_INT);
    $consulta->bindParam(':idm',$datos->idm,PDO::PARAM_INT);
    $consulta->execute();
    $fin = $consulta->rowCount();
    return $fin;
}
function Cambiar_estado_act($estado,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE solucion SET estado = :estado
    WHERE id =:id");
    $consulta ->bindParam(':estado',$estado,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$id,PDO::PARAM_STR);

    return $consulta -> execute();  
}
function Cargar_docentes_estu($datos){
    $db = ObtenerConexion();
    $consulta = $db ->prepare("SELECT Nombre,apellido,estudios,imagen,Cargo FROM profesores 
    WHERE id_col = :id_col");
    $consulta->bindParam(':id_col',$datos,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function Medir_promedios($col){
    $db = ObtenerConexion();
    $consulta = $db ->prepare("SELECT estudiantes.promedio,estudiantes.id,estudiantes.Nombre,estudiantes.Apellido,estudiantes.imagen,estudiantes.Curso,cur.Curso_Nu FROM estudiantes
    INNER JOIN cursos cur ON estudiantes.Curso = cur.id 
    WHERE id_colegio = :id_colegio");
    $consulta->bindParam(':id_colegio',$col,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function Notas_materias($data){
    $db = ObtenerConexion();
    $consulta = $db ->prepare("SELECT promedio.*,mate.N_Materia FROM promedio
    INNER JOIN materias mate ON promedio.id_materia = mate.id 
    WHERE id_estu = :id_estu");
    $consulta->bindParam(':id_estu',$data->id,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function Notas_materias_curso($data){
    $db = ObtenerConexion();
    $consulta = $db ->prepare("SELECT promedio.*,mate.N_Materia FROM promedio
    INNER JOIN materias mate ON promedio.id_materia = mate.id 
    WHERE id_estu = :id_estu AND id_curso = :id_curso AND id_materia = :id_materia");
    $consulta->bindParam(':id_curso',$data->id_curso,PDO::PARAM_INT);
    $consulta->bindParam(':id_estu',$data->id_estu,PDO::PARAM_INT);
    $consulta->bindParam(':id_materia',$data->id_materia,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
// Actividades crear
function crear_actividad_malla($datos,$PDF,$video,$imagen,$ICFES,$n_icfes,$D_es,$id_Profesor){
    $db = obtenerConexion();
    $sub_tema = null;
    $json = json_encode($datos->Puntos);
    $consulta = $db ->prepare("INSERT INTO actividad_hyg 
    (Nombre, Tipo,tipo_s, objetivo,C_puntos, puntos,sub_tema,PDF,video,imagen,ICFES,n_icfes,id_Profesor,D_es,materia) 
    VALUES (:Nombre,:Tipo,:tipo_s,:objetivo,:C_puntos,:puntos,:sub_tema,:PDF,:video,:imagen,:ICFES,:n_icfes,:id_Profesor,:D_es,:materia)");
    $consulta ->bindValue(':Nombre',$datos->Nombre_a,PDO::PARAM_STR);
    $consulta ->bindValue(':Tipo',$datos->tipo_p,PDO::PARAM_STR);
    $consulta ->bindValue(':tipo_s',$datos->tipo_s,PDO::PARAM_STR);
    $consulta ->bindValue(':objetivo',$datos->Des_A,PDO::PARAM_STR);
    $consulta ->bindValue(':C_puntos',$datos->Cantidad_p,PDO::PARAM_STR);
    $consulta ->bindValue(':puntos',$json,PDO::PARAM_STR);
    $consulta ->bindValue(':sub_tema',$sub_tema,PDO::PARAM_STR);
    $consulta ->bindValue(':PDF',$PDF,PDO::PARAM_STR);
    $consulta ->bindValue(':video',$video,PDO::PARAM_STR);
    $consulta ->bindValue(':imagen',$imagen,PDO::PARAM_STR);
    $consulta ->bindValue(':ICFES',$ICFES,PDO::PARAM_STR);
    $consulta ->bindValue(':n_icfes',$n_icfes,PDO::PARAM_STR);
    $consulta ->bindValue(':id_Profesor',$id_Profesor,PDO::PARAM_STR);
    $consulta ->bindValue(':D_es',$D_es,PDO::PARAM_STR);
    $consulta ->bindValue(':materia',$datos->materias,PDO::PARAM_STR);
    return $consulta ->execute();
}
function crear_actividad_docente($datos){
    $db = obtenerConexion();
    $sub_tema = null;
    $json = json_encode($datos->preguntas);
    $D_es = 1;
    $consulta = $db ->prepare("INSERT INTO actividad_hyg 
    (Nombre, Tipo,tipo_s,curso, objetivo,C_puntos, puntos,sub_tema,id_Profesor,D_es,materia,link) 
    VALUES (:Nombre,:Tipo,:tipo_s,:curso,:objetivo,:C_puntos,:puntos,:sub_tema,:id_Profesor,:D_es,:materia,:link)");
    $consulta ->bindValue(':Nombre',$datos->Nombre,PDO::PARAM_STR);
    $consulta ->bindValue(':Tipo',$datos->archivo,PDO::PARAM_STR);
    $consulta ->bindValue(':tipo_s',$datos->tipo,PDO::PARAM_STR);
    $consulta ->bindValue(':curso',$datos->curso,PDO::PARAM_STR);
    $consulta ->bindValue(':objetivo',$datos->texto,PDO::PARAM_STR);
    $consulta ->bindValue(':C_puntos',$datos->NumeroPreguntas,PDO::PARAM_STR);
    $consulta ->bindValue(':puntos',$json,PDO::PARAM_STR);
    $consulta ->bindValue(':sub_tema',$sub_tema,PDO::PARAM_STR);
    $consulta ->bindValue(':id_Profesor',$datos->iduser,PDO::PARAM_STR);
    $consulta ->bindValue(':D_es',$D_es,PDO::PARAM_STR);
    $consulta ->bindValue(':link',$datos->URL,PDO::PARAM_STR);
    $consulta ->bindValue(':materia',$datos->materia,PDO::PARAM_STR);
    return $consulta->execute();
}
function Cargar_materias(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM materias");
    $consulta->execute();
    return $consulta->fetchAll();
}
function Cargar_actividad_malla_sub($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM actividad_hyg WHERE sub_tema=:sub_tema");
    $consulta ->bindValue(':sub_tema',$datos ,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function Cargar_actividades_all(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM actividad_hyg");
    $consulta->execute();
    return $consulta->fetchAll();
}
function Update_actividad_subtema($subtema,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE actividad_hyg SET sub_tema = :subtema
    WHERE actividad_hyg.id =:id");
    $consulta ->bindParam(':subtema',$subtema,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$id,PDO::PARAM_STR);

    return $consulta -> execute();  
}
function cambiar_curso_actividad($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE actividad_hyg SET curso = :curso
    WHERE actividad_hyg.id =:id");
    $consulta ->bindParam(':curso',$data->curso,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_STR);

    return $consulta -> execute();  
}

//anuncios
function anuncios_Cargar($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM anuncios WHERE id_col = :id_col");
    $consulta->bindParam(':id_col',$datos->id_col,PDO::PARAM_INT);
    $consulta->execute();
    return $consulta->fetchAll();
}
function anuncios_Crear($datos){
    $db = ObtenerConexion();
    $fecha = date("y-m-d H:i:s");
    $consulta = $db ->prepare("INSERT INTO anuncios 
    (id_col,anuncio,fecha,imagen,titulo)	 
    VALUES (:id_col,:anuncio,:fecha,:imagen,:titulo)");
    $consulta->bindParam(':id_col',$datos->id_col,PDO::PARAM_INT);
    $consulta->bindParam(':anuncio',$datos->anuncio,PDO::PARAM_STR);
    $consulta->bindParam(':fecha',$fecha,PDO::PARAM_STR);
    $consulta->bindParam(':imagen',$datos->imagen,PDO::PARAM_STR);
    $consulta->bindParam(':titulo',$datos->titulo,PDO::PARAM_STR);
    $consulta->execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function anuncios_Borrar($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM anuncios WHERE id = :id");
    $consulta -> bindValue(':id',$data->id,PDO::PARAM_INT);
    return $consulta->execute();
}
function anuncios_Editar($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE anuncios SET anuncio = :anuncio, titulo = :titulo
    WHERE anuncios.id =:id");
    $consulta ->bindParam(':anuncio',$data->anuncio,PDO::PARAM_STR);
    $consulta ->bindParam(':titulo',$data->titulo,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta->execute();
}
function Editar_materia($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE materias SET N_Materia = :Nombre, imagen = :imagen WHERE id =:id");
    $consulta ->bindParam(':id',$datos->id,PDO::PARAM_STR);
    $consulta ->bindParam(':Nombre',$datos->Nombre,PDO::PARAM_STR);
    $consulta ->bindParam(':imagen',$datos->imagen,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Crear_materia($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO materias (N_Materia,imagen) VALUES (:Nombre,:imagen)");
    $consulta ->bindParam(':Nombre',$datos->Nombre,PDO::PARAM_STR);
    $consulta ->bindParam(':imagen',$datos->imagen,PDO::PARAM_STR);
    return $consulta->execute();
}
// profesor
function Cargar_mat(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM materias");
    $consulta->execute();
    return $consulta->fetchAll();
}
function Guardar_Perfil_Pro($datos){
    $db = obtenerConexion();
    $opt = [
        'const' =>12,
    ];
    $contra = password_hash($datos->pass1,PASSWORD_BCRYPT,$opt);
    $consulta = $db ->prepare("INSERT INTO profesores (Nombre,apellido,Correo,pass,Documento,cod_materia,id_aula,id_col) VALUES (?,?,?,?,?,?,?,?)");
    $consulta -> bindValue(1,$datos->Nombres,PDO::PARAM_STR);
    $consulta -> bindValue(2,$datos->Apellidos,PDO::PARAM_STR);
    $consulta -> bindValue(3,$datos->email,PDO::PARAM_STR);
    $consulta -> bindValue(4,$contra,PDO::PARAM_STR);
    $consulta -> bindValue(5,$datos->CC,PDO::PARAM_STR);
    $consulta -> bindValue(6,NULL,PDO::PARAM_STR);
    $consulta -> bindValue(7,NULL,PDO::PARAM_STR);
    $consulta -> bindValue(8,NULL,PDO::PARAM_STR);
    return $consulta->execute();
}
function db_Buscar_email_pro($dato){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM profesores WHERE correo = ?");
    $consulta -> execute([$dato]);
    $fin = $consulta->rowCount();
    return $fin;

}
function Buscar_idpro($d){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id,id_col,Cod_materia FROM profesores WHERE Correo = ?");
    $consulta -> bindValue(1,$d);
    $consulta -> execute();
    return $consulta->fetchObject();

}
function Buscar_codpro($d){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id FROM cordinador WHERE correo = ?");
    $consulta -> bindValue(1,$d);
    $consulta -> execute();
    return $consulta->fetchObject();
}
function Buscar_Proid($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id,Nombre,apellido,Correo,Documento,Cod_materia,id_aula,id_col, Descr,estudios,imagen,Cargo FROM profesores WHERE id =:id");
    $consulta -> bindParam(':id',$id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchObject();
}
function Editar_pro($datos,$id_aula){
    $db = obtenerConexion();
    $est = preg_replace('([^A-Za-z0-9 ])', ' ', $datos->Estudios);
    $consulta = $db->prepare("UPDATE profesores SET Cod_materia = :cod, id_aula =:id_aula,id_col=:id_col,Descr=:t,estudios =:e WHERE profesores.id =:id");
    $consulta ->bindParam(':cod',$datos->Materias,PDO::PARAM_STR);
    $consulta ->bindParam(':id_aula',$id_aula,PDO::PARAM_STR);
    $consulta ->bindParam(':id_col',$datos->idCol,PDO::PARAM_STR);
    $consulta ->bindParam(':t',$datos->InfoDoc,PDO::PARAM_STR);
    $consulta ->bindParam(':e',$est,PDO::PARAM_STR);
    $consulta ->bindParam(':id',$datos->idDoc,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Buscar_pro($idcol){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT id,Nombre,apellido,estudios FROM profesores WHERE id_col = :id");
    $consulta -> bindParam(':id',$idcol,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Buscador_profesores($data){
    $db =obtenerConexion();
    $sql = 'SELECT * FROM profesores WHERE id_col ='.$data->col;
    $seach_terms = isset($data->nombre) ? $data->nombre :' ';
    $buscar_array = explode(' ',$seach_terms);

    $array_sql_term = array();
    $n = 0;
    foreach($buscar_array as $seach_term )
    {

        $sql .= " AND Nombre LIKE :search{$n}  ";
        $array_sql_term[":search{$n}"] = '%' .$seach_term. '%';
        $n++;
    }
    $statement = $db->prepare($sql);
    $statement->execute($array_sql_term);
    $results = $statement->fetchAll();
    return $results;
}
function Buscar_proname($name){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT id,Nombre,apellido,estudios FROM profesores WHERE  Nombre = :id");
    $consulta -> bindParam(':id',$name,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Editar_Docente($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE profesores SET imagen = :imagen, Descr = :rexto,estudios = :estudios,
     Nombre = :nombre, apellido=:apellido WHERE profesores.id =:id");
    $consulta ->bindParam(':id',$datos->id,PDO::PARAM_STR);
    $consulta ->bindParam(':imagen',$datos->imagen,PDO::PARAM_STR);
    $consulta ->bindParam(':rexto',$datos->info,PDO::PARAM_STR);
    $consulta ->bindParam(':estudios',$datos->estudios,PDO::PARAM_STR);
    $consulta ->bindParam(':nombre',$datos->Nombres,PDO::PARAM_STR);
    $consulta ->bindParam(':apellido',$datos->apellidos,PDO::PARAM_STR);
    return $consulta -> execute();
}
// aula
function crear_aula($datos){
    $db = obtenerConexion();
    $info = preg_replace('([^A-Za-z0-9 ])', ' ', $datos->InfoAula);
    $consulta = $db ->prepare("INSERT INTO aula (id_Pro, id_Mat, descr) VALUES (?,?,?)");
    $consulta ->bindValue(1,$datos->idDoc,PDO::PARAM_STR);
    $consulta ->bindValue(2,$datos->Materias,PDO::PARAM_STR);
    $consulta ->bindValue(3,$info,PDO::PARAM_STR);
    return $consulta ->execute();
}
function crear_aulaest($datos,$id_curso){
    $db = obtenerConexion();
    $info = preg_replace('([^A-Za-z0-9 ])', ' ', $datos->descr);
    $consulta = $db ->prepare("INSERT INTO aula (id_Pro, id_Mat, Id_curso,descr) VALUES (?,?,?,?)");
    $consulta ->bindValue(1,$datos->id_Pro,PDO::PARAM_STR);
    $consulta ->bindValue(2,$datos->id_Mat,PDO::PARAM_STR);
    $consulta ->bindValue(3,$id_curso,PDO::PARAM_STR);
    $consulta ->bindValue(4,$info,PDO::PARAM_STR);
    return $consulta->execute();
}
function Buscar_aula($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM aula WHERE id_Pro =:id");
    $consulta ->bindValue(':id',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchObject();
}
function Buscar_aulad($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM aula INNER JOIN cursos ON aula.Id_curso=cursos.id WHERE id_Pro =:id");
    $consulta ->bindValue(':id',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Buscar_Curaula($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT cursos_as.*,M.N_Materia,M.imagen FROM cursos_as
    INNER JOIN materias M on cursos_as.id_materia = M.id
    WHERE id_profe = :id_pro");
    $consulta->bindValue(':id_pro',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
function Buscar_curaula2($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cursos WHERE id = :id");
    $consulta->bindParam(':id',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchObject();
}
function Buscar_aulaidcur($id){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id FROM aula WHERE Id_curso = :id");
    $consulta->bindParam(':id',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchObject();
}
function Guardar_Curso_materia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO cursos_as (id_curso, id_profe, id_materia,Curso_Nu) VALUES (?,?,?,?)");
    $consulta->bindValue(1,$data->curso,PDO::PARAM_INT);
    $consulta->bindValue(2,$data->idDocente,PDO::PARAM_INT);
    $consulta->bindValue(3,$data->materias,PDO::PARAM_INT);
    $consulta->bindValue(4,$data->NumeroCurso,PDO::PARAM_INT);
    return $consulta ->execute();
}
function Comparar_cursopro($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM cursos_as WHERE id_materia = ? AND Curso_Nu = ?");
    $consulta->bindValue(1,$data->materias,PDO::PARAM_INT);
    $consulta->bindValue(2,$data->NumeroCurso,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
function Cagar_info_aula($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT aula.*,
    pro.Nombre as Pro_name,pro.apellido as Pro_apellidos,pro.estudios as Pro_estudios,pro.Cargo as Pro_Cargo,
    m.N_Materia as materia_name,
    c.Curso_Nu as Curso_name
    FROM aula 
    INNER JOIN profesores pro ON aula.id_Pro = pro.id
    INNER JOIN materias m ON aula.id_Mat = m.id  
    INNER JOIN cursos c ON  aula.Id_curso = c.id 
    WHERE Id_curso = :Id_curso");
    $consulta->bindValue(":Id_curso",$data->Curso,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
function Cargar_aula($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT id FROM aula WHERE (Id_curso = ? AND id_Pro = ?)AND id_Mat = ?");
    $consulta->bindValue(1,$data->Id_curso,PDO::PARAM_INT);
    $consulta->bindValue(2,$data->id_Pro,PDO::PARAM_INT);
    $consulta->bindValue(3,$data->id_Mat,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll(); 
}
function cargar_curso_niño($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM cursos WHERE id = :id");
    $consulta->bindValue(":id",$data->Curso,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
function cargar_estu_cur($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT id,Nombre,Apellido,Puntos,Ciclo,fecha_reg,imagen,promedio FROM estudiantes WHERE Id_curso = :id");
    $consulta->bindValue(":id",$data->Curso,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
function Establecer_libro($libro,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE aula SET libro = :libro WHERE id =:id");
    $consulta ->bindParam(':libro',$libro,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function verificar_libro_aula($id){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT libro FROM aula WHERE  id = :id");
    $consulta->bindValue(":id",$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
function Cargar_libro_aula($id){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM db_libros WHERE  id = :id");
    $consulta->bindValue(":id",$id,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta ->fetchAll();
}
//Notas
function Crear_Nota($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO notas (id_estu, id_docente, id_colegio,id_curso,id_materia,id_actividad,id_nota,comentario,tipo,periodo) 
    VALUES (:id_estu, :id_docente, :id_colegio,:id_curso,:id_materia,:id_actividad,:id_nota,:comentario,:tipo,:periodo)");
    $consulta->bindValue("id_estu",$data->id_estu,PDO::PARAM_INT);
    $consulta->bindValue("id_docente",$data->id_docente,PDO::PARAM_INT);
    $consulta->bindValue("id_colegio",$data->id_colegio,PDO::PARAM_INT);
    $consulta->bindValue("id_curso",$data->id_curso,PDO::PARAM_INT);
    $consulta->bindValue("id_materia",$data->id_materia,PDO::PARAM_INT);
    $consulta->bindValue("id_actividad",$data->id_actividad,PDO::PARAM_INT);
    $consulta->bindValue("id_nota",$data->id_nota,PDO::PARAM_INT);
    $consulta->bindValue("comentario",$data->comentario,PDO::PARAM_STR);
    $consulta->bindValue("tipo",$data->tipo,PDO::PARAM_INT);
    $consulta->bindValue("periodo",$data->periodo,PDO::PARAM_INT);
    return $consulta ->execute();
}
function Contar_Notas($ide,$idm,$periodo){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM notas WHERE id_materia = :id_materia AND id_estu = :id_estu AND periodo = :periodo");
    $consulta->bindValue("id_materia",$idm,PDO::PARAM_INT);
    $consulta->bindValue(":id_estu",$ide,PDO::PARAM_INT);
    $consulta->bindValue(":periodo",$periodo,PDO::PARAM_INT);
    $consulta -> execute();
    $fin = $consulta->rowCount();
    return $fin;
}
function Promedio_estudiante_p ($data) {
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM promedio WHERE id_estu = :id_estu AND id_col = : id_col");
    $consulta->bindValue("id_estu",$data->id_estudiante,PDO::PARAM_INT);
    $consulta->bindValue(":id_col",$data->id_col,PDO::PARAM_INT);
    $consulta -> execute();
    $fin = $consulta->rowCount();
    return $fin; 
}
function ver_nota($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM notas WHERE id_materia = :id_materia AND id_estu = :id_estu AND id_actividad = :id_maestra");
    $consulta->bindValue("id_materia",$data->materia,PDO::PARAM_INT);
    $consulta->bindValue(":id_estu",$data->estudiante,PDO::PARAM_INT);
    $consulta->bindValue(":id_maestra",$data->maestra,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetch();
}
function Sacar_nota($ide,$idm,$periodo){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id_nota FROM notas WHERE id_materia = :id_materia AND id_estu = :id_estu AND periodo = :periodo");
    $consulta->bindValue("id_materia",$idm,PDO::PARAM_INT);
    $consulta->bindValue(":id_estu",$ide,PDO::PARAM_INT);
    $consulta->bindValue(":periodo",$periodo,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
function cambiar_promedio($ide,$promedio,$idm,$periodo){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE promedio SET promedio = :promedio WHERE promedio.id_estu =:id AND promedio  .id_materia = :materia AND periodo = :periodo");
    $consulta ->bindParam(':promedio',$promedio,PDO::PARAM_INT);
    $consulta ->bindParam(':materia',$idm,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$ide,PDO::PARAM_INT);
    $consulta ->bindParam(':periodo',$periodo,PDO::PARAM_INT);
    return $consulta -> execute();
}
function insertar_promedio($data,$promedio){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO promedio (id_col,id_estu,promedio,id_curso,id_materia,periodo) VALUES 
    (:id_col,:id_estu,:promedio,:id_curso,:id_materia,:periodo)"); 
    $consulta -> bindParam(':id_col',$data->id_colegio,PDO::PARAM_INT);
    $consulta -> bindParam(':id_estu',$data->id_estu,PDO::PARAM_INT);
    $consulta -> bindParam(':promedio',$promedio,PDO::PARAM_STR);
    $consulta -> bindParam(':id_curso',$data->id_curso,PDO::PARAM_STR);
    $consulta -> bindParam(':id_materia',$data->id_materia,PDO::PARAM_STR);
    $consulta -> bindParam(':periodo',$data->periodo,PDO::PARAM_INT);
    return $consulta -> execute();
}
function detectar_promedio($ide,$idm,$periodo){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM promedio WHERE id_materia = :id_materia AND id_estu = :id_estu AND periodo = :periodo");
    $consulta->bindValue("id_materia",$idm,PDO::PARAM_INT);
    $consulta->bindValue(":id_estu",$ide,PDO::PARAM_INT);
    $consulta->bindValue(":periodo",$periodo,PDO::PARAM_INT);
    $consulta -> execute();
    $fin = $consulta->rowCount();
    return $fin;
}
function contar_notas_e($ide){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM notas WHERE id_estu = :id_estu");
    $consulta->bindValue(":id_estu",$ide,PDO::PARAM_INT);
    $consulta -> execute();
    $fin = $consulta->rowCount();
    return $fin;
    }
function sacar_notas_e($ide){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT id_nota FROM notas WHERE id_estu = :id_estu");
    $consulta->bindValue(":id_estu",$ide,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
function cambiar_promedio_e($ide,$promedio){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE estudiantes SET promedio = :promedio WHERE estudiantes.id =:id");
    $consulta ->bindParam(':promedio',$promedio,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$ide,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Contar_promedio_Cur($id_curso){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM estudiantes WHERE Id_curso = :id_curso");
    $consulta->bindValue(":id_curso",$id_curso,PDO::PARAM_INT);
    $consulta -> execute();
    $fin = $consulta->rowCount();
    return $fin;
}
function sacar_promedio_cur($ide){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT promedio FROM estudiantes WHERE Id_curso = :id_curso");
    $consulta->bindValue(":id_curso",$ide,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
function cambiar_promedio_Cur($curso,$promedio){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE cursos SET promedio = :promedio WHERE cursos.id =:id");
    $consulta ->bindParam(':promedio',$promedio,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$curso,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Contar_promedio_Col($IdCol){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT * FROM cursos WHERE IdCol = :IdCol");
    $consulta->bindValue(":IdCol",$IdCol,PDO::PARAM_INT);
    $consulta -> execute();
    $fin = $consulta->rowCount();
    return $fin;
}
function sacar_promedio_Col($ide){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT promedio FROM cursos WHERE IdCol = :id");
    $consulta->bindValue(":id",$ide,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
function cambiar_promedio_Col($curso,$promedio){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE colegios SET promedio = :promedio WHERE colegios.id =:id");
    $consulta ->bindParam(':promedio',$promedio,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$curso,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Cargar_notas_e($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("SELECT notas.*, m.N_Materia FROM notas
    INNER JOIN materias m ON notas.id_materia = m.id
    WHERE id_estu = :id");
    $consulta->bindValue(":id",$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta->fetchAll();
}
//evaluaciones
function Crear_evaluacion_m($data){
    $fecha = date("y-m-d");
    $estado = 1;
    $curso = empty($data->idCurso) ? '0': $data->idCurso;
    $materia = empty($data->idMateria) ? '0':$data->idMateria;
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO evalucion (id_col,id_curso,Titulo,texto,preguntas,fecha_c,fecha_max,tiempo,id_doc,idm,estado) VALUES 
    (:idcol,:idcurso,:Titulo,:texto,:preguntas,:fechac,:fechamax,:tiempo,:idp,:idm,:estado)"); 
    $consulta -> bindParam(':idcol',$data->idCol,PDO::PARAM_INT);
    $consulta -> bindParam(':idcurso',$curso,PDO::PARAM_INT);
    $consulta -> bindParam(':idp',$data->idDoc,PDO::PARAM_STR);
    $consulta -> bindParam(':Titulo',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindParam(':texto',$data->texto,PDO::PARAM_STR);
    $consulta -> bindParam(':preguntas',$data->NumeroPreguntas,PDO::PARAM_INT);
    $consulta -> bindParam(':fechac',$fecha,PDO::PARAM_STR);
    $consulta -> bindParam(':fechamax',$data->fechamax,PDO::PARAM_STR);
    $consulta -> bindParam(':tiempo',$data->tiempo,PDO::PARAM_INT);
    $consulta -> bindParam(':idm',$materia,PDO::PARAM_INT);
    $consulta -> bindParam(':estado',$estado,PDO::PARAM_INT);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Eliminar_evaluacion_m($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM evalucion WHERE id =:id");
    $consulta -> bindValue(':id',$data->id,PDO::PARAM_INT);
    return $consulta->execute();
}
function Crear_evalucion($data){
    $db = obtenerConexion();
    if($data->Tipo === 3){
        $repuestas = json_encode($data->Respuesta);
    }else{
        $repuestas = json_encode($data->Respuesta[0]);
    }
    
    $correcta = !empty($data->Correcta)? $data->Correcta : false;
    // var_dump($repuestas);
    // exit;
    $consulta = $db ->prepare("INSERT INTO eva_res (id_maestra,pregunta,respuesta,respuestas,tipo) VALUES 
    (:idm,:pregunta,:respuesta,:respuestas,:tipo)"); 
    $consulta -> bindParam(':idm',$data->idm,PDO::PARAM_INT);
    $consulta -> bindParam(':pregunta',$data->pregunta,PDO::PARAM_STR);
    $consulta -> bindParam(':respuesta',$correcta,PDO::PARAM_STR);
    $consulta -> bindParam(':respuestas',$repuestas,PDO::PARAM_STR);
    $consulta -> bindParam(':tipo',$data->Tipo,PDO::PARAM_INT);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Eliminar_evaluacion($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM eva_res WHERE id_maestra =:id");
    $consulta -> bindValue(':id',$data->id,PDO::PARAM_INT);
    return $consulta->execute();
}
function verificar_eva($id){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT respuesta FROM eva_res WHERE id = :id ");
    $consulta -> bindParam(':id',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchObject();
}
function Cargar_evaluacion_m($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM evalucion WHERE id_doc = :iddoc");
    $consulta -> bindParam(':iddoc',$data->idDoc,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Cargar_evaluacion_aulas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM evalucion WHERE id_curso = :id_curso");
    $consulta -> bindParam(':id_curso',$data->id_curso,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Cargar_evaluacion_E($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT evalucion.*,materias.N_Materia, materias.id as idmateria FROM evalucion INNER JOIN materias ON evalucion.idm = materias.id WHERE id_curso = :id_curso");
    $consulta -> bindParam(':id_curso',$data->id_curso,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function vence_eva($vence,$id,$fecha){
    $db = obtenerConexion();
    if(empty($fecha)){
        $consulta = $db->prepare("UPDATE evalucion SET estado = :estado WHERE evalucion.id =:id");
        $consulta ->bindParam(':estado',$vence,PDO::PARAM_INT);
        $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    }else{
        $consulta = $db->prepare("UPDATE evalucion SET estado = :estado, fecha_max = :fecha WHERE evalucion.id =:id");
        $consulta ->bindParam(':estado',$vence,PDO::PARAM_INT);
        $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
        $consulta ->bindParam(':fecha',$fecha,PDO::PARAM_STR);
    }
    return $consulta -> execute();
}
function asignar_curso_eva($data){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE evalucion SET id_curso = :curso WHERE evalucion.id =:id");
    $consulta ->bindParam(':curso',$data->curso,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Cargar_preguntas_eva($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM eva_res WHERE id_maestra = :id_maestra ");
    $consulta -> bindParam(':id_maestra',$data,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Verificar_eva_res($id){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT respuesta FROM eva_res WHERE id = :id ");
    $consulta -> bindParam(':id',$id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Cargar_preguntas_eva_individual($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM eva_res WHERE id = :id_maestra ");
    $consulta -> bindParam(':id_maestra',$data,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_nota_eva($data,$nota,$margen,$tiempo){
    $estado = 4;
    $fecha = date("Y-m-d H:i:s");  
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO notas_eva (id_estu,id_curso,id_eva,tiempo,resultado,nota,fecha,estado) VALUES 
    (:id_estu,:id_curso,:id_eva,:tiempo,:resultado,:nota,:fecha,:estado)"); 
    $consulta -> bindParam(':id_estu',$data->id_estu,PDO::PARAM_INT);
    $consulta -> bindParam(':id_curso',$data->id_curso,PDO::PARAM_STR);
    $consulta -> bindParam(':id_eva',$data->id_eva,PDO::PARAM_STR);
    $consulta -> bindParam(':tiempo',$tiempo,PDO::PARAM_INT);
    $consulta -> bindParam(':resultado',$data->resultado,PDO::PARAM_STR);
    $consulta -> bindParam(':nota',$nota,PDO::PARAM_STR);
    $consulta -> bindParam(':fecha',$fecha,PDO::PARAM_STR);
    $consulta -> bindParam(':estado',$estado,PDO::PARAM_INT);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function veri_eva($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM notas_eva WHERE id_estu = :id AND id_eva = :id_eva ");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':id_eva',$data->id_eva,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->rowCount();
}
function veri_eva_t($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM notas_eva WHERE id_estu = :id AND id_eva = :id_eva ");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':id_eva',$data->id_eva,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Cargar_evaluacion_notas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT notas_eva.*,estu.Nombre as Nombree,estu.Apellido as Apellidoe FROM notas_eva 
    INNER JOIN estudiantes estu ON notas_eva.id_estu = estu.id
    WHERE id_eva = :id_eva");
    $consulta -> bindParam(':id_eva',$data->id,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function cambiar_estado_evares($data){
    $db = obtenerConexion();
    $estado = 5;
    $consulta = $db->prepare("UPDATE notas_eva SET estado = :estado WHERE id =:id");
    $consulta ->bindParam(':estado',$estado,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
//icfes
function Crear_actividad_icfes_m($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO icfes_maestra (Nombre,descri,objetivo) VALUES 
    (:Nombre,:descri,:objetivo)"); 
    $consulta -> bindParam(':Nombre',$data->nombre,PDO::PARAM_INT);
    $consulta -> bindParam(':descri',$data->obje,PDO::PARAM_STR);
    $consulta -> bindParam(':objetivo',$data->descri,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Crear_actividad_icfes_h($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO actividad_respuestas (id_actividad,pregunta,a,b,c,d,respuesta) VALUES
    (:idM,:pre,:a,:b,:c,:d,:res)");
    $consulta -> bindParam(':idM',$data->idM,PDO::PARAM_STR);
    $consulta -> bindParam(':pre',$data->pre,PDO::PARAM_STR);
    $consulta -> bindParam(':a',$data->A,PDO::PARAM_STR);
    $consulta -> bindParam(':b',$data->B,PDO::PARAM_STR);
    $consulta -> bindParam(':c',$data->C,PDO::PARAM_STR);
    $consulta -> bindParam(':d',$data->D,PDO::PARAM_STR);
    $consulta -> bindParam(':res',$data->res,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_icfes_m($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM icfes_maestra WHERE id = :idM");
    $consulta -> bindParam(':idM',$$data->idM,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta ->fetchAll();
}
function Cargar_icfes_m_all(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM icfes_maestra WHERE sub_tema = 0");
    $consulta -> execute();
    return $consulta ->fetchAll();
}
function Cargar_icfes_m_alls(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM icfes_maestra");
    $consulta -> execute();
    return $consulta ->fetchAll();
}

function Cargar_icfes_p($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM actividad_respuestas WHERE id_actividad = :idM");
    $consulta -> bindParam(':idM',$data->idM,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta ->fetchAll();
}
function Borrar_ICFES_m($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM icfes_maestra WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Borrar_ICFES_p($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM actividad_respuestas WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Editar_icfes_m($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("UPDATE `icfes_maestra` SET `sub_tema` = :idsub WHERE `icfes_maestra`.`id` = :idM");
    $consulta -> bindParam(':idsub',$data->subtema,PDO::PARAM_STR);
    $consulta -> bindParam(':idM',$data->idM,PDO::PARAM_INT);
    $true = $consulta -> execute();
    if($true){
        $last_id = $data->idM;
    }else{
        $last_id = $true;
    }
    return $last_id;
}
//actividades
function Crear_actvidad_d($data){
    $db =obtenerConexion();
    $fecha = date("y-m-d");
    $estado = 1;
    $consulta = $db ->prepare("INSERT INTO actividad (id_profe,id_col,id_curso,id_acti,fecha_c,fecha_MAX,Nombre,id_materia,estado_d,descri,periodo) VALUES
    (:id_profe,:id_col,:id_aula,:id_acti,:fecha_c,:fecha_MAX,:Nombre,:id_materia,:estado_d,:descri,:periodo)");
    $consulta -> bindValue(':id_profe',$data->iduser,PDO::PARAM_INT);
    $consulta -> bindParam(':id_col',$data->idCol,PDO::PARAM_INT);
    $consulta -> bindParam(':id_aula',$data->idCurso,PDO::PARAM_INT);
    $consulta -> bindParam(':id_acti',$data->id_acti,PDO::PARAM_INT);
    $consulta -> bindValue(':fecha_c',$fecha,PDO::PARAM_STR);
    $consulta -> bindParam(':fecha_MAX',$data->fecha_max,PDO::PARAM_STR);
    $consulta -> bindValue(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindParam(':id_materia',$data->idMateria,PDO::PARAM_INT);
    $consulta -> bindParam(':estado_d',$estado,PDO::PARAM_INT);
    $consulta -> bindValue(':descri',$data->descri,PDO::PARAM_STR);
    $consulta -> bindParam(':periodo',$data->periodo,PDO::PARAM_INT);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Editar_actividad_dd($data){
    $db = obtenerConexion();
    $consulta = $db-> prepare("UPDATE actividad SET fecha_MAX = :fecha_MAX, descri=:descri, Nombre=:Nombre, estado_d = :estado_d WHERE id = :id");
    $consulta -> bindParam(':fecha_MAX',$data->fecha_MAX,PDO::PARAM_STR);
    $consulta -> bindParam(':descri',$data->descri,PDO::PARAM_STR);
    $consulta -> bindParam(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindParam(':estado_d',$data->estado,PDO::PARAM_STR);
    $consulta -> bindParam(':id',$data->idM,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Editar_actividad_d($data){
    $db = obtenerConexion();
    $consulta = $db-> prepare("UPDATE actividad SET id_acti = :idac WHERE id = :idM");
    $consulta -> bindParam(':idac',$data->acti,PDO::PARAM_INT);
    $consulta -> bindParam(':idM',$data->maestra,PDO::PARAM_INT);
    return $consulta -> execute();
}
function cargar_actividad_d($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM actividad WHERE id_profe = :idp");
    $consulta -> bindParam(':idp',$data->idP,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function cargar_actividad_aula_cali($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT actividad.*,materias.N_Materia,materias.imagen FROM actividad INNER JOIN  materias ON actividad.id_materia = materias.id   WHERE id_profe = :idp AND id_curso = :idc");
    $consulta -> bindParam(':idp',$data->idP,PDO::PARAM_INT);
    $consulta -> bindParam(':idc',$data->idc,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function cargar_actividad_cd($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT profesores.Nombre as Nprofesor,profesores.apellido,materias.N_Materia,actividad_hyg.* FROM actividad_hyg INNER JOIN materias ON actividad_hyg.materia = materias.id INNER JOIN profesores ON actividad_hyg.id_Profesor = profesores.id WHERE actividad_hyg.id_profesor = :idp order by id desc");
    $consulta -> bindParam(':idp',$data->idP,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Eliminar_actividad($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM actividad WHERE id =:id");
    $consulta -> bindValue(':id',$data->id,PDO::PARAM_INT);
    return $consulta->execute();
}
function vence_actividad($vence,$id){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE actividad SET estado_d = :estado_d WHERE actividad.id =:id");
    $consulta ->bindParam(':estado_d',$vence,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function vence_actividad_estado($data){
    $db = obtenerConexion(); 
    if(empty($data->fecha_max)){
        echo "emtra aca";
        $consulta = $db->prepare("UPDATE actividad SET estado_d = :estado_d  WHERE actividad.id =:id");
    }else{
        echo "etra aca";
        $consulta = $db->prepare("UPDATE actividad SET estado_d = :estado_d, fecha_MAX = :fecha_MAX WHERE actividad.id =:id");
        $consulta ->bindParam(':fecha_MAX',$data->fecha_max,PDO::PARAM_STR);
    }
    $consulta ->bindParam(':estado_d',$data->estado,PDO::PARAM_INT);
    $consulta ->bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Buscador_actividad($data){
    $db =obtenerConexion();
    $sql = 'SELECT * FROM actividad_hyg INNER JOIN materias on actividad_hyg.materia = materias.id WHERE 1';
    $seach_terms = isset($data->nombre) ? $data->nombre :' ';
    $buscar_array = explode(' ',$seach_terms);

    $array_sql_term = array();
    $n = 0;
    foreach($buscar_array as $seach_term )
    {

        $sql .= " AND actividad_hyg.Nombre LIKE :search{$n}  ";
        $array_sql_term[":search{$n}"] = '%' .$seach_term. '%';
        $n++;
    }
    $statement = $db->prepare($sql);
    
    $statement->execute($array_sql_term);
    $results = $statement->fetchAll();
    return $results;
}
function Eliminar_actividad_hyg($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM actividad_hyg WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}

//libros
function C_genero(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM generos");
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_Genero($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO generos (genero) VALUES (:genero)");
    $consulta ->bindParam(':genero',$datos->Nombre,PDO::PARAM_STR);
    return $consulta->execute();
}
function Editar_Genero($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE generos SET genero = :Nombre WHERE id =:id");
    $consulta ->bindParam(':id',$datos->id,PDO::PARAM_STR);
    $consulta ->bindParam(':Nombre',$datos->Nombre,PDO::PARAM_STR);
    return $consulta -> execute();
}
function C_autor(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT autor.id as id,autor.autor,generos.genero,generos.id as idgenero FROM autor INNER JOIN generos ON autor.genero = generos.id");
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_autor($datos){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO autor (autor,genero) VALUES (:autor,:genero)");
    $consulta ->bindParam(':autor',$datos->Nombre,PDO::PARAM_STR);
    $consulta ->bindParam(':genero',$datos->genero,PDO::PARAM_STR);
    return $consulta->execute();
}
function Editar_Autor($datos){
    $db = obtenerConexion();
    $consulta = $db->prepare("UPDATE autor SET autor=:autor, genero = :genero WHERE id =:id");
    $consulta ->bindValue(':id',$datos->id,PDO::PARAM_INT);
    $consulta ->bindValue(':autor',$datos->Nombre,PDO::PARAM_STR);
    $consulta ->bindValue(':genero',$datos->genero,PDO::PARAM_INT);
    return $consulta->execute();
}
function Crear_libros($data){
    $db =obtenerConexion();
    $estrellas = 0;
    $consulta = $db ->prepare ("INSERT INTO db_libros (Nombre,intro,objetivo,publico,genero,rese,portada,autor,editorial,estrellas,libro) VALUES
    (:nombre,:intro,:objetivo,:publico,:genero,:rese,:portada,:autor,:editorial,:estrellas,:libro)");
    $consulta -> bindValue(':nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindParam(':intro',$data->intro,PDO::PARAM_STR);
    $consulta -> bindValue(':objetivo',$data->objetivo,PDO::PARAM_STR);
    $consulta -> bindParam(':publico',$data->publico,PDO::PARAM_STR);
    $consulta -> bindValue(':genero',$data->genero,PDO::PARAM_STR);
    $consulta -> bindValue(':rese',$data->rese,PDO::PARAM_STR);
    $consulta -> bindValue(':portada',$data->imagen,PDO::PARAM_STR);
    $consulta -> bindParam(':autor',$data->autor,PDO::PARAM_STR);
    $consulta -> bindParam(':editorial',$data->editorial,PDO::PARAM_STR);
    $consulta -> bindValue(':genero',$data->genero,PDO::PARAM_STR);
    $consulta -> bindParam(':estrellas',$estrellas,PDO::PARAM_STR);
    $consulta -> bindParam(':libro',$data->pdf,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Buscador_libros($data){
    $db =obtenerConexion();
    $sql = 'SELECT * FROM db_libros WHERE 1';
    $seach_terms = isset($data->nombre) ? $data->nombre :' ';
    $buscar_array = explode(' ',$seach_terms);

    $array_sql_term = array();
    $n = 0;
    foreach($buscar_array as $seach_term )
    {

        $sql .= " AND Nombre LIKE :search{$n}  ";
        $array_sql_term[":search{$n}"] = '%' .$seach_term. '%';
        $n++;
    }
    $statement = $db->prepare($sql);
    $statement->execute($array_sql_term);
    $results = $statement->fetchAll();
    return $results;
}
// function paginacion($limit,$pagina,$tabla){
//     $pagina = empty($pagina)? $pagina : 1;
//     $offset = ($pagina - 1) * $limit;
//     $db = obtenerConexion();
//     $consulta = $db ->prepare("SELECT count(*) AS conteo FROM ?");
//     $consulta -> bindParam(':tabla',$data->,PDO::PARAM_STR);
//     $consulta ->execute();
//     $conteo = $consulta->fetchObject()->conteo;
//     var_dump
// }
function Cargar_cali_libro($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT estrellas FROM db_libros WHERE id =:id");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_STR);
   
    return $consulta->fetchObject();
}
function Calificar_libro_estrellas($datos,$data){
    $d = $datos["ant_estrellas"];
    $da = $datos["nuevas_estrellas"];
    $estrellas = $d + $da;
    $db =obtenerConexion();
    $consulta = $db ->prepare("UPDATE db_libros SET estrellas = :estrellas WHERE  id = :id");
    $consulta -> bindValue(':estrellas',$estrellas,PDO::PARAM_STR);
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cargar_cali_libro_p($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT personas FROM db_libros WHERE id =:id");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchObject();
}
function Calificar_libro_p($datos,$data){
    $d = $datos["ant_estrellas"];
    $estrellas = $d + 1;
    $db =obtenerConexion();
    $consulta = $db ->prepare("UPDATE db_libros SET personas = :personas WHERE  id = :id");
    $consulta -> bindValue(':personas',$estrellas,PDO::PARAM_STR);
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cargar_voto($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM votos WHERE user = :id AND libro = :idl");
    $consulta -> bindParam(':id',$data->iduser,PDO::PARAM_STR);
    $consulta -> bindParam(':idl',$data->id,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchObject();
}
function Guardar_voto($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO votos (libro,user) VALUES 
    (:libro,:user)");
    $consulta -> bindParam(':libro',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':user',$data->iduser,PDO::PARAM_INT);
    return $consulta ->execute();
}
//mail
//admin
function Crear_area($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO areas (nombre_a,curso) VALUES
    (:nombre,:curso)");
    $consulta -> bindParam(':nombre',$data->Area,PDO::PARAM_STR);
    $consulta -> bindValue(':curso',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Crear_area_a($data,$d){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO areas (nombre_a,curso) VALUES
    (:nombre,:curso)");
    $consulta -> bindParam(':nombre',$data->nombre_a,PDO::PARAM_STR);
    $consulta -> bindValue(':curso',$d,PDO::PARAM_INT);
    return $consulta -> execute();
}
function Cargar_area($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM areas WHERE curso =:curso");
    $consulta -> bindParam(':curso',$data->id,PDO::PARAM_STR);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Cargar_materia_a($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM materias_malla WHERE area = :area ");
    $consulta -> bindValue(':area',$data,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_curso($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO curso (Nombre) VALUES
    (:nombre)");
    $consulta -> bindParam(':nombre',$data->curso,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cargar_curso(){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM curso WHERE id_curso = 0");
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_tema($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO temas (nombre,id_pensamiento,descr,id_temap) VALUES
     (:nombre,:id_pensamiento,:descr,:id_temap)");
    $consulta -> bindParam(':nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindValue(':id_pensamiento',$data->id,PDO::PARAM_INT);
    $consulta -> bindValue(':id_temap',$data->id_p,PDO::PARAM_INT);
    $consulta -> bindParam(':descr',$data->Descr,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_tema($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM temas WHERE id_temap = :id");
    $consulta -> bindValue(':id',$data->id,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Cargar_tema_todos($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM temas WHERE materia = :mat");
    $consulta -> bindValue(':mat',$data->materia,PDO::PARAM_INT);
    $consulta ->execute();
    return $consulta->fetchAll();
}
function Crear_tema_p($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO tema_p (id_pensamiento,Nombre) VALUES
     (:id_pensamiento,:Nombre)");
    $consulta -> bindValue(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindValue(':id_pensamiento',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
  
}
function Cargar_tema_p($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM `tema_p` WHERE id_pensamiento = :id");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_tema_p($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM tema_p WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Crear_sub_tema($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `sub-temas` (nombre_sub,descrip,tema) VALUES
    (:nombre,:descrip,:tema)");
    $consulta -> bindParam(':nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindValue(':descrip',$data->descr,PDO::PARAM_STR);
    $consulta -> bindValue(':tema',$data->tema,PDO::PARAM_INT);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_sub_tema($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM `sub-temas` WHERE tema = :tema");
    $consulta -> bindParam(':tema',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Cargar_Actividad_admin($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM actividad_hyg WHERE sub_tema = :tema");
    $consulta -> bindParam(':tema',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Cargar_cor_admim(){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT nombre,correo,documento,apellido,codigo,id_col FROM cordinador");
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Cargar_col_admim(){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM colegios");
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Crear_codigo($data){
    $db =obtenerConexion();
    $fecha = date("y-m-d");
    $consulta = $db ->prepare("INSERT INTO codigos_cor 
    (codigo_cor,fecha) VALUES
    (:codigo,:fecha)");
     $consulta -> bindParam(':codigo',$data->cod,PDO::PARAM_STR);
     $consulta -> bindValue(':fecha',$fecha,PDO::PARAM_STR);
     return $consulta -> execute();
}
function Cargar_codigo(){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM codigos_cor");
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Crear_Codigo_libro($data){
    $db =obtenerConexion();
    $fecha = date("y-m-d");
    $consulta = $db ->prepare("INSERT INTO cod_lib 
    (Cod,Id_Col,Id_Curso,fecha,ciclo) VALUES
    (:codigo,:id_col,:id_Curso,:fecha,:ciclo)");
     $consulta -> bindParam(':codigo',$data->codigo,PDO::PARAM_STR);
     $consulta -> bindParam(':id_col',$data->col,PDO::PARAM_STR);
     $consulta -> bindParam(':id_Curso',$data->curso,PDO::PARAM_STR);
     $consulta -> bindParam(':ciclo',$data->ciclo,PDO::PARAM_STR);
     $consulta -> bindValue(':fecha',$fecha,PDO::PARAM_STR);
     return $consulta -> execute();
}
//mallas pensamientos
function Crear_pensamiento($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `pensamientos` (Nombre,Materias,Periodo) 
    VALUES
    (:Nombre,:Materias,:Periodo)");
    $consulta -> bindParam(':Nombre',$data->Nombre,PDO::PARAM_STR);
    $consulta -> bindValue(':Materias',$data->Materias,PDO::PARAM_STR);
    $consulta -> bindParam(':Periodo',$data->Periodo,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_Pensamiento($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM pensamientos WHERE Periodo = :per AND Materias = :Mat");
    $consulta -> bindParam(':per',$data->Periodo,PDO::PARAM_STR);
    $consulta -> bindParam(':Mat',$data->Materia,PDO::PARAM_STR);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_Pensamiento($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM pensamientos WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
// cerrar mallas pensamiento
//agenda
Function Agenda_Crear($data){
    $db =obtenerConexion();
    $fecha = date("y-m-d H:i:s a");
    $estado = 1;
    $consulta = $db ->prepare("INSERT INTO `agenda` (id_estu,titulo,nota,estado,id_docente,fecha) 
    VALUES
    (:id_estu,:titulo,:nota,:estado,:id_docente,:fecha)");
    $consulta -> bindValue(':id_estu',$data->id_estu,PDO::PARAM_INT);
    $consulta -> bindParam(':titulo',$data->titulo,PDO::PARAM_STR);
    $consulta -> bindValue(':nota',$data->nota,PDO::PARAM_INT);
    $consulta -> bindParam(':estado',$estado,PDO::PARAM_STR);
    $consulta -> bindValue(':id_docente',$data->id_docente,PDO::PARAM_INT);
    $consulta -> bindParam(':fecha',$fecha,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Agenda_Cargar($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM agenda WHERE id_estu = :id_estu");
    $consulta -> bindParam(':id_estu',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Agenda_Eliminar($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM agenda WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Cambiar_estado($data){
    $db = obtenerConexion();
    $consulta = $db-> prepare("UPDATE agenda SET estado = :estado WHERE id = :id");
    $consulta -> bindParam(':estado',$data->estado,PDO::PARAM_INT);
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_INT);
    return $consulta -> execute();
}
// fin agenda
//mallas evidencias
function Crear_evidencias_mallas($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `evidencias` (id_pensamiento,Texto) 
    VALUES
    (:id_pensamiento,:Texto)");
    $consulta -> bindValue(':id_pensamiento',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':Texto',$data->Texto,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;

}
function Cargar_evidencias_mallas($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM evidencias WHERE id_pensamiento = :pen");
    $consulta -> bindParam(':pen',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_evidencias_mallas($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM evidencias WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
// cerrar mallas evidencias
// mallas Competencias
function Crear_Competencias($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `competencias` (id_pensamiento,Descri,A,B,C) 
    VALUES
    (:id_pensamiento,:Descri,:A,:B,:C)");
    $consulta -> bindValue(':id_pensamiento',$data->pensamiento,PDO::PARAM_INT);
    $consulta -> bindValue(':Descri',$data->Descri,PDO::PARAM_STR);
    $consulta -> bindParam(':A',$data-> A,PDO::PARAM_STR);
    $consulta -> bindParam(':B',$data-> B,PDO::PARAM_STR);
    $consulta -> bindParam(':C',$data-> C,PDO::PARAM_STR);
    return $consulta -> execute();
}
function Cargar_Competencias($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM competencias WHERE id_pensamiento = :pen");
    $consulta -> bindParam(':pen',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_Competencias($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM competencias WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
// cerrar mallas Competencias
//mallas Derechos
function Crear_Derechos($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `derechos_ap` (id_pensamiento,Texto) 
    VALUES
    (:id_pensamiento,:Texto)");
    $consulta -> bindParam(':id_pensamiento',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':Texto',$data->Texto,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_Derechos($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM derechos_ap WHERE id_pensamiento = :pen");
    $consulta -> bindParam(':pen',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_Derechos($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM derechos_ap WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
// cerrar mallas Derechos
//mallas estandares
function Crear_estandares($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("INSERT INTO `estandares` (id_pensamiento,Texto) 
    VALUES
    (:id_pensamiento,:Texto)");
    $consulta -> bindParam(':id_pensamiento',$data->id,PDO::PARAM_INT);
    $consulta -> bindParam(':Texto',$data->Texto,PDO::PARAM_STR);
    $consulta -> execute();
    $con = $db ->prepare("SELECT LAST_INSERT_ID()");
    $con ->execute();
    $last_id = $con ->fetchColumn();
    return $last_id;
}
function Cargar_estandares($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM estandares WHERE id_pensamiento = :pen");
    $consulta -> bindParam(':pen',$data->id,PDO::PARAM_INT);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_estandares($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM estandares WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
// cerrar mallas estandares
function Cargar_codigo_libro($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM cod_lib WHERE Id_Curso = :id ");
    $consulta -> bindParam(':id',$data->curso,PDO::PARAM_STR);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Cargar_cur_admim($data){
    $db =obtenerConexion();
    $consulta = $db ->prepare("SELECT * FROM cursos WHERE IdCol = :id ");
    $consulta -> bindParam(':id',$data->id,PDO::PARAM_STR);
    $consulta -> execute();
    return $consulta -> fetchAll();
}
function Borrar_area($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM areas WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function borrar_materia_area($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM materias_malla WHERE area = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function borrar_materia($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM materias_malla WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Borrar_tema($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM temas WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Borrar_sub_tema($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM `sub-temas` WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Borrar_Curso($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM curso WHERE id = :id");
    $consulta -> bindValue(':id',$data->id,PDO::PARAM_INT);
    return $consulta->execute();
}
function Borrar_curso_area($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM areas WHERE curso = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();
}
function Borrar_activdad_admin($data){
    $db = obtenerConexion();
    $consulta = $db ->prepare("DELETE FROM actividad_hyg WHERE id = :id");
    $consulta -> bindValue(':id',$data,PDO::PARAM_INT);
    return $consulta->execute();   
}

//base de datos
 
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
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost; dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
?>