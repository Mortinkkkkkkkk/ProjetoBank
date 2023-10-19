<?php
    require_once 'func_ta_logado.php';
    require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $moedas_em_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $moedas_fora_de_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 0";
        
        $conexao1 = mysqli_query($conexao,$moedas_em_destaque) ;
        $conexao2 = mysqli_query($conexao,$moedas_fora_de_destaque) ;

        
    ?>
</body>
</html>
