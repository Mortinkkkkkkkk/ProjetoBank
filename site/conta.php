<?php
    require_once "ta_logado.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doument</title>
</head>
<body>
        <?php
           require_once "conexao.php";
           $id_usuario = $_SESSION['id_usuario'];
           $sql =  "SELECT * FROM tb_usuario WHERE id_usuario = $id_usuario";

           $resultado = mysqli_query($conexao,$sql);
           if (mysqli_num_rows($resultado)) {
            while ($linha = mysqli_fetch_array($resultado)) {
                $nome_usuario = $linha['nome_usuario'];
                $email_usuario = $linha['email_usuario'];
                $cpf_usuario = $linha['cpf_usuario'];
                echo $nome_usuario . "<br>";
                echo $email_usuario . "<br>";
                echo $cpf_usuario . "<br>";
            }
           }

        
        
        
        
        ?>

</body>
</html>