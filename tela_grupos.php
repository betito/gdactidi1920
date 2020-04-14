<?php
header('Content-Type: text/html; charset=utf-8');
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
    
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

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

    
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>
        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 335px;">Sistema de Avalia&ccedil;&atilde;o</h1>



       <br><br>
                 <h2 class="center" style="text-transform: uppercase;">Área de Visualiza&ccedil;&atilde;o de Servidores por Setor</h2>


        <hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <?php


        if(!$conexao) die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

       $strSQL = "SELECT * FROM periodo";
       $rs = mysql_query($strSQL, $conexao);
       $row = mysql_fetch_array($rs);

       $datafec = $row["datafec"];
       $ciclo= $row["ciclo"];
       $data = date("d/m/Y");

       /*echo ($datafec . "<br/>");
       echo ($datac);

     /*  if ($data > $datafec) {
            header("Location:sucesso.html");
     }*/
  ?>



        <br>
    <div class="menu">
       			<?php

       			$data = new Avaliado();
       			$data->showCommandFlag = FALSE;
       			$list = $data->getDistinctAsArrayAssoc($conexao, "sigla_org");

       			for ($i = 0; $i < count($list); $i++){
   			    ?>
       			    <!-- <li><a href="listall.php?sigla=<?=$list[$i]["attrres"]?>"><strong>| <?=$list[$i]["attrres"]?> </strong></a></li>  -->
       			   <a class="myButton" href="listall.php?sigla=<?=$list[$i]["attrres"]?>"><?=$list[$i]["attrres"]?></a>
   			   <?php
       			}
       			?>

                <!-- <li><a href="listadir.php"><strong>|DIR<strong></a></li>
                <li><a href="listacoad.php"><strong>|COAD<strong></a></li>
                <li><a href="listacoge.php"><strong>|COGE<strong></a></li>
                <li><a href="listacoaa.php"><strong>|COAA<strong></a></li>
                <li><a href="listadaed.php"><strong>|DAED<strong></a></li>
                <li><a href="listadiad.php"><strong>|DIAD<strong></a></li>
                <li><a href="listadiid.php"><strong>|DIID<strong></a></li>
                <li><a href="listadppg.php"><strong>|DPPG<strong></a></li>
                <li><a href="listadsho.php"><strong>|DSHO<strong></a></li>
                <li><a href="listadtin.php"><strong>|DTIN<strong></a></li>
                <li><a href="listasef.php"><strong>|SEF<strong></a></li>
                <li><a href="listasrh.php"><strong>|SRH<strong></a></li>
                <li><a href="listasmp.php"><strong>|SMP<strong></a></li>
                <li><a href="listasal.php"><strong>|SAL<strong></a></li>
                -->

	</div><br><br>

	<hr style="width: 500px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

    <br><br>
        <a href="index.php">
            <span class="botao">VOLTAR</span>
        </a>

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
            <?php echo $nome; ?>
        </strong>

    </footer>
</div>
</body>
