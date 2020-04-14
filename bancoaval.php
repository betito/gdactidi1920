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

    <link rel="stylesheet" type="text/css" href="css/formulario.css">

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

        <h1 class="nome" style="width: 325px;">Confirma&ccedil;&atilde;o</h1>

       <br>
       <br><br>
                 
                 <blockquote style="text-align:  center; font-style: italic;">Confirma&ccedil;&atilde;o de Envio</blockquote>


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>



        

        <br>
<center>


<?php

// vari&aacute;veis do avaliador
$opcao = $_POST["opcao"];
$nome = $_POST["nome"];
$unid = $_POST["unid_org"];
$sigla = $_POST["sigla_org"];
$siape = $_POST["siape"];
$cargo = $_POST["cargo"];
$ramal = $_POST["ramal"];
$email = $_POST["email"];
$nome1 = $_POST["nome1"];
$siape1 = $_POST["siape1"];
$cargo1 = $_POST["cargo1"];
$ramal1 = $_POST["ramal1"];
$email1 = $_POST["email1"];
$a1 = $_POST["a1"];
$a2 = $_POST["a2"];
$a3 = $_POST["a3"];
$a4 = $_POST["a4"];
$a5 = $_POST["a5"];
$b1 = $_POST["b1"];
$b2 = $_POST["b2"];
$b3 = $_POST["b3"];
$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$c3 = $_POST["c3"];
$c4 = $_POST["c4"];
$c5 = $_POST["c5"];
$d1 = $_POST["d1"];
$d2 = $_POST["d2"];
$d3 = $_POST["d3"];
$d4 = $_POST["d4"];
$d5 = $_POST["d5"];
$d6 = $_POST["d6"];
$e1 = $_POST["e1"];
$e2 = $_POST["e2"];
$e3 = $_POST["e3"];
$e4 = $_POST["e4"];
$e5 = $_POST["e5"];
$tcont = $_POST["cont"];
$ciclo = $_POST["ciclo"];
$total = $_POST["total"];
$perc = $_POST["perc"];
$periodo = date('Y');



if(!$conexao) die ("Erro de conex&atilde;o com localhost, o seguinte erro ocorreu -> ".mysql_error());

mysql_set_charset('UTF8', $conexao);

$strSQL = "SELECT * FROM avaliacao where nome = '$nome' and nomeaval = '$nome1'";
$rs = mysql_query($strSQL, $conexao);
$row = mysql_fetch_array($rs);

$num_rows = mysql_num_rows($rs);

$strSQL1 = "SELECT * FROM avaliacao where nomeaval = '$nome1'";
$rs1 = mysql_query($strSQL1, $conexao);
$row1= mysql_fetch_array($rs1);
$num_rows1 = mysql_num_rows($rs1);


if (cmpIgual($opcao, $autoaval) and $num_rows1 < $tcont) {
   echo "<center><h2><font color = 'red'>ATEN&Ccedil;&Atilde;O!</font><br><br> <br>N&atilde;o ser&aacute; poss&iacute;vel fazer sua autoavalia&ccedil;&atilde;o, enquanto todos os seus <strong>pares</strong> n&atilde;o forem avaliados,<br> por favor retorne e termine  seu processo de Avalia&ccedil;&atilde;o!</h2></center><br><br>";
}else {

$num_rows = mysql_num_rows($rs);

if ($num_rows <> 0) {
  echo "<center><h2>N&atilde;o podemos continuar com o processo, pois a avalia&ccedil;&atilde;o do servidor<strong> <font color=red>".$nome." </font> </strong>j&aacute; foi entregue!</h2></center><br><br>";
  
}else{

    $query = "INSERT INTO avaliacao (periodo, opcao, unidade, sigla, nome, siape, cargo, ramal, email, nomeaval, siapeaval, cargoaval, ramalaval, emailaval, 1a, 1b, 1c, 1d, 1e, 2a, 2b, 2c, 3a, 3b, 3c, 3d, 3e, 4a, 4b, 4c, 4d, 4e, 4f, 5a, 5b, 5c, 5d, 5e, total, perc, ciclo)
    VALUES ('$periodo', '$opcao', '$unid', '$sigla', '$nome', '$siape', '$cargo', '$ramal', '$email', '$nome1','$siape1','$cargo1','$ramal1','$email1','$a1','$a2','$a3','$a4','$a5','$b1','$b2','$b3','$c1','$c2','$c3','$c4','$c5','$d1','$d2','$d3','$d4','$d5','$d6','$e1', '$e2', '$e3', '$e4', '$e5','$total', '$perc', '$ciclo')";

    echo ($query . "<br/>");
    
    if(mysql_query($query,$conexao)){

        echo "<center><h2>A Avalia&ccedil;&atilde;o do Servidor <strong> <font color=red>".$nome." </font> </strong>foi Realizado com Sucesso!</h2></center><br><br>";
    }else{
        echo "ERROR: ". mysql_error($conexao);
    }

}}
?>  

          <BR>
           <a href="javascript:window.history.go(-3)">
            
            <span class="botao">
                VOLTAR
            </span>
            <BR><BR>
        </form>
          </div>


     <br>

   

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
                  </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>
