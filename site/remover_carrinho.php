<?php
    require_once 'conexao.php';
    require_once 'ta_logado.php';

    $id_carrihno = $_POST['id_carrinho'];
    $sql = "DELETE FROM `tb_carrinho`
    WHERE ((id_carrinho = $id_carrihno));";
    $result = mysqli_query($conexao,$sql);
    if ($result) {
        header('location: carrinho.php');
        exit();
    }
    else {
        header('location: carrinho.php');
        exit();
    }
?>