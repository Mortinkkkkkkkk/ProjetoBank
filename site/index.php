<?php
    session_start();
    if (isset($_SESSION['logado'])) {
        $conta = "";
        if ($_SESSION["tipo_usuario"] == "funcionario"){
            $criarmoeda = "<form action='criar_moeda.php'>
                Clique <button type='submit'>aqui</button> pra criar moeda
            </form>";
        }
    }else{
        $conta = "hidden";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="conta.php">
        <div <?php echo $conta; ?>>Clique <button type="submit">aqui</button></div>
    </form><br><br>
    <form action="moedas.php" >
        Clique   <button type="submit" >aqui</button>
        para ver as moedas        
    </form><br><br>
        clique <a href="carteira.php">aqui</a> para acessar a carteira
    <form action="logout.php"><br><br>
        clique <button type="submit">Aqui</button> para deslogar
    </form><br><br>
    <?php if (isset($criarmoeda)) { echo $criarmoeda;} ?>
</body>
</html>