<?php
    $email_login = $_GET['email_login'];
    $senha_login = $_GET['senha_login'];

    require_once "conexao.php";
    $sql = "SELECT * FROM tb_cliente WHERE email_cliente = '$email_login' AND senha_cliente = '$senha_login'";

    $resultado = mysqli_query($conexao,$sql);
    if ($resultado) {
        session_start();
        $_SESSION["logado"] = true;
        header('location: index.php');
        exit();
    }
    else {
        header('location: login.html');
        exit();
    }
?>
