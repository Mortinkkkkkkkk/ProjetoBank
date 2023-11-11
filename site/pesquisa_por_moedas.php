<?php
    session_start();
    if (isset($_SESSION['logado'])) {
        $logado = "";
        $login = "hidden";
    } else {
        $logado = "hidden";
        $login = "";
    }
    require_once 'conexao.php';
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
                </div>
                <li class="nav-item" style="list-style: none;">
                <form  action="pesquisa_por_moedas.php">
                    <select name="opcoes_de_pesquisa" id="" class="btn btn-outline-primary">
                        <option value="nome">Nome</option>
                        <option value="sigla">Sigla</option>
                    </select>
                    <input name="nome_sigla_moeda_pesquisada" type="text" class="btn  m-2 " placeholder="Digite aqui..." style="background-color: #2bcc48">
                    <button class="btn btn-outline-success" type="submit">  
                    <i class="bi bi-search"></i>Pesquisar
                    </button>
                </form>
            </li>
                </ul>

            </div>
    </nav>

        <div class='mt-5 container'>
      <div class='row'>
      <div class="col-sm"> <h1>Resultados da pesquisa</h1></div> 
    </div>
   </div>
        
<div>


<div class='mt-5 container'>
      <div class='row'>
 
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
                        $imagem = $linha_tabela_moeda['imagem_moeda'];

                        $sql_compara = "SELECT valor_moeda FROM `tb_historico_v_moeda` WHERE `id_moeda` = '$id_moeda' ORDER BY `hora_atual` DESC LIMIT 2";

                        $resultado_compara = mysqli_query($conexao,$sql_compara);
                        $valor1 = mysqli_fetch_array($resultado_compara);
                        $valor2 = mysqli_fetch_array($resultado_compara);
                        $v_inicial = $valor2['valor_moeda'];
                        $v_final = $valor1['valor_moeda'];
                        $continha_de_porcentagem = '';

                        if ($valor1 > $valor2) {
                            $cor = "green";
                            $sinal = "↑";
                            $continha_de_porcentagem = round(((($v_inicial - $v_final) / $v_inicial) * 100) ,3) * -1 . '%';
                            
                        } 
                        elseif ($valor1 < $valor2) {
                            $cor = "red";
                            $sinal = "↓";
                            $continha_de_porcentagem = round(((($v_inicial - $v_final) / $v_inicial) * 100) ,3) . '%';
                        }
                        else{
                            $cor = "black";
                            $sinal = "-";
                            $continha_de_porcentagem = '';
                        }
                        

                        echo "<div class='col-sm'>";
                        echo "<div class='card mb-3' style='width: 13rem;'>";
                        echo            " <img src='$imagem' class='card-img-top'>";
                        echo           " <div class='card-body'>";
                        echo               "<h5 class='card-title'> $nome_moeda</h5>";
                        echo               "<p class='card-text' style = 'color : $cor'>$valor_moeda_fixo $sinal $continha_de_porcentagem</p>" ;
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
                        $imagem = $linha_tabela_moeda['imagem_moeda'];


                        $sql_compara = "SELECT valor_moeda FROM `tb_historico_v_moeda` WHERE `id_moeda` = '$id_moeda' ORDER BY `hora_atual` DESC LIMIT 2";
                        $resultado_compara = mysqli_query($conexao,$sql_compara);
                        $valor1 = mysqli_fetch_array($resultado_compara);
                        $valor2 = mysqli_fetch_array($resultado_compara);
                        if ($valor1 > $valor2) {
                            $cor = "green";
                            $sinal = "↑";
                        } 
                        elseif ($valor1 < $valor2) {
                            $cor = "red";
                            $sinal = "↓";
                        }
                        else{
                            $cor = "black";
                            $sinal = "-";
                        }
                        
                        
                        echo "<div class='col-sm'>";
                        echo "<div class='card mb-3' style='width: 13rem;'>";
                        echo            " <img src='$imagem' class='card-img-top'>";
                        echo           " <div class='card-body'>";
                        echo               "<h5 class='card-title'> $nome_moeda</h5>";
                        echo               "<p class='card-text' style = 'color : $cor'>$valor_moeda_fixo $sinal</p>" ;
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