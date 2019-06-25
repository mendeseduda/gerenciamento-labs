<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$fp = fopen("../data/users.csv", "r");
$usuarioEncontrado = false;

while(!feof($fp)){
    $campos = fgetcsv($fp);
    
    if($campos[2] == $email && $campos[3] == $senha){
        $usuarioEncontrado = true;
        break;
    }
}
    if($usuarioEncontrado) {
        $_SESSION["usuario"] = $email;
        header('Location: /gerenciamento-labs/views/index.php');
        exit;
        }
        else {
        header('Location: /gerenciamento-labs/views/login.php');
        exit;
        }
?>