<?php
    require_once "ta_logado.php";
    require_once "conexao.php";

    $idusuario = $_SESSION['id_usuario'];
    $idmoeda = $_POST['id_moeda'];
    $carteirasql = "SELECT * FROM tb_carteira WHERE id_usuario = $idusuario AND id_moeda = $idmoeda";
    $resultcarteira = mysqli_query($conexao,$carteirasql);
     
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
        $linha = mysqli_fetch_array($resultcarteira);
        $idcarteira = $linha['id_carteira'];
        $quantidadde = $linha['quantidade'];
        $quantidadde -= 1;
        $uptade = "UPDATE `tb_carteira` SET
        `id_carteira` = '$idcarteira',
        `id_usuario` = '$idusuario',
        `id_moeda` = '$idmoeda',
        `quantidade` = '$quantidadde'
        WHERE `id_carteira` = '$idcarteira' AND `id_usuario` = '$idusuario' AND `id_moeda` = '$idmoeda' LIMIT 1";
        $confirma = mysqli_query($conexao,$uptade);
        if ($confirma) {
            echo "Venda efetuada";
        }
        else{
            echo "Tente novamente";
        }



    ?>
</body>
</html>