<?php
    require "ta_logado.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                  $idcli = $row['tb_usuario_id_usuario'];
                  $idmoeda = $row['tb_moeda_id_moeda'];
                  $quantidade = $row['quantidade'];
                  $selectcli = "SELECT nome_usuario FROM tb_usuario WHERE id_usuario = $idcli";
                  $selectmoeda = "SELECT * FROM tb_moeda WHERE id_moeda = $idmoeda";
                  $usuario = mysqli_query($conexao,$selectcli);
                  $moeda = mysqli_query($conexao,$selectmoeda);
                  $linhacli = mysqli_fetch_assoc($usuario);
                  $nomecli = $linhacli['nome_usuario'];
                  $linhamoeda = mysqli_fetch_assoc($moeda);
                  $nome_moeda = $linhamoeda['nome_moeda'];
                  $valor_moeda = $linhamoeda['valor_moeda_fixo'];
                  $calculo_valor_atual_moeda = $valor_moeda + $mais_menos * ($valor_moeda * $porcentagem_aleatoria) ;
                  echo $nomecli . "<br>";
                  echo $nome_moeda . "<br>";
                  echo $calculo_valor_atual_moeda * $quantidade . "<br>";
            }
        }
    
    ?>
</body>
</html>