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
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img
                    src="../img/Firefly logo minimalista para um banco digital de criptomoedas com o tema verde 62636.jpg"
                    alt="imagem" height="50px" width="50px" style="border-radius: 40px"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="carteira.php">
                                <button class="btn" type="submit" <?php echo $logado; ?>>Carteira</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="moedas.php">
                                <button type="submit" class="btn">Moedas</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="login.php">
                                <button type="submit" class="btn" <?php echo $login; ?>>Login</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="cadastro.php">
                                <button type="submit" class="btn" <?php echo $login; ?>>Cadastro</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="logout.php">
                                <button type="submit" class="btn"<?php echo $logado; ?>>Log-out</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="carrinho.php">
                                <button type="submit" class="btn"<?php echo $logado; ?>>Carrinho</button>
                            </form>
                        </a>
                    </li>
                </ul>

            </div>
    </nav>

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
                echo $nomemoeda . $br;
                echo $siglamoeda . $br;
                echo $quantidade . $br;
                echo $valortotal . $br;
                $compratotal = $compratotal + $valortotal;
                echo $excluir . $br;
            }
        echo "Valor total à pagar: " . $compratotal;
        $efetuar = " <button type='submit'>Efetuar compra</button>";
    }
    else {
        echo "carrinho vazio";
        $efetuar = "";
        }
            
            
            ?>
<form action="compra_de_moeda.php">
    <?php echo $efetuar; ?>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
