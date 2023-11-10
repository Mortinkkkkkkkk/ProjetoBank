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
                $idcarrinho = $linha['id_carrinho'];
                $idmoeda = $linha['id_moeda'];
                $sqlmoeda = "SELECT nome_moeda, sigla_moeda FROM tb_moeda WHERE id_moeda = $idmoeda";
                $resultmoeda = mysqli_query($conexao,$sqlmoeda);
                $excluir = "<form action='remover_carrinho.php' method='post'><input type='hidden' name='id_carrinho' value='$idcarrinho'><button type='submit'>Remover</button></form>";
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
                echo $excluir . $br;
            }
        echo "Valor total à pagar: " . $compratotal;
        $efetuar = " <button type='submit'>Efetuar compra</button>";
    }
    else {
        echo "carrinho vazio";
        $efetuar = "";
        }
            
            
            ?>
<form action="compra_de_moeda.php">
    <?php echo $efetuar; ?>
</form>
</body>
</html>
