<?php
include_once './internal/dbconnection.php';
include_once './classes/Avaliado.php';
// Conecta com o Banco de Dados

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>GDACT - IDI </title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/tabela.css"/>
    <link rel="stylesheet" href="css/formulario1.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>


       
</head>
<body>

<?php

// variáveis do avaliador
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
$total = $_POST["total"];
$perc = $_POST["perc"];
$periodo = date('Y');

echo $opcao, $unid, $sigla, $siape;

$query = "INSERT INTO avaliacao (periodo, opcao, unidade, sigla, nome, siape, cargo, ramal, email, nomeaval, siapeaval, cargoaval, ramalaval, emailaval, 1a, 1b, 1c, 1d, 1e, 2a, 2b, 2c, 3a, 3b, 3c, 3d, 3e, 4a, 4b, 4c, 4d, 4e, 4f, 5a, 5b, 5c, 5d, 5e, total, perc)
    VALUES ('$periodo', '$opcao', '$unid', '$sigla', '$nome', '$siape', '$cargo', '$ramal', '$email', '$nome1','$siape1','$cargo1','$ramal1','$email1','$a1','$a2','$a3','$a4','$a5','$b1','$b2','$b3','$c1','$c2','$c3','$c4','$c5','$d1','$d2','$d3','$d4','$d5','$d6','$e1', '$e2', '$e3', '$e4', '$e5','$total', '$perc')";

$res = fquery($query);

if ($res){

    echo"<center><img class='center' src='img/icon-check.png'/></center>";
    echo "<center><h2>A avlia&ccedil;&atilde;o do Servidor <strong> <font color=blue>" .$nome. " </font> </strong>foi Realizado com Sucesso!</h2></center><br><br>";
?>        
                  
      <BR>
       <a href="javascript:window.history.go(-2)">
        <span class="botao">
            VOLTAR
        </span>
        <BR><BR>
        
<?php 
} else{
    
    echo"<center><img class='center' src='img/icon-check.png'/></center>";
    echo "<center><h2>A avlia&ccedil;&atilde;o do Servidor <strong> <font color=red>" .$nome. " </font> </strong>houve algum erro no procedimento!</h2></center><br><br>";
    
?>
   <BR>
           <a href="javascript:window.history.go(-2)">
            <span class="botao">
                VOLTAR
            </span>
            <BR><BR>
<?php 

}?>

          <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
                   </strong>
        <div style="float: right; margin-right: 40px;">
             
        </div>

    </footer>
