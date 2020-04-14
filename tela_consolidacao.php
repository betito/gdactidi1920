<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>GDACT - IDI </title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/menu.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>

       <br><br>
                 <h2 class="center" style="text-transform: uppercase;">Área de Visualiza&ccedil;&atilde;o dos Grupos por setor</h2>


        <hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>



        

        <br>

        <nav id="menu" class="center">
            <ul>
                <li><a href="dirc.php"><strong>DIR | <strong></a></li>
                <li><a href="coad.php"><strong>COAD | <strong></a></li>
                <li><a href="coge.php"><strong>COGE | <strong></a></li>
                <li><a href="coaa.php"><strong>COAA | <strong></a></li>
                <li><a href="daed.php"><strong>DAED | <strong></a></li>
                <li><a href="diid.php"><strong>DIID | <strong></a></li>
                <li><a href="dppg.php"><strong>DPPG | <strong></a></li>
                <li><a href="dsho.php"><strong>DSHO | <strong></a></li>
                <li><a href="dtin.php"><strong>DTIN | <strong></a></li>
                <li><a href="sef.php"><strong>SEF | <strong></a></li>
                <li><a href="srh.php"><strong>SRH | <strong></a></li>
                <li><a href="smp.php"><strong>SMP | <strong></a></li>
                <li><a href="sal.php"><strong>SAL | <strong></a></li>

            </ul>
        </nav><br><br>

<hr style="width: 500px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <br>
        <br>


        <a href="gerenciamento.html">
            <span class="botao">
                VOLTAR
            </span>
        </a>
       
<br>
    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.html" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

