<?php
    require "ta_logado.php"
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
        require_once "conexao.php";
        require_once "porcentagem_aleatoria.php";

        $mais_menos = 0;
        if (rand(0,100) == 100) {
            $porcentagem_aleatoria = $vetor_de_porcentagens_maior_que_dois_porcento[rand(0,24)];

          }else {
            $porcentagem_aleatoria = $vetor_de_porcentagens_menor_que_dois_porcento[rand(0,82)];
          }
          while ($mais_menos == 0) {
            $mais_menos = rand(-1,1);
          }

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
                  $nome_moeda = $linhamoeda['nome_moeda'];
                  $valor_moeda = $linhamoeda['valor_moeda'];
                  $calculo_valor_atual_moeda = $valor_moeda + $mais_menos * ($valor_moeda * $porcentagem_aleatoria) ;
                  echo $nomecli . "<br>";
                  echo $nome_moeda . "<br>";
                  echo $calculo_valor_atual_moeda * $quantidade . "<br>";
            }
        }
    
    ?>
</body>
</html>