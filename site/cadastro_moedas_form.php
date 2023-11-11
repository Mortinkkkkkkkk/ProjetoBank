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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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


        <br> <br> 

        <form action="cadastro_moedas.php" enctype="multipart/form-data" method="post">
            Nome Moeda: <br>
                <input type="text" name="nome_moeda" placeholder="..."> <br><br>
            Sigla_moeda: <br>
                <input type="text" name="sigla" placeholder="..."> <br><br>
            Valor Inicial da Moeda: <br>
                <input type="text" name="valor_moeda_inicial" placeholder="..."> <br><br>
            <input type="radio" name="destaque_moeda" value="1"> Moeda em Destaque <br>
            <input type="radio" name="destaque_moeda" value="0"> Moeda Fora de Destaque<br><br>
            
            Imagem da Moeda: <br>
            <input type="file" name="imagem_moeda"> <br><br>

            Imagem de Fundo da Moeda: <br>
            <input type="file" name="imagem_fundo_moeda"> <br><br>
            <input type="submit" value = "Cadastrar">
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>