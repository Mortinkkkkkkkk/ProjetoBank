<?php
    session_start();
    require_once 'conexao.php';
    require_once 'porcentagem_aleatoria.php';
    $botao_de_editar = "<input type='hidden'>";
    
    if (isset($_SESSION["tipo_usuario"])) {
      if ($_SESSION["tipo_usuario"] == 'funcionario') {
        $botao_de_editar ="
        <form action='cle'>
        <button type='submit'>adicionar moeda em destaque</button>
        </form>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
<nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="#" alt="imagem" height="50px" width="50px"></a>
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
                        <a class="nav-link"> <form action="logout.php">
         <button type="submit"class="btn">Log-out</button>
    </form></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current ="page">
    <form action="moedas.php" >
          <button type="submit" class="btn">Moedas</button>
              
    </form></a>
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
      
    echo "$botao_de_editar";
  
# Parte responsável por mostrar apenas moedas em destaque na página moedas{
        $mais_menos = 0;
# Select que mostra apenas as moedas que estão em destaque {
        $sql = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = '1'";
        $resultado = mysqli_query($conexao,$sql);
#}
#Coloca os dados das moedas em destaque dentro de um vetor{
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha_tabela_moeda = mysqli_fetch_assoc($resultado)){
                $id_moeda = $linha_tabela_moeda['id_moeda'];
                $id_moeda = $linha_tabela_moeda['id_moeda'];
                $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];
#}
# Calculo do valor da moeda de acordo com a porcentagem que foi definida aleatoriamente entre um valor de um vetor{       
                $porcentagem_aleatoria = $vetor_de_porcentagens_menor_que_dois_porcento[rand(0,82)];
                while ($mais_menos == 0) {
                  $mais_menos = rand(-1,1);
                }
                $calculo_valor_atual_moeda = $valor_moeda_fixo + $mais_menos * ($valor_moeda_fixo * $porcentagem_aleatoria) ;
#}
# Update Valor "Fixo" da moeda e Insert do historico {
                $update_valor_moeda = "UPDATE tb_moeda SET valor_moeda_fixo = $calculo_valor_atual_moeda WHERE id_moeda = $id_moeda" ;
                $insert_valor_da_moeda_no_historico = "INSERT INTO tb_historico_v_moeda (id_moeda, valor_moeda, hora_atual, data_atual) VALUES ('$id_moeda','$calculo_valor_atual_moeda', '$hora_atual','$data_atual')";
                mysqli_query($conexao,$insert_valor_da_moeda_no_historico,);
                mysqli_query($conexao,$update_valor_moeda);
#}
# Echo de carrosel {
                echo $nome_moeda . "<br>";
                echo "R$ " . $calculo_valor_atual_moeda . "<br> ";


                echo $sigla_moeda . "<br><br>";
                echo"<form action='inspecionar_moeda.php'>
                    <input type='hidden' name='id_moeda' value='$id_moeda'>
                    <input type='hidden' name='ispc_local' value='moedas'>
                    <button class='btn btn-outline-success'>inspecionar</button>
                  </form>
                ";
                
                  
                    
              
    #}
  #}
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