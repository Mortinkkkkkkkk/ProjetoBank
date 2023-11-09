<?php
    require_once 'conexao.php'; 

    $id_moeda = $_GET['id_moeda'];
    $alteracao = $_GET['alteracao'];
    

    if ($alteracao == 'add') {
        $novo_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 1 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$novo_destaque);
        header('location: alterar_moedas.php');
        exit();
    }
    elseif ($alteracao == 'dell') {
        $remover_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 0 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$remover_destaque);
        header('location: alterar_moedas.php');
        exit();
    }
    elseif ($alteracao == 'editar') {
        $nome_moeda = $_GET['novo_nome'];
        $sigla_moeda = $_GET['nova_sigla'];
        $novo_valor = $_GET['novo_valor'];
        
        $editando_moeda = "UPDATE tb_moeda SET 
        nome_moeda = '$nome_moeda',
        sigla_moeda = '$sigla_moeda',
        valor_moeda_fixo = $novo_valor 
        WHERE id_moeda = $id_moeda";

        mysqli_query($conexao,$editando_moeda);

        header('location: alterar_moedas.php');
        exit();
    }
    elseif ($alteracao == 'remover') {

        $removendo_historico_moeda = "DELETE FROM tb_historico_v_moeda WHERE id_moeda = '$id_moeda'";
        
        mysqli_query($conexao,$removendo_historico_moeda);
        
        $removendo_das_carteiras = "DELETE FROM tb_carteira WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$removendo_das_carteiras);

        $moeda_removida = "DELETE FROM tb_moeda WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$moeda_removida);
        
        header('location: alterar_moedas.php');
        exit();
    }
    else {
        header('location: alterar_moedas.php');
        exit();
    }
?>