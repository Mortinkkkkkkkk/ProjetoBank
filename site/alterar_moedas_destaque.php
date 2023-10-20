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
        
        $conexao_moedas_destaque = mysqli_query($conexao,$moedas_em_destaque) ;
        $conexao_moedas_fora_destaque = mysqli_query($conexao,$moedas_fora_de_destaque) ;
        if (mysqli_num_rows($conexao_moedas_destaque) > 0) {
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];

                
            }
            
        }

    ?>
</body>
</html>
