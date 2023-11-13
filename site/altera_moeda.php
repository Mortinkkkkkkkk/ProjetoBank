<?php
    require_once 'conexao.php'; 

    $id_moeda = $_POST['id_moeda'];
    $alteracao = $_POST['alteracao'];
    

    if ($alteracao == 'add') {
        $novo_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 1 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$novo_destaque);
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    elseif ($alteracao == 'dell') {
        $remover_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 0 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$remover_destaque);
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    elseif ($alteracao == 'editar') {
        $alteracao_imagem = $_POST['alteracao_imagem'];
        if ($alteracao_imagem == 0) {
            $arquivo_servidor_moeda = $_POST['imagem_moeda'];
            $arquivo_servidor_fundo = $_POST['imagem_fundo_moeda'];
        }
        else{
            $pasta = "./img/";
            #imagem moeda
            $extensao_imagem_moeda = "." . pathinfo($_FILES['imagem_moeda']['name'], PATHINFO_EXTENSION);
            
            $novo_nome_moeda = time() . md5(uniqid()) . rand(1,100);
            $arquivo_servidor_moeda = $pasta . $novo_nome_moeda . $extensao_imagem_moeda;
            
            move_uploaded_file($_FILES['imagem_moeda']['tmp_name'], $arquivo_servidor_moeda);
            
            #imagem de fundo moeda
            
            $extensao_imagem_fundo_moeda = "." . pathinfo($_FILES['imagem_fundo_moeda']['name'], PATHINFO_EXTENSION);
            
            $novo_nome_fundo = time() . md5(uniqid()) . rand(-100,-1);
            $arquivo_servidor_fundo = $pasta . $novo_nome_fundo . $extensao_imagem_fundo_moeda;
            
            move_uploaded_file($_FILES['imagem_fundo_moeda']['tmp_name'], $arquivo_servidor_fundo);
            # --------------------------------------------------------------------------------------------------------------
        }   
        
        $nome_moeda = $_POST['novo_nome'];
        $sigla_moeda = $_POST['nova_sigla'];
        $novo_valor = $_POST['novo_valor'];
        
        $editando_moeda = "UPDATE tb_moeda SET 
        nome_moeda = '$nome_moeda',
        sigla_moeda = '$sigla_moeda',
        valor_moeda_fixo = $novo_valor,
        imagem_moeda = '$arquivo_servidor_moeda',
        imagem_moeda_fundo	= '$arquivo_servidor_fundo' 
        WHERE id_moeda = $id_moeda";

        mysqli_query($conexao,$editando_moeda);

        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    elseif ($alteracao == 'remover') {

        $removendo_historico_moeda = "DELETE FROM tb_historico_v_moeda WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$removendo_historico_moeda);
        
        $removendo_das_carteiras = "DELETE FROM tb_carteira WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$removendo_das_carteiras);

        $moeda_removida = "DELETE FROM tb_moeda WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$moeda_removida);
        
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    else {
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
?>