<?php
$nome = $_POST['nome'];
$prontuario = $_POST['prontuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = array($nome, $prontuario, $email, $senha);

$fp = fopen("../data/users.csv", "a");

fputcsv($fp, $usuario);

header('Location: /gerenciamento-labs/views/login.php');
fclose($fp); 

?>