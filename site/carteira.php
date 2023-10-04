<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conexao = mysqli_connect("db","root","123","bd_bank");
        $sql = "SELECT * FROM tb_carteira";
        $resultado = mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)){
                $idcli = $row['tb_cliente_id_cliente'];
                $idmoeda = $row['tb_moeda_id_moeda'];
                $quantidade = $row['quantidade'];
                $selectcli = "SELECT nome_cliente FROM tb_cliente WHERE id_cliente = $idcli";
                $selectmoeda = "SELECT * FROM tb_moeda WHERE id_moeda = $idmoeda";
                $cliente = mysqli_query($conexao,$selectcli);
                $moeda = mysqli_query($conexao,$selectmoeda);
                $linhacli = mysqli_fetch_assoc($cliente);
                $nomecli = $linhacli['nome_cliente'];
                $linhamoeda = mysqli_fetch_assoc($moeda);
                $nomemoeda = $linhamoeda['nome_moeda'];
                $valormoeda = $linhamoeda['valor_moeda'];
                echo $nomecli . "<br>";
                echo $nomemoeda . "<br>";
                echo $valormoeda * $quantidade . "<br>";
            }
        }
    
    ?>
</body>
</html>