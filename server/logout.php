<?php
session_start();    
session_destroy();
header('Location: /gerenciamento-labs/views/login.php');
?>