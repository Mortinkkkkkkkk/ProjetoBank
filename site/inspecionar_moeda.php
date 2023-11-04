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
        <?php
            
            $local = $_GET['ispc_local'];
        ?>
        
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
            
                    <?php
                    if ($local == 'pesquisa') {
                        $id_moeda = $_GET['id_moeda'];
                        $nome_sigla_moeda_pesquisada = $_GET['moeda_pesquisada'];
                        $opcoes_de_pesquisa = $_GET['opcoes_de_pesquisa'];
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
                      echo "<div class='mt-5 container'>";
                      echo "<div row'>";
                        echo"<form action='moedas.php'>
                            
                            <button class='btn btn-outline-success' type='submit'>  
                                Voltar
                            </button>";
                            echo "</div>";
                            echo "</div>";

                    }
                    
                    
                    
                    ?>
                    
              
        </form>
        
      </div>
    </div>
  </nav>
 
  <?php
  //conexao com o banco
  require_once "conexao.php";
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
  </body>
</html>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </body>
</html>