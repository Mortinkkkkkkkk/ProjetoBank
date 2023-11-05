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
                    
                </div>
            </nav>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <?php
            $moedas_bd = "SELECT * FROM tb_moeda";
            $moedas = mysqli_query($conexao,$moedas_bd);
            if (mysqli_num_rows($moedas) > 0) {
                while ($linha_tabela_moeda = mysqli_fetch_array($moedas)) {
                    $id_moeda = $linha_tabela_moeda['id_moeda'];
                    $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                    $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                    $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];

                    ?>
                    <form action='remove_moeda.php' method='post'>
                
                        <input type='hidden' name='id_moeda' value='<?php echo $id_moeda; ?>'>
                        <div class="p-2">
                            <button type='submit' class="btn btn-outline-danger">Remover</button>
                            <?php echo $nome_moeda; ?>
                        </div>
                    </form>

                    <?php
            }
        }
        ?>
</body>
</html>