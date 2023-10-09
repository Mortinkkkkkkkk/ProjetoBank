<?php
    $email_login = $_GET['email_login'];
    $senha_login = $_GET['senha_login'];
    session_start();

    require_once "conexao.php";
    $sql = "SELECT id_usuario, tipo_usuario FROM tb_usuario WHERE email_usuario = '$email_login' AND senha_usuario = '$senha_login'";
    $resultado = mysqli_query($conexao,$sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_array($resultado)){
            $id_usuario = $linha["id_usuario"];
            $tipo_usuario = $linha["tipo_usuario"];
            $_SESSION["id_usuario"] = $id_usuario;
            $_SESSION["tipo_usuario"] = $tipo_usuario;
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
