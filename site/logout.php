<?php
session_start();
if (isset($_SESSION['logado'])) {
    unset($_SESSION['logado']);
}
header('location: index.php');
exit();
?>