<?php
    require_once "ta_logado.php";
    require_once "conexao.php";

    $idusuario = $_SESSION['id_usuario'];
    $idmoeda = $_POST['id_moeda'];
    $carteirasql = "SELECT * FROM tb_carteira WHERE tb_usuario_id_usuario = $idusuario AND tb_moeda_id_moeda = $idmoeda";
    $resultcarteira = mysqli_query($conexao,$carteirasql);
    if (mysqli_num_rows($resultcarteira) > 0) {
        $linha = mysqli_fetch_array($resultcarteira);
        $idcarteira = $linha['id_carteira'];
        $quantidade = $linha['quantidade'];
        $quantidade += 1;
        $insersao = "UPDATE `tb_carteira` SET
        `id_carteira` = '$idcarteira',
        `tb_usuario_id_usuario` = '$idusuario',
        `tb_moeda_id_moeda` = '$idmoeda',
        `quantidade` = '$quantidade'
        WHERE `id_carteira` = '$idcarteira' AND `tb_usuario_id_usuario` = '$idusuario' AND `tb_moeda_id_moeda` = '$idmoeda' LIMIT 1";
    }
    else {
        $insersao = "INSERT INTO `tb_carteira` (`tb_usuario_id_usuario`, `tb_moeda_id_moeda`, `quantidade`) VALUES ('$idusuario', '$idmoeda', '1')";
    }
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
        $query = mysqli_query($conexao,$insersao);
        if ($query) {
            echo "Compra efetuada";
        }
        else{
            echo "Deu Errado";
        }
    ?>
</body>
</html>