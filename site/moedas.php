<?php
    require_once 'conexao.php';
    require_once 'porcentagem_aleatoria.php';
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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
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

        
 
    <div>
        Moedas em Destasque 
    </div>
    <br> <br> 
    

<div>
<?php
        $mais_menos = 0;
        $sql = "SELECT * FROM tb_moeda";
        $resultado = mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)){
                $id_moeda = $row['id_moeda'];
                $valor_moeda_fixo = $row['valor_moeda_fixo'];
                $sigla = $row['sigla_moeda'];
                if (rand(0,100) == 100) {
                  $porcentagem_aleatoria = $vetor_de_porcentagens_maior_que_dois_porcento[rand(0,24)];

                }else {
                  $porcentagem_aleatoria = $vetor_de_porcentagens_menor_que_dois_porcento[rand(0,82)];
                }
                while ($mais_menos == 0) {
                  $mais_menos = rand(-1,1);
                }
                
                $calculo_valor_atual_moeda = $valor_moeda_fixo + $mais_menos * ($valor_moeda_fixo * $porcentagem_aleatoria) ;
                $nome_moeda = $row['nome_moeda'];
                
                echo $nome_moeda . "<br>";
                echo "R$ " . $calculo_valor_atual_moeda . "<br> ";
                echo $sigla . "<br><br>";
                echo"<form action='inspecionar_moeda.php'>
                    
                    <input type='hidden' name='id_moeda' value='$id_moeda'>
                    <input type='hidden' name='ispc_local' value='moedas'>
                    <button class='btn btn-outline-success'>inspecionar</button>
                  </form>
                  
                  "
                ?>
                    

                    <br><br>
                  <?php
                
            }
        }
    ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>