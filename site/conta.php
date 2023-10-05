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
           $id_cliente = $_SESSION['id_cliente'];
           $sql =  "SELECT * FROM tb_cliente WHERE id_cliente = $id_cliente";

           $resultado = mysqli_query($conexao,$sql);
           if (mysqli_num_rows($resultado)) {
            while ($linha = mysqli_fetch_array($resultado)) {
                $nome_cliente = $linha['nome_cliente'];
                $email_cliente = $linha['email_cliente'];
                $cpf_cliente = $linha['cpf_cliente'];
                echo $nome_cliente . "<br>";
                echo $email_cliente . "<br>";
                echo $cpf_cliente . "<br>";
            }
           }

        
        
        
        
        ?>

</body>
</html>