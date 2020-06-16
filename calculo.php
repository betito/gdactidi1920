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
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/tabela.css"/>
    <link rel="stylesheet" href="css/formulario1.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>


       
</head>
<body>

<?php

// variáveis do avaliador
$opcao = $_POST["opcao"];
$nome = $_POST["nome"];
$unid = htmlentities($_POST["unid_org"]);
$sigla = $_POST["sigla_org"];
$siape = $_POST["siape"];
$cargo = $_POST["cargo"];
$ramal = $_POST["ramal"];
$email = $_POST["email"];
$nome1 = $_POST["nome1"];
$siape1 = $_POST["siape1"];
$cargo1 = $_POST["cargo1"];
$ramal1 = $_POST["ramal1"];
$email1 = $_POST["email1"];
$a1 = $_POST["1a"];
$a2 = $_POST["1b"];
$a3 = $_POST["1c"];
$a4 = $_POST["1d"];
$a5 = $_POST["1e"];
$b1 = $_POST["2a"];
$b2 = $_POST["2b"];
$b3 = $_POST["2c"];
$c1 = $_POST["3a"];
$c2 = $_POST["3b"];
$c3 = $_POST["3c"];
$c4 = $_POST["3d"];
$c5 = $_POST["3e"];
$d1 = $_POST["4a"];
$d2 = $_POST["4b"];
$d3 = $_POST["4c"];
$d4 = $_POST["4d"];
$d5 = $_POST["4e"];
$d6 = $_POST["4f"];
$e1 = $_POST["5a"];
$e2 = $_POST["5b"];
$e3 = $_POST["5c"];
$e4 = $_POST["5d"];
$e5 = $_POST["5e"];
$ciclo = $_POST["ciclo"];
$tcont = $_POST["cont"];

if(empty($a1)or empty($a2)or empty($a3)or empty($a4)or empty($a5)or empty($b1)or empty($b2)or empty($b3)or empty($c1)or empty($c2)or empty($c3)or empty($c4)or empty($c5)or empty($d1)or empty($d2)or empty($d3)or empty($d4)or empty($d5)or empty($d6)or empty($e1)or empty($e2) or empty($e3)or empty($e4)or empty($e5)){
    header("Location: falhacalculo.php"); 
}


$total =  ($a1 +  $a2 + $a3 + $a4 + $a5 + $b1 + $b2 + $b3 + $c1 + $c2 + $c3 + $c4 + $c5 + $d1 + $d2 + $d3 + $d4 + $d5 + $d6 + $e1 + $e2 + $e3 + $e4 + $e5);
$perc = ($total*100)/120;

if ($perc <= 25) {
    $totalp = 3;
} 

if ($perc > 25 and $perc <= 50){
    $totalp = 7;
} 

if ($perc > 50 and $perc <= 75){
    $totalp = 11;
} 

if ($perc > 75 and $perc <= 100){
    $totalp = 15;
}
 
 //mysql_set_charset('UTF8', $conexao);
 $strSQL = "SELECT * FROM avaliado WHERE nome = '$nome'";
 $strSQL1 = "SELECT * FROM periodo";

  // Executa a query (o recordset $rs contém o resultado da query)
 $rs = mysql_query($strSQL, $conexao);
 $row = mysql_fetch_array($rs);
 $num = mysql_num_rows($rs);

 $rs1 = mysql_query($strSQL1, $conexao);
 $row1 = mysql_fetch_array($rs1);
 $num1 = mysql_num_rows($rs1);

 $dataentc = $row1["dataentc"];
$datafech = $row1["datafetch"];
$dataent = $row1["dataent"];
$datafec = $row1["datafec"];
$ciclo= $row1["ciclo"];




?>

<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observat&oacute;rio Nacional"/>

        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>


        <br>

        <h2 class="center">Ficha de Avalia&ccedil;&atilde;o de Desempenho Individual (FADI)  </h2>
        <p class="center" style="color: red;"><strong>Ciclo de Avalia&ccedil;&atilde;o: De <strong><?php echo $dataentc; ?> a <?php echo $datafech; ?><strong></p>
       <p class="center" style="color: red;"><?php echo $ciclo; ?>° CICLO</p>


       

        

        <form action="bancoaval.php" id="cadastro" method="post" enctype="multipart/form-data">

        <br>

        <p class="center">
           <input class="caixa" type="text" name="ciclo"  id="ciclo" value="<?php echo $ciclo; ?>" readonly="true" style="display:none;"/>
        </p>

        <p class="center">
            <label  for="">Op&ccedil;&atilde;o Selecionada: <?php echo $opcao; ?></label> 
            <input class="caixa" type="text" name="opcao"  id="opcao" value="<?php echo $opcao; ?>" style="display:none"/>
          
        </p>

        <br>


        <h2 class="center" style="font-size: 16pt;">Dados do Avaliado</h2>

        <p class="center">
            <label for="">Unidade de Avalia&ccedil;&atilde;o: <?php echo $unid; ?></label>
            <input class="caixa" type="text" name="unid_org"  id="unid_org" value="<?php echo $unid; ?>" style="display:none"/>
        </p>

        <p class="center">
            <label for="">
                Sigla da Unidade de Avalia&ccedil;&atilde;o: <?php echo $sigla; ?>
            </label>
            <input class="caixa" type="text" name="sigla_org"  id="sigla_org" value="<?php echo $sigla; ?>" style="display:none"/>
        </p>

        <p class="center">
            <label for="">Nome completo do avaliado: <?php echo $nome; ?></label>
            <input class="caixa" type="text"  name="nome" id="nome" value="<?php echo $nome; ?>" style="display:none"/>
        </p>

        <p class="center">
            <label for="">Matr&iacute;cula SIAPE: <?php echo $siape; ?></label>
            <input class="caixa" type="text" name="siape" id="siape" value="<?php echo $siape; ?>" style="display:none"/>
        </p>
        <p class="center">
            <label for="">Cargo Efetivo: <?php echo $cargo; ?></label>
            <input class="caixa" type="text" name="cargo" id="cargo" value="<?php echo $cargo; ?>" style="display:none"/>
        </p>
        <p class="center">
            <label> Ramal: <?php echo $ramal; ?></label>
            <input class="caixa" type="text" name="ramal" id="ramal" value="<?php echo $ramal; ?>" style="display:none"/>
        </p>
        <p class="center">
            <label>Endere&ccedil;o Eletr&ocirc;nico (e-mail): <?php echo $email; ?></label>
            <input class="caixa" type="text" name="email" id="email" value="<?php echo $email; ?>" style="display:none"/>
        </p>

        <br>

        <hr>

               
            <br>
        
            
            <h2 class="center" style="font-size: 16pt;">Dados do Avaliador</h2>

       <p class="center">
            <label for="">Nome completo do avaliador: <?php echo $nome1; ?></label>
            <input class="caixa" type="text"  name="nome1" id="nome1" value="<?php echo $nome1; ?>" style="display:none"/>
        </p>
           
<p class="center">
            <label for="">Matr&iacute;cula SIAPE: <?php echo $siape1; ?></label>
            <input class="caixa" type="text" name="siape1" id="siape1" value="<?php echo $siape1; ?>" style="display:none"/>
        </p>

            <p class="center">
            <label for="">Cargo Efetivo: <?php echo $cargo1; ?></label>
            <input class="caixa" type="text" name="cargo1" id="cargo1" value="<?php echo $cargo1; ?>" style="display:none"/>
        </p>

        <p class="center">
            <label> Ramal: <?php echo $ramal1; ?></label>
            <input class="caixa" type="text" name="ramal1" id="ramal1" value="<?php echo $ramal1; ?>" style="display:none"/>
        </p>

        <p class="center">
            <label>Endere&ccedil;o Eletr&ocirc;nico (e-mail): <?php echo $email1; ?></label>
            <input class="caixa" type="text" name="email1" id="email1" value="<?php echo $email1; ?>" style="display:none"/>
        </p>

<br><br>
<hr> <br>

Observa&ccedil;&atilde;o sobre a Pontua&ccedil;&atilde;o: <br><br><strong><em><p align="justify">Superou a expectativa (5); Atendeu a expectativa (4); Atendeu mais de 50% da expectativa (3); Atendeu 50% ou menos da expectativa (2); N&atilde;o atendeu a expectativa (1).</em></strong>
    <br><br>

            
       
        <center>
        <table style="width: 790px; margin-left: -90px;" class="tabela-mod center" >

                <!----------------TITULO DA TABELA---------->

                <tr>
                    <th style="width: 350px; text-align: center;">Fatores de Compet&ecirc;ncia</th>
                    <th style="width: 250px;">Quesitos</th>
                    <th colspan="5">Pontos</th>
                </tr>

                <!-----------------NUMERO 1------------------------>

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                        1. Produtividade: capacidade de atender &agrave;s demandas com qualidade e em quantidade apropriada, considerando-se os fatores tempo, emprego de recursos materiais e/ou financeiros com planejamento e organiza&ccedil;&atilde;o.
                    </td>
                    <td>
                        <strong>a)</strong> executa as suas atividades de acordo com os padr&otilde;es de qualidade aceit&aacute;veis.
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $a1; ?><br> Ponto(s)<input class="caixa" type="text" name="a1" id="a1" value="<?php echo $a1; ?>" style="display:none"/></center></td>


                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Realiza suas atividades dentro dos prazos estabelecidos
                    </td>

                    <td class="nota" colspan="5"><center><?php echo $a2; ?><br> Ponto(s)<input class="caixa" type="text" name="a2" id="a2" value="<?php echo $a2; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Realiza volume de trabalho condizente com a demanda, considerando os recursos disponibilizados
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $a3; ?><br> Ponto(s) <input class="caixa" type="text" name="a3" id="a3" value="<?php echo $a3; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Realiza efetivamente as atribui&ccedil;&otilde;es do cargo que ocupa
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $a4; ?><br> Ponto(s) <input class="caixa" type="text" name="a4" id="a4" value="<?php echo $a4; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                       <strong> e)</strong> Utiliza com racionalidade os recursos (humanos/ materiais/ financeiros) colocados &agrave; sua disposi&ccedil;&atilde;o
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $a5; ?><br> Ponto(s) <input class="caixa" type="text" name="a5" id="a1" value="<?php echo $a5; ?>" style="display:none"/></center></td>
                </tr>


                <!------------------------NUMERO----2------------------------------------------>

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="3">
                        2. Conhecimento de M&eacute;todos e T&eacute;cnicas: conhecimento, aprofundamento, atualiza&ccedil;&atilde;o, senso cr&iacute;tico e proposi&ccedil;&atilde;o de mudan&ccedil;as dos m&eacute;todos, t&eacute;cnicas e processos inerentes ao seu trabalho
                    </td>
                    <td>
                        <strong>a)</strong> Planeja e organiza as pr&oacute;prias atividades, priorizando a execu&ccedil;&atilde;o das mais importantes
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $b1; ?><br> Ponto(s)<input class="caixa" type="text" name="b1" id="b1" value="<?php echo $b1; ?>" style="display:none"/></center></td>


                </tr>

                <tr>
                    <td>
                        <strong>b)</strong> Executa regularmente seu trabalho, sem necessidade de orienta&ccedil;&atilde;o
                    </td>

                    <td class="nota" colspan="5"><center><?php echo $b2; ?><br> Ponto(s)<input class="caixa" type="text" name="b2" id="b2" value="<?php echo $b2; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Busca atualizar-se quanto aos m&eacute;todos e t&eacute;cnicas a serem aplicados no desempenho de suas atribui&ccedil;&otilde;es
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $b3; ?><br> Ponto(s)</center> <input class="caixa" type="text" name="b3" id="b3" value="<?php echo $b3; ?>" style="display:none"/></td>
                </tr>

                <!------------------------NUMERO----3------------------------------------------>

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                        3. Trabalho em equipe: capacidade de trabalhar levando-se em conta a preserva&ccedil;&atilde;o dos relacionamentos, a colabora&ccedil;&atilde;o com seus pares, a dissemina&ccedil;&atilde;o do senso de coletividade, a abertura aos debates e a capacidade de agrega&ccedil;&atilde;o;
                    </td>
                    <td>
                        <strong>a)</strong> Desenvolve relacionamentos positivos com seus pares
                    </td>
                   <td class="nota" colspan="5"><center><?php echo $c1; ?><br> Ponto(s)</center><input class="caixa" type="text" name="c1" id="c1" value="<?php echo $c1; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Mostra-se colaborativo com seus pares, ajudando o grupo sempre que poss&iacute;vel
                    </td>

                    <td class="nota" colspan="5"><center><?php echo $c2; ?><br> Ponto(s)<input class="caixa" type="text" name="c2" id="c2" value="<?php echo $c2; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Estimula e refor&ccedil;a a&ccedil;&otilde;es que favore&ccedil;am a uni&atilde;o do grupo, inibindo aquelas que prejudiquem a coletividade
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $c3; ?><br> Ponto(s)<input class="caixa" type="text" name="c3" id="c3" value="<?php echo $c3; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> &eacute; aberto ao debate, respeitando a opini&atilde;o dos outros e revendo sua opini&atilde;o, sempre que necess&aacute;rio
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $c4; ?><br> Ponto(s)</center><input class="caixa" type="text" name="c4" id="c4" value="<?php echo $c4; ?>" style="display:none"/></td>
                <tr>
                    <td>
                        <strong>e)</strong> &eacute;  visto como algu&eacute;m que traz boas contribui&ccedil;&otilde;es para o grupo, sendo agregador
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $c5; ?><br> Ponto(s)<input class="caixa" type="text" name="c5" id="c5" value="<?php echo $c5; ?>" style="display:none"/></center></td>
                </tr>

                <!------------------------NUMERO--4-------------------------------------------------------------->

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="6">
                        4. Comprometimento com o trabalho: envolvimento com as atividades pelas quais &eacute; respons&aacute;vel no sentido de facilitar e contribuir efetivamente para a resolu&ccedil;&atilde;o de problemas e para o alcance das metas institucionais;
                    </td>
                    <td>
                        <strong>a)</strong> Reconhece o seu papel para o cumprimento da miss&atilde;o do INPA
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $d1; ?><br> Ponto(s)</center><input class="caixa" type="text" name="d1" id="d1" value="<?php echo $d1; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Colabora com os membros da equipe na execu&ccedil;&atilde;o das tarefas de sua unidade
                    </td>

                     <td class="nota" colspan="5"><center><?php echo $d2; ?><br> Ponto(s) <input class="caixa" type="text" name="d2" id="d2" value="<?php echo $d2; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                       <strong> c)</strong> Busca solu&ccedil;&otilde;es para problemas e d&uacute;vidas do cotidiano, encaminhando adequadamente os assuntos que fogem a sua fun&ccedil;&atilde;o
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $d3; ?><br> Ponto(s)<input class="caixa" type="text" name="d3" id="d3" value="<?php echo $d3; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Cumpre no prazo as tarefas e compromissos pertinentes &agrave; sua fun&ccedil;&atilde;o
                    </td>
                    <td class="nota" colspan="5"><center><?php echo $d4; ?><br> Ponto(s)<input class="caixa" type="text" name="d4" id="d4" value="<?php echo $d4; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>e)</strong> Busca retroalimenta&ccedil;&atilde;o, interessando-se pelo impacto/resultado do seu trabalho
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $d5; ?><br> Ponto(s)<input class="caixa" type="text" name="d5" id="d5" value="<?php echo $d5; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>f)</strong> Demonstra persist&ecirc;ncia diante de dificuldades inerentes aos processos de trabalho
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $d6; ?><br> Ponto(s) <input class="caixa" type="text" name="d6" id="d6" value="<?php echo $d6; ?>" style="display:none"/></center></td>
                </tr>

                <!------------------------NUMERO----5------------------------------------------>


                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                        5. Cumprimento das normas de procedimento e de conduta ao desempenho das atribui&ccedil;&otilde;es do cargo: capacidade para observar e cumprir normas e regulamentos, bem como de manter um padr&atilde;o de comportamento adequado &agrave; administra&ccedil;&atilde;o p&uacute;blica.
                    </td>
                    <td>
                        <strong>a)</strong> Conhece e cumpre as normas e regras do INPA e de sua unidade de lota&ccedil;&atilde;o
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $e1; ?><br> Ponto(s)<input class="caixa" type="text" name="e1" id="e1" value="<?php echo $e1; ?>" style="display:none"/></center></td>


                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Zela pelo ambiente de trabalho, pelos equipamentos e pelos materiais sob a sua responsabilidade
                    </td>

                     <td class="nota" colspan="5"><center><?php echo $e2; ?><br> Ponto(s)<input class="caixa" type="text" name="e2" id="e2" value="<?php echo $e2; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Trata com urbanidade e profissionalismo as pessoas no ambiente de trabalho
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $e3; ?><br> Ponto(s)<input class="caixa" type="text" name="e3" id="e3" value="<?php echo $e3; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Encaminha corretamente os assuntos que fogem do seu poder de decis&atilde;o
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $e4; ?><br> Ponto(s)<input class="caixa" type="text" name="e4" id="e4" value="<?php echo $e4; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                    <td>
                        <strong> e)</strong> Mant&eacute;m a apresenta&ccedil;&atilde;o pessoal de acordo com os padr&otilde;es estabelecidos
                    </td>
                     <td class="nota" colspan="5"><center><?php echo $e5; ?><br> Ponto(s)<input class="caixa" type="text" name="e5" id="e5" value="<?php echo $e5; ?>" style="display:none"/></center></td>
                </tr>
                <tr>
                   <th colspan="1">TOTAL GERAL DE PONTOS OBTIDOS/PERCENTUAL (IDI): </th>
                    <td colspan ="1"><center><strong><font color="red"><?php //echo $totalp; ?> Pontos<input class="caixa" type="text" name="total" id="total" value="<?php echo $totalp; ?>" style="display:none"/></td>
                    <td colspan ="5"><center> <strong><font color="red"><?php echo round($perc); ?>%<input class="caixa" type="text" name="perc" id="perc" value="<?php echo round ($perc); ?>" style="display:none"/></td>
                </tr>

            </table>
            <BR><BR>

                <table border="1">
                 <tr>
                 <td> IDI <= 25%</td>
                 <td> 25% < IDI <= 50% </td>
                 <td> 50% < IDI <= 75% </td>
                 <td> 75% < IDI <= 100% </td>
                 </tr>
                 
                 <tr>
                 <td><center> 3 pts</center> </td>
                 <td><center> 7 pts </center></td>
                 <td><center> 11 pts</center> </td>
                 <td><center> 15 pts </center></td>
                 </tr>

                <table>

            <BR><BR>
        </center>

         <input type="text" name="cont" id="cont" value="<?php echo $tcont; ?>" style="display:none;">

         <BR>
           <a href="javascript:window.history.go(-1)">
            <span class="botao">
                VOLTAR E REFAZER  
            </span> <BR><BR>

         <input class="but but-primary center" style=" width: 175px; box-shadow: 1px 1px 3px rgba(0,0,0,.4); border-radius: 4px; margin: auto; display: block;" type="submit" value="ENVIAR AVALIA&Ccedil;&Atilde;O" id="ENVIAR_AVALIA&ccedil;&atilde;O">
         
                  
          
            <BR><BR>
        </form>
          </div>

          <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
                   </strong>
        <div style="float: right; margin-right: 40px;">
             
        </div>

    </footer>
