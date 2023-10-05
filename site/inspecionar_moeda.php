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
        
        <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="#" alt="imagem" height="50px" width="50px"></a>
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
            
                    <?php
                    if ($local == 'pesquisa') {
                        $id_moeda = $_GET['id_moeda'];
                        $nome_sigla_moeda_pesquisada = $_GET['moeda_pesquisada'];
                        $opcao_pesquisada = $_GET['opcao_pesquisada'];
                       echo"<form action='pesquisa_por_moedas.php'>
                            <select name='opcoes_de_pesquisa' id='' class='btn btn-outline-primary'>
                                <option value='nome'>Nome</option>
                                <option value='sigla'>Sigla</option>
                                
                            </select>
                            <input name='nome_sigla_moeda_pesquisada' type='hidden' 
                            class='btn  m-2' 
                            style=background-color: #2bcc48 value='$nome_sigla_moeda_pesquisada'>
                            <button class='btn btn-outline-success' type='submit'>  
                                Voltar
                            </button>";
                    }
                    elseif ($local == 'moedas') {
                        echo"<form action='moedas.php'>
                            <select name='opcoes_de_pesquisa' id='' class='btn btn-outline-primary'>
                                <option value='nome'>Nome</option>
                                <option value='sigla'>Sigla</option>
                                
                            </select>
                            <button class='btn btn-outline-success' type='submit'>  
                                Voltar
                            </button>";
                    }
                    
                    
                    
                    ?>
                    
              
        </form>
        
      </div>
    </div>
  </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </body>
</html>