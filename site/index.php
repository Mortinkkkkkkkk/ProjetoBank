<?php
session_start();
require_once 'conexao.php';
require_once 'porcentagem_aleatoria.php';
if (isset($_SESSION['logado'])) {
    $conta = "";
    if ($_SESSION["tipo_usuario"] == "funcionario") {
        $criarmoeda = "<form action='criar_moeda.php'>
                Clique <button type='submit'>aqui</button> pra criar moeda
            </form>";
    }
} else {
    $conta = "hidden";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
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
                        </a>
                    </li>
                </ul>

            </div>
    </nav>


    </li>

    </div>
    </nav>


    <div class='mt-5 container'>
        <div class='row'>
            <div class="col-sm"
                style="border-radius: 40px; background-color: #e3f2fd; height: 50px; margin-left: 200px; margin-right: 200px">
                <center>
                    <div>
                        <h1> Moedas em Destasque</h1>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <div>
        <div style="background-color: #e3f2fd">



            <div class='mt-5 container'>
                <div class='row'>
                    <div class="col-sm">

                       
                            <?php



                            # Parte responsável por mostrar apenas moedas em destaque na página moedas{
                            $mais_menos = 0;
                            # Select que mostra apenas as moedas que estão em destaque {
                            $sql = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = '1'";
                            $resultado = mysqli_query($conexao, $sql);
                            #}
                            #Coloca os dados das moedas em destaque dentro de um vetor{
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($linha_tabela_moeda = mysqli_fetch_assoc($resultado)) {
                                    $id_moeda = $linha_tabela_moeda['id_moeda'];
                                    $id_moeda = $linha_tabela_moeda['id_moeda'];
                                    $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                                    $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                                    $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];
                                    #}
                                    # Calculo do valor da moeda de acordo com a porcentagem que foi definida aleatoriamente entre um valor de um vetor{       
                                    $porcentagem_aleatoria = $vetor_de_porcentagens_menor_que_dois_porcento[rand(0, 82)];
                                    while ($mais_menos == 0) {
                                        $mais_menos = rand(-1, 1);
                                    }
                                    $calculo_valor_atual_moeda = $valor_moeda_fixo + $mais_menos * ($valor_moeda_fixo * $porcentagem_aleatoria);
                                    #}
                                    # Update Valor "Fixo" da moeda e Insert do historico {
                                    $update_valor_moeda = "UPDATE tb_moeda SET valor_moeda_fixo = $calculo_valor_atual_moeda WHERE id_moeda = $id_moeda";
                                    $insert_valor_da_moeda_no_historico = "INSERT INTO tb_historico_v_moeda (id_moeda, valor_moeda, hora_atual, data_atual) VALUES ('$id_moeda','$calculo_valor_atual_moeda', '$hora_atual','$data_atual')";
                                    mysqli_query($conexao, $insert_valor_da_moeda_no_historico, );
                                    mysqli_query($conexao, $update_valor_moeda);
                                    #}
                                    # Echo de carrosel {
                            
                                    echo "<div id='carouselExampleCaptions' class='carousel slide'>";
                                    echo "<div class='carousel-indicators'>";
                                    echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0'
                                                class='active' aria-current='true' aria-label='Slide 1'></button>";
                                    echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='1'
                                            aria-label='Slide 2'></button>";
                                    echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='2'
                                            aria-label='Slide 3'></button>";
                                    echo "</div>";
                                    echo " <div class='carousel-inner'>";
                                    echo " <div class='carousel-item active'>";
                                    echo "     <img src='../img/Firefly logo minimalista para um banco digital de criptomoedas com o tema verde 62636.jpg'class='d-block w-100' alt=''>";
                                    echo "     <div class='carousel-caption d-none d-md-block'>";
                                    echo "<h5>$nome_moeda</h5>";
                                    echo "<p>Some representative placeholder content for the first slide.</p>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                   echo "</div>";



                                    #}
                                    #}
                                    ?>
                                    <?php
                                    ?>
                                    <?php
                                    ?>

                                    <br><br>
                                    <?php

                                }
                            }



                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>