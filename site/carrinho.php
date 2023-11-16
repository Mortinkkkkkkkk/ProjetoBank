<?php
    require_once "ta_logado.php";
    require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link de resetador css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link animador (animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Script de icones -->
    <script src="https://kit.fontawesome.com/bc42253982.js" crossorigin="anonymous"></script>
    
    <title>Document</title>
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
    
    <div class='mt-5 container'>
      <div class='row'>
    

    <?php
        $id_usuario = $_SESSION['id_usuario'];
        $compratotal = 0;
        $sqlcarrihno = "SELECT * FROM tb_carrinho WHERE id_usuario = $id_usuario";
        $resultcarrinho = mysqli_query($conexao,$sqlcarrihno);
        if (mysqli_num_rows($resultcarrinho) > 0){
            while ($linha = mysqli_fetch_array($resultcarrinho)) {
                global $compratotal;
                $idcarrinho = $linha['id_carrinho'];
                $idmoeda = $linha['id_moeda'];
                $sqlmoeda = "SELECT nome_moeda, sigla_moeda FROM tb_moeda WHERE id_moeda = $idmoeda";
                $resultmoeda = mysqli_query($conexao,$sqlmoeda);
                $excluir = "<form action='remover_carrinho.php' method='post'><input type='hidden' name='id_carrinho' value='$idcarrinho'><button type='submit'>Remover</button></form>";
                $row = mysqli_fetch_array($resultmoeda);
                $nomemoeda = $row['nome_moeda'];
                $siglamoeda = $row['sigla_moeda'];
                $quantidade = $linha['quantidade'];
                $valortotal = $linha['valor_total'];
                $br = "<br>";
             
                $compratotal = $compratotal + $valortotal;

            
                echo "<div class='col-sm'>";
                  echo "<div class='card' style='width: 18rem;'>";
                echo   "<div class='card-header'>";
                echo     $nomemoeda;
                echo   "</div>";
                echo   "<ul class='list-group list-group-flush'>";
                echo     "<li class='list-group-item'>$siglamoeda</li>";
                echo     "<li class='list-group-item'> $quantidade</li>";
                echo     "<li class='list-group-item'> $compratotal</li>";
                echo     "<li class='list-group-item'>$excluir</li>";
                          echo   "</ul>";
                          echo "</div>";
                          echo "</div>";
                        }
            
            
            ?>
  
  <div class='mt-5 container'>
      <div class='row'>          
<div class="col-sm">

<form action="compra_de_moeda.php">
    </div>
    
    <div class="col-sm">
        
    <?php echo "<h3>Valor total à pagar: " . $compratotal."</h3>";
                $efetuar = " <button type='submit' class='btn btn-success'>Efetuar compra</button>"; 
           }else {
                    echo "<br>";
                    echo "<br>";
                    echo "<h3>Carrinho vazio</h3>";
                    $efetuar = "";
                    }
            
              echo $efetuar;
              
              ?>

              </div>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
