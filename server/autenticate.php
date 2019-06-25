<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$fp = fopen("../data/users.csv", "r");
$usuarioEncontrado = false;

if ($email === "admin@admin.com" && $senha === "admin") {
    $usuarioEncontrado = true;
    $_SESSION["usuario"] = "Admin";
    $_SESSION["admin"] = true;
    redirect($usuarioEncontrado);
}

while (!feof($fp)) {
    $campos = fgetcsv($fp);

    if ($campos[2] == $email && $campos[3] == $senha) {
        $usuarioEncontrado = true;
        $_SESSION["usuario"] = $campos[0];
        $_SESSION["admin"] = false;
        break;
    }
}

redirect($usuarioEncontrado);

function redirect($usuarioEncontrado) {
    if ($usuarioEncontrado) {
        header('Location: /gerenciamento-labs/views/index.php');
        exit;
    } else {
        header('Location: /gerenciamento-labs/views/login.php');
        exit;
    }
}
