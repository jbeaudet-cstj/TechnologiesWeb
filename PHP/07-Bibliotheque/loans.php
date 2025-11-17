<?php
require_once '../PdoWrapper.php';

header('Access-Control-Allow-Origin: *');



$pdow = new PdoWrapper('library');


$resultat = [];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($resultat);
?>
