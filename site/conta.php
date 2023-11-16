<?php
    require_once "ta_logado.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doument</title>
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
           $id_usuario = $_SESSION['id_usuario'];
           $sql =  "SELECT * FROM tb_usuario WHERE id_usuario = $id_usuario";

           $resultado = mysqli_query($conexao,$sql);
           if (mysqli_num_rows($resultado)) {
            while ($linha = mysqli_fetch_array($resultado)) {
                $nome_usuario = $linha['nome_usuario'];
                $email_usuario = $linha['email_usuario'];
                $cpf_usuario = $linha['cpf_usuario'];
                echo $nome_usuario . "<br>";
                echo $email_usuario . "<br>";
                echo $cpf_usuario . "<br>";
            }
           }

        
        
        
        
        ?>

</body>
</html>