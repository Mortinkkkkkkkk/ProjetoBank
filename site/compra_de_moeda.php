<?php
    require_once "ta_logado.php";
    require_once "conexao.php";
    
    $idusuario = $_SESSION['id_usuario'];
    $carrinohsql = "SELECT id_moeda, quantidade FROM tb_carrinho WHERE id_usuario = $idusuario";
    $resultcarrinho = mysqli_query($conexao,$carrinohsql);
    if (mysqli_num_rows($resultcarrinho) > 0){
        while ($rowcarrinho = mysqli_fetch_array($resultcarrinho)){
            $id_moeda = $rowcarrinho['id_moeda'];
        }
    }
    ?>
