<?php
    require "ta_logado.php";
    $id_usuario = $_SESSION['id_usuario'];
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
          $sql = "SELECT tb_moeda_id_moeda, quantidade FROM tb_carteira WHERE tb_usuario_id_usuario = $id_usuario";
          $resultado = mysqli_query($conexao,$sql);
          if (mysqli_num_rows($resultado) > 0) {
              $selectnome = "SELECT nome_usuario FROM tb_usuario WHERE id_usuario = $id_usuario";
              $resultnome = mysqli_query($conexao,$selectnome);
              $nome = mysqli_fetch_array($resultnome);
              echo $nome["nome_usuario"] . "<br>";
              while ($row = mysqli_fetch_assoc($resultado)) {
                  $id_moeda = $row["tb_moeda_id_moeda"];
                  $selectmoeda = "SELECT nome_moeda, valor_moeda_fixo FROM tb_moeda WHERE id_moeda = $id_moeda";
                  $resultmoeda = mysqli_query($conexao,$selectmoeda);
                  $arraymoeda = mysqli_fetch_array($resultmoeda);
                  $moeda = $arraymoeda["nome_moeda"];
                  $valor = $arraymoeda["valor_moeda_fixo"];
                  echo $moeda . "<br>";
                  echo $valor . "<br>";
                  echo $row["quantidade"] . "<br>";
                  echo "<form action='venda.php' method='post'>
                            <input type='hidden' name='id_moeda' value='$id_moeda'>
                            <button type='submit'>Vender</button>
                        </form>";
            }
        }
    
    ?>
</body>
</html>