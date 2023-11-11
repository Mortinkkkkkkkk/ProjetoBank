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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                </ul>

            </div>
    </nav>


    </li>

    </div>
    </nav>

    <div class="container mt-5">
        <h1>Cadastro no Banco</h1> <br><br> <br>
    
  <form action="cadastrar.php">
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
</body>
</html>

