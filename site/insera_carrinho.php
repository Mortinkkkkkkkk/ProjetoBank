<?php
    require_once "conexao.php";
    require_once "ta_logado.php";


    $idusuario = $_SESSION['id_usuario'];
    $idmoeda = $_POST['id_moeda'];
    $quantcomprada = $_POST['quantidade'];
    if ($quantcomprada < 1) {
        $numeropossivel = false;
    }else{
        $sqlvalor = "SELECT valor_moeda_fixo FROM tb_moeda WHERE id_moeda = $idmoeda";
        $resultvalor = mysqli_query($conexao,$sqlvalor);
        $linha  = mysqli_fetch_array($resultvalor);
        $valormoeda = $linha['valor_moeda_fixo'];
        $procurasql = "SELECT id_carrinho, quantidade FROM tb_carrinho WHERE id_moeda = $idmoeda AND id_usuario = $idusuario";
        $procuraresult = mysqli_query($conexao,$procurasql);
        if (mysqli_num_rows($procuraresult) > 0) {
            $array = mysqli_fetch_array($procuraresult);
            $id_carrinho = $array['id_carrinho'];
            $quantidadeantiga = $array['quantidade'];
            $quantcomprada += $quantidadeantiga;
            $valortotal = $quantcomprada * $valormoeda;
            $sqlcarrinho = "UPDATE `tb_carrinho` SET
            `id_carrinho` = '$id_carrinho',
            `id_usuario` = '$idusuario',
            `id_moeda` = '$idusuario',
            `quantidade` = '$quantcomprada',
            `valor_total` = '$valortotal'
            WHERE `id_carrinho` = '$id_carrinho';";
        }else{
            $valortotal = $quantcomprada * $valormoeda;
            $sqlcarrinho = "INSERT INTO `tb_carrinho` (`id_usuario`, `id_moeda`, `quantidade`, `valor_total`)
            VALUES ('$idusuario','$idmoeda', '$quantcomprada', '$valortotal');";
        }
        $resultcarrinho = mysqli_query($conexao,$sqlcarrinho);
        $numeropossivel = true;
    }
    if ($numeropossivel) {
        header('location: carrinho.php');
        exit();
    }
    else{
        header('location: moedas.php');
        exit();
    }
?>