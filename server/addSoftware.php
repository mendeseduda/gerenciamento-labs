<?php
$data = json_decode(file_get_contents('php://input'), true);

$newSoftware = $data;

$json = file_get_contents("../data/softwares.json", "r");
$softwares = json_decode($json, true);

array_push($softwares, $newSoftware);
file_put_contents('../data/softwares.json', json_encode($softwares));
header('Content-type: application/json');
echo '{message: "success"}';
