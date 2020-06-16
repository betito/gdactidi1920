<?php
header('Content-Type: text/html; charset=utf8');
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

$nm = $_POST['usuario'];
$email1 = $_POST['email'];
$senha1 = $_POST['senha'];


$valida = "SELECT * FROM avaliado WHERE senha = '$senha1'";
  $strSQL = "SELECT * FROM avaliado WHERE email like '$email1%' and nome = '$nm' order by nome asc";
  $strSQL1 = "SELECT * FROM avaliado order by nome asc";
  $strSQL2 = "SELECT * FROM avaliado where lower(Situacao) not like 'impedido' order by nome asc";
  $strSQL4 = "SELECT * FROM avaliado order by nome asc";
  $strSQL5 = "SELECT * FROM avaliado order by nome asc";
  
//  echo ($strSQL."<br/>");

  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($strSQL, $conexao);
  $rs1 = mysql_query($strSQL1, $conexao);
  $rs2 = mysql_query($strSQL2, $conexao);
  $rs3 = mysql_query($strSQL2, $conexao);
  $rs5 = mysql_query($strSQL5, $conexao);
  
  $row = mysql_fetch_array($rs);
  $row1 = mysql_fetch_array($rs1);
  $row2 = mysql_fetch_array($rs2);
  $row3 = mysql_fetch_array($rs3);
 $row5 = mysql_fetch_array($rs5);
  
  $num = mysql_num_rows($rs);

// confirma&ccedil;&atilde;o para ver se já foi avaliado
   $rs4 = mysql_query($strSQL4, $conexao);
   $row4 = mysql_fetch_array($rs4);

  



 /*mysql_query("SET character_set_connection=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_results=utf8");*/


$nome = $row["nome"];
$unid = getCoordName($row["sigla_org"]);
$sigla = $row["sigla_org"];
$siape = $row["siape"];
$cargo = $row["cargo"];
$ramal = $row["ramal"];
$email = $row["email"];
$grupo = $row["grupo"];
$tipo = $row["tipo"];
$senha = $row["senha"];
$siglasubord = $row["subordinacao"];
if((cmpIgual($siglasubord, "") == TRUE) || (cmpIgual($siglasubord, '""') == TRUE) ){
    $siglasubord = $sigla;
}

// echo ("EMAILUSR:: $email <br/> SENHA :: $senha1 <br/>");
// echo ("EMAILBD:: $email1 <br/> $nome <br/>");

if ($grupo == "Nenhum Grupo") {
    header("Location: falhagrupo.php");
}

while($row4 = mysql_fetch_assoc($rs4)) {
    if ($row4["sigla_org"] == $sigla and $row4["tipo"] == $chefimed or $row4["tipo"] == $chefimedesp) {
        $nn = $row4["nome"];
        
    }}
    
// echo (mysql_num_rows($rs)."<br/>");
if ($senha <> $senha1) {
//if (!(doLogin($email1, $senha1)) or (mysql_num_rows($rs) == 0)) {
    header("Location: falha.php");   
}

?>

    <div class="conteudo">
        <h1  class="nome" style="width: 575px;">Altera&ccedil;&atilde;o de Dados de Servidores - GDACT</h1>



        <br><br>

<?php

$strSQL = "SELECT * FROM periodo";
$rs = mysql_query($strSQL, $conexao);
$row = mysql_fetch_array($rs);


$dateStart = $row["dateavalstart"];
$dateEnd = $row["dateavalend"];
$dateTodayBR = new DateTime();
$dateTodayBR->setTime(0,0);
$dateEnd = new DateTime(prepareDate($dateEnd));
$dateStart = new DateTime(prepareDate($dateStart));
// $dateStart = '14/08/2019';
// $dateEnd = '21/08/2019';
$valid = FALSE;
if (($dateTodayBR >= $dateStart) && ($dateTodayBR <= $dateEnd)) {
   $valid = TRUE;
}

var_dump($dateStart);
var_dump($dateEnd);
var_dump($dateTodayBR);
//echo ("START: $dateStart<br/>");
//echo ("END: $dateEnd<br/>");
//echo ("TODAY: $dateTodayBR<br/>");
//$valid = FALSE; // gatilho pro treinamento.
//$valid = TRUE;
if(!$valid){
?>
    <center  style="background-color:yellow; padding:  10px;">
        Hoje: <?=$dateTodayBR->format("d/m/Y");?><br/><br/>
        <b>Per&iacute;odo de avalia&ccedil;&atilde;o: <?=$dateStart->format("d/m/Y");?> &agrave; <?=$dateEnd->format("d/m/Y");?>. Caso seja necess&aacute;rio algum ajuste fora deste per&iacute;odo
        procure &agrave; COGPE.</b>
    </center>

    <?php

        $warning = 'success';
        $fezautoavaliacao = FALSE;
        $avaliouchefe = FALSE;
        $avaliadopelochefe = FALSE;

        // testar se fe autoavaliacao
        $strquery = "SELECT * from avaliacao where sigla like '".$sigla."' and emailaval like '".$email
        . "' and email like '".$email. "' and opcao like 'auto%'";
    
        // echo ($strquery."<br/>");
        $rs3 = mysql_query($strquery, $conexao);
        $num_rows3 = mysql_num_rows($rs3);
    
        //echo ("Chegou aqui.... ".$num_rows. "<br/>");
        if ($num_rows3 == 1) {
            $res3 = mysql_fetch_assoc($rs3);
            $fezautoavaliacao = TRUE;
        }
        
        // pegar se a chefia fez avaliacao do servidor

        // quem eh o chefe

        $strquery = "SELECT * from avaliado where email like '".$email."'";
        $rstmp = mysql_query($strquery, $conexao);
        $num_rowstmp = mysql_num_rows($rstmp);
        // echo("linha 0: ".$strquery."<br/>");
        //if ($num_rowstmp > 0) {
            $restmp = mysql_fetch_assoc($rstmp);
            // var_dump($restmp);
            $chefeemail = $restmp['email'];
            if (cmpIgual($restmp["tipo"], $chefimed) == TRUE || cmpIgual($restmp["tipo"], $chefimedesp)==TRUE) {
                $subord = $restmp['subordinacao'];

                $strquery = "SELECT * from avaliado where sigla_org like '".$subord."' and Situacao like 'ativo' and  tipo like 'chefia%'";
                //echo("linha 1: ".$strquery."<br/>");
                $rstmp = mysql_query($strquery, $conexao);
                $num_rowstmp = mysql_num_rows($rstmp);
    
                if ($num_rowstmp == 1) {
                    $restmp = mysql_fetch_assoc($rstmp);
                    $chefeemail = $restmp['email'];
                }
            } else {
                $strquery = "SELECT * from avaliado where sigla_org like '".$sigla."' and Situacao like 'ativo' and tipo like 'chefia%'";
                // echo("linha 2: ".$strquery."<br/>");
                $rstmp = mysql_query($strquery, $conexao);
                $num_rowstmp = mysql_num_rows($rstmp);
    
                if ($num_rowstmp == 1) {
                    $restmp = mysql_fetch_assoc($rstmp);
                    $chefeemail = $restmp['email'];
                }
            }
        // }

        $strquery = "SELECT * from avaliacao where emailaval like '".$chefeemail
                . "' and email like '".$email."' and opcao like '%chefia%'";

        // echo("CHEF-SERV:".$strquery."<br/>");
        $rs3 = mysql_query($strquery, $conexao);
        $num_rows3 = mysql_num_rows($rs3);

        //echo ("Chegou aqui.... ".$num_rows. "<br/>");
        if ($num_rows3 == 1) {
            $res3 = mysql_fetch_assoc($rs3);
            $avaliadopelochefe = true;
        }

        // pegar se servidor fez a avaliacao da chefia
        $strquery = "SELECT * from avaliacao where email like '".$chefeemail
            . "' and emailaval like '".$email."' and opcao like '%chefia%'";

        // echo ("SERV-CHEF:".$strquery."<br/>");
        $rs4 = mysql_query($strquery, $conexao);
        $num_rows4 = mysql_num_rows($rs4);

        //echo ("Chegou aqui.... ".$num_rows. "<br/>");
        if ($num_rows4 == 1) {
        $res4 = mysql_fetch_assoc($rs4);
            $avaliouchefe = TRUE;
        }

        // validacao dos pares
        $servidorfoiavaliado = array();
        $servidoravaliou = array ();

        $strquery = "SELECT * from avaliado where Situacao like 'ativo' and email like '".$email."'";
        $rstmp = mysql_query($strquery, $conexao);
        $num_rowstmp = mysql_num_rows($rstmp);
        $restmp = mysql_fetch_assoc($rstmp);

        if (cmpIgual($restmp["tipo"], $chefimed) == TRUE || cmpIgual($restmp["tipo"], $chefimedesp)==TRUE) { // caso seja chefe

            $subord = $restmp['subordinacao'];

            $strquery = "SELECT * from avaliado where Situacao like 'ativo' and email not like '".$email."' and (sigla_org like '".$sigla."' or "
                . "  subordinacao like '".$sigla."')";

            $rs4 = mysql_query($strquery, $conexao);

            // echo ("SUBORDS:" . $strquery."<br/>");

            $emailpares = array();
            while ($res4 = mysql_fetch_assoc($rs4)) {
                array_push($emailpares, $res4["email"]);
            }

            // var_dump($emailpares);
            // echo ("<br/>");

            $strquery = "SELECT * from avaliacao where "
                . " emailaval like '".$email. "' order by nome";
            $rs5 = mysql_query($strquery, $conexao);

            // echo ("CHEF - PARES1: ".$strquery."<br/>");
            $rs5 = mysql_query($strquery, $conexao);
            $num_rows5 = mysql_num_rows($rs5);
            
            $chefiaavaliou = array();
            while ($res5 = mysql_fetch_assoc($rs5)) {
                array_push($chefiaavaliou, $res5["email"]);
            }
            
            //var_dump($servidorfoiavaliado);
            //echo ("<br/>");
            
            $strquery = "SELECT * from avaliacao where email like '".$email
            . "' order by nome";
            
            // echo ($strquery."<br/>");
            $rs5 = mysql_query($strquery, $conexao);
            $num_rows5 = mysql_num_rows($rs5);
            $chefiafoiavaliada = array();
            while ($res5 = mysql_fetch_assoc($rs5)) {
                array_push($chefiafoiavaliada, $res5["emailaval"]);
            }

            $pares = true;
            for ($i = 0; $i < count($emailpares); $i++) {
                $tmp = new Avaliado();
                $tmp->retrieveFromDBByAttr("email", $emailpares[$i]);

                // echo(getFirstName($tmp->getField("nome")));
                if (!(in_array($emailpares[$i], $chefiafoiavaliada))) {
                    $pares = false;
                }
                if (!(in_array($emailpares[$i], $chefiaavaliou))) {
                    $pares = false;
                }
            }
        }else{ // caso nao seja chefe


            $strquery = "SELECT * from avaliado where sigla_org like '".$sigla."' and email not like '".$email
                . "' and Situacao like 'ativo' and grupo like '".$grupo. "'";

            $rs4 = mysql_query($strquery, $conexao);

            echo ("NAO CHEFE :: ".$strquery."<br/>");

            $emailpares = array();
            while ($res4 = mysql_fetch_assoc($rs4)) {

                if (cmpIgual($res4["tipo"], $chefimed) == FALSE && cmpIgual($res4["tipo"], $chefimedesp)==FALSE) { // caso seja chefe
                    array_push($emailpares, $res4["email"]);
                }
            }

            // var_dump($emailpares);
            // echo ("<br/>");

            $strquery = "SELECT * from avaliacao where sigla like '".$sigla."' "
                . " and emailaval like '".$email. "' and opcao like '%pares%' order by nome";
            $rs5 = mysql_query($strquery, $conexao);

            //echo ($strSQL4."<br/>");
            $rs5 = mysql_query($strquery, $conexao);
            $num_rows5 = mysql_num_rows($rs5);
            $servidoravaliou = array();
            while ($res5 = mysql_fetch_assoc($rs5)) {
                array_push($servidoravaliou, $res5["email"]);
            }

            $strquery = "SELECT * from avaliacao where sigla like '".$sigla."' and email like '".$email
            . "' and opcao like '%pares%' order by nome";

            // echo ($strquery."<br/>");
            $rs5 = mysql_query($strquery, $conexao);
            $num_rows5 = mysql_num_rows($rs5);
            $servidorfoiavaliado = array();
            while ($res5 = mysql_fetch_assoc($rs5)) {
                array_push($servidorfoiavaliado, $res5["emailaval"]);
            }

            $pares = true;
            for ($i = 0; $i < count($emailpares); $i++) {
                $tmp = new Avaliado();
                $tmp->retrieveFromDBByAttr("email", $emailpares[$i]);

                // echo(getFirstName($tmp->getField("nome")));
                if (!(in_array($emailpares[$i], $servidoravaliou))) {
                    $pares = false;
                }
                if (!(in_array($emailpares[$i], $servidorfoiavaliado))) {
                    $pares = false;
                }
            }
        }

        $warningtitle = 'SEM PEND&Ecirc;NCIA(S)';
        if ($fezautoavaliacao == FALSE || $avaliadopelochefe == FALSE || $avaliouchefe == FALSE || $pares == FALSE){
            $warning = 'warning';
            $warningtitle = 'PEND&Ecirc;NCIA(S)';
        }

    ?>
        <span style="text-align: center;font-size:10pt;">SE VOC&Ecirc; ACABOU DE FAZER UMA AVALIA&Ccedil;&Atilde;O, 
        APERTE <b>F5</b> PARA ATUALIZAR A TABELA DE PEND&Ecirc;NCIAS.</span>

        <br/><br/>
        <!--<center> <strong><font color="red">IMPORTANTE:  Encerramento em 01 de Novembro (HOJE) às 11:00.</font></strong></center> -->
        <br/>

        <div class="alert <?=$warning;?>">
            <span style="text-align: center;"><b><h4><?=$warningtitle;?></h4></b></span>
            <?php
            if ($fezautoavaliacao == FALSE) {
                ?>
                    <p><b>Autoavalia&ccedil;&atilde;o: <span class="redc"><span class="redc">&#x274C;</span></span></b></p>
                <?php
            }else{
            ?>
                <p><b>Autoavalia&ccedil;&atilde;o: <span class="greenc"><span class="greenc">&#x2705;</span></span></b></p>
            <?php
            }
            if ($avaliouchefe == FALSE) {
                ?>
                    <p><b>Avaliou a chefia: <span class="redc">&#x274C;</span></b></p>
                <?php
            }else{
            ?>
                <p><b>Avaliou a chefia: <span class="greenc">&#x2705;</span></b></p>
            <?php
            }
            if ($avaliadopelochefe == FALSE) {
                ?>
                    <p><b>Foi avaliado (a) pela chefia: <span class="redc">&#x274C;</span></b></p>
                <?php
            }else{
            ?>
                <p><b>Foi avaliado (a) pela chefia: <span class="greenc">&#x2705;</span></b></p>
            <?php
            }

            
            ?>

            <table width="100%">
            <tr>
                <th style="text-align:left">PAR</th>
                <th>VOC&Ecirc; AVALIOU</th>
                <th>VOC&Ecirc; FOI AVALIADA (O) POR</th>
            </tr>
            <?php 

                //var_dump($emailpares);
                if (cmpIgual($restmp["tipo"], $chefimed) == TRUE || cmpIgual($restmp["tipo"], $chefimedesp)==TRUE) { // caso seja chefe
                    for ($i = 0; $i < count($emailpares); $i++) {
                    ?>
                    <tr>
                    <?php

                    $tmp = new Avaliado();
                        $tmp->retrieveFromDBByAttr("email", $emailpares[$i]); ?>
                    <td style="text-align: left;">
                    <?php
                    echo(getFirstName($tmp->getField("nome"))); ?>
                    </td>
                    <td style="text-align: center;">
                    
                    <?php
                    if (in_array($emailpares[$i], $chefiaavaliou)) {
                        ?>
                        <b><span class="greenc">&#x2705;</span></b>
                    <?php
                    } else {
                        ?>
                        <b><span class="redc">&#x274C;</span></b>
                    <?php
                    } ?>
                    
                    </td>
                    <td style="text-align: center;">
                    <?php
                    if (in_array($emailpares[$i], $chefiafoiavaliada)) {
                        ?>
                        <b><span class="greenc">&#x2705;</span></b>
                    <?php
                    } else {
                        ?>
                        <b><span class="redc">&#x274C;</span></b>
                    <?php
                    } ?>
                    
                    </td>
                </tr>
                <?php
                    }
                }else{
                    for ($i = 0; $i < count($emailpares); $i++) {
                        ?>
                    <tr>
                    <?php

                    $tmp = new Avaliado();
                    $tmp->retrieveFromDBByAttr("email", $emailpares[$i]); ?>
                    <td style="text-align: left;">
                    <?php
                    echo(getFirstName($tmp->getField("nome"))); ?>
                    </td>
                    <td style="text-align: center;">
                    
                    <?php
                    if (in_array($emailpares[$i], $servidoravaliou)) {
                        ?>
                        <b><span class="greenc">&#x2705;</span></b>
                    <?php
                    } else {
                        ?>
                        <b><span class="redc">&#x274C;</span></b>
                    <?php
                    } ?>
                    
                    </td>
                    <td style="text-align: center;">
                    <?php
                    if (in_array($emailpares[$i], $servidorfoiavaliado)) {
                        ?>
                        <b><span class="greenc">&#x2705;</span></b>
                    <?php
                    } else {
                        ?>
                        <b><span class="redc">&#x274C;</span></b>
                    <?php
                    } ?>
                    
                    </td>
                </tr>
                <?php
                    }
                }
            ?>
            </table>
            <br/><div>A coluna <b>VOC&Ecirc; FOI AVALIADA (O)</b> n&atilde;o depende de voc&ecirc;, depende do seu par.</div>
            <div>O item <b>Foi avaliado(a) pela chefia</b> n&atilde;o depende de voc&ecirc;, depende da sua chefia.</div>
            <br/><b>LEGENDA:</b><br/>
            <div>
                <span class="greenc"><b>&#x2705;</b></span>: Este item est&aacute; OK. <br/>
                <span class="redc">&#x274C;</span>: Este item que deve ser resolvido.
            </div>
        </div>



<?php
}else{
?>


        
        <h3 style="text-align: center;" class="center" >
            DADOS DO  <span style="color: forestgreen; text-shadow: 1px 1px 2px rgba(0,0,0,.4);">AVALIADOR</span> 
        </h3>  
        
        <br>

        <form id="cadastro" class="center" method="post" action="tabela_avaliacao.php" enctype="multipart/form-data">

             <p>
                <label for="nome">
                    <strong>Grupo de avalia&ccedil;&atilde;o:</strong>
                </label>
                <font color="red"><?php if(cmpIgual($tipo, $chefimed) or cmpIgual($tipo, $chefimedesp)) {echo $tipo;} else {echo $grupo;} ?></font>
                               
            </p>

        <!--tipo do avaliador -->    <input required="" type="text" name="tipo1" id="tipo1" size="40" value="<?php echo $tipo; ?>" style="display:none">
 
             <p>
                <label for="nome">
                    <strong>Nome do Servidor:</strong>
                </label>
                <input required="" type="text" name="nome1" id="nome1" size="40" value="<?php echo $nome; ?>" readonly="true">
            </p>

            
                 <p>
                <label for="unid_org">
                    <strong> Unidade Organizacional:</strong>
                </label>
                <input autofocus=""  type="text" name="unid_org1" id="unid_org1" size="40" value="<?php echo $unid; ?>" readonly="true"><br>
            </p>

           

                <p>
                <label for="sigla_org">
                    <strong>Sigla da Unidade Organizacional:</strong>
                </label>
               <input type="text" name="sigla_org1" id="sigla_org1" size="7" value="<?php echo $sigla; ?>" readonly="true"><br>
            </p>

             

            <p>
                <label for="siape">
                    <strong>Matr&iacute;cula SIAPE:</strong>
                </label>
                <input required="" type="text" name="siape1" id="siape1" size="15"  value="<?php echo $siape; ?>" readonly="true">
            </p>

           
            
            <p>
                <label for="cargo">
                    <strong>  Cargo Efetivo:</strong>
                </label>
                <input type="text" name="cargo1" id="cargo1" size="20" value="<?php echo $cargo; ?>" readonly="true">
            </p>

          

                <p>
                <label for="ramal">
                    <strong>  Ramal:</strong>
                </label>
                <input type="text" name="ramal1" id="ramal1" size="7" value="<?php echo $ramal; ?>" readonly="true">
            </p>

         

                <p>
                <label for="email">
                    <strong>  Email:</strong>
                </label>
                <input type="text" name="email1" id="email1" size="20" value="<?php echo $email; ?>" readonly="true">
            </p>

            <br>

            <hr>

<?php

            $warning = 'success';
            $fezautoavaliacao = FALSE;
            $avaliouchefe = FALSE;
            $avaliadopelochefe = FALSE;

            // testar se fe autoavaliacao
            $strquery = "SELECT * from avaliacao where sigla like '".$sigla."' and emailaval like '".$email
            . "' and email like '".$email. "' and opcao like 'auto%'";
      
            // echo ($strquery."<br/>");
            $rs3 = mysql_query($strquery, $conexao);
            $num_rows3 = mysql_num_rows($rs3);
        
            //echo ("Chegou aqui.... ".$num_rows. "<br/>");
            if ($num_rows3 == 1) {
                $res3 = mysql_fetch_assoc($rs3);
                $fezautoavaliacao = TRUE;
            }
         
            // pegar se a chefia fez avaliacao do servidor

            // quem eh o chefe

            $strquery = "SELECT * from avaliado where email like '".$email."'";
            $rstmp = mysql_query($strquery, $conexao);
            $num_rowstmp = mysql_num_rows($rstmp);
            // echo("linha 0: ".$strquery."<br/>");
            //if ($num_rowstmp > 0) {
                $restmp = mysql_fetch_assoc($rstmp);
                // var_dump($restmp);
                $chefeemail = $restmp['email'];
                if (cmpIgual($restmp["tipo"], $chefimed) == TRUE || cmpIgual($restmp["tipo"], $chefimedesp)==TRUE) {
                    $subord = $restmp['subordinacao'];

                    $strquery = "SELECT * from avaliado where sigla_org like '".$subord."' and Situacao like 'ativo' and  tipo like 'chefia%'";
                    // echo("linha 1: ".$strquery."<br/>");
                    $rstmp = mysql_query($strquery, $conexao);
                    $num_rowstmp = mysql_num_rows($rstmp);
        
                    if ($num_rowstmp == 1) {
                        $restmp = mysql_fetch_assoc($rstmp);
                        $chefeemail = $restmp['email'];
                    }
                } else {
                    $strquery = "SELECT * from avaliado where sigla_org like '".$sigla."' and Situacao like 'ativo' and tipo like 'chefia%'";
                    // echo("linha 2: ".$strquery."<br/>");
                    $rstmp = mysql_query($strquery, $conexao);
                    $num_rowstmp = mysql_num_rows($rstmp);
        
                    if ($num_rowstmp == 1) {
                        $restmp = mysql_fetch_assoc($rstmp);
                        $chefeemail = $restmp['email'];
                    }
                }
            // }

            $strquery = "SELECT * from avaliacao where emailaval like '".$chefeemail
                    . "' and email like '".$email."' and opcao like '%chefia%'";

            // echo("CHEF-SERV:".$strquery."<br/>");
            $rs3 = mysql_query($strquery, $conexao);
            $num_rows3 = mysql_num_rows($rs3);

            //echo ("Chegou aqui.... ".$num_rows. "<br/>");
            if ($num_rows3 == 1) {
                $res3 = mysql_fetch_assoc($rs3);
                $avaliadopelochefe = true;
            }

            // pegar se servidor fez a avaliacao da chefia
            $strquery = "SELECT * from avaliacao where email like '".$chefeemail
                . "' and emailaval like '".$email."' and opcao like '%chefia%'";

            // echo ("SERV-CHEF:".$strquery."<br/>");
            $rs4 = mysql_query($strquery, $conexao);
            $num_rows4 = mysql_num_rows($rs4);

            //echo ("Chegou aqui.... ".$num_rows. "<br/>");
            if ($num_rows4 == 1) {
            $res4 = mysql_fetch_assoc($rs4);
                $avaliouchefe = TRUE;
            }

            // validacao dos pares
            $servidorfoiavaliado = array();
            $servidoravaliou = array ();

            $strquery = "SELECT * from avaliado where Situacao like 'ativo' and email like '".$email."'";
            $rstmp = mysql_query($strquery, $conexao);
            $num_rowstmp = mysql_num_rows($rstmp);
            $restmp = mysql_fetch_assoc($rstmp);

            if (cmpIgual($restmp["tipo"], $chefimed) == TRUE || cmpIgual($restmp["tipo"], $chefimedesp)==TRUE) { // caso seja chefe

                $subord = $restmp['subordinacao'];

                $strquery = "SELECT * from avaliado where Situacao like 'ativo' and email not like '".$email."' and (sigla_org like '".$sigla."' or "
                    . "  subordinacao like '".$sigla."')";

                $rs4 = mysql_query($strquery, $conexao);

                // echo ("SUBORDS:" . $strquery."<br/>");

                $emailpares = array();
                while ($res4 = mysql_fetch_assoc($rs4)) {

                    if(cmpIgual($res4["email"], $chefeemail) == FALSE){
                        array_push($emailpares, $res4["email"]);
                    }
                }

                // var_dump($emailpares);
                // echo ("<br/>");

                $strquery = "SELECT * from avaliacao where "
                    . " emailaval like '".$email. "' order by nome";
                $rs5 = mysql_query($strquery, $conexao);

                // echo ("CHEF - PARES1: ".$strquery."<br/>");
                $rs5 = mysql_query($strquery, $conexao);
                $num_rows5 = mysql_num_rows($rs5);
                
                $chefiaavaliou = array();
                while ($res5 = mysql_fetch_assoc($rs5)) {
                    array_push($chefiaavaliou, $res5["email"]);
                }
                
                // var_dump($servidorfoiavaliado);
                // echo ("<br/>");
                
                $strquery = "SELECT * from avaliacao where email like '".$email
                . "' order by nome";
                
                // echo ($strquery."<br/>");
                $rs5 = mysql_query($strquery, $conexao);
                $num_rows5 = mysql_num_rows($rs5);
                $chefiafoiavaliada = array();
                while ($res5 = mysql_fetch_assoc($rs5)) {
                    array_push($chefiafoiavaliada, $res5["emailaval"]);
                }

                $pares = true;
                for ($i = 0; $i < count($emailpares); $i++) {
                    $tmp = new Avaliado();
                    $tmp->retrieveFromDBByAttr("email", $emailpares[$i]);

                    // echo(getFirstName($tmp->getField("nome")));
                    if (!(in_array($emailpares[$i], $chefiafoiavaliada))) {
                        $pares = false;
                    }
                    if (!(in_array($emailpares[$i], $chefiaavaliou))) {
                        $pares = false;
                    }
                }
            }else{ // caso nao seja chefe


                $strquery = "SELECT * from avaliado where sigla_org like '".$sigla."' and email not like '".$email
                    . "' and Situacao like 'ativo' and grupo like '".$grupo. "'";

                $rs4 = mysql_query($strquery, $conexao);

                // echo ("NAO CHEFE :: ".$strquery."<br/>");

                $emailpares = array();
                while ($res4 = mysql_fetch_assoc($rs4)) {
                    //echo ($res4["email"]);
                    if(cmpIgual($res4["email"], $chefeemail) == FALSE){
                        array_push($emailpares, $res4["email"]);
                    }
                }

                // var_dump($emailpares);
                // echo ("<br/>");

                $strquery = "SELECT * from avaliacao where sigla like '".$sigla."' "
                    . " and emailaval like '".$email. "' and opcao like '%pares%' order by nome";
                $rs5 = mysql_query($strquery, $conexao);

                //echo ($strSQL4."<br/>");
                $rs5 = mysql_query($strquery, $conexao);
                $num_rows5 = mysql_num_rows($rs5);
                $servidoravaliou = array();
                while ($res5 = mysql_fetch_assoc($rs5)) {
                    array_push($servidoravaliou, $res5["email"]);
                }

                $strquery = "SELECT * from avaliacao where sigla like '".$sigla."' and email like '".$email
                . "' and opcao like '%pares%' order by nome";

                // echo ($strquery."<br/>");
                $rs5 = mysql_query($strquery, $conexao);
                $num_rows5 = mysql_num_rows($rs5);
                $servidorfoiavaliado = array();
                while ($res5 = mysql_fetch_assoc($rs5)) {
                    array_push($servidorfoiavaliado, $res5["emailaval"]);
                }

                $pares = true;
                for ($i = 0; $i < count($emailpares); $i++) {
                    $tmp = new Avaliado();
                    $tmp->retrieveFromDBByAttr("email", $emailpares[$i]);

                    // echo(getFirstName($tmp->getField("nome")));
                    if (!(in_array($emailpares[$i], $servidoravaliou))) {
                        $pares = false;
                    }
                    if (!(in_array($emailpares[$i], $servidorfoiavaliado))) {
                        $pares = false;
                    }
                }
            }
            // echo ("AUTO: $fezautoavaliacao<br/>");
            // echo ("SERV - CHEF: $avaliouchefe<br/>");
            // echo ("CHEF - SERV: $avaliadopelochefe<br/>");
            // echo ("PARES: $pares<br/>");


            $warningtitle = 'SEM PEND&Ecirc;NCIA(S)';
            if ($fezautoavaliacao == FALSE || $avaliadopelochefe == FALSE || $avaliouchefe == FALSE || $pares == FALSE){
                $warning = 'warning';
                $warningtitle = 'PEND&Ecirc;NCIA(S)';
            }

?>
            <span style="text-align: center;font-size:10pt;">SE VOC&Ecirc; ACABOU DE FAZER UMA AVALIA&Ccedil;&Atilde;O, 
            APERTE <b>F5</b> PARA ATUALIZAR A TABELA DE PEND&Ecirc;NCIAS.</span>

            <br/><br/>
            <center> <strong><font color="red">IMPORTANTE:  Encerramento em 01 de Novembro (HOJE) às 11:00.</font></strong></center>
            <br/>

            <div class="alert <?=$warning;?>">
                <span style="text-align: center;"><b><h4><?=$warningtitle;?></h4></b></span>
                <?php
                if ($fezautoavaliacao == FALSE) {
                    ?>
                        <p><b>Autoavalia&ccedil;&atilde;o: <span class="redc"><span class="redc">&#x274C;</span></span></b></p>
                    <?php
                }else{
                ?>
                    <p><b>Autoavalia&ccedil;&atilde;o: <span class="greenc"><span class="greenc">&#x2705;</span></span></b></p>
                <?php
                }
                if ($avaliouchefe == FALSE) {
                    ?>
                        <p><b>Avaliou a chefia: <span class="redc">&#x274C;</span></b></p>
                    <?php
                }else{
                ?>
                    <p><b>Avaliou a chefia: <span class="greenc">&#x2705;</span></b></p>
                <?php
                }
                if ($avaliadopelochefe == FALSE) {
                    ?>
                        <p><b>Foi avaliado (a) pela chefia: <span class="redc">&#x274C;</span></b></p>
                    <?php
                }else{
                ?>
                    <p><b>Foi avaliado (a) pela chefia: <span class="greenc">&#x2705;</span></b></p>
                <?php
                }

                
                ?>

                <table width="100%">
                <tr>
                    <th style="text-align:left">PAR</th>
                    <th>VOC&Ecirc; AVALIOU</th>
                    <th>VOC&Ecirc; FOI AVALIADA (O) POR</th>
                </tr>
                <?php 

                    //var_dump($emailpares);
                    if (cmpIgual($restmp["tipo"], $chefimed) == TRUE || cmpIgual($restmp["tipo"], $chefimedesp)==TRUE) { // caso seja chefe
                        for ($i = 0; $i < count($emailpares); $i++) {
                        ?>
                        <tr>
                        <?php

                        $tmp = new Avaliado();
                            $tmp->retrieveFromDBByAttr("email", $emailpares[$i]); ?>
                        <td style="text-align: left;">
                        <?php
                        echo(getFirstName($tmp->getField("nome"))); ?>
                        </td>
                        <td style="text-align: center;">
                        
                        <?php
                        if (in_array($emailpares[$i], $chefiaavaliou)) {
                            ?>
                            <b><span class="greenc">&#x2705;</span></b>
                        <?php
                        } else {
                            ?>
                            <b><span class="redc">&#x274C;</span></b>
                        <?php
                        } ?>
                        
                        </td>
                        <td style="text-align: center;">
                        <?php
                        if (in_array($emailpares[$i], $chefiafoiavaliada)) {
                            ?>
                            <b><span class="greenc">&#x2705;</span></b>
                        <?php
                        } else {
                            ?>
                            <b><span class="redc">&#x274C;</span></b>
                        <?php
                        } ?>
                        
                        </td>
                    </tr>
                    <?php
                        }
                    }else{
                        for ($i = 0; $i < count($emailpares); $i++) {
                            ?>
                        <tr>
                        <?php

                        $tmp = new Avaliado();
                            $tmp->retrieveFromDBByAttr("email", $emailpares[$i]); ?>
                        <td style="text-align: left;">
                        <?php
                        echo(getFirstName($tmp->getField("nome"))); ?>
                        </td>
                        <td style="text-align: center;">
                        
                        <?php
                        if (in_array($emailpares[$i], $servidoravaliou)) {
                            ?>
                            <b><span class="greenc">&#x2705;</span></b>
                        <?php
                        } else {
                            ?>
                            <b><span class="redc">&#x274C;</span></b>
                        <?php
                        } ?>
                        
                        </td>
                        <td style="text-align: center;">
                        <?php
                        if (in_array($emailpares[$i], $servidorfoiavaliado)) {
                            ?>
                            <b><span class="greenc">&#x2705;</span></b>
                        <?php
                        } else {
                            ?>
                            <b><span class="redc">&#x274C;</span></b>
                        <?php
                        } ?>
                        
                        </td>
                    </tr>
                    <?php
                        }
                    }
                ?>
                </table>
                <br/><div>A coluna <b>VOC&Ecirc; FOI AVALIADA (O)</b> n&atilde;o depende de voc&ecirc;, depende do seu par.</div>
                <div>O item <b>Foi avaliado(a) pela chefia</b> n&atilde;o depende de voc&ecirc;, depende da sua chefia.</div>
                <br/><b>LEGENDA:</b><br/>
                <div>
                    <span class="greenc"><b>&#x2705;</b></span>: Este item est&aacute; OK. <br/>
                    <span class="redc">&#x274C;</span>: Este item que deve ser resolvido.
                </div>
            </div>



            <hr/>
            


          <h3 style="text-align: center;" class="center" >
             Lista dos Pares</span> 
        </h3>

              <?php

         
 if (cmpIgual($tipo, $chefimed) or cmpIgual($tipo,$chefimedesp)) {
    while($row3 = mysql_fetch_assoc($rs3)) {
        $no1 = $row3["nome"];
        if ($row3["sigla_org"] == $sigla and $row3["nome"] <> $nome or $row3["subordinacao"]== $sigla) {
            echo '<span class="topic">' .$no1. '</span><br>';
        }
    }
}



     if (cmpIgual($tipo, $chefimed) == FALSE) {
      
      $cont = 1;

          
      while($row5 = mysql_fetch_assoc($rs5)) {
        
            if (cmpIgual($row5["sigla_org"],$sigla) and cmpIgual($row5["tipo"], $chefimedesp)){
                $cont = 0;
            } 

        }
      
        $rs3 = mysql_query($strSQL2, $conexao);
        while($row3 = mysql_fetch_assoc($rs3)) {
            $no1 = $row3["nome"];
            
            //if ($row3["sigla_org"] == $sigla and $row3["grupo"]== $grupo and cmpIgual($row3["nome"], $nome)==FALSE) {
              if ((cmpIgual($row3["sigla_org"],$sigla) == TRUE) and 
              (cmpIgual($row3["grupo"], $grupo) == TRUE) and 
              (cmpIgual($row3["nome"], $nome)==FALSE) and
              (cmpIgual($row3["tipo"], $chefimed) == FALSE)) {
                echo '<span class="topic">' .$no1. '</span><br>';
                $cont = $cont + 1;
            }   
        }
    } 
  
?>
        <BR><BR>

       <strong><font color="red">Selecione um nome para Avaliar:</font></strong> &nbsp;<select name="nval" id="nval">'
       <option> Selecione o par para avalia&ccedil;&atilde;o!</option>   
       
     
     <?php

  // Seleciona o Banco de Dados
  $strSQL5 = "SELECT * FROM avaliado where lower(Situacao) not like 'impedido' order by nome asc";
  $strSQL6 = "SELECT * FROM avaliado where lower(Situacao) not like 'impedido' and lower(tipo) like lower('".$chefimed."%') and sigla_org like '".$siglasubord."' order by nome asc";
  $strSQL7 = "SELECT * FROM avaliado where lower(Situacao) not like 'impedido' and lower(tipo) like lower('".$chefimed."%') and sigla_org like '".$sigla."' order by nome asc";
  //echo ("SQL 6 :: $strSQL6 <br/>\n");
  //echo ("SQL 7 :: $strSQL7 <br/>\n");
  $rs5 = mysql_query($strSQL5, $conexao);
  $rs6 = mysql_query($strSQL6, $conexao);
  $row5 = mysql_fetch_array($rs5);
  $row6 = mysql_fetch_array($rs6);
  $row7 = mysql_fetch_array($rs7);


        if ((strcasecmp($tipo, $chefimed) == 0) or strcasecmp($tipo, $chefimedesp)==0) {

            //echo ( "caiu neste  <br/>");
            
            $rs5 = mysql_query($strSQL5, $conexao);
            while($row5 = mysql_fetch_assoc($rs5)) {
                //echo ($row5["nome"]);
                if ((strcasecmp($row5["tipo"], $chefimed)==0) and (cmpIgual($row5["sigla_org"], $sigla) and $row5["visivel"]=="1")) {
                    echo '<option>' .$row5["nome"]. '</option><br>';
                }
                $no2 = $row5["nome"];
                //echo (">> ".$row5["nome"]." <br/>");
                if (cmpIgual($row5["sigla_org"], $sigla) and !cmpIgual($row5["nome"], $nome) or $row5["subordinacao"]== $sigla) {
                    echo '<option>' .$no2. '</option><br>';
                }

                

            }

            if (mysql_num_rows($rs6) == 1){
                echo '<option>' .$row6["nome"]. '</option><br>';
            }

        
        }else{

            //echo ("### $sigla <br/>");
            //echo ("###2 [$siglasubord] <br/>");

            $strSQL5 = "SELECT * FROM avaliado where lower(Situacao) not like 'impedido' order by nome asc";
            $rs2 = mysql_query($strSQL5, $conexao);
            if(cmpIgual($siglasubord, "") == FALSE){

                $strSQL7 = "SELECT * FROM avaliado where lower(Situacao) not like 'impedido' "
                    . " and lower(tipo) like lower('".$chefimed."%') and sigla_org like '".$siglasubord."' order by nome asc";

            }

            //echo ("# debug3<br/> $strSQL7  <br/>");
            $rs7 = mysql_query($strSQL7, $conexao);

            while($row2 = mysql_fetch_assoc($rs2)) {
                $tipo1 = $row2["tipo"];

                if (strcasecmp($tipo1, $chefimed) != 0) {
                    //echo ("# ".$row2["nome"]."<br/>");
         
                    if (cmpIgual($row2["sigla_org"],$sigla) and cmpIgual($row2["grupo"], $grupo)) {
                        echo '<option>'.$row2["nome"].'</option>';
                        echo ("".$row2["nome"]);
                    }
                }

                if ((cmpIgual($row2["sigla_org"], $sigla) or cmpIgual($row2["subordinacao"], $sigla)) 
                    and cmpIgual($row2["tipo"],$chefimed)
                    and cmpIgual($row2["grupo"], $grupo)) {
                    echo '<option>'.$row2["nome"].'</option>\n';
                }

            }
            //echo ("NUM ROW :: ".mysql_num_rows($rs7)."\n");
            $rs7 = mysql_query($strSQL7, $conexao);
            if (mysql_num_rows($rs7) == 1){
                //echo ("# debug4<br/>");
                $row7 = mysql_fetch_assoc($rs7);
                echo '<option>' .$row7["nome"]. '</option><br>\n';
            }
        }
  
     
        

  
  
   echo '</select>';

//    echo ("SELECT :: " . $strSQL6. "<br/>");
//    while($row6 = mysql_fetch_assoc($rs6)) {
//        echo ($row6["nome"]);
//    }


?>
<br><br> 
            <input type="text" name="cont" id="cont" value="<?php echo $cont; ?>" style="display:none;">
            <input class="but but-primary center" style=" width: 125px; box-shadow: 1px 1px 3px rgba(0,0,0,.4); border-radius: 4px; margin: auto; display: block;" type="submit" value="AVALIAR" id="AVALIAR"><br><br>



        </form>


        <hr size="10" noshade>

          <h3 style="text-align: center;" class="center" >
             Consolida&ccedil;&atilde;o Final<br> </span> 
        </h3>
       <center> <em>A visualiza&ccedil;&atilde;o do resumo final só será visível quando todas as suas avaliações terminarem.<br> Basta <strong>SAIR</strong> desta tela e se logar novamente, clicando no ícone que aparecerá abaixo!<br><br><br></em></center>

        <?php  

  //      echo ("NM :: $nm <br/>");
        $strSQL3 = "SELECT * FROM avaliacao WHERE nome  like '$nm' order by nome asc";
        $rs5 = mysql_query($strSQL3, $conexao);

        //$tmpqwe = mysql_fetch_assoc($rs5);
        //var_dump($tmpqwe);
        
       while($row5 = mysql_fetch_assoc($rs5)) {
            $op = $row5["opcao"];
            //echo ("OP:: $op<br/>");
            if (cmpIgual($op, $autoaval)) {
         
                echo '<td><center><a href="tabela_consolidacao1.php?lin=' .$nome.'"><img src="img/tabela.jpg" border="0" width="10%"><br></a></center></td>';
            }
        }
      


        ?>

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
             <a href='javascript:window.history.go(-1)' style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> SAIR</a></center><br><br><br>
        </div>

    </footer>
</div>
</body>
</html>
