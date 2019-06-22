<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$fp = fopen("../data/users.csv", "r");
$usuarioEncontrado = false;

$contador = 0;

while(!feof($fp)){
    echo fgetcsv($fp)[$contador][2].fgetcsv($fp)[$contador][3];
    if(fgetcsv($fp)[$contador][2] == $email && fgetcsv($fp)[$contador][3] == $senha){
        $usuarioEncontrado = true;
        }
        $contador++;
    }

    if($usuarioEncontrado) {
        $_SESSION["usuario"] = $email;
        header('Location: http://localhost/gerenciamento-labs/views/index.php');
        }
        else {
        header('Location: http://localhost/gerenciamento-labs/views/login.php');
        }
?>