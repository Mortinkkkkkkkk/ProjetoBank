<?php
   require_once "conexao.php";
   
   $nome_cliente = $_GET['nome_cliente'];
   $email_cliente = $_GET['email_cliente'];
   $cpf_cliente = $_GET['cpf_cliente'];
   $senha_cliente = $_GET['senha_cliente'];
   $sql = "INSERT INTO `tb_cliente` (`nome_cliente`, `senha_cliente`, `cpf_cliente`, `email_cliente`) VALUES ('$nome_cliente', '$senha_cliente', '$cpf_cliente', '$email_cliente')";

    mysqli_query($conexao,$sql);

    header("location: index.php");
    exit();

?>