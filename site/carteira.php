<?php
    require "ta_logado.php";
    $id_usuario = $_SESSION['id_usuario'];
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
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img
                    src="../img/Firefly logo minimalista para um banco digital de criptomoedas com o tema verde 62636.jpg"
                    alt="imagem" height="50px" width="50px"  style="border-radius: 40px"></a>
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
                        <a class="nav-link">
                            <form action="logout.php">
                                <button type="submit" class="btn">Log-out</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="moedas.php">
                                <button type="submit" class="btn">Moedas</button>
                                </form>
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
        require_once "conexao.php";
          $sql = "SELECT id_moeda, quantidade FROM tb_carteira WHERE id_usuario = $id_usuario AND quantidade > 0";
          $resultado = mysqli_query($conexao,$sql);
          if (mysqli_num_rows($resultado) > 0) {
              $selectnome = "SELECT nome_usuario FROM tb_usuario WHERE id_usuario = $id_usuario";
              $resultnome = mysqli_query($conexao,$selectnome);
              $nome = mysqli_fetch_array($resultnome);
              echo $nome["nome_usuario"] . "<br>";
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
                            <button type='submit'>Vender</button>
                        </form>";
            }
        }
    
    ?>
</body>
</html>