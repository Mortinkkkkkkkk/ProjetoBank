<?php
    require_once 'conexao.php';
    $vetor_de_porcentagens_menor_que_dois_porcento = [0.01, 
                                                      0.011, 0.0011, 0.0021 , 0.0031, 0.0041, 0.0051, 0.0061, 0.0071, 0.0081, 0.0091,
                                                      0.012, 0.0012, 0.0022 , 0.0032, 0.0042, 0.0052, 0.0062, 0.0072, 0.0082, 0.0092,
                                                      0.013, 0.0013, 0.0023 , 0.0033, 0.0043, 0.0053, 0.0063, 0.0073, 0.0083, 0.0093,
                                                      0.014, 0.0014, 0.0024 , 0.0034, 0.0044, 0.0054, 0.0064, 0.0074, 0.0084, 0.0094,
                                                      0.015, 0.0015, 0.0025 , 0.0035, 0.0045, 0.0055, 0.0065, 0.0075, 0.0085, 0.0095,
                                                      0.016, 0.0016, 0.0026 , 0.0036, 0.0046, 0.0066, 0.0066, 0.0076, 0.0086, 0.0096,
                                                      0.017, 0.0017, 0.0027 , 0.0037, 0.0047, 0.0067, 0.0067, 0.0077, 0.0087, 0.0097,
                                                      0.018, 0.0018, 0.0028 , 0.0038, 0.0048, 0.0068, 0.0068, 0.0078, 0.0088, 0.0098,
                                                      0.019, 0.0019, 0.0029 , 0.0039, 0.0049, 0.0069, 0.0069, 0.0079, 0.0089, 0.0099,
                                                      0.02];

    

    
        if (!isset($_SESSION['contador'])) {
            $_SESSION['contador'] = 0;
        }
        $_SESSION['contador'] += 1;
        
        if ($_SESSION['contador'] == 10) {
            $_SESSION['contador'] = 0;
            $sql = "SELECT * FROM tb_moeda WHERE moeda_em_destaque = '1'";
            $resultado = mysqli_query($conexao,$sql);
            
            if (mysqli_num_rows($resultado) > 0) {
                while ($linha_tabela_moeda = mysqli_fetch_array($resultado)){
                    $id_moeda = $linha_tabela_moeda['id_moeda'];
                    $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                    $sigla_moeda = $linha_tabela_moeda['sigla_moeda'];
                    $valor_moeda_fixo = $linha_tabela_moeda['valor_moeda_fixo'];
                    
                    
                    $mais_menos = rand(-1,1);
                    
                    $porcentagem_aleatoria = $vetor_de_porcentagens_menor_que_dois_porcento[rand(0,82)];
                    
                    
                    $calculo_valor_atual_moeda = $valor_moeda_fixo + $mais_menos * ($valor_moeda_fixo * $porcentagem_aleatoria) ;
                    $nome_moeda = $linha_tabela_moeda['nome_moeda'];
                    $update_valor_moeda = "UPDATE tb_moeda SET valor_moeda_fixo = $calculo_valor_atual_moeda WHERE id_moeda = $id_moeda" ;
                    $insert_valor_da_moeda_no_historico = "INSERT INTO tb_historico_v_moeda (id_moeda, valor_moeda, hora_atual, data_atual) VALUES ('$id_moeda','$calculo_valor_atual_moeda', '$hora_atual','$data_atual')";
                    mysqli_query($conexao,$insert_valor_da_moeda_no_historico,);
                    mysqli_query($conexao,$update_valor_moeda);
                    
                
            }
        }
    }
?>