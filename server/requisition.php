<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$nome_software = $_GET['software-name'];
$link_software = $_GET['software-link'];
$justificativa = $_GET['software-justification'];

$os = array();
if (isset($_GET['windows-7']))
    array_push($os, $_GET['windows-7']);
if (isset($_GET['windows-8']))
    array_push($os, $_GET['windows-8']);
if (isset($_GET['windows-10']))
    array_push($os, $_GET['windows-10']);
if (isset($_GET['linux']))
    array_push($os, $_GET['linux']);
if (isset($_GET['macos']))
    array_push($os, $_GET['macos']);

$labs = array();
for ($i = 1; $i <= 16; $i++) {
    if (isset($_GET['lab-' . $i])) array_push($labs, $_GET['lab-' . $i]);
}

$nome_dependencias = array();
$nomes = explode(";", $_GET['dependence-names']);
for ($j = 0; $j < count($nomes); $j++) {
    array_push($nome_dependencias, $nomes[$j]);
}

$links_dependencias = array();
$links = explode(";", $_GET['dependence-links']);
for ($j = 0; $j < count($links); $j++) {
    array_push($links_dependencias, $links[$j]);
}

$usuario = $_SESSION["usuario"];

$gravar = array(
    'nome-software' => $nome_software,
    'url' => $link_software,
    'sistema-operacional' => $os,
    'laboratorio' => $labs,
    'justificativa' => $justificativa,
    'dependencias' => $nome_dependencias,
    'url-dependencias' => $links_dependencias,
    'nome-professor' => $usuario,
    'aprovado' => false
);

// $gravar_json = json_encode($gravar);

$json = file_get_contents("../data/requisitions.json", "r");
$requisitions = json_decode($json, true);
array_push($requisitions, $gravar);
file_put_contents('../data/requisitions.json', json_encode($requisitions));

// $data_requisition = fopen("../data/requisitions.json", "a+");
// fwrite($data_requisition, $gravar_json);

header('Location: /gerenciamento-labs/views/software_requisition.php');
fclose($data_requisition);
