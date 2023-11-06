<?php
    require_once "ta_logado.php";
    require_once "conexao.php";

    $idusuario = $_SESSION['id_usuario'];
    $idmoeda = $_POST['id_moeda'];
    $quantcomprada = $_POST['quantidade'];
    if ($quantcomprada < 1) {
        $numeropossivel = false;
    }else{
        $carteirasql = "SELECT * FROM tb_carteira WHERE tb_usuario_id_usuario = $idusuario AND tb_moeda_id_moeda = $idmoeda";
        $resultcarteira = mysqli_query($conexao,$carteirasql);
        if (mysqli_num_rows($resultcarteira) > 0) {
            global $quantcomprada;
            $linha = mysqli_fetch_array($resultcarteira);
            $idcarteira = $linha['id_carteira'];
            $quantidade = $linha['quantidade'];
            $total = $quantidade + $quantcomprada;
            $insersao = "UPDATE `tb_carteira` SET
            `id_carteira` = '$idcarteira',
            `tb_usuario_id_usuario` = '$idusuario',
            `tb_moeda_id_moeda` = '$idmoeda',
            `quantidade` = '$total'
            WHERE `id_carteira` = '$idcarteira' AND `tb_usuario_id_usuario` = '$idusuario' AND `tb_moeda_id_moeda` = '$idmoeda' LIMIT 1";
            $teste = mysqli_query($conexao,$insersao);    
            }
        else {
            $insersao = "INSERT INTO `tb_carteira` (`tb_usuario_id_usuario`, `tb_moeda_id_moeda`, `quantidade`) VALUES ('$idusuario', '$idmoeda', '1')";
            $teste = mysqli_query($conexao,$insersao);
        }
        $numeropossivel = true;    
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
        
        if ($numeropossivel) {
            if ($teste){
                echo "Compra efetuada";
            }else{
                echo "Deu Errado";
            }
        }
        else{
            echo "Deu Errado";
        }
    ?>
</body>
</html>