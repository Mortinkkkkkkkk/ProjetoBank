<?php
session_start();
require_once 'conexao.php';
if (isset($_SESSION['logado'])) {
    $logado = "";
    $login = "hidden";
} else {
    $logado = "hidden";
    $login = "";
}

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
                <a class="navbar-brand" href="index.php"><ion-icon name="wallet-outline" size ="large" style="color: lightgreen;"></ion-icon></a></a>
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
                
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">
                        <form action="cadastro.html">
                            <button type="submit" class="btn text-white ">Cadastro</button>

                        </form>
                    </a>
                    
                    
                </ul>

           
            </div>
          
            
            
        </div>
    </nav>
    
    
</li>

</div>
</nav>
    



    <div class="container mt-5">
        <h1>Cadastro no Banco</h1> <br><br> <br>
    
  <form action="cadastro.php">
        <div class="form-floating">
            <input class="form-control" name="nome_usuario" type="text" id="nome_usuario" placeholder="Nome aqui..."> <br><br>
            <label for="nome_usuario">Nome</label>
        </div>

        <div class="form-floating">
            <input class="form-control" name="email_usuario" placeholder="Email" type="text" id="email_usuario"> <br><br>
            <label for="email_usuario">Email</label>
        </div>


        <div class="form-floating">
          <input class="form-control" name="cpf_usuario" placeholder="CPF" type="text" id="cpf_usuario"> <br><br>
          <label for="cpf_usuario">CPF</label>
      </div>

      <div class="form-floating">
        <input class="form-control" name="senha_usuario" placeholder="Senha" type="text" id="senha_usuario"> <br><br>
        <label for="senha_usuario">Senha</label>
    </div>

        <button class="btn btn-success">Cadastrar</button>
    </div> <br><br>
</form>

</div>
<script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
<script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>

