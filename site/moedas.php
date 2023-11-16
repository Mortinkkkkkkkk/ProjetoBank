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

    require_once 'altera_valor_moeda.php';
    $botao_de_editar = "<input type='hidden'>";
    $botao_de_cadastrar = "<input type='hidden'>";

    if (isset($_SESSION["tipo_usuario"])) {
    if ($_SESSION["tipo_usuario"] == 'funcionario') {
        $botao_de_editar ="
        <a href='alterar_moedas.php?id_moeda_edit=0&edicao=desabilitada' 
            class='btn btn-outline-success icon-link-hover' 
            style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' >
                <i class='fa-regular fa-pen-to-square fa-lg bi'></i> Alterar
        </a>
        ";
        $botao_de_cadastrar ="
        <a href='cadastro_moedas_form.php' class='btn btn-outline-success icon-link-hover'
        style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);'>
            <i class='fa-solid fa-plus fa-lg bi'></i> Cadastrar
        </a>
        ";
            

    }
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link de resetador css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link animador (animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Script de icones -->
    <script src="https://kit.fontawesome.com/bc42253982.js" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color:  #0b6e20; border-radius: 32px 64px; margin-right: 100px; margin-left: 100px">
              
              <div class="container-fluid">
                      <a class="navbar-brand icon-link-hover" style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;' href="index.php"><i class="fa-solid fa-building-columns fa-lg bi" style="color: #ffffff;"></i></a>
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
                                  <button type="submit" class="btn  text-white icon-link-hover "
                                      style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                      <i class="fa-solid fa-coins fa-lg bi"></i> Moedas</button>                                        
                                      </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page">
                              <form action="login.php">
                                  <button type="submit" class="btn text-white icon-link-hover" <?php echo $login; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-user-check fa-lg bi"></i> Login</button>
                              </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page">
                              <form action="cadastro.php">
                                  <button type="submit" class="btn text-white icon-link-hover" <?php echo $login; ?> 
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-user-plus fa-lg bi"></i> Cadastro</button>
                              </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link">
                              <form action="carrinho.php">
                                  <button type="submit" class="btn text-white icon-link-hover"<?php echo $logado; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-cart-shopping fa-lg bi"></i> Carrinho</button>
                              </form>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link">
                              <form action="logout.php">
                                  <button type="submit" class="btn text-white icon-link-hover"<?php echo $logado; ?>
                                  style='--bs-icon-link-transform: translate3d(0, -.125rem, 0); color: black; border: 0px;'>
                                  <i class="fa-solid fa-arrow-right-from-bracket fa-lg bi"></i> Log-out</button>
                              </form>
                          </a>
                      </li>
                </div>
                <li class="nav-item" style="list-style: none;">
                <form  action="pesquisa_por_moedas.php">
                    <select name="opcoes_de_pesquisa" id="" class="btn btn-outline-light">
                        <option value="nome"> Nome</option>
                        <option value="sigla">Sigla</option>
                    </select>
                    <input name="nome_sigla_moeda_pesquisada" type="text" class="btn  m-2 " placeholder="Digite aqui..." style="background-color: white">
                    <button class="btn btn-outline-light" type="submit">  
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i> Pesquisar
                    </button>
                </form>
            </li>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
    </nav>

        
 
        <div class='mt-5 container'>
      <div class='row'>
      <div class="col-sm"> <h1> Moedas</h1></div> 



   </div>
    

<div>

    <?php

    echo"
    $botao_de_editar $botao_de_cadastrar
        <div class='mt-5 container'>
            <div class='row'>";
     
  
# Parte responsável por mostrar apenas moedas em destaque na página moedas{
        $mais_menos = 0;
# Select que mostra apenas as moedas que estão em destaque {
        $sql = "SELECT * FROM tb_moeda";
        $resultado = mysqli_query($conexao,$sql);
#}
#Coloca os dados das moedas em destaque dentro de um vetor{
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha_tabela_moeda = mysqli_fetch_array($resultado)){
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

                

                echo "<div class='col-sm'>";
                echo "<div class='card mb-3' style='margin: 0; padding: 0; width: 250px; heigth: 900px;'>";
                echo            " <img src='$imagem' style='width: 175px; heigth: 200px' class='card-img-top'>";
                echo           " <div class='card-body'>";
                echo               "<h5 class='card-title'> $nome_moeda</h5>";
                echo               "<p class='card-text' style = 'color : $cor'>R$ $valor_moeda_fixo  $sinal $continha_de_porcentagem  </p>" ;
                echo                   "<p class='card-text'>$sigla_moeda</p>" ;       
                echo "<form action='inspecionar_moeda.php'>
                          <button class='btn btn-outline-success'><i class='fa-solid fa-magnifying-glass-chart fa-lg'></i> Verificar</button>
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

    <script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
      <script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>