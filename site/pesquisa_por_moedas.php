<?php
    require_once 'conexao.php';
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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

        
 
<div class='mt-5 container'>
      <div class='row'>
        <?php
            $mais_menos = 0;
            $opcao_de_pesquisa = $_GET['opcoes_de_pesquisa'];
            $nome_sigla_moeda_pesquisada = $_GET['nome_sigla_moeda_pesquisada'];
            if ($opcao_de_pesquisa == 'nome') {
                $sql_pesquisa_por_moeda = "SELECT * FROM tb_moeda WHERE nome_moeda like '%$nome_sigla_moeda_pesquisada%'";
                $ativacao_pesquisa = mysqli_query($conexao, $sql_pesquisa_por_moeda);
                if (mysqli_num_rows($ativacao_pesquisa) > 0 ){
                    while ($linha_tabela_moeda = mysqli_fetch_array($ativacao_pesquisa)) {
                        $id_moeda = $linha_tabela_moeda['id_moeda'];
                        $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                        $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                        $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];
                        
                        
                            
                        echo "<div class='col-sm'>";
                        echo "<div class='card mb-3' style='width: 13rem;'>";
                        echo            " <img src='./img/ethereum.jpg' class='card-img-top'>";
                        echo           " <div class='card-body'>";
                        echo               "<h5 class='card-title'> $nome_moeda</h5>";
                        echo               "<p class='card-text'>$valor_moeda_fixo</p>" ;
                        echo                   "<p class='card-text'>$sigla_moeda</p>" ;       
                        echo "<form action='inspecionar_moeda.php'>
                                    <input type='hidden' name='moeda_pesquisada' value='$nome_sigla_moeda_pesquisada'>
                                    <input type='hidden' name='id_moeda' value='$id_moeda'>
                                    <input type='hidden' name='opcao_pesquisada' value='$opcao_de_pesquisa'>
                                    <input type='hidden' name='ispc_local' value='pesquisa'>
                                    <button class='btn btn-outline-success'>inspecionar</button>
                                </form>
                                <br><br>";
                        echo           "</div>" ;
                        echo           "</div>";
                        echo           "</div>";        
                    
                }
            }
        }
            if ($opcao_de_pesquisa == 'sigla') {
                $sql_pesquisa_por_moeda = "SELECT * FROM tb_moeda WHERE sigla_moeda like '%$nome_sigla_moeda_pesquisada%'";
                $ativacao_pesquisa = mysqli_query($conexao, $sql_pesquisa_por_moeda);
                if (mysqli_num_rows($ativacao_pesquisa) > 0 ){
                    while ($linha_tabela_moeda = mysqli_fetch_array($ativacao_pesquisa)) {
                        $id_moeda = $linha_tabela_moeda['id_moeda'];
                        $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                        $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                        $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];
                        
                        
                        echo "<div class='col-sm'>";
                        echo "<div class='card mb-3' style='width: 13rem;'>";
                        echo            " <img src='./img/ethereum.jpg' class='card-img-top'>";
                        echo           " <div class='card-body'>";
                        echo               "<h5 class='card-title'> $nome_moeda</h5>";
                        echo               "<p class='card-text'>$valor_moeda_fixo</p>" ;
                        echo                   "<p class='card-text'>$sigla_moeda</p>" ;       
                        echo "<form action='inspecionar_moeda.php'>
                                    <input type='hidden' name='moeda_pesquisada' value='$nome_sigla_moeda_pesquisada'>
                                    <input type='hidden' name='id_moeda' value='$id_moeda'>
                                    <input type='hidden' name='opcao_pesquisada' value='$opcao_de_pesquisa'>
                                    <input type='hidden' name='ispc_local' value='pesquisa'>
                                    <button class='btn btn-outline-success'>inspecionar</button>
                                </form>
                                <br><br>";
                        echo           "</div>" ;
                        echo           "</div>";
                        echo           "</div>";
                        ?>
                        
                        
                        <?php          
                    
                }
            }
        }
                
?>                   
           
      
           </div>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>