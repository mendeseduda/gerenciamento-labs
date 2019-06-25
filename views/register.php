<!DOCTYPE html>
<html lang="en">
<?php
    include("./layout/head.php");
?>
<body class="d-flex justify-content-center pt-5" style="margin: 150px auto !important;">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <form method="post" action="../server/register.php">

            <input type="text" name="nome" class="form-control" placeholder="Nome"><br>
            <input type="text" name="prontuario" class="form-control" placeholder="Prontuário"><br>
            <input type="email" name="email" class="form-control" placeholder="E-mail"><br>
            <input type="password" name="senha" class="form-control" placeholder="Senha"><br>

            <a href="login.php" class="card-link">Já tem conta? Faça seu login</a>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px !important;">Enviar</button>
            </form>
        </div>
    </div>

</form>
</body>
</html>