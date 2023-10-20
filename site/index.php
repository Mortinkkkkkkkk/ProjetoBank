<?php
    session_start();
    if (isset($_SESSION['logado'])) {
        $conta = "";
        if ($_SESSION["tipo_usuario"] == "funcionario"){
            $criarmoeda = "<form action='criar_moeda.php'>
                Clique <button type='submit'>aqui</button> pra criar moeda
            </form>";
        }
    }else{
        $conta = "hidden";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="#" alt="imagem" height="50px" width="50px"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link">
                    <form action="carteira.php">
                    <button class="btn" type="submit">Carteira</button>

                        </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"> <form action="logout.php">
         <button type="submit"class="btn">Log-out</button>
    </form></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current ="page">
    <form action="moedas.php" >
          <button type="submit" class="btn">Moedas</button>
              
    </form></a>
                    </li>
                </ul>
                <div class="dropdown-center" >
                    <form action="pesquisa_por_moedas.php">
                        <select name="opcoes_de_pesquisa" id="" class="btn btn-outline-primary">
                            <option value="nome">Nome</option>
                            <option value="sigla">Sigla</option>
                        </select>
                        <input name="nome_sigla_moeda_pesquisada" type="text" class="btn  m-2 " placeholder="Digite aqui..." style="background-color: #2bcc48">
                        <button class="btn btn-outline-success" type="submit">  
                        <i class="bi bi-search"></i>Pesquisar
                        </button>
                    </form>
                </div>
            </div>
        </nav>









<a href="carteira.php" class=""></a>
