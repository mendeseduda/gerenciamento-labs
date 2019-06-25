<!DOCTYPE html>
<html lang="en">
<?php
    include("./layout/head.php");
?>
<body>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <form method="post" action="../server/register.php">

            <input type="text" name="nome" class="form-control" placeholder="Nome">
            <input type="text" name="prontuario" class="form-control" placeholder="Prontuário">
            <input type="email" name="email" class="form-control" placeholder="E-mail">
            <input type="password" name="senha" class="form-control" placeholder="Senha">

            <a href="login.php" class="card-link">Já tem conta? Faça seu login</a>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px !important;">Enviar</button>
            </form>
        </div>
    </div>

</form>
</body>
</html>