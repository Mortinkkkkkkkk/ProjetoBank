<?php
    require_once "ta_logado.php";
    require_once "conexao.php";
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
        $id_usuario = $_SESSION['id_usuario'];
        $compratotal = 0;
        $sqlcarrihno = "SELECT * FROM tb_carrinho WHERE id_usuario = $id_usuario";
        $resultcarrinho = mysqli_query($conexao,$sqlcarrihno);
        if (mysqli_num_rows($resultcarrinho) > 0){
            while ($linha = mysqli_fetch_array($resultcarrinho)) {
                global $compratotal;
                $idmoeda = $linha['id_moeda'];
                $sqlmoeda = "SELECT nome_moeda, sigla_moeda FROM tb_moeda WHERE id_moeda = $idmoeda";
                $resultmoeda = mysqli_query($conexao,$sqlmoeda);
                $row = mysqli_fetch_array($resultmoeda);
                $nomemoeda = $row['nome_moeda'];
                $siglamoeda = $row['sigla_moeda'];
                $quantidade = $linha['quantidade'];
                $valortotal = $linha['valor_total'];
                $br = "<br>";
                echo $nomemoeda . $br;
                echo $siglamoeda . $br;
                echo $quantidade . $br;
                echo $valortotal . $br;
                $compratotal = $compratotal + $valortotal;
                }
            }
            else {
                echo "carrinho vazio";
            }
            
        echo "Valor total à pagar: " . $compratotal;

?>
<form action="compra_de_moeda.php" method="post">
    <button type="submit">Efetuar compra</button>
</form>
</body>
</html>
