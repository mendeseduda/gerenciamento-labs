<?php

if ($_POST) {
    deleteRequisition($_POST["id"]);    
} else {
    header('Location: /gerenciamento-labs/views/dashboard.php');
    exit;
}

function deleteRequisition($id) {
    $json = file_get_contents("../data/requisitions.json", "r");
    $requisitions = json_decode($json, true);
    unset($requisitions[$id]);
    file_put_contents('../data/requisitions.json', json_encode($requisitions));
    header('Location: /gerenciamento-labs/views/dashboard.php');
    exit;
}
