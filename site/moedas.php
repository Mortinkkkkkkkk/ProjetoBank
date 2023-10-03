<?php
        require_once 'conexao.php';
        require_once 'porcentagem_aleatoria.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        

Moedas em Destasque <br> <br>
<?php
        $sql = "SELECT * FROM tb_moeda";
        $resultado = mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)){
                $valor_moeda = $row['valor_moeda'];
                $sigla = $row['sigla_moeda'];
                $porcentagem_aleatoria = $vetor_de_porcentagens[rand(0,82)];
                $mais_menos = rand(-1,1);
                if ($mais_menos == 0) {
                    $mais_menos = 1;
                }
                $calculo_valor_atual_moeda = $valor_moeda + $mais_menos * ($valor_moeda * $porcentagem_aleatoria) ;
                $nome_moeda = $row['nome_moeda'];
                
                echo $nome_moeda . "<br>";
                echo $calculo_valor_atual_moeda . "<br> ";
                echo $sigla . "<br><br>";
                
                
            }
        }
    ?>
</body>
</html>