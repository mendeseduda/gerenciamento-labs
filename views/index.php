<?php
session_start();
if (sizeof($_SESSION["usuario"]) < 1) {
    header('Location: /gerenciamento-labs/views/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include(__DIR__ . "/layout/head.php") ?>

<body>
    <?php include(__DIR__ . "/layout/navBar.php") ?>
    <?php include("./layout/scripts.php")?>
</body>

</html>