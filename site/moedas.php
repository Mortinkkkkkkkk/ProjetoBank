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
    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">Sla</a>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i>Pesquisar</button>  
            
        </form>
    </div>
    </nav>

        
 
    <div>
        Moedas em Destasque 
    </div>
    <br> <br> 
    

<div>
<?php
        $sql = "SELECT * FROM tb_moeda";
        $resultado = mysqli_query($conexao,$sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)){
                $valor_moeda = $row['valor_moeda'];
                $sigla = $row['sigla_moeda'];
                $porcentagem_aleatoria = $vetor_de_porcentagens[rand(0,82)];
                $mais_menos = rand(-1,1);
                if ($mais_menos == 0) {
                    $mais_menos = 1;
                }
                $calculo_valor_atual_moeda = $valor_moeda + $mais_menos * ($valor_moeda * $porcentagem_aleatoria) ;
                $nome_moeda = $row['nome_moeda'];
                
                echo $nome_moeda . "<br>";
                echo $calculo_valor_atual_moeda . "<br> ";
                echo $sigla . "<br><br>";
                
                
            }
        }
    ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>