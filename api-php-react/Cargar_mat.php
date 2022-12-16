<?php
include_once ('corn.php');
include_once ('Fuctions.php');
$data = Cargar_mat();
echo json_encode($data);

?>