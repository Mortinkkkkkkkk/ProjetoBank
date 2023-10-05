<?php
    $email_login = $_GET['email_login'];
    $senha_login = $_GET['senha_login'];
    session_start();

    require_once "conexao.php";
    $sql = "SELECT id_cliente FROM tb_cliente WHERE email_cliente = '$email_login' AND senha_cliente = '$senha_login'";
    $resultado = mysqli_query($conexao,$sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_array($resultado)){
            $id_cliente = $linha["id_cliente"];
            $_SESSION["id_cliente"] = $id_cliente;
        };
        $_SESSION["logado"] = true;
        header('location: index.php');
        exit();
    }
    else {
        header('location: login.html');
        exit();
        }
?>
