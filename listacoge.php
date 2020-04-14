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

        <h1 class="nome" style="width: 325px;">Lista de Servidores</h1>

       
                 <h2 class="center" style="text-transform: uppercase;">Área de Visualiza&ccedil;&atilde;o de dados de servidores para Avalia&ccedil;&atilde;o GDACT</h2>
                 <blockquote style="text-align:  center; font-style: italic;">Clique em seu nome para acessar seu grupo</blockquote>


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

<blockquote style="text-align:  center; font-style: italic;"><strong>COORDENA&ccedil;&atilde;O DE GEOFÍSICA</strong></blockquote>


        

    <center>
      <?php
    

    
    // query SQL
  mysql_set_charset('UTF8', $conexao);
    $strSQL = "SELECT * FROM avaliado order by nome asc" ;

    // Executa a query (o recordset $rs contém o resultado da query)
    $rs = mysql_query($strSQL, $conexao);
    $rs1 = mysql_query($strSQL, $conexao);
    $rs2 = mysql_query($strSQL, $conexao);


while($row2 = mysql_fetch_assoc($rs2)) {

        $sigla = $row2["sigla_org"];
        $tipo = $row2["tipo"];
             if ($sigla == "COGE" and $tipo == "Chefia Imediata") {
            echo ' <blockquote style="text-align:  center; font-style: italic;"> Chefia Imediata: <a href="login.php?lin='.$row2["nome"].'">' .$row2["nome"]. '</a></blockquote>';
}
}



    echo '<table border="1" width="70%">';
 
echo '<tr>';
 
echo '<th bgcolor="#abcdef">Nome</th>';
 
echo '<th bgcolor="#abcdef">Cargo</th>';

echo '<th bgcolor="#abcdef">Sigla Organizacional</th>';
 
echo '</tr>';


        // Loop pelo recordset $rs
    while($row1 = mysql_fetch_assoc($rs1)) {

        $sigla = $row1["sigla_org"];
        $tipo = $row1["tipo"];
        $sit = $row1["Situacao"];
             if ($sigla == "COGE" and $tipo <> "Chefia Imediata" and $sit =="Ativo") {

echo '<tr>';
echo '<td><a href="login.php?lin='.$row1["nome"].'">' .$row1["nome"]. '</td>';
echo '<td><center>'.$row1["cargo"].'</center></td>';
echo '<td><center>'.$row1["sigla_org"].'</center></td>';
 echo '</tr>';
        
}}
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

