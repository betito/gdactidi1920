<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>GDACT</title>

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
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 335px;">Sistema de Avalia&ccedil;&atilde;o</h1>

       <br><br>
                 <h2 class="center" style="text-transform: uppercase;">Painel de Controle - SRH</h2>


        <hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <br>

               <table border="0" align="center" width="88%">  
               <tr><td><center><a href="lista2.php"><img src="img/dado.png" border="0" width="40%"><br></a><br>Dados de Servidores</center></td>          
               <td><center><a href="periodo.php"><img src="img/alterar.png" border="0" width="40%"><br></a><br>Modifica&ccedil;&atilde;o Per&iacute;odos</center></td>
               <td><center> <a href="tela_grupos3.php"><img src="img/visualizar.png" border="0" width="45%"><br></a>Visualiza&ccedil;&atilde;o dos Grupos</center></td>
               <td><center> <a href="pesq_aval.php"><img src="img/pesquisa.jpg" border="0" width="45%"><br></a>Avalia&ccedil;&atilde;o Individual</center></td>
              <!-- <td><center> <a href="relatorio.php"><img src="img/relatorio.jpg" border="0" width="45%"><br></a>Relatório Geral</center></td>-->
              <td><center> <a href="relatoriofinal.php"><img src="img/relatorio.jpg" border="0" width="45%"><br></a>Relat&oacute;rio Geral</center></td>
               <td><center><a href="consolidacao.php"><img src="img/tabela.jpg" border="0" width="75"><br></a>Lista das Consolida&ccedil;&otilde;es</center></td>
               <td><center><a href="relatorio_pendentes.php"><img src="img/check.png" border="0" width="75"><br></a>Pend&ecirc;ncias</center></td>
               </table>

            
       <br><br>

<hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <br>


        
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COGPE-COTIN/INPA</a>
            <?=$nome;?>
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

