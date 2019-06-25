<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function isAdmin()
{
    return $_SESSION["admin"];
}
?>
<div class="nav-bar">
    <div class="user-info">
        <img class="user-pic" src="<?= 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&name=' . $_SESSION["usuario"] ?>" alt="">
        <h2 class="username">
            <?= $_SESSION["usuario"] ?>
        </h2>
    </div>
    <div class="col">
        <div class="nav-item row px-4 align-items-center">
            <span class="item-icon">
                <i class="fas fa-list"></i>
            </span>
            <a href="/gerenciamento-labs/views/software_list.php" class="item-name pl-3">Listar softwares</a>
        </div>
        <div class="nav-item row px-4 align-items-center">
            <span class="item-icon">
                <i class="fab fa-wpforms"></i>
            </span>
            <a href="/gerenciamento-labs/views/software_requisition.php" class="item-name pl-3">Requisitar software</a>
        </div>
        <?php
        if (isAdmin()) {
            ?>
            <div class="nav-item row px-4 align-items-center">
                <span class="item-icon">
                <i class="fas fa-columns"></i>
                </span>
                <a href="/gerenciamento-labs/views/dashboard.php" class="item-name pl-3">Dashboard</a>
            </div>
        <?php } ?>
    </div>
</div>