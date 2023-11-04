<?php

$nome_moeda = $_POST['nome_moeda'];
$sigla = $_POST['sigla'];
$valor_moeda_inicial = $_POST['valor_moeda_inicial'];
$destaque_moeda = $_POST['destaque_moeda'];

require_once "conexao.php";

$verifica_igualdade = " SELECT * FROM tb_moeda 
WHERE nome_moeda = '$nome_moeda' 
OR sigla_moeda = '$sigla'";

$conect_verifica_igualdade = mysqli_query($conexao,$verifica_igualdade);

if (mysqli_num_rows($conect_verifica_igualdade) == 0) {
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
    
    #---------------------------------------------------------------------------------------------------------
    
    $inserir_moeda = 
    "INSERT INTO tb_moeda (nome_moeda, sigla_moeda, valor_moeda_fixo, imagem_moeda, imagem_moeda_fundo, moeda_em_destaque) 
    VALUES ('$nome_moeda', '$sigla','$valor_moeda_inicial','$arquivo_servidor_moeda','$arquivo_servidor_fundo','$destaque_moeda')";

    mysqli_query($conexao, $inserir_moeda);

    header("Location: cadastro_moedas_form.php");
    exit();
}else {
    header("Location: cadastro_moedas_form.php");
    exit();
}
?>