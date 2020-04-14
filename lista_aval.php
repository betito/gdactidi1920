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
                 <blockquote style="text-align:  center; font-style: italic;">Clique no nome para acessar a avalia&ccedil;&atilde;o</blockquote>


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

             
<center>
      <?php

      $nm = $_GET['lin'];

      echo '<blockquote style="text-align:  center; font-style: italic;"><strong>'.$nm.'</strong></blockquote>';
    

    
    // query SQL
  mysql_set_charset('UTF8', $conexao);
    $strSQL = "SELECT * FROM avaliacao where nome='$nm' order by nomeaval asc" ;

    // Executa a query (o recordset $rs contém o resultado da query)
    $rs = mysql_query($strSQL, $conexao);
    $rs1 = mysql_query($strSQL, $conexao);

    echo '<br><table border="1" width="70%">';
 
echo '<tr>';
 
echo '<th bgcolor="#abcdef">Nome do Avaliador</th>';
 
echo '<th bgcolor="#abcdef">Cargo</th>';

echo '<th bgcolor="#abcdef">Sigla Organizacionl</th>';

echo '<th bgcolor="#abcdef">Percentual</th>';
 
echo '</tr>';


        // Loop pelo recordset $rs
    while($row = mysql_fetch_assoc($rs)) {

        $nomeaval = $row["nomeaval"];
        $siape = $row["cargo"];
        $cargo = $row["sigla"];
        $nome = $row["nome"];
        $perc = $row["perc"];

if ($nome == $nm) {
   

echo '<tr>';
echo '<td>'.$row["nomeaval"].'</td>';
echo '<td><center>'.$row["cargo"].'</center></td>';
echo '<td><center>'.$row["sigla"].'</center></td>';
echo '<td><center><font color="red"><strong>'.$row["perc"].'%</strong></font></center></td>';
 echo '</tr>';
      
      //echo '<td><a href="resumo.php?lin='.$row["nomeaval"].'">' .$row["nomeaval"]. '</td>';  
}}
echo '</table>';

echo '<form method ="Post" action="resumo.php">';

echo '<input type="text" name="nome" id="nome" value="'.$nm.'" style="display:none;">';

echo '<br><br><strong>Detalhamento da Avalia&ccedil;&atilde;o Individual:</strong>&nbsp;&nbsp;<select name="nomeaval" id="nomeaval">';
echo '<option> Selecione um nome </option>';
 while($row = mysql_fetch_assoc($rs1)) {

echo '<option>' .$row["nomeaval"]. '</option>';
}
echo '</select>';

echo '&nbsp;&nbsp;<input type="submit" value="Visualizar"><br><br>';
echo '<form>';
      
?>
        <br>


        
        <br>


        <a href="painelrh.php">
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
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
           
        </div>
    </footer>
</div>
</body>

