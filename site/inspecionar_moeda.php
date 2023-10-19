<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

        <?php
            $id_moeda = $_GET['id_moeda'];
            
        ?>
        
        <form action="compra_de_moeda.php">
            <button>
                Comprar
            </button>
        </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </body>
</html>