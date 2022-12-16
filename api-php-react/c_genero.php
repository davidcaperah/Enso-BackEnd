<?php
include_once ('corn.php');
$data = json_decode(file_get_contents('php://input'));
include_once ('Fuctions.php');
$buscar = C_genero($data);
echo json_encode($buscar);

?>