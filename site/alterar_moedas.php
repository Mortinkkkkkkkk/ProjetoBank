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
        <form action="moedas.php">
            <button class='btn btn-outline-success' type='submit'>  
                Voltar
            </button>
        </form>
        <form action="alterar_moedas.php">
            <input type="hidden" name="edicao" value="abilitada">
            <button type='submit' class="btn btn-outline-success">
                Editar
            </button>
        </form>  
    <?php
    
        $moedas_em_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $moedas_fora_de_destaque = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 0";
        
        $conexao_moedas_destaque = mysqli_query($conexao,$moedas_em_destaque) ;
        $conexao_moedas_fora_destaque = mysqli_query($conexao,$moedas_fora_de_destaque) ;
        if (mysqli_num_rows($conexao_moedas_destaque) > 0) {
            echo"<strong> Moedas em destaque atualmente </strong> <br><br>";
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
                ?>

                <div class="col-sm container-fluid">
                    <div class='card mb-3' style='width: 13rem;'>
                        

                    <?php
                        $edicao = $_GET['edicao'];
                        if ($edicao == 'desabilitada'){
                            
                            echo "
                        
                            $nome_moeda <br> <br> 
                            $sigla_moeda <br> <br> 
                            $valor_moeda_fixo <br> <br>
                            ";
                            
                        }
                        else {
                                    
                    ?>
                                <form action="altera_moeda.php">
                                    <?php echo $nome_moeda; ?> <br><br>
                                    <input type="hidden" value="<?php echo $id_moeda?>" name="id_moeda">
                                    <input type="hidden" value="editar" name="alteracao">
                                    Nome da moeda: <br>
                                    <input type="text" value="<?php echo $nome_moeda;?>" name="novo_nome"> <br><br>
                                    Sigla Moeda: <br>
                                    <input type="text" value="<?php echo $sigla_moeda;?>" name="nova_sigla"> <br><br>
                                    Valor Atual da Moeda: <br>
                                    <input type="text" value="<?php echo $valor_moeda_fixo;?>" name="novo_valor"> <br><br>
                                    <button type='submit' class="btn btn-outline-success">Salvar</button> <br><br>
                                </form> 
                        <?php
                    }
                
                    ?>
                                <a 
                                href="altera_moeda.php?id_moeda=<?php echo $id_moeda?>&alteracao=dell" 
                                class="btn btn-outline-danger">Remover de Destaque</a>
                            </div>
                            <a 
                            href="altera_moeda.php?id_moeda=<?php echo $id_moeda?>&alteracao=remover" 
                            class="btn btn-outline-danger">
                            Remover <?php echo $nome_moeda; ?> </a> <br><br>
                        </div>

                    <?php
            }
        }
echo"<br> <br>";
        if (mysqli_num_rows($conexao_moedas_fora_destaque) > 0) {
            echo"<strong> Moedas em fora destaque atualmente </strong> <br> <br>";
            while ($linha_destaque = mysqli_fetch_array($conexao_moedas_fora_destaque)) {
                $id_moeda = $linha_destaque['id_moeda'];
                $nome_moeda = $linha_destaque['nome_moeda'];
                $sigla_moeda = $linha_destaque['sigla_moeda'];
                $valor_moeda_fixo = $linha_destaque['valor_moeda_fixo'];
                ?>
                <div class="col-sm container-fluid">
                    
                    <div class='card mb-3' style='width: 13rem;'>

                    <?php
                        if ($edicao == 'desabilitada'){
                            
                            echo "
                        
                            $nome_moeda <br> <br> 
                            $sigla_moeda <br> <br> 
                            $valor_moeda_fixo <br> <br>
                            ";
                            ?>
                            <form action="alterar_moedas.php">
                                <input type="hidden" name="edicao" value="abilitada">
                                <input type="hidden" name="id_moeda_edit" value="<?php echo $id_moeda; ?>">
                                
                                
                            </form> 
                            
                            <?php
                            }
                            else {
                                    
                    ?>

                        <form action="altera_moeda.php">
                            <input type="hidden" value="<?php echo $id_moeda?>" name="id_moeda">
                            <input type="hidden" value="editar" name="alteracao">
                            Nome da moeda: <br>
                            <input type="text" value="<?php echo $nome_moeda;?>" name="novo_nome"> <br><br>
                            Sigla Moeda: <br>
                            <input type="text" value="<?php echo $sigla_moeda;?>" name="nova_sigla"> <br><br>
                            Valor Atual da Moeda: <br>
                            <input type="text" value="<?php echo $valor_moeda_fixo;?>" name="novo_valor"> <br><br>
                            <button type='submit' class="btn btn-outline-success">Salvar</button> <br><br>
                        </form> 
                        
                        <?php
                            }
                        ?>
                        <a 
                        href="altera_moeda.php?id_moeda=<?php echo $id_moeda?>&alteracao=add" 
                        class="btn btn-outline-success">Adicionar em Destaque</a>
                    </div>
                    <a 
                    href="altera_moeda.php?id_moeda=<?php echo $id_moeda?>&alteracao=remover" 
                    class="btn btn-outline-danger">
                    Remover <?php echo $nome_moeda; ?> </a> <br><br>
                </div>
                        
                        
                </form>
        <?php
                    }
                }        
        ?>
        
        
</body>
</html>
