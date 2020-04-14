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
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>

       <br><br>
                 <h2 class="center" style="text-transform: uppercase;">&Aacute;rea de Gerenciamento de Chefia Imediata</h2>


        <hr style="width: 900px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>



<?php

$nm = $_POST['usuario'];
$email = $_POST['email'];
$senha1 = $_POST['senha'];

   
$strSQL = "SELECT * FROM avaliado WHERE nome = '$nm' order by nome asc";

// Executa a query (o recordset $rs contém o resultado da query)
$rs10 = mysql_query($strSQL, $conexao);
$row10 = mysql_fetch_array($rs10);
$nome = $row10["nome"];
$senha = $row10["senha"];

// echo ( "SENHA: $senha1 <br/>" );
// echo ( "USER : $email <br/>" );

if ($senha <> $senha1) {
//if (!(doLogin($email, $senha1))) {
    //header("Location: falha.php");   
    echo ("CAIU NO  ERRRO");
    
}
?>
        

        <br>

<?php 
$unid = _POST["sigla"];

  echo '  <table border="0" align="center" width="60%">';          
        echo '<tr>';
        echo '<td width="20%"><center><a href="tela_grupos2.php?lin=' .$unid.'"><img src="img/visualizar.png" border="0" width="100%"><br></a>Visualizar Grupos</center></td>';
        echo '<td width="20%"><center><a href="consolidacaoadm.php?lin2=' .$unid.'"><img src="img/tabela.jpg" border="0" width="100%"><br></a>Consolida&ccedil;&atilde;o dos Dados</center></td>';
        echo '<td width="20%"><center><a href="pesq_aval_coord.php?lin2=' .$unid.'"><img src="img/pesquisa.jpg" border="0" width="100%"><br></a>Pesquisa Individual</center></td>';
        echo '<td width="20%"><center><a href="relatorio_coord.php?lin2=' .$unid.'"><img src="img/relat.jpg" border="0" width="100%"><br></a>Relatório de Finalizados</center></td>';
        echo '</table>';

              
?>
            
       <br><br>

<hr style="width: 800px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>

        <br>

        <h3 class="center" style="text-transform: uppercase;">Lista para altera&ccedil;&atilde;o de Grupos</h3>

       

        <?php

        $unid = $_POST["sigla"];
       
   
    // query SQL
    $strSQL = "SELECT * FROM avaliado WHERE sigla_org like '$unid' or subordinacao like '$unid' order by nome asc" ;

    // Executa a query (o recordset $rs contém o resultado da query)
    $rs = mysql_query($strSQL, $conexao);
    $rs1 = mysql_query($strSQL, $conexao);
    $rs2 = mysql_query($strSQL, $conexao);



  // Loop pelo recordset $rs
    while($row2 = mysql_fetch_assoc($rs2)) {
        
      
        $tipo = $row2["tipo"];
        $sit = $row2["Situacao"];
        $sigla = $row2["sigla_org"];
        $vis = $row2["visivel"];
        if ($tipo == "Chefia Imediata" and $sit == "Ativo" and $sigla == "$unid" and $vis == "1") {

echo "<center><strong><font color='red'>" .$row2["nome"]. "</strong></font> - <em><strong>CHEFIA IMEDIATA</strong></em></center> <br><br>";

    }
    
}


    echo '<center><table border="1" width="70%">';
 
echo '<tr>';
 
echo '<th bgcolor="#abcdef">Nome</th>';
 
echo '<th bgcolor="#abcdef">Cargo</th>';

echo '<th bgcolor="#abcdef">Sigla Organizacional</th>';
 
echo '</tr>';

        // Loop pelo recordset $rs
    while($row1 = mysql_fetch_assoc($rs1)) {

        $tipo = $row1["tipo"] ;
        $sit = $row1["Situacao"];
        $sigla1 = $row1["subordinacao"];

        if ($tipo == "Chefia Imediata" and $sigla1 == "$unid" and (strcasecmp($sit,"Ativo")==0)) {
echo '<tr>';
echo '<td><a href="pessoal.php?lin='.$row1["nome"].'">' .$row1["nome"]. '</td>';
echo '<td><center>'.$row1["cargo"].'</center></td>';
echo '<td><center>'.$row1["sigla_org"].'</center></td>';
 echo '</tr>';
        }elseif ($tipo <> "Chefia Imediata" and (strcasecmp($sit,"Ativo")==0)) {
echo '<tr>';
echo '<td><a href="pessoal.php?lin='.$row1["nome"].'">' .$row1["nome"]. '</td>';
echo '<td><center>'.$row1["cargo"].'</center></td>';
echo '<td><center>'.$row1["sigla_org"].'</center></td>';
 echo '</tr>';
    }
    
}
echo '</table>';
      
?>


        
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a> &mdash;
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

