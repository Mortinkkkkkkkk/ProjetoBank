<?php
    require_once "ta_logado.php";
    require_once "conexao.php";
    
    $idusuario = $_SESSION['id_usuario'];
    $carrinohsql = "SELECT id_carrinho,id_moeda, quantidade FROM tb_carrinho WHERE id_usuario = $idusuario";
    $resultcarrinho = mysqli_query($conexao,$carrinohsql);
    if (mysqli_num_rows($resultcarrinho) > 0){
        while ($rowcarrinho = mysqli_fetch_array($resultcarrinho)){
            $id_moeda = $rowcarrinho['id_moeda'];
            $quantidade = $rowcarrinho['quantidade'];
            $id_carrihno = $rowcarrinho['id_carrinho'];
            $carteirasql = "SELECT id_carteira, quantidade FROM tb_carteira WHERE id_usuario = $idusuario AND id_moeda = $id_moeda";
            $resultcarteira = mysqli_query($conexao,$resultcarteira);
            if (mysqli_num_rows($resultcarteira) > 0) {
                $linha = mysqli_fetch_array($resultcarteira);
                $id_carteira = $linha['id_carteira'];
                $quantantiga = $linha['quantidade'];
                $quantidade += $quantantiga;
                $comprasql = "UPDATE tb_carteira SET
                id_carteira = '$id_carteira',
                id_usuario = '$idusuario',
                id_moeda = '$id_moeda',
                quantidade = '$quantidade'
                WHERE id_carteira = $id_carteira;";
            }
            else{
                $comprasql = "INSERT INTO tb_carteira(id_usuario,id_moeda,quantidade) VALUES ($idusuario,$id_moeda,$quantidade)";
            }
            $resultcompra = mysqli_query($conexao,$comprasql);
            if ($resultcompra) {
                $deuerro = false;
                $deletesql = "DELETE FROM `tb_carrinho`
                WHERE ((`id_carrinho` = '$id_carrihno'));";
                $deleteresult = mysqli_query($conexao,$deletesql);
            }
            else {
                $deuerro = true;
                break;
            }
        }
        if ($deuerro) {
            header('location: carrinho.php');
            exit();
        }
        else {
            header('location: carteira.php');
            exit();
        }
    }
    ?>
