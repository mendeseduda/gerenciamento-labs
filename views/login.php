<!DOCTYPE html>
<html lang="en">
<?php
    include("./layout/head.php");
?>
<body class="d-flex justify-content-center pt-5" style="margin: 150px auto !important;">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <form method="post" action="../server/autenticate.php">

            <input type="email" name="email" class="form-control" placeholder="E-mail"><br>

            <input type="password" name="senha" class="form-control" placeholder="Senha"><br>

            <a href="register.php" class="card-link">Não tem conta? Registre-se</a>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px !important;">Enviar</button>
            </form>
        </div>
    </div>

    <?php include("./layout/scripts.php")?>
</body>
</html>