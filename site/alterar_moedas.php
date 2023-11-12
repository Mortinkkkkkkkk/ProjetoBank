<?php
    require_once 'func_ta_logado.php';
    require_once 'altera_valor_moeda.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link de resetador css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link animador (animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Script de icones -->
    <script src="https://kit.fontawesome.com/bc42253982.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img
                    src="../img/Firefly logo minimalista para um banco digital de criptomoedas com o tema verde 62636.jpg"
                    alt="imagem" height="50px" width="50px" style="border-radius: 40px"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="carteira.php">
                                <button class="btn icon-link-hover" type="submit" <?php echo $logado; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-wallet fa-lg bi"></i> Carteira</button>
                            </form>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="moedas.php">
                                <button type="submit" class="btn icon-link-hover"
                                    style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                    <i class="fa-solid fa-coins fa-lg bi"></i> Moedas</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="login.php">
                                <button type="submit" class="btn icon-link-hover" <?php echo $login; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-user-check fa-lg bi"></i> Login</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="cadastro.php">
                                <button type="submit" class="btn icon-link-hover" <?php echo $login; ?> 
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-user-plus fa-lg bi"></i> Cadastro</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="carrinho.php">
                                <button type="submit" class="btn icon-link-hover"<?php echo $logado; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-cart-shopping fa-lg bi"></i> Carrinho</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="logout.php">
                                <button type="submit" class="btn icon-link-hover"<?php echo $logado; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-arrow-right-from-bracket fa-lg bi"></i> Log-out</button>
                            </form>
                        </a>
                    </li>
                </div>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
    </nav>

        <br> <br>
        <form action="moedas.php">
            <button class='btn btn-outline-success' type='submit'>  
                Voltar
            </button>
        </form>
        <br>
        
    <?php
        $edicao = $_GET['edicao'];
        $id_moeda_editada = $_GET['id_moeda_edit'];


        $moedas_em_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $moedas_fora_de_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 0";
        
        $conexao_moedas_destaque = mysqli_query($conexao,$moedas_em_destaque) ;
        $conexao_moedas_fora_destaque = mysqli_query($conexao,$moedas_fora_de_destaque) ;

        if ($edicao == 'abilitada' and $id_moeda_editada != 0) {
            echo "
            <div class='col-sm container-fluid'>
            <div class='card mb-3' style='width: 13rem;'>";
            
            $moeda_editada = "SELECT * FROM tb_moeda WHERE id_moeda = $id_moeda_editada";
            $resultado = mysqli_query($conexao, $moeda_editada);
            $linha_moeda_editada = mysqli_fetch_array($resultado);
            $id_moeda = $linha_moeda_editada['id_moeda'];
            $nome_moeda = $linha_moeda_editada['nome_moeda'];
            $sigla_moeda = $linha_moeda_editada['sigla_moeda'];
            $valor_moeda_fixo = $linha_moeda_editada['valor_moeda_fixo'];
                    
?>
            <form action="altera_moeda.php">
                <?php echo $nome_moeda; ?> <br><br>
                <input type="hidden" value="<?php echo $id_moeda?>" name="id_moeda">
                <input type="hidden" value="editar" name="alteracao">
                Nome da moeda: <br>
                <input type="text" value="<?php echo $nome_moeda;?>" name="novo_nome"> <br><br>
                Sigla Moeda: <br>
                <input type="text" value="<?php echo $sigla_moeda;?>" name="nova_sigla"> <br><br>
                Valor Atual da Moeda: <br>
                <input type="text" value="<?php echo $valor_moeda_fixo;?>" name="novo_valor"> <br><br>
                <button type='submit' class="btn btn-outline-success">Salvar</button> <br><br>
            </form> 
            <?php
            $edicao = 'desabilitada';
            echo "<a 
            href='altera_moeda.php?id_moeda=$id_moeda&alteracao=dell' 
            class='btn btn-outline-danger'>Remover de Destaque</a>
            </div>
            <a 
            href='altera_moeda.php?id_moeda=$id_moeda&alteracao=remover' 
            class='btn btn-outline-danger'>
            Remover $nome_moeda  </a> <br><br> 
            </div>";
            
        }

        echo"<strong> Moedas em destaque atualmente </strong> <br> <br> <br>";
        if (mysqli_num_rows($conexao_moedas_destaque) > 0) {
            
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
 
                if ($edicao == 'desabilitada' and $id_moeda != $id_moeda_editada){
                    echo "
                    <div class='col-sm container-fluid'>
                    <div class='card mb-3' style='width: 13rem;'>
                    $nome_moeda <br> <br> 
                    $sigla_moeda <br> <br> 
                    $valor_moeda_fixo <br> <br>
                    
                    <form action='alterar_moedas.php'>
                        <input type='hidden' name='edicao' value='abilitada'>
                        <input type='hidden' name='id_moeda_edit' value='$id_moeda'>
                        <button type='submit' class='btn btn-outline-success'>
                            Editar
                        </button>
                    </form>  <br> <br>
                    
                    <a 
                    href='altera_moeda.php?id_moeda=$id_moeda&alteracao=dell' 
                    class='btn btn-outline-danger'>Remover de Destaque</a>
                    </div>
                    <a 
                    href='altera_moeda.php?id_moeda=$id_moeda&alteracao=remover' 
                    class='btn btn-outline-danger'>
                    Remover $nome_moeda  </a> <br><br>
                    </div>
                ";
                
                }
            }
        }
    
echo"<br> <br>";
        if (mysqli_num_rows($conexao_moedas_fora_destaque) > 0) {
            echo"<strong> Moedas em fora destaque atualmente </strong> <br> <br>";
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_fora_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
                
                if ($edicao == 'desabilitada' and $id_moeda != $id_moeda_editada){  
                    echo "
                    <div class='col-sm container-fluid'>
                    <div class='card mb-3' style='width: 13rem;'>
                    $nome_moeda <br> <br> 
                    $sigla_moeda <br> <br> 
                    $valor_moeda_fixo <br> <br>
                    
                    <form action='alterar_moedas.php'>
                        <input type='hidden' name='edicao' value='abilitada'>
                        <input type='hidden' name='id_moeda_edit' value='$id_moeda'>
                        <button type='submit' class='btn btn-outline-success'>
                            Editar
                        </button>
                    </form>  <br> <br>
                    
                    <a 
                    href='altera_moeda.php?id_moeda=$id_moeda&alteracao=add' 
                    class='btn btn-outline-success'>Adicionar de Destaque</a>
                    </div>
                    <a 
                    href='altera_moeda.php?id_moeda=$id_moeda&alteracao=remover' 
                    class='btn btn-outline-danger'>
                    Remover $nome_moeda  </a> <br><br>
                    </div>  
                "; 
            }                    
        }
    }
            
?>
        
        
</body>
</html>
