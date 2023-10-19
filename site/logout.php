<?php
session_start();
if (isset($_SESSION['logado'])) {
    unset($_SESSION['logado']);
    unset($_SESSION['id_usuario']);
    unset($_SESSION['tipo_usuario']);
}
header('location: index.php');
exit();
?>