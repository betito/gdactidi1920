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

        <h1 class="nome" style="width: 325px;">Relatório GDACT</h1>

       
                 <h2 class="center" style="text-transform: uppercase;">Relatório GDACT</h2>
                 


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

<blockquote style="text-align:  center; font-style: italic;"><strong>Recursos Humanos</strong></blockquote>


        

       <center>
      <?php
    

    
    // query SQL
  mysql_set_charset('UTF8', $conexao);
    $strSQL = "SELECT * FROM avaliacao where opcao = 'Autoavalia&ccedil;&atilde;o' order by nomeaval asc";

    // Executa a query (o recordset $rs contém o resultado da query)
    $rs = mysql_query($strSQL, $conexao);
    $rs1 = mysql_query($strSQL, $conexao);
    $rs2 = mysql_query($strSQL, $conexao);




echo '<table border="1" width="70%">';
 
echo '<tr>';
 
echo '<th bgcolor="#abcdef">Nome</th>';
 
echo '<th bgcolor="#abcdef">Cargo</th>';

echo '<th bgcolor="#abcdef">Sigla Organizacional</th>';
 
echo '</tr>';


        // Loop pelo recordset $rs
    while($row = mysql_fetch_assoc($rs)) {
                              
echo '<tr>';
echo '<td>'.$row["nomeaval"]. '</td>';
echo '<td><center>'.$row["cargo"].'</center></td>';
echo '<td><center>'.$row["sigla"].'</center></td>';
 echo '</tr>';
        
}
echo '</table>';
      
?>
        <br>


        
        <br>


        <a href="index.php">
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

