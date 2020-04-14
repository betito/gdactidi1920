<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<TITLE>GDACT</TITLE>    
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/tabela.css"/>
    <link rel="stylesheet" href="css/formulario.css"/>
       <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

     
</head>
<body>

<?php

// variáveis do avaliador
$nm = $_GET['lin'];

 $conexao = mysql_connect("ENEREÇOBD", "LOGIN", "SENHA") or die (mysql_error ());

 $bd = mysql_select_db("gdact", $conexao) or die(mysql_error());

 mysql_set_charset('UTF8', $conexao);
 $strSQL = "SELECT * FROM avaliacao order by nome asc";

 $strSQL1 = "SELECT * FROM periodo";

  // Executa a query (o recordset $rs contém o resultado da query)
 $rs = mysql_query($strSQL, $conexao);
 
 $num = mysql_num_rows($rs);
 

 $rs7 = mysql_query($strSQL1, $conexao);
 $row7 = mysql_fetch_array($rs7);
 $num7 = mysql_num_rows($rs7);



$unid = $row["unidade"];
$sigla = $row["sigla"];
$siape = $row["siape"];
$nomeaval = $row["nomeaval"];
$perc = $row["perc"];

$dataentc = $row7["dataentc"];
$datafech = $row7["datafetch"];
$dataent = $row7["dataent"];
$datafec = $row7["datafec"];
$ciclo= $row7["ciclo"];
$sigla= $row7["sigla"];

$nomef = "Nenhum";
$nomeavalf = "Nenhum";
$cont = 0;



echo '<center>';
echo'<table style="width: 980px; heigth: 90px; margin-left: 80px;" class="tabela-mod center" >';
echo'<tr>';
echo'<th style="width: 980px; text-align: center; font-size: 14pt;" colspan="7">AVALIADORES/PERCENTUAL E PONTOS ATRIBUÍDOS</th>';
echo'</tr>';
                    
echo '<tr>';
                   
echo '<td><strong><center><label>NOME</strong></td>';
echo '<td><strong><center><label>MATRÍCULA SIAPE</Strong></td>';
echo '<td><center><label>PERCENTUAL FINAL</td>';
echo '<td><strong><center><label>PONTUA&ccedil;&atilde;O FINAL GDACT INDIVIDUAL</Strong></td>';
echo '</tr>';

 while($row = mysql_fetch_assoc($rs)){
     $nome = $row["nome"];
     $siape = $row["siape"];
     $perc = $row["percfinal"];
     $pontos = $row["pontos"];
     $opcao1 = $row["opcao"];
     $nomeaval = $row["nomeaval"];

     if($nomef <>$nome){
        $nomef = $nome;

    echo '<tr>';

 echo '<td>' .$nomef. '</td>';

 echo '<td><center>' .$siape. '</center></td>';






 echo '<td><center><strong>'.$perc.'%</center></strong></td>';

   

 echo '<td><center><strong>'.$pontos.'</center></strong></td>';

 
 echo '</tr>';
     
 }}

echo '</table>';


?>


           <center> <a href="#" onClick="window.print();">[Imprimir Dados]</a><center>
            <BR>
        </center>
        </form>  </div>

          <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
                   </strong>
        <div style="float: right; margin-right: 40px;">
             <a href='javascript:window.history.go(-1)' style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> voltar</a></center><br><br><br>"
        </div>

    </footer>
