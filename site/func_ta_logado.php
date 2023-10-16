<?php
    session_start();
    if ($_SESSION["tipo_usuario"] != "funcionario") {
        header('location: login.html');
        exit();
    }
    
?>