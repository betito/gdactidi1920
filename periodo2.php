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


 $dtc1 = $_POST["dataentc"];
 $dth1 = $_POST["datafetch"];
 $dataent1 = $_POST["dataent"];
 $dtf1 = $_POST["datafec"];
 $cc = $_POST["ciclo"];
 $id = $_POST["id"];
 $dtgs1 = $_POST["dategrpstart"];
 $dtge1 = $_POST["dategrpend"];
 $dtas1 = $_POST["dateavalstart"];
 $dtae1 = $_POST["dateavalend"];

 $dtgs = date('d/m/Y', strtotime($dtgs1));
 $dtge = date('d/m/Y', strtotime($dtge1));
 $dtas = date('d/m/Y', strtotime($dtas1));
 $dtae = date('d/m/Y', strtotime($dtae1));

echo ("Data grupos :: $dtgs - $dtge <br/>");
echo ("Data aval :: $dtas - $dtae <br/>");

$query = "UPDATE periodo SET dategrpstart = '$dtgs', dategrpend= '$dtge', dateavalstart = '$dtas', dateavalend = '$dtae' where id = '$id'";

if(mysql_query($query,$conexao)){
    echo "<br><br><center><b>A Atualiza&ccedil;&atilde;o foi Realizada com Sucesso!</b><br><br></center>"; 
    echo "<center><a href='painelrh.php'>Clique aqui para voltar</a></center><br><br><br>";
}else{
    echo "<br><br><center><b>Houve algum erro ao realizar a a&ccedil&atilde;o!</b><br><br></center>"; 
    echo "<center><a href='painelrh.php'>Clique aqui para voltar</a></center><br><br><br>";
}

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
            <a class="link" href="painelrh.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Voltar</a>
        </div>
    </footer>
</div>
</body>

