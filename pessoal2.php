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

    <link rel="stylesheet" type="text/css" href="css/formulario.css">

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>


    <?php

$nm = $_GET['lin'];


  // Seleciona o Banco de Dados
  $bd = mysql_select_db("gdact", $conexao) or die(mysql_error());

  mysql_set_charset('UTF8', $conexao);
  $strSQL = "SELECT * FROM avaliado WHERE nome = '$nm'";

  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($strSQL, $conexao);
  $row = mysql_fetch_array($rs);
  $num = mysql_num_rows($rs);

 

$nome = $row["nome"];
$unid = $row["unid_org"];
$sigla = $row["sigla_org"];
$siape = $row["siape"];
$cargo = $row["cargo"];
$ramal = $row["ramal"];
$email = $row["email"];
$grupo = $row["grupo"];
$sit = $row["Situacao"];
$nome1 = $row["nome"];
$subord = $row["subordinacao"];
$tipo = $row["tipo"];


?>

    <div class="conteudo">
        <h1  class="nome" style="width: 575px;">Altera&ccedil;&atilde;o de Dados de Servidores - GDACT</h1>

  

        <br><br>

        
        <h3 style="text-align: center;" class="center" >
            &Aacute;REA DE ATUALIZA&ccedil;&atilde;O DE DADOS DO <span style="color: forestgreen; text-shadow: 1px 1px 2px rgba(0,0,0,.4);">SERVIDOR</span> PARA AVALIA&Ccedil;&Atilde;O
        </h3>  
        
        <br>

        <form id="cadastro" class="center" method="post" action="alt_pessoal2.php" enctype="multipart/form-data">

              <input type="text" name="grupo" id="grupo" size="40" value="<?php echo $grupo; ?>" style="display:none"> <br>
              <input type="text" name="nome1" id="nome1" size="40" value="<?php echo $nome1; ?>" style="display:none"> <br>
            
             <p>

                <label for="nome">
                    <strong>Grupo de Avalia&ccedil;&atilde;o:</strong>&nbsp;&nbsp;<?php echo $grupo;?>
                  
                </label>               
            </p>
 <br>
             <p>
                <label for="nome">
                    <strong>Nome do Servidor:</strong>
                </label>
                <input required="" type="text" name="nome" id="nome" size="40" value="<?php echo $nome; ?>">
            </p>
            <br/>
            <p>
                <label for="tipo">
                    <strong>Tipo do Servidor (Servidor ou Chefia Imediata):</strong>
                </label>
                <input required="" type="text" name="tipo" id="tipo" size="20" value="<?=$tipo;?>">
            </p>

            <br>
                 <p>
                <label for="unid_org">
                    <strong> Unidade Organizacional:</strong>
                </label>
                <input autofocus=""  type="text" name="unid_org" id="unid_org" size="40" value="<?php echo $unid; ?>"><br>
            </p>

            <br>

                <p>
                <label for="sigla_org">
                    <strong>Sigla da Unidade Organizacional:</strong>
                </label>
               <input type="text" name="sigla_org" id="sigla_org" size="7" value="<?php echo $sigla; ?>"><br>
            </p>

            <br>
            <p>
                <label for="subord">
                    <strong>Subordinado &agrave; qual coordena&ccedil;&atilde;o (SIGLA):</strong>
                </label>
                <input type="text" name="subord" id="subord" size="20" value="<?=$subord; ?>">
            </p>
            <br/>

            <p>
                <label for="siape">
                    <strong>Matr&iacute;cula SIAPE:</strong>
                </label>
                <input required="" type="text" name="siape" id="siape" size="15"  value="<?php echo $siape; ?>">
            </p>

            <br>
            
            <p>
                <label for="cargo">
                    <strong>Cargo Efetivo:</strong>
                </label>
                <input type="text" name="cargo" id="cargo" size="20" value="<?php echo $cargo; ?>">
            </p>

            <br>

                <p>
                <label for="ramal">
                    <strong>Ramal:</strong>
                </label>
                <input type="text" name="ramal" id="ramal" size="60" value="<?php echo $ramal; ?>">
            </p>

            <br>

                <p>
                <label for="email">
                    <strong>Email:</strong>
                </label>
                <input type="text" name="email" id="email" size="40" value="<?php echo $email; ?>">
            </p>
            <br>

            <p>
                <label for="nome">
                    <strong>Sitiua&ccedil;&atilde;o do Servidor:</strong>
                </label>
                <select required="" name="situacao" id="situacao">
                    <option selected><?php echo $sit;?></option>
                    <option>Ativo</option>
                    <option>Impedido</option>
                </select>
               
            </p>
 <br>

            <br>

            <input class="but but-primary center" style=" width: 125px; box-shadow: 1px 1px 3px rgba(0,0,0,.4); border-radius: 4px; margin: auto; display: block;" type="submit" value="ATUALIZAR" id="Atualizar">

          


        </form>
    </div>


    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
                   </strong>
        <div style="float: right; margin-right: 40px;">
             <a href='javascript:window.history.go(-1)' style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> voltar</a></center><br><br><br>"
        </div>

    </footer>
</div>
</body>
</html>