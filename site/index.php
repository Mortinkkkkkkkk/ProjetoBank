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


            
        <nav class="navbar navbar-expand-lg" style="background-color:  #0b6e20; border-radius: 32px 64px; margin-right: 100px; margin-left: 100px">
              
            <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><ion-icon name="wallet-outline" size ="large" style="color: lightgreen;"></ion-icon></a></a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <form action="carteira.php">
                                        <button class="btn text-white icon-link-hover" type="submit" <?php echo $logado; ?>
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
                    </ul>
                </div>
              
                
                
            </div>
        </nav>
        
        
    </li>
    
</div>
</nav>
</div>


</div>
</div>
<div class='mt-5 container'>
    <div class='row'>
        <div class="col-sm" style="border-radius: 32px 64px;  background-color: #60f043; height: 50px; margin-left: 200px; margin-right: 200px">
            <div style="background-color:#0b6e20; border-radius: 32px 64px;">
                <center>
                    <div>
                        <h1 class="text-white"> Bem-vindo ao Futuro Financeiro!</h1>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>
    <div class='mt-5 container'>
        <div class='row'>
            <div class="col-sm"style="border-radius: 32px 64px;  background-color: #0b6e20; margin-left: 20px; margin-right: 20px">
            <div style="border-radius: 32px 64px;  background-color: #60f043; margin-left: 20px; margin-right: 20px; margin-top: 20px">
                <div class="fw-light fs-4 text-center" style="margin-left: 20px; margin-right: 20px ; margin-bottom: 20px">Em nosso banco digital de criptomoedas, embarque em uma jornada além das fronteiras convencionais da moeda. Aqui, a inovação é a nossa moeda corrente, e a liberdade financeira é o nosso destino.</div>
            </div>
            </div>
            <div class="col-sm"style="border-radius: 32px 64px;  background-color:#0b6e20; margin-left: 20px; margin-right: 20px">
            <div  style="border-radius: 32px 64px;  background-color: #60f043; margin-left: 10px; margin-right: 10px; margin-top: 20px">
                <div class="fw-light fs-4 text-center" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px ">Imagine um mundo onde o seu poder de transacionar está completamente nas suas mãos. Com um toque, você acessa um universo de possibilidades financeiras sem limites geográficos, sem intermediários, sem fronteiras.</div>
            </div>
            </div>
            <div class="col-sm" style="border-radius: 32px 64px;  background-color:#0b6e20; margin-left: 20px; margin-right: 20px">
            <div  style="border-radius: 32px 64px;  background-color: #60f043; margin-left: 10px; margin-right: 10px; margin-top: 20px; margin-bottom: 0px ">
                <div class="fw-light fs-4 text-center" style="margin-left: 20px; margin-right: 20px ; margin-bottom: 20px"> Utilizamos tecnologia de ponta, garantindo a proteção dos seus ativos, proporcionando tranquilidade para explorar as infinitas oportunidades que as criptomoedas oferecem.

Aqui, a revolução financeira é uma realidade, e você é parte dela. </div>
            </div>
                </div>

    <div class='mt-5 container'>
        <div class='row'>
        <div class="col-sm" style="border-radius: 32px 64px;  background-color: #60f043; height: 50px; margin-left: 200px; margin-right: 200px">
            <div style="background-color:#0b6e20; border-radius: 32px 64px;">
                <center>
                    <div>
                        <h1 class="text-white">Moedas em Destaque</h1>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>

    
<br><br>
<div class='mt-5 container'>
      <div class='row'>
<?php
      
  
# Parte responsável por mostrar apenas moedas em destaque na página moedas{
        $mais_menos = 0;
# Select que mostra apenas as moedas que estão em destaque {
        $sql = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = '1'";
        $resultado = mysqli_query($conexao,$sql);
#}
#Coloca os dados das moedas em destaque dentro de um vetor{
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha_tabela_moeda = mysqli_fetch_array($resultado)){
                $id_moeda = $linha_tabela_moeda['id_moeda'];
                $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];

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
                echo "<div class='card mb-3' style='width: 13rem; border-color: green'>";
                echo            " <img src='./img/ethereum.jpg' class='card-img-top'>";
                echo           " <div class='card-body'>";
                echo               "<h5 class='card-title'> $nome_moeda</h5>";
                echo               "<p class='card-text' style = 'color : $cor'>$valor_moeda_fixo  $sinal $continha_de_porcentagem  </p>" ;
                echo                   "<p class='card-text'>$sigla_moeda</p>" ;       
                echo "<form action='inspecionar_moeda.php'>
                          <button class='btn btn-outline-success'>Verificar</button>
                          <input type='hidden' name='id_moeda' value='$id_moeda'>
                          <input type='hidden' name='ispc_local' value='moedas'>
                      </form>
                      <br><br>
                              ";
                echo           "</div>" ;
                echo           "</div>";
                echo           "</div>";
                

                ?>
               

                  <?php
                
            }
        }

        
        
    ?>
          </div>
            </div>
    </div>
    </div>
    </div>



                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
      <script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
<br><br><br>
</body>

</html>