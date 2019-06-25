<!DOCTYPE html>
<html lang="en">
<?php
    include("./layout/head.php");
?>
<body>
    <form method="post" action="../server/autenticar.php">

    <input type="email" name="email" placeholder="E-mail">

    <input type="password" name="senha" placeholder="Senha">

    <input type="submit">
</form>
<?php include("./layout/scripts.php")?>
</body>
</html>