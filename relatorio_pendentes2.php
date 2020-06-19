<?php 
include_once './internal/dbconnection.php';
include_once './internal/utils.php';
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
    <style>
    
    .collapse {
        border-collapse: collapse;
    }

    .pcell {
        padding: 5px;
        border: 1px solid gray;
        color: red;
    }
    
    </style>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Relat&oacute;rio GDACT</h1>

       
                 <h2 class="center" style="text-transform: uppercase;">Relat&oacute;rio de Pendentes - GDACT- IDI</h2>
                 


        <hr style="width: 300px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

       <center>
       <br/>

<a href="javascript:window.history.go(-1)">
    <span class="botao">
        VOLTAR
    </span>
</a>
<br/>


<?php

      
    $strSQL1 = "select av.sigla_org as sigla, count(av.sigla_org) as ctotal "
        . " from avaliado av where "
        . " av.siape not in ( "
        . " select cast(a.siape as unsigned) "
        . " from avaliacao a "
        . " where a.opcao like 'auto%') "
        . " and av.Situacao not like 'impedido' "
        . " group by sigla "
        . " order by ctotal desc";
    $rs = mysql_query($strSQL1, $conexao);
    $num_rows = mysql_num_rows($rs);

        ?>    

<br/>
<table border="1" width="30%">
 
    <tr>
        <th bgcolor="#abcdef">Coord</th>
        <th bgcolor="#abcdef">Total</th>
    </tr>
<?php
    while ($res = mysql_fetch_assoc($rs)) {
    
?>
    <tr>
        <td><center><?=$res["sigla"]; ?></center></td>
        <td><center><?=$res["ctotal"]; ?></center></td>
    </tr>
 <?php
    }
?>
</table>


<br/>

<?php

      
    $strSQL1 = "select av.sigla_org as sigla, av.nome as nome, av.cargo as cargo, av.email as email"
        . " from avaliado av where "
        . " av.siape not in ( "
        . " select cast(a.siape as unsigned) "
        . " from avaliacao a "
        . " where a.opcao like 'auto%') "
        . " and av.Situacao not like 'impedido' "
        . " order by av.sigla_org, av.nome;";
    $rs = mysql_query($strSQL1, $conexao);
    $num_rows = mysql_num_rows($rs);

        ?>    

<br/>
<table border="1" width="90%">
 
    <tr>
        <th bgcolor="#abcdef">Coord</th>
        <th bgcolor="#abcdef">Nome</th>
        <th bgcolor="#abcdef">Cargo</th>
        <th bgcolor="#abcdef">Email</th>
    </tr>
<?php
    while ($res = mysql_fetch_assoc($rs)) {
    
?>
    <tr>
        <td><center><?=$res["sigla"]; ?></center></td>
        <td><?=$res["nome"]; ?></td>
        <td><center><?=$res["cargo"]; ?></center></td>
        <td><center><?=$res["email"]; ?></center></td>
    </tr>
 <?php
    }
?>
</table>

<br/><br/>


<a href="javascript:window.history.go(-1)">
    <span class="botao">
        VOLTAR
    </span>
</a>
<br>

</div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
        </strong>
        <div style="float: right; margin-right: 40px;">
            
        </div>
    </footer>
</div>
</body>
</html>