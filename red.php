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

    <link rel="stylesheet" type="text/css" href="css/formulario.css">

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>


    <?php

$siape= $_POST['siape'];
$senha = $_POST['senha'];
$senha1 = $_POST['senha1'];


  mysql_set_charset('UTF8', $conexao);
  $strSQL = "SELECT * FROM avaliado WHERE siape = '$siape' order by nome asc";
  
  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($strSQL, $conexao);
  $row = mysql_fetch_array($rs);
   
  $num = mysql_num_rows($rs);

// confirma&ccedil;&atilde;o para ver se já foi avaliado
   

$senha_atual = $row["senha"];


if ($num == 0) {
    header("Location: falha2.php");   
} 

if ($senha_atual <> "2017") {
    header("Location: falha1.php");   
}

$query = "UPDATE avaliado SET senha='$senha1' WHERE siape= '$siape'";
mysql_query($query,$conexao);
echo "<br><br><center><img src='img/icon-check.png'></center>";
echo  "<br><center><h1 class='sucesso'>Sua senha foi Alterada com Sucesso!</h1></center>";
echo  "<br><center><a href='index.php'>Clique aqui para Retornar</center>";

?>
    
    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
                   </strong>
        <div style="float: right; margin-right: 40px;">
             
        </div>

    </footer>
</div>
</body>
</html>