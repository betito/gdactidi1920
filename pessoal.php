<?php
header('Content-Type: text/html; charset=utf8');
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


    <?php

$nm = $_GET['lin'];

  //mysql_set_charset('UTF8', $conexao);
  $strSQL = "SELECT * FROM avaliado WHERE nome = '$nm'";

  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($strSQL, $conexao);
  $row = mysql_fetch_array($rs);
  $num = mysql_num_rows($rs);

 

$nome = $row["nome"];
$unid = getCoordName($row["sigla_org"]);
$sigla = $row["sigla_org"];
$siape = $row["siape"];
$cargo = $row["cargo"];
$ramal = $row["ramal"];
$email = $row["email"];
$grupo = $row["grupo"];


?>

    <div class="conteudo">
        <h1  class="nome" style="width: 575px;">Altera&ccedil;&atilde;o de Dados de Servidores - GDACT</h1>
        <br><br>

<?php


$strSQL = "SELECT * FROM periodo";
$rs = mysql_query($strSQL, $conexao);
$row = mysql_fetch_array($rs);


$dateTodayBR = date("d/m/Y");
$dateStart = $row["dategrpstart"];
$dateEnd = $row["dategrpend"];
// $dateStart = '14/08/2019';
// $dateEnd = '21/08/2019';

/*$dateTodayBR = date("d/m/Y");
$dateStart = '07/08/2019';
$dateEnd = '13/08/2019';*/
$valid = TRUE;
if (($dateTodayBR >= $dateStart) && ($dateTodayBR <= $dateEnd)) {
   $valid = FALSE;
}

//$valid = FALSE; // comenta essa linha p funcionar tudo.
if($valid){
?>
    <center  style="background-color:yellow; padding:  10px;">
        Hoje: <?=$dateTodayBR;?><br/><br/>
        <b>Per&iacute;odo de ajuste dos grupos: <?=$dateStart;?> &agrave; <?=$dateEnd;?>. Caso seja preciso algum ajuste fora deste per&iacute;odo
        procure &agrave; COGPE.</b>
    </center>
<?php
}else{
?>

        <h3 style="text-align: center;" class="center" >
            ALTERE O GRUPO OU DADOS DO <span style="color: forestgreen; text-shadow: 1px 1px 2px rgba(0,0,0,.4);">SERVIDOR</span> PARA AVALIA&Ccedil;&Atilde;O
        </h3>  
        
        <br>


        <form id="cadastro" class="center" method="post" action="alt_pessoal.php" enctype="multipart/form-data">

             <p>
                <label for="nome">
                    <strong>Escolha aqui o grupo de avalia&ccedil;&atilde;o:</strong>
                </label>
                <select required="" name="grupo" id="grupo">
                    <option selected><?php echo $grupo;?></option>
                    <option>Nenhum Grupo</option>
                    <option>Sem Membros</option>
                    <option>Grupo &Uacute;nico</option>
                    <?php
                    for ($i = 2; $i < 151; $i++){
                    ?>
                    	<option><?=$i;?></option>
                    <?php 
                    }
                    ?>
                </select>
               
            </p>
 <br>
             <p>
                <label for="nome">
                    <strong>Nome do Servidor:</strong>
                </label>
                <input required="" type="text" name="nome" id="nome" size="40" value="<?php echo $nome; ?>" readonly="true">
            </p>

            <br>
                 <p>
                <label for="unid_org">
                    <strong> Unidade Organizacional:</strong>
                </label>
                <input autofocus=""  type="text" name="unid_org" id="unid_org" size="40" value="<?php echo $unid; ?>" readonly="true"><br>
            </p>

            <br>

                <p>
                <label for="sigla_org">
                    <strong>Sigla da Unidade Organizacional:</strong>
                </label>
               <input type="text" name="sigla_org" id="sigla_org" size="7" value="<?php echo $sigla; ?>" readonly="true"><br>
            </p>

             <br>

            <p>
                <label for="siape">
                    <strong>Matrícula SIAPE:</strong>
                </label>
                <input required="" type="text" name="siape" id="siape" size="15"  value="<?php echo $siape; ?>" readonly="true">
            </p>

            <br>
            
            <p>
                <label for="cargo">
                    <strong>  Cargo Efetivo:</strong>
                </label>
                <input type="text" name="cargo" id="cargo" size="20" value="<?php echo $cargo; ?>" readonly="true">
            </p>

            <br>

                <p>
                <label for="ramal">
                    <strong>  Ramal:</strong>
                </label>
                <input type="text" name="ramal" id="ramal" size="7" value="<?php echo $ramal; ?>" readonly="true">
            </p>

            <br>

                <p>
                <label for="email">
                    <strong>  Email:</strong>
                </label>
                <input type="text" name="email" id="email" size="20" value="<?php echo $email; ?>" readonly="true">
            </p>

            <br>

            <input class="but but-primary center" style=" width: 125px; box-shadow: 1px 1px 3px rgba(0,0,0,.4); border-radius: 4px; margin: auto; display: block;" type="submit" value="ATUALIZAR" id="Atualizar">


        </form>
<?php
}
?>

    </div>
    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
                   </strong>
        <div style="float: right; margin-right: 40px;">
             <a href='javascript:window.history.go(-1)' style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> voltar</a></center><br><br><br>
        </div>

    </footer>
</div>
</body>
</html>