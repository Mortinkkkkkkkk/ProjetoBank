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
    
    <?php
        $sql =  "SELECT * FROM tb_usuario WHERE id_usuario = $id_usuario";

        $resultado = mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resultado)) {
        while ($linha = mysqli_fetch_array($resultado)) {
            $nome_usuario = $linha['nome_usuario'];
            $email_usuario = $linha['email_usuario'];
            $cpf_usuario = $linha['cpf_usuario'];
            echo $nome_usuario . "<br>";
            echo $email_usuario . "<br>";
            echo $cpf_usuario . "<br><br>";

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
                  echo $moeda . "<br>";
                  echo $valor . "<br>";
                  echo $row["quantidade"] . "<br>";
                  echo "<form action='venda.php' method='post'>
                            <input type='hidden' name='id_moeda' value='$id_moeda'>
                            <input type='number' name='quantidade' value='1' style='width: 50px;'>
                            <button type='submit'>Vender</button>
                            </form>";
                        }
                    }
                    
                    ?>
</body>
</html>