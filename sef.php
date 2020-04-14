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
        <h3 class="title">GDACT - SAON 1.0</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Lista de Servidores</h1>

       
                 <br>
                  <h2 class="center" style="text-transform: uppercase;">Lista de servidores por grupo de Avalia&ccedil;&atilde;o GDACT</h2>
                 <br> <h2 class="center" style="text-transform: uppercase;">Serviço Financeiro </h2>


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

<blockquote style="text-align:  center; font-style: italic;"><strong>Chefia Imediata:</strong> Evanil Menezes dos Santos</blockquote>
       

        <br>

      <div class="mostra_grupos">
              <?php
        

        

        // query SQL
      mysql_set_charset('UTF8', $conexao);
        $strSQL = "SELECT * FROM avaliado where sigla_org = 'SEF'" ;

        // Executa a query (o recordset $rs contém o resultado da query)
        $rs1 = mysql_query($strSQL, $conexao);
        $rs2 = mysql_query($strSQL, $conexao);
        $rs3 = mysql_query($strSQL, $conexao);
        $rs4 = mysql_query($strSQL, $conexao);
        $rs5 = mysql_query($strSQL, $conexao);
        $rs6 = mysql_query($strSQL, $conexao);
        $rs7 = mysql_query($strSQL, $conexao);
        $rs8 = mysql_query($strSQL, $conexao);
         
        
    // grupo 1
      echo '<br><span class="topic"> Grupo Único</span><hr/><br>';
      while($row1 = mysql_fetch_assoc($rs1)) {
      $grupo =  $row1['grupo'];
             if ($grupo == "1" or $grupo == "Grupo Único") {
                       echo '<!a href="tabela.php?lin='.$row1["nome"].'">' .$row1["nome"]. '</a><br>';
            }
    }

  
    ?>
  </div>

<br><br>

     <center> <a href="#" onClick="window.print();">[Imprimir Dados]</a><center>
            <BR>

        <br>
        <br>


        <a href="javascript:window.history.go(-1)">
            <span class="botao">
                VOLTAR
            </span>
        </a>
<br>
       



        <br>

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
          
        </div>
    </footer>
</div>
</body>

