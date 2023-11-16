<?php
    // Conexão com o Banco{
    require_once 'conexao.php'; 
    //}

    //Recebendo o id da moeda e o tipo de alteração que será feita com ela {
    $id_moeda = $_POST['id_moeda'];
    $alteracao = $_POST['alteracao'];
    //}

    // Adiciona a Moeda como Destaque caso a variavel '$alteracao' tenha o valor de 'add'{
    if ($alteracao == 'add') {
        $novo_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 1 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$novo_destaque);
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    //}

    // Remove a Moeda como Destaque caso a variavel '$alteracao' tenha o valor de 'dell'{
    elseif ($alteracao == 'dell') {
        $remover_destaque = "UPDATE tb_moeda SET moeda_em_destaque = 0 WHERE id_moeda = $id_moeda";
        mysqli_query($conexao,$remover_destaque);
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    //}

    // Se a variavel '$alteracao' for igual a 'editar'...
    //Com os dados que chegam do "alterar_moedas.php" altera os valores do banco para os novos valores{
    elseif ($alteracao == 'editar') {
        // Verifica a imagem deve mudar ou não com base o valor da variavel '$alteracao_imagem'
        // 1 == verdadeiro 0 == falso {
        $alteracao_imagem = $_POST['alteracao_imagem'];
        if ($alteracao_imagem == 0) {
            // '$alteracao_imagem == falso' então as imagens dentro do banco não devem ser atualizadas{
            $arquivo_servidor_moeda = $_POST['imagem_moeda'];
            $arquivo_servidor_fundo = $_POST['imagem_fundo_moeda'];
            //}
        }
        else{
            // '$alteracao_imagem != falso' então as imagens dentro do banco devem ser atualizadas pela novas 
            // dessa forma também deve ser renomeada {
            
            # Diretorio(pasta) para onde vão as imagens{
            $pasta = "./img/";
            #}

            # Processo de definição e renomeação da nova imagem da moeda {
            $extensao_imagem_moeda = "." . pathinfo($_FILES['imagem_moeda']['name'], PATHINFO_EXTENSION);
            
            $novo_nome_moeda = time() . md5(uniqid()) . rand(1,100);
            $arquivo_servidor_moeda = $pasta . $novo_nome_moeda . $extensao_imagem_moeda;
            
            move_uploaded_file($_FILES['imagem_moeda']['tmp_name'], $arquivo_servidor_moeda);
            #}

            #Processo de definição e renomeação da nova imagem do fundo da moeda{
            
            $extensao_imagem_fundo_moeda = "." . pathinfo($_FILES['imagem_fundo_moeda']['name'], PATHINFO_EXTENSION);
            
            $novo_nome_fundo = time() . md5(uniqid()) . rand(-100,-1);
            $arquivo_servidor_fundo = $pasta . $novo_nome_fundo . $extensao_imagem_fundo_moeda;
            
            move_uploaded_file($_FILES['imagem_fundo_moeda']['tmp_name'], $arquivo_servidor_fundo);
                #}
            //}
        }   
        // }

        //Recebe os novos dados da moeda vindos da página 'alterar_moedas.php'{
        $nome_moeda = $_POST['novo_nome'];
        $sigla_moeda = $_POST['nova_sigla'];
        $novo_valor = $_POST['novo_valor'];
        //}
        
        // Por fim atualiza as colunas da moeda que está sendo editada { 
        $editando_moeda = "UPDATE tb_moeda SET 
        nome_moeda = '$nome_moeda',
        sigla_moeda = '$sigla_moeda',
        valor_moeda_fixo = $novo_valor,
        imagem_moeda = '$arquivo_servidor_moeda',
        imagem_moeda_fundo	= '$arquivo_servidor_fundo' 
        WHERE id_moeda = $id_moeda";

        mysqli_query($conexao,$editando_moeda);
        //}

        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    //}

    // Remove a Moeda de forma definitiva do banco de dados...
    // caso a variavel '$alteracao' tenha o valor como 'remover'{
    elseif ($alteracao == 'remover') {
        // Deleta de todas as tabelas que o "id_moeda" atua como chave estrageira primeiro{
        $sql = "SELECT * FROM tb_carrinho WHERE id_moeda = '$id_moeda'";
        $verifica_moeda_carrinho = mysqli_query($conexao, $sql); 
        if (mysqli_num_rows($verifica_moeda_carrinho) > 0) {
            $removendo_dos_carrinhos = "DELETE FROM tb_carrinho WHERE id_moeda = '$id_moeda'";
            mysqli_query($conexao,$removendo_dos_carrinhos);
        }

        $removendo_historico_moeda = "DELETE FROM tb_historico_v_moeda WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$removendo_historico_moeda);
        
        $removendo_das_carteiras = "DELETE FROM tb_carteira WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$removendo_das_carteiras);
        //}

        //Por fim deleta a moeda {
        $moeda_removida = "DELETE FROM tb_moeda WHERE id_moeda = '$id_moeda'";
        mysqli_query($conexao,$moeda_removida);
        //}
        
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
    else {
        header('location: alterar_moedas.php?edicao=desabilitada&id_moeda_edit=0');
        exit();
    }
?>