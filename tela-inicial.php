<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Portaria - SAL</title>

    <link rel="stylesheet" href="css/style.css"/>
    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>
        <h3 class="title">Divisão de Tecnologia da Informa&ccedil;&atilde;o - DTIN</h3>
    </header>

    <div class="conteudo">
        <h1 class="nome" style="width: 39%;">Controle de Entrada e Saída</h1>


        <section id="meio">


            <figure id="placa" class="selecao">
                <a href="placa.php?lin=<?php echo $nome; ?>">
                    <img src="img/icon-placa-peq.png" alt="Imagem da Placa."/>
                </a>
                <figcaption>Registrar Placa</figcaption>
            </figure>

            <figure class="selecao">
                <a href="nome.php?lin=<?php echo $nome; ?>">
                    <img src="img/icon-driver.jpg" alt="Imagem do Motorista."/>
                </a>
                <figcaption>Registrar Condutor</figcaption>
            </figure>

            <figure id="visitante" class="selecao">
                <a href="visitantes.html?lin=<?php echo $nome; ?>">
                    <img src="img/icon-visitante.ico" alt="Imagem do Visitante"/>
                </a>
                <figcaption>Registrar Visitante</figcaption>
            </figure>

        </section>
    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
        </strong>

<!--        <strong>  --><?php //echo $nome; ?><!-- </strong>&nbsp|&nbsp-->

        <div style="float: right; margin-right: 40px;">
            <a class="link" href="http://www.on.br" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>
</html>