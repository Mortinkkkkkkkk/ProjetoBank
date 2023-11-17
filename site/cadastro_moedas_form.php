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
    <title>Cadastro de Moedas</title>
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

        <br> <br> 
        <div class="p-3">
        <form action="cadastro_moedas.php" enctype="multipart/form-data" method="post">
        <div class="form-floating">
            <input class="form-control" name="nome_moeda" type="text" id="nome_usuario" placeholder="Nome aqui..."> <br><br>
            <label for="nome_usuario">Nome da moeda</label>
        </div>

        <div class="form-floating">
            <input class="form-control" name="sigla_moeda" placeholder="Sigla" type="text" id="sigla_moeda"> <br><br>
            <label for="sigla_moeda">Sigla</label>
        </div>
        
        <div class="form-floating">
            <input class="form-control" type="text" name="valor_moeda_inicial" placeholder="" id="valor"> <br><br>
            <label for="valor">Valor Inicial da Moeda</label>
        </div>

        <input type="radio" name="destaque_moeda" value="1" class="p-2"> Moeda em Destaque <br>
        <input type="radio" name="destaque_moeda" value="0" class="p-2"> Moeda Fora de Destaque<br><br>
        
        Imagem da Moeda: <br>
        <input type="file" name="imagem_moeda"> <br><br>
        
        Imagem de Fundo da Moeda: <br>
        <input type="file" name="imagem_fundo_moeda"> <br><br>
        

        <button type='submit' class="btn btn-success">Cadastrar</button>
        </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>