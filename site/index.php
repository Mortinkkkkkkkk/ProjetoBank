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
        $sql = "SELECT * FROM tb_moeda";

        $resultado = mysqli_query($conexao,$sql);

        $teste = [0.01, 0.001, 0.002 , 0.003, 0.004, 0.005, 0.006, 0.007, 0.008, 0.009];
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)){
                $valor = $row['valor_moeda'];
                $sigla = $row['sigla_moeda'];
                $selecionador_multiplicador_teste = $teste[rand(0,9)];
                $maismenos = rand(-1,1);
                if ($maismenos == 0) {
                    $maismenos = 1;
                }
                $op1 = $continha_teste = $valor + $maismenos * ($valor * $selecionador_multiplicador_teste) ;
                #$op2 = $continha_teste = $valor - ($valor * $selecionador_multiplicador_teste) ;

                #$resultado2 = "op" . rand(1,2); 
                

                    
                $nome = $row['nome_moeda'];
                echo $nome . "<br>";
                echo $sigla . "<br>";
                echo $op1 . "<br>";
                #echo $valor + 1 * $multiplicador . "<br>";
            }
        }
    ?>
</body>
</html>