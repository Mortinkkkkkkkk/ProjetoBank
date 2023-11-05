<?php
    require_once 'conexao.php';
#DELETE FROM table_name WHERE condition;
    $id_moeda = $_POST['id_moeda'];
    
    $moeda_removida = "DELETE FROM tb_moeda WHERE id_moeda = '$id_moeda'";
    mysqli_query($conexao,$moeda_removida);
    
    header('location: remover_moeda.php');
    exit();

   
?>