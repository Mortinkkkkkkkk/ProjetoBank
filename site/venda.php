<?php
    require_once "ta_logado.php";
    require_once "conexao.php";

    $idusuario = $_SESSION['id_usuario'];
    $idmoeda = $_POST['id_moeda'];
    $quantidadevendida = $_POST['quantidade'];
    if ($quantidadevendida > 0) {
        $carteirasql = "SELECT * FROM tb_carteira WHERE id_usuario = $idusuario AND id_moeda = $idmoeda";
        $resultcarteira = mysqli_query($conexao,$carteirasql);
        $linha = mysqli_fetch_array($resultcarteira);
        $idcarteira = $linha['id_carteira'];
        $quantidade = $linha['quantidade'];
        $quantidade -= $quantidadevendida;
        $uptade = "UPDATE `tb_carteira` SET
            `id_carteira` = '$idcarteira',
            `id_usuario` = '$idusuario',
            `id_moeda` = '$idmoeda',
            `quantidade` = '$quantidade'
            WHERE `id_carteira` = '$idcarteira' AND `id_usuario` = '$idusuario' AND `id_moeda` = '$idmoeda' LIMIT 1";
        $confirma = mysqli_query($conexao,$uptade);

    }
    else {
        $confirma = false;
    }
        if ($confirma) {
            header('location: carteira.php');
            exit();
        }
        else{
            header('location: carteira.php');
            exit();
        }

    ?>
</body>
</html>