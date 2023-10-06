<?php
  require_once "conexao.php";
  $sql = "SELECT valor_moeda FROM tb_historico_v_moedas WHERE id_moeda = '1' ORDER BY id_moeda";

  $data = [];

  $resultado = mysqli_query($conexao,$sql);
  if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_array($resultado)){
      global $data;
      $valor = $linha['valor_moeda'];
      array_push($data, $valor);
    }
  }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php
        echo  "function drawChart() {
          var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales'],";
        for ($x = 0; $x < count($data);$x++){
         echo "['2013', ".$data[$x]."],";
        }
      echo "]);";
        
      ?>
        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 135000}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      <?php echo"}";?>
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </body>
</html>
