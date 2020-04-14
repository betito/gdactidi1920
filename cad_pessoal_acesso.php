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

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 425px;">Cadastro de Servidores - GDACT</h1>

        <br>

        <?php

$nome = htmlentities($_POST["nome"]);
$unid_org= htmlentities($_POST["unid_org"]);
$sigla_org= htmlentities($_POST["sigla_org"]);
$siape= htmlentities($_POST["siape"]);
$tipo = htmlentities($_POST["tipo"]);
$cargo= htmlentities($_POST["cargo"]);
$ramal = htmlentities($_POST["ramal"]);
$email= htmlentities($_POST["email"]);

// -------------------------------------------


mysql_set_charset('UTF8', $conexao);


$v = new Avaliado();
$v->showCommandFlag = TRUE;
if ($v->checkExistsField("id", $_POST["id"])){

	$v->setDataFromForm($_POST);
	$v->setField("id", $_POST["id"]);
	
	echo ("Caiu aqui");
	
	if($v->updateCad($conexao)){
	    
        echo"<center><img class='center' src='img/icon-check.png'/></center>";
        echo "<center><h2>Atualiza&ccedil;&atildeo do Cadastro do Servidor <strong> <font color=red>" .$nome. " </font> </strong>foi Realizado com Sucesso!</h2></center><br><br>";
        echo "<center><br><a href='cad_pessoal.php'>Clique aqui para voltar.</a></center><br><br><br>";
	    
	}else{

?>
  <div class="alert alert-danger" role="alert">
  	<center>
        <img class='center' src='img/atencao.png'/>
        Cadastro do Servidor n&atilde;o foi Realizado: Este <strong> <font color=red> <?=$siape;?> </font> </strong> j&aacute; existe no banco de dados!<br>
        
        <?=mysql_error($conexao);?> <br/>
        
        <br/><a href='cad_pessoal.php'>Clique aqui para voltar.</a><br><br>
    </center>
  </div>
<?php
	}
}else{

    if ($v->checkSIAPEExists($siape)){
        
        ?>
        <div class="alert alert-danger" role="alert">
        Problema no O Cadastro do Servidor <strong> <font color="red"> <?=$nome;?> </font> </strong>n&atilde;o foi Realizado!<br>
      	<?=mysql_error($conexao);?>

    <?php 
    }else{
        
        $query = "INSERT INTO avaliado (nome, unid_org, sigla_org, siape, tipo, cargo, ramal, email)
        VALUES ('$nome', '$unid_org', '$sigla_org', '$siape', '$tipo' ,'$cargo', '$ramal', '$email')";
        echo ("QUERY:: " . $query."<br/>");
        
        if(mysql_query($query,$conexao)){
            echo"<center><img class='center' src='img/icon-check.png'/></center>";
            echo "<center><h2>O Cadastro do Servidor <strong> <font color=red>" .$nome. " </font> </strong>foi Realizado com Sucesso!</h2></center><br><br>";
            echo "<center><br><a href='cad_pessoal.php'>Clique aqui para voltar.</a></center><br><br><br>";
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
            Problema no Cadastro do Servidor <strong> <font color=red> <?=$nome;?> </font> </strong>n&atilde;o foi Realizado!<br>
      		<?=mysql_error($conexao);?>
      	<?php
        }
    }
}
?>

    <br><br><br>

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="http://www.on.br" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>
