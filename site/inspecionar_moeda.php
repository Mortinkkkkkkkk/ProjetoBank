<?php
session_start();
require_once 'altera_valor_moeda.php';
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
                    <?php
                    $local = $_GET['ispc_local'];
                    if ($local == 'pesquisa') {
                        $id_moeda = $_GET['id_moeda'];
                        $nome_sigla_moeda_pesquisada = $_GET['moeda_pesquisada'];
                        $opcoes_de_pesquisa = $_GET['opcao_pesquisada'];
                       echo"<form action='pesquisa_por_moedas.php'>
                            <input name='opcoes_de_pesquisa' type='hidden' 
                            value='$opcoes_de_pesquisa'>
                            <input name='nome_sigla_moeda_pesquisada' type='hidden' 
                            value='$nome_sigla_moeda_pesquisada'>
                            <button class='btn btn-outline-success' type='submit'>  
                                Voltar
                            </button>";
                    }
                    elseif ($local == 'moedas') {
                        

                    }
                    ?>
                          
                          <div class='col-sm'>
                          
                            <form action='moedas.php'>
                                
                                <button class='btn btn-outline-success' type='submit'>  
                                    Voltar
                                </button>
                                </div>
                  </form>
                          <div class='col-sm'>
                      <form action='compra_de_moeda.php' method='post'>
                      <input type='hidden' name='id_moeda' value='<?php echo $id_moeda; ?>'>
                      <button type='submit' class='btn btn-outline-success'>Comprar</button>
                      </form>
                      </div>


</div>


</div>
</div>
</div>

<?php
  
  
  //conexao com o banco

  $id_moeda = $_GET['id_moeda'];
  $sql = "SELECT * FROM `tb_historico_v_moeda` WHERE `id_moeda` = '$id_moeda' ORDER BY `id_moeda`, `id_valor` DESC LIMIT 15";
  $sqlmoeda = "SELECT * FROM tb_moeda WHERE id_moeda = '$id_moeda'";
  $horagrafico = [];
  $valorgrafico = [];

  $resultado = mysqli_query($conexao,$sql);
  if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_array($resultado)){
      global $datagrafico, $valorgrafico;
      $valor = $linha['valor_moeda'];
      $hora = $linha['hora_atual'];
      array_push($valorgrafico, $valor);
      array_push($horagrafico, $hora);
    }
  }
  $resultmoeda = mysqli_query($conexao,$sqlmoeda);
  $linhamoeda = mysqli_fetch_array($resultmoeda);
  $nome_moeda_grafico = $linhamoeda['nome_moeda'];
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php
      // array_reverse = inverte a array :O
        $horagrafico = array_reverse($horagrafico);
        $valorgrafico = array_reverse($valorgrafico);
        echo  "function drawChart() {
          var data = google.visualization.arrayToDataTable([
                ['Data', '$nome_moeda_grafico'],";
        for ($x = 0 ; $x < count($horagrafico);$x++){
          echo "['$horagrafico[$x]',".$valorgrafico[$x]."],";
        }
      echo "]);";
        
      ?>
        var options = {
          title: 'Grafico atual Da moeda',
          colors: ['#c1f5c2'],
          series: {
            0: { color: '#2d912f'}
          },
          animation: {
            duration: 500,
            easing: 'out',
            startup: true
          },
          hAxis: {title: 'Data',  titleTextStyle: {color: '#333'},format: 'percent'},
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      <?php echo"}";?>
    </script>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
    
    <form action="insera_carrinho.php" method="post">
      <input type="hidden" name="id_moeda" value="<?php echo $id_moeda; ?>">
      <button type="submit">Comprar</button>
      <input type="number" name="quantidade" value="1"style="width: 50px">
    </form>
    
  </body>
</html>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </body>
</html>