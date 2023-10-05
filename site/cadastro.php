<?php
   require_once "conexao.php";
   
   $nome_usuario = $_GET['nome_usuario'];
   $email_usuario = $_GET['email_usuario'];
   $cpf_usuario = $_GET['cpf_usuario'];
   $senha_usuario = $_GET['senha_usuario'];
   $sql = "INSERT INTO `tb_usuario` (`nome_usuario`, `senha_usuario`, `cpf_usuario`, `email_usuario`) VALUES ('$nome_usuario', '$senha_usuario', '$cpf_usuario', '$email_usuario')";

    mysqli_query($conexao,$sql);

    header("location: index.php");
    exit();

?>