<?php 
include_once './internal/dbconnection.php';
include_once './internal/utils.php';
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
    <style>
    
    .collapse {
        border-collapse: collapse;
    }

    .pcell {
        padding: 5px;
        border: 1px solid gray;
        color: red;
    }
    
    </style>

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


        <br/><br/>       

       <center>
      <?php

      $unid = $_GET["lin2"];
      
    $strSQL = "SELECT * FROM avaliacao where opcao like '$autoaval' and (sigla like '$unid' order by nomeaval asc";
    $strSQL1 = "SELECT * FROM avaliado where sigla_org like '$unid' and lower(Situacao) like 'ativo'";
    $strSQL2 = "SELECT * FROM avaliado av where av.sigla_org like '$unid' and lower(Situacao) like 'ativo' and "
        . " nome not in (select nome from avaliacao where opcao like 'autoavaliacao')";

$rs = mysql_query($strSQL, $conexao);
$rs1 = mysql_query($strSQL1, $conexao);
$rs2 = mysql_query($strSQL2, $conexao);

$num_rows = mysql_num_rows($rs);
$num_rows1 = mysql_num_rows($rs1);
$dif = $num_rows1 - $num_rows;

if($dif ==0){
    echo "<FONT COLOR='RED'><STRONG>AVALIA&Ccedil;&Atilde;O DESTA UNIDADE J&Aacute; ENCERRADA!!</STRONG></FONT>";
}else{
    echo ' FALTAM AINDA  <font color="red"><strong>' .$dif. '  </strong></font>PARA FECHAR A AVALIA&Ccedil;&Atilde;O DA  <font color="red"><strong>' .$unid. '</strong></font>';}
?>     

<br/><br/>

<table class="collapse">
    <?php
    while($row = mysql_fetch_assoc($rs2)) {
    ?>
    <tr class="collapse">
        <td class="collapse pcell">
            <?=$row["nome"];?>
        </td>
        <td class="collapse pcell">
            <?=$row["cargo"];?>
        </td>
    </tr>
    <?php
    }
    ?>


</table>
      


<blockquote style="text-align:  center; font-style: italic;"><strong>Lista das avalia&ccedil;&otilde;es Fechadas</strong></blockquote>


        <br>



<?php    
echo '<table border="1" width="70%">';
 
echo '<tr>';

echo '<th bgcolor="#abcdef" colspan="3"><h2>' .$unid. ' </h2></th>';

echo '</tr>';

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
echo '</table><br><br><br>';
?>


        
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

