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
    <!-- Link de resetador css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link animador (animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Script de icones -->
    <script src="https://kit.fontawesome.com/bc42253982.js" crossorigin="anonymous"></script>

    <title>Document</title>

</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img
                    src="../img/Firefly logo minimalista para um banco digital de criptomoedas com o tema verde 62636.jpg"
                    alt="imagem" height="50px" width="50px" style="border-radius: 40px"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="carteira.php">
                                <button class="btn icon-link-hover" type="submit" <?php echo $logado; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-wallet fa-lg bi"></i> Carteira</button>
                            </form>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="moedas.php">
                                <button type="submit" class="btn icon-link-hover"
                                    style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                    <i class="fa-solid fa-coins fa-lg bi"></i> Moedas</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="login.php">
                                <button type="submit" class="btn icon-link-hover" <?php echo $login; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-user-check fa-lg bi"></i> Login</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <form action="cadastro.php">
                                <button type="submit" class="btn icon-link-hover" <?php echo $login; ?> 
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-user-plus fa-lg bi"></i> Cadastro</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="carrinho.php">
                                <button type="submit" class="btn icon-link-hover"<?php echo $logado; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-cart-shopping fa-lg bi"></i> Carrinho</button>
                            </form>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="logout.php">
                                <button type="submit" class="btn icon-link-hover"<?php echo $logado; ?>
                                style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                <i class="fa-solid fa-arrow-right-from-bracket fa-lg bi"></i> Log-out</button>
                            </form>
                        </a>
                    </li>
                </div>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
    </nav>


    <div id="carousel" class="carousel slide">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

    <?php
        $sql = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $resultado = mysqli_query($conexao,$sql);
        $slide_data_bs = 0;
        $num_slide = 1;
        while ($var_inutiu = mysqli_fetch_row($resultado)) {
            $slide_data_bs += 1;
            $num_slide += 1;
            echo "<button type='button' data-bs-target='#carousel' 
            data-bs-slide-to='$slide_data_bs' 
            aria-label='Slide $num_slide'></button>
            ";
        }
    ?>
    
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/firefly_logo_minimalista_para_um_banco_digital_de_criptomoedas_com_o_tema_verde_62636.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Moedas em Destaque</h5>
        <p></p>
      </div>
    </div>
    
    <?php
        $sql = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = 1";
        $resultado = mysqli_query($conexao,$sql);
        while ($linha_tabela_moeda = mysqli_fetch_array($resultado)) {
                $id_moeda = $linha_tabela_moeda['id_moeda'];
                $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];
                $imagem_fundo = $linha_tabela_moeda['imagem_moeda_fundo'];
                

                $sql_compara = "SELECT valor_moeda FROM `tb_historico_v_moeda` WHERE `id_moeda` = '$id_moeda' ORDER BY `hora_atual` DESC LIMIT 2";

                $resultado_compara = mysqli_query($conexao,$sql_compara);
                $valor1 = mysqli_fetch_array($resultado_compara);
                $valor2 = mysqli_fetch_array($resultado_compara);
                $v_inicial = $valor2['valor_moeda'];
                $v_final = $valor1['valor_moeda'];

                $continha_de_porcentagem = '';

                if ($valor1 > $valor2) {
                    $cor = "green";
                    $sinal = " <i class='fa-solid fa-arrow-up fa-lg'></i> ";
                    $continha_de_porcentagem = round(((($v_inicial - $v_final) / $v_inicial) * 100) ,3) * -1 . '%';
                    
                } 
                elseif ($valor1 < $valor2) {
                    $cor = "red";
                    $sinal = " <i class='fa-solid fa-arrow-down fa-lg'></i> ";
                    $continha_de_porcentagem = round(((($v_inicial - $v_final) / $v_inicial) * 100) ,3) . '%';
                }
                else{
                    $cor = "black";
                    $sinal = " <i class='fa-solid fa-equals fa-lg'></i> ";
                    $continha_de_porcentagem = '';
                }
                
                echo "<div class='carousel-item'>
                <img src='$imagem_fundo' class='d-block w-100' alt='deu certo naun'>
                <div class='carousel-caption d-none d-md-block'>
                  <h5>$nome_moeda</h5>
                  <p style = 'color : $cor'>R$ $valor_moeda_fixo  $sinal $continha_de_porcentagem  </p>
                  <p>$sigla_moeda</p>
                  <form action='inspecionar_moeda.php'>
                          <button class='btn btn-outline-success'><i class='fa-solid fa-magnifying-glass-chart fa-lg'></i> Verificar</button>
                          <input type='hidden' name='id_moeda' value='$id_moeda'>
                          <input type='hidden' name='ispc_local' value='moedas'>
                      </form>
                </div>";

        }
    
    ?>
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>