<?php
    require_once 'func_ta_logado.php';
    require_once 'altera_valor_moeda.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/firefly_logo_minimalista_para_um_banco_digital_de_criptomoedas_com_o_tema_verde_62636.jpg">
    <title>Alteração das Moedas</title>
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
<nav class="navbar navbar-expand-lg" style="background-color:  #0b6e20; border-radius: 32px 64px; margin-right: 100px; margin-left: 100px">
              
              <div class="container-fluid">
                      <a class="navbar-brand icon-link-hover" style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;' href="index.php"><i class="fa-solid fa-building-columns fa-lg bi" style="color: #ffffff;"></i></a>
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                  <a class="nav-link">
                                      <form action="carteira.php">
                                          <button class="btn text-white icon-link-hover" type="submit" <?php echo $logado; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-wallet fa-lg bi"></i> Carteira</button>
                              </form>
                          </a> 
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page">
                              <form action="moedas.php">
                                  <button type="submit" class="btn  text-white icon-link-hover "
                                      style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                      <i class="fa-solid fa-coins fa-lg bi"></i> Moedas</button>                                        
                                      </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page">
                              <form action="login.php">
                                  <button type="submit" class="btn text-white icon-link-hover" <?php echo $login; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-user-check fa-lg bi"></i> Login</button>
                              </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page">
                              <form action="cadastro.php">
                                  <button type="submit" class="btn text-white icon-link-hover" <?php echo $login; ?> 
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-user-plus fa-lg bi"></i> Cadastro</button>
                              </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link">
                              <form action="carrinho.php">
                                  <button type="submit" class="btn text-white icon-link-hover"<?php echo $logado; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-cart-shopping fa-lg bi"></i> Carrinho</button>
                              </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link">
                              <form action="logout.php">
                                  <button type="submit" class="btn text-white icon-link-hover"<?php echo $logado; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-arrow-right-from-bracket fa-lg bi"></i> Log-out</button>
                              </form>
                          </a>
                      </li>
                      </ul>
                  </div>
                  </div>
    </nav>

    
    <?php
        $edicao = $_GET['edicao'];
        $id_moeda_editada = $_GET['id_moeda_edit'];


        $moedas_em_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $moedas_fora_de_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 0";
        
        $conexao_moedas_destaque = mysqli_query($conexao,$moedas_em_destaque) ;
        $conexao_moedas_fora_destaque = mysqli_query($conexao,$moedas_fora_de_destaque) ;

        if ($edicao == 'abilitada' and $id_moeda_editada != 0) {
            
            
            $moeda_editada = "SELECT * FROM tb_moeda WHERE id_moeda = $id_moeda_editada";
            $resultado = mysqli_query($conexao, $moeda_editada);
            $linha_moeda_editada = mysqli_fetch_array($resultado);
            $id_moeda = $linha_moeda_editada['id_moeda'];
            $nome_moeda = $linha_moeda_editada['nome_moeda'];
            $sigla_moeda = $linha_moeda_editada['sigla_moeda'];
            $valor_moeda_fixo = $linha_moeda_editada['valor_moeda_fixo'];
            $imagem_moeda = $linha_moeda_editada['imagem_moeda'];
            $imagem_fundo_moeda = $linha_moeda_editada['imagem_moeda_fundo'];
            echo "<h2> Editando $nome_moeda:</h2>
            <div class='p-3'>";
        
?>          
            <form action="altera_moeda.php" enctype='multipart/form-data' method='post'>
                <?php
                $alteracao_imagem = $_GET['alteracao_imagem'];
                    if ($alteracao_imagem == 1) {
                        echo "
                        <input type='hidden' name='alteracao_imagem' value='1'>

                            Imagem da Moeda: <br> <br>
                        <img src='$imagem_moeda ' alt='' style='max-height: 200px; max-width: 300px;'><br> <br>
                        <input type='file' name='imagem_moeda' value='$imagem_moeda '> <br> <br>
        
                        Imagem de Fundo da Moeda: <br> <br>
                        <img src='$imagem_fundo_moeda ' alt='' style='max-height: 200px; max-width: 300px;'><br> <br>
                        <input type='file' name='imagem_fundo_moeda' value='$imagem_fundo_moeda ';> <br><br>
                        ";
                        
                    }
                    else {
                        echo "
                        <input type='hidden' name='alteracao_imagem' value='0'>
                        <input type='hidden' name='imagem_moeda' value='$imagem_moeda'>
                        <input type='hidden' name='imagem_fundo_moeda' value='$imagem_fundo_moeda'>

                        Imagem da Moeda: <br> <br>
                            <img src='$imagem_moeda' alt='' style='max-height: 200px; max-width: 300px;'><br> <br>
                        
                        Imagem de Fundo da Moeda: <br> <br>
                            <img src='$imagem_fundo_moeda?>' alt='' style='max-height: 200px; max-width: 300px;'><br><br>

                        <a href='alterar_moedas.php?alteracao_imagem=1&id_moeda_edit=$id_moeda&edicao=abilitada' class='btn btn-outline-primary'>Alterar Imagens</a> <br><br>";
                    }
                
                ?>
                
                
                <input type="hidden" value="<?php echo $id_moeda?>" name="id_moeda">
                <input type="hidden" value="editar" name="alteracao">
               
                <div class="form-floating">
                    <input class="form-control" type="text" name="novo_nome" id="nome" value="<?php echo $nome_moeda;?>"> <br>  
                    <label for="nome">Nome Moeda</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" type="text" name="nova_sigla" id="sigla" value="<?php echo $sigla_moeda;?>"> <br>
                    <label for="sigla">Sigla Moeda</label>
                </div>
                
                <div class="form-floating">
                    <input class="form-control" type="text" name="novo_valor" id="valor" value="<?php echo $valor_moeda_fixo;?>"> <br>
                    <label for="valor">Valor Atual da Moeda</label>
                </div>
                
                <button type='submit' class="btn btn-outline-success icon-link-hover" style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' >
                <i class="fa-solid fa-check fa-lg bi"></i> Salvar</button> <br><br>
                
            </form> 
        </div>
            <?php
        
            $edicao = 'desabilitada';
        }

        echo"<h1 class='p-2'> Moedas em destaque atualmente: </h1> <br> <br>";
        echo "<div class='row row-cols-1 row-cols-md-5 g-4'>
                 ";
        if (mysqli_num_rows($conexao_moedas_destaque) > 0) {
            
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
                $imagem_moeda = $linha_destaque['imagem_moeda'];
                $imagem_fundo_moeda = $linha_destaque['imagem_moeda_fundo'];
 
                if ($edicao == 'desabilitada' and $id_moeda != $id_moeda_editada){
                    echo "
                    <div class='col-sm container-fluid'>
                    <div class='card mb-3' style='width: 15rem;'>
                    <img src='$imagem_moeda' class='card-img-top' alt=''>
                    <div class='card-body'>
                    <h5 class='card-title'>$nome_moeda</h5>
                    <p class='card-text'>R$ $valor_moeda_fixo </p>
                    <p class='card-text'>$sigla_moeda</p>
                    
                    
                    <form action='alterar_moedas.php'>
                        <input type='hidden' name='edicao' value='abilitada'>
                        <input type='hidden' name='id_moeda_edit' value='$id_moeda'>
                        <input type='hidden' name='alteracao_imagem' value='0'>
                        <button type='submit' class='btn btn-outline-success icon-link-hover' style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' >
                        <i class='fa-solid fa-pen fa-lg bi'></i> Editar
                        </button>
                    </form>  <br>

                    <form action='altera_moeda.php' enctype='multipart/form-data' method='post'>
                        <input type='hidden' name='id_moeda' value='$id_moeda'>
                        <input type='hidden' name='alteracao' value='dell'>
                        
                        <button class='btn btn-outline-danger icon-link-hover' 
                            style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' type='submit'>
                            <i class='fa-solid fa-minus fa-lg bi'></i> Remover Destaque
                        </button><br><br>

                    </form>

                    <form action='altera_moeda.php' enctype='multipart/form-data' method='post'>
                        <input type='hidden' name='id_moeda' value='$id_moeda'>
                        <input type='hidden' name='alteracao' value='remover'>

                        <button class='btn btn-outline-danger icon-link-hover' 
                            style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' type='submit'>
                            <i class='fa-solid fa-trash fa-lg bi'></i> Remover $nome_moeda 
                        </button><br><br>

                    </form>
                    </div>
                    </div>
                    </div>
                ";
                
                }
            }
        }

    
echo"</div>

<br>";
        if (mysqli_num_rows($conexao_moedas_fora_destaque) > 0) {
            echo"<h1 class='p-2'> Moedas em fora destaque atualmente: </h1> <br> <br>";
            echo "<div class='row row-cols-1 row-cols-md-5 g-4'>";
            while ($linha_fora_de_destaque = mysqli_fetch_array($conexao_moedas_fora_destaque)) {
                $id_moeda = $linha_fora_de_destaque['id_moeda'];
                $nome_moeda = $linha_fora_de_destaque['nome_moeda'];
                $sigla_moeda = $linha_fora_de_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_fora_de_destaque['valor_moeda_fixo'];
                $imagem_moeda = $linha_fora_de_destaque['imagem_moeda'];
                $imagem_fundo_moeda = $linha_fora_de_destaque['imagem_moeda_fundo'];
                
                if ($edicao == 'desabilitada' and $id_moeda != $id_moeda_editada){  
                    echo "
                    <div class='col-sm container-fluid'>
                    <div class='card mb-3' style='width: 15rem;'>
                    <img src='$imagem_moeda' class='card-img-top' alt=''>
                    <div class='card-body'>
                    <h5 class='card-title'>$nome_moeda</h5>
                    <p class='card-text'>R$ $valor_moeda_fixo </p>
                    <p class='card-text'>$sigla_moeda</p>
                    
                    <form action='alterar_moedas.php'>
                        <input type='hidden' name='alteracao_imagem' value='0'>
                        <input type='hidden' name='edicao' value='abilitada'>
                        <input type='hidden' name='id_moeda_edit' value='$id_moeda'>
                        <button type='submit' class='btn btn-outline-success icon-link-hover' style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);'>
                        <i class='fa-solid fa-pen fa-lg bi'></i> Editar
                        </button>
                    </form>  <br>
                    
                    <form action='altera_moeda.php' enctype='multipart/form-data' method='post'>
                        <input type='hidden' name='id_moeda' value='$id_moeda'>
                        <input type='hidden' name='alteracao' value='add'>
                        
                        <button class='btn btn-outline-success icon-link-hover' 
                            style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' >
                            <i class='fa-solid fa-plus fa-lg bi'></i> Adicionar Destaque
                        </button><br><br>

                    </form>
                    <form action='altera_moeda.php' enctype='multipart/form-data' method='post'>
                        <input type='hidden' name='id_moeda' value='$id_moeda'>
                        <input type='hidden' name='alteracao' value='remover'>

                        <button class='btn btn-outline-danger icon-link-hover' 
                            style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' type='submit'>
                            <i class='fa-solid fa-trash fa-lg bi'></i> Remover $nome_moeda 
                        </button><br><br>

                    </form>
                    </div>
                    </div>
                    </div>  
                "; 
            }                    
        }
    }
echo "</div>";            
?>
        
</body>
</html>