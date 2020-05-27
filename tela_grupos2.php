<?php
header('Content-Type: text/html; charset=utf-8');
include_once './internal/dbconnection.php';
include_once './internal/utils.php';
include_once './classes/Avaliado.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>GDACT</title>

<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/cadastrointra-form.css" />
<link rel="stylesheet" href="css/menu.css" />

<meta charset="UTF-8" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<header id="cabecalho">
			<img id="logo" src="img/logo.png"
				alt="Logotipo do Observatório Nacional" />
				<img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
		</header>


		<div class="conteudo">

			<h1 class="nome" style="width: 325px;">Lista de Servidores</h1>


			<h2 class="center" style="text-transform: uppercase;">Área de
				Visualiza&ccedil;&atilde;o de dados de servidores para Avalia&ccedil;&atilde;o GDACT</h2>
			<blockquote style="text-align: center; font-style: italic;">Clique em
				seu nome para acessar seu grupo</blockquote>


			<hr style="width: 300px; margin: auto; display: block;"
				color="#0c3068" size="2" noshade="noshade" />

			<br>

			<div class="mostra_grupos">

<?php

$unid = $_GET["lin"];

if (isset($_GET["lin"])) {

    $sigla_org = $_GET["lin"];

    // query SQL
    mysql_set_charset('UTF8', $conexao);
	$strSQL1 = "SELECT convert(grupo, UNSIGNED INTEGER) as cgrp FROM avaliado where "
		. " sigla_org like '$sigla_org'  or subordinacao like '$sigla_org' "
		. " and Situacao not like 'Impedido' group by grupo order by cgrp asc";

    // Executa a query (o recordset $rs contém o resultado da query)
    $rs1 = mysql_query($strSQL1, $conexao);

    // Loop pelo recordset $rs
    
    while ($row1 = mysql_fetch_assoc($rs1)) {
        
        $grupo = $row1["cgrp"];
		$strSQL2 = "SELECT * FROM avaliado where Situacao not like 'Impedido' and (sigla_org like '$sigla_org' "
			. " or subordinacao like '$sigla_org') "
			. " and grupo like '$grupo' order by nome asc";
        
        $rs2 = mysql_query($strSQL2, $conexao);
        
		if(mysql_num_rows($rs2) > 0){
			echo '<br><span class="topic"> Grupo '.$grupo.'</span><hr/><br>';
			
			while ($row2 = mysql_fetch_assoc($rs2)) {
				
				if (cmpIgual($row2["tipo"], "servidor"))
				{
				?> 
					<!-- <a href="tabela.php?lin=<?=$row2['nome'];?>"><?=$row2["nome"];?></a><br>  -->
					<?=$row2['nome'];?><br>
				<?php 
				}
				if (cmpIgual($row2["tipo"], "chefia imediata"))
				{
				?> 
					<!-- <a href="tabela.php?lin=<?=$row2['nome'];?>"><?=$row2["nome"];?></a><br>  -->
					<?=$row2['nome'];?> <i><span style="color: red;">(Chefia Imediata n@ <b><?=$row2['sigla_org'];?></b>)</span></i><br>
				<?php 
				}

			}
		}
    
    }
    ?>
    
    </div>

			<br>
			<br>

			<center>
				<a href="#" onClick="window.print();">[Imprimir Dados]</a>
			</center>
					<BR> <br> <br> <a href="javascript:window.history.go(-1)"> <span
						class="botao"> VOLTAR </span>
					</a>
    
<?php
} else {
    ?>
    <div>Grupo n&atilde;o encontrado.</div>
    <?php
}

?>
 
 
		
		</div>

		<br> <br> <br>
		<br>
		<br>

		<footer id="rodape">
			<strong> Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
            <?php echo $nome; ?>
        </strong>
			<div style="float: right; margin-right: 40px;"></div>
		</footer>
	</div>
</body>

</html>