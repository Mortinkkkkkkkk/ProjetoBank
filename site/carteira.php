<?php
    require "ta_logado.php";
    require_once "conexao.php";
    $id_usuario = $_SESSION['id_usuario'];
    
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
        <div class="col-sm" style="border-radius: 32px 64px;  background-color: #60f043; height: 50px; margin-left: 200px; margin-right: 200px">
            <div style="background-color:#0b6e20; border-radius: 32px 64px;">
                <center>
                    <div>
                        <h1 class="text-white"> Carteira</h1>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>
    <BR><BR></BR></BR>

    <div class='mt-5 container'>
    <div class='row'>
    <?php
        $sql =  "SELECT * FROM tb_usuario WHERE id_usuario = $id_usuario";

        $resultado = mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resultado)) {
        while ($linha = mysqli_fetch_array($resultado)) {
            $nome_usuario = $linha['nome_usuario'];
            $email_usuario = $linha['email_usuario'];
            $cpf_usuario = $linha['cpf_usuario'];

            echo "<div class='col-sm'>";
            echo      "<div class='card' style='width: 18rem;'>";
            echo     "<div class='card-header'>";
            echo         $nome_usuario;
            echo     "</div>";
            echo     "<ul class='list-group list-group-flush'>";
            echo         "<li class='list-group-item'>$email_usuario</li>";
            echo         "<li class='list-group-item'>$cpf_usuario</li>";
            echo     "</ul>";
            echo     "</div>";
            echo     "</div>";

            echo "<br>";
            echo "<br>";
            
        }
        }
          $sql = "SELECT id_moeda, quantidade FROM tb_carteira WHERE id_usuario = $id_usuario AND quantidade > 0";
          $resultado = mysqli_query($conexao,$sql);
          if (mysqli_num_rows($resultado) > 0) {
              while ($row = mysqli_fetch_assoc($resultado)) {
                  $id_moeda = $row["id_moeda"];
                  $selectmoeda = "SELECT nome_moeda, valor_moeda_fixo FROM tb_moeda WHERE id_moeda = $id_moeda";
                  $resultmoeda = mysqli_query($conexao,$selectmoeda);
                  $arraymoeda = mysqli_fetch_array($resultmoeda);
                  $moeda = $arraymoeda["nome_moeda"];
                  $valor = $arraymoeda["valor_moeda_fixo"];

                  echo "<div class='col-sm'>";
                  echo "<div class='card' style='width: 18rem;'>";
                echo   "<div class='card-header'>";
                echo     $moeda;
                echo   "</div>";
                echo   "<ul class='list-group list-group-flush'>";
                echo     "<li class='list-group-item'>$valor</li>";
                echo $row["quantidade"] . "<br>";
                echo "<form action='venda.php' method='post'>
                          <input type='hidden' name='id_moeda' value='$id_moeda'>
                          <input type='number' name='quantidade' value='1' style='width: 50px;'>
                          <button type='submit' class='btn btn-success'>Vender</button>
                          </form>";
                          echo   "</ul>";
                          echo "</div>";
                          echo "</div>";
                        }
                    }
                    
                    ?>
</body>
</html>