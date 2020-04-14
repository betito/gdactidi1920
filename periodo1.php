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

        <h1 class="nome" style="width: 335px;">Sistema de Avalia&ccedil;&atilde;o</h1>

       <br><br>
                 <h2 class="center" style="text-transform: uppercase;">Modifica&ccedil;&atilde;o de Período e Ciclo de Avalia&ccedil;&atilde;o</h2>


        <hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

<?php 
$conexao = mysql_connect("ENEREÇOBD", "LOGIN", "SENHA") or die (mysql_error ());

 $bd = mysql_select_db("gdact", $conexao) or die(mysql_error());

 mysql_set_charset('UTF8', $conexao);
 


 $dtc1 = $_POST["dataentc"];
 $dth1 = $_POST["datafetch"];
 $dataent1 = $_POST["dataent"];
 $dtf1 = $_POST["datafec"];
 $cc = $_POST["ciclo"];
 $id = $_POST["id"];


 $dtc = date('d/m/Y', strtotime($dtc1));
 $dth = date('d/m/Y', strtotime($dth1));
 $dataent = date('d/m/Y', strtotime($dataent1));
 $dtf = date('d/m/Y', strtotime($dtf1));

$query = "UPDATE periodo SET dataentc = '$dtc', datafetch= '$dth', dataent = '$dataent', datafec = '$dtf', ciclo = '$cc' where id = '$id'";

mysql_query($query,$conexao);
echo "<br><br><center><b>A Atualiza&ccedil;&atilde;o foi Realizada com Sucesso!</b><br><br></center>"; 
echo "<center><a href='painelrh.html'>Clique aqui para voltar</a></center><br><br><br>";

?>

        

       
            
<br>
<hr style="width: 600px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <br>


        
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
          
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="painelrh.html" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Voltar</a>
        </div>
    </footer>
</div>
</body>

