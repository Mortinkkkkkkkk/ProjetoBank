<?php
    require_once 'conexao.php';

    $id_moeda = $_POST['id_moeda'];
    $alteracao = $_POST['alteracao'];
    

    if ($alteracao == 'add') {
        $novo_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 1 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$novo_destaque);
        header('location: alterar_moedas_destaque.php');
        exit();
    }
    if ($alteracao == 'dell') {
        $remover_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 0 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$remover_destaque);
        header('location: alterar_moedas_destaque.php');
        exit();
    }
?>