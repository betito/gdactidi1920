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

  $strSQL = "SELECT * FROM periodo";
 $rs = mysql_query($strSQL, $conexao);
 $row = mysql_fetch_array($rs);

 $dtc = date("Y-m-d", strtotime($row["dataentc"]));
 $dth = date("Y-m-d", strtotime($row["datafetch"]));
 $dte = date("Y-m-d", strtotime($row["dataent"]));
 $dtf = date("Y-m-d", strtotime($row["datafec"]));
 $dtgs = prepareDate($row["dategrpstart"]);
 $dtge = prepareDate($row["dategrpend"]);
 $dtas = prepareDate($row["dateavalstart"]);
 $dtae = prepareDate($row["dateavalend"]);
 
 $cc = $row["ciclo"];
 $id = $row["id"];
?>

        

        <br>
<form id="periodo" action="periodo1.php" method="post">
      <table border="0" align="center" width="55%">  
                <tr><td><input type="text" name="id" id="id" value="<?php echo $id;?>" style="display: none;"></tr></td>
               <tr><td><center>Ciclo de Avalia&ccedil;&atilde;o:&nbsp; <input type="date" name="dataentc" id="dataentc" value="<?php echo $dtc;?>" >  &nbsp;a &nbsp;&nbsp; <input type="date" name="datafetch" id="datafetch" value="<?php echo $dth;?>"><br><br>
               Periodo de Avalia&ccedil;&atilde;o:&nbsp; <input type="date" name="dataent" id="dataent" value="<?php echo $dte;?>">&nbsp; a &nbsp; <input type="date" name="datafec" id="datafec" value="<?php echo $dtf;?>"> <br><br>
               Ciclo:&nbsp; <input type="text" name="ciclo" id="ciclo" value="<?php echo $cc;?>" size="2">
               <br><br><center><input type="submit" value="ALTERAR"></td></tr>
               </table>
</form>

<p>
    <h2 class="center font12" style="text-transform: uppercase;"><b>Alterar per&iacute;odos de cadastro de grupos e avalia&ccedil;&atilde;o.<br/></b></h2>
</p>

<form id="periodo" action="periodo2.php" method="post">
    <table border="0" align="center" width="55%">  
        <tr><td><input type="text" name="id" id="id" value="<?=$id;?>" style="display: none;"></tr></td>
        <tr><td>Periodo de Cria&ccedil;&atilde;o de grupos:
            <input type="date" name="dategrpstart" id="dategrpstart" value="<?=$dtgs;?>">&nbsp; a &nbsp; 
            <input type="date" name="dategrpend" id="dategrpend" value="<?=$dtge;?>"> <br><br></td></tr>
        <tr><td>Periodo de Avalia&ccedil;&atilde;o:&nbsp; 
            <input type="date" name="dateavalstart" id="dateavalstart" value="<?=$dtas;?>">&nbsp; a &nbsp; 
            <input type="date" name="dateavalend" id="dateavalend" value="<?=$dtae;?>"> <br><br></td></tr>
        <tr><td><br><br><center><input type="submit" value="ALTERAR"></td></tr>
    </table>
</form>



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

