<?php 
include_once './internal/dbconnection.php';
include_once './classes/Avaliado.php';

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

<style>
.myButton {
	-moz-box-shadow: 0px 10px 14px -7px #276873;
	-webkit-box-shadow: 0px 10px 14px -7px #276873;
	box-shadow: 0px 10px 14px -7px #276873;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
	background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
	background-color:#599bb3;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	padding:13px 32px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
	margin: 5px;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
	background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
	background-color:#408c99;
}
.myButton:active {
	position:relative;
	top:1px;
}
.menu {
    width: 960px;

    display: block;
    margin: 0 auto;

}

</style>




<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 335px;">Sistema de Avalia&ccedil;&atilde;o</h1>



       <br><br>
                 <h2 class="center" style="text-transform: uppercase;">Área de Visualiza&ccedil;&atilde;o de Servidores por Setor</h2>


        <hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/><br><br>

        <center> <a href="painelrh.php">
            <span class="botao">
                VOLTAR
            </span>
        </a>


        <?php 
   
        //echo ('aqui 1 <br/>');
       $strSQL = "SELECT * FROM periodo";
       $rs = mysql_query($strSQL, $conexao);
       $row = mysql_fetch_array($rs);

       $datafec = $row["datafec"];
       $ciclo= $row["ciclo"];
       $data = date("d/m/Y");
       /*if ($data > $datafec) {
           header("Location:sucesso.html");
           
    }*/
       
       
       //echo ('aqui 2 <br/>');
  ?>

        

        <br>
        <nav id="menu" class="center">
            <ul>
            <?php
            $data = new Avaliado();
       			$data->showCommandFlag = FALSE;
       			$list = $data->getDistinctAsArrayAssoc($conexao, "sigla_org");

       			for ($i = 0; $i < count($list); $i++){
   			    ?>
       			    <!-- <li><a href="listall.php?sigla=<?=$list[$i]["attrres"]?>"><strong>| <?=$list[$i]["attrres"]?> </strong></a></li>  -->
       			   <a class="myButton" href="tela_grupos2.php?lin=<?=$list[$i]["attrres"]?>"><?=$list[$i]["attrres"]?></a>
   			   <?php
       			}
       			?>
            </ul>
        </nav><br><br>

<hr style="width: 500px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <br>
        <br>
        <br>

       

        
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
        </strong>
        
    </footer>
</div>
</body>

