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

        <br> <br> 
    <?php
        $moedas_em_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $moedas_fora_de_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 0";
        
        $conexao_moedas_destaque = mysqli_query($conexao,$moedas_em_destaque) ;
        $conexao_moedas_fora_destaque = mysqli_query($conexao,$moedas_fora_de_destaque) ;
        if (mysqli_num_rows($conexao_moedas_destaque) > 0) {
            echo"Moedas em destaque atualmente";
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
                ?>
                
                <form action='altera_moeda_destaque.php?' method='post'>
                    
                    <input type='hidden' name='id_moeda' value='<?php echo $id_moeda; ?>'>
                    <input type='hidden' name='alteracao' value='dell'>
                        
                        <div class="p-2">
                            <button type='submit'>-</button>
                            <?php echo $nome_moeda; ?>
                        </div>
                        
                        
                       
                        
                    </tr>
                    
                </form>
                <?php
            }
            
        }
echo"<br> <br>";
        if (mysqli_num_rows($conexao_moedas_fora_destaque) > 0) {
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_fora_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
                ?>
                
                <form action='altera_moeda_destaque.php?' method='post'>
                    
                    <input type='hidden' name='id_moeda' value='<?php echo $id_moeda; ?>'>
                    <input type='hidden' name='alteracao' value='add'>
                    
                    <div class="p-2">
                        <button type='submit'>+</button>
                        <?php echo $nome_moeda; ?>
                    </div>
                        
                        
                        
                    
                    
                </form>
        <?php
                    }
                }        
        ?>
        <form action="moedas.php">
            <button class='btn btn-outline-success' type='submit'>  
                Voltar
            </button>
        </form>
        
</body>
</html>
