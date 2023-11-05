<?php
   require_once "conexao.php";
   
   $nome_usuario = $_GET['nome_usuario'];
   $email_usuario = $_GET['email_usuario'];
   $cpf_usuario = $_GET['cpf_usuario'];
   $senha_usuario = $_GET['senha_usuario'];
   
   $sql = "SELECT * FROM tb_usuario WHERE email_usuario = '$email_usuario' OR cpf_usuario = $cpf_usuario";
   $resultado = mysqli_query($conexao,$sql);

   if (mysqli_num_rows($resultado) == 0) {
        $sql = "INSERT INTO `tb_usuario` (`nome_usuario`, `senha_usuario`, `cpf_usuario`, `email_usuario`) VALUES ('$nome_usuario', '$senha_usuario', '$cpf_usuario', '$email_usuario')";

        mysqli_query($conexao,$sql);

        header("location: index.php");
        exit();
    } else {
        header("location: cadastro.html");
        exit();
    }
   

?>