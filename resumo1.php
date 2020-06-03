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

$nm = $_POST['nome'];
$nomeaval = $_POST['nomeaval'];



// mysql_set_charset('UTF8', $conexao);
 $strSQL = "SELECT * FROM avaliacao WHERE nome = '$nm' and nomeaval = '$nomeaval'";
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



$opcao = $row["opcao"];
$unid = $row["sigla"];
$nome = $row["nome"];
$siape = $row["siape"];
$cargo = $row["cargo"];
$ramal = $row["ramal"];
$email = $row["email"];
$nome1 = $row["nomeaval"];
$siape1 = $row["siapeaval"];
$cargo1 = $row["cargoaval"];
$ramal1 = $row["ramalaval"];
$email1 = $row["emailaval"];
$a1 = $row["1a"];
$a2 = $row["1b"];
$a3 = $row["1c"];
$a4 = $row["1d"];
$a5 = $row["1e"];
$b1 = $row["2a"];
$b2 = $row["2b"];
$b3 = $row["2c"];
$c1 = $row["3a"];
$c2 = $row["3b"];
$c3 = $row["3c"];
$c4 = $row["3d"];
$c5 = $row["3e"];
$d1 = $row["4a"];
$d2 = $row["4b"];
$d3 = $row["4c"];
$d4 = $row["4d"];
$d5 = $row["4e"];
$d6 = $row["4f"];
$e1 = $row["5a"];
$e2 = $row["5b"];
$e3 = $row["5c"];
$e4 = $row["5d"];
$e5 = $row["5e"];
$total = $row["total"];
$perc = $row["perc"];

?>

<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>


        <br>

         <h2 class="center" style="font-size: 14pt;">Ficha de Avalia&ccedil;&atilde;o de Desempenho Individual (FADI)  </h2>
        <p class="center" style="color: red; font-size: 14pt;">Ciclo de Avalia&ccedil;&atilde;o: De <?php echo $dataentc; ?> a <?php echo $datafech; ?></p>
       <p class="center" style="color: red; font-size: 14pt;"><?php echo $ciclo; ?>° CICLO</p>


       

        

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
            <label for="">Matrícula SIAPE: <?php echo $siape; ?></label>
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
            <label>Endereço Eletrônico (e-mail): <?php echo $email; ?></label>
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
            <label for="">Matrícula SIAPE: <?php echo $siape1; ?></label>
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
            <label>Endereço Eletrônico (e-mail): <?php echo $email1; ?></label>
            <input class="caixa" type="text" name="email1" id="email1" value="<?php echo $email1; ?>" style="display:none"/>
        </p>

<br><br>
<hr> <br>

<p align="justify" style="font-size: 12pt;">Observa&ccedil;&atilde;o sobre a Pontua&ccedil;&atilde;o: <br><br>Superou a expectativa (5); Atendeu a expectativa (4); Atendeu mais de 50% da expectativa (3); Atendeu 50% ou menos da expectativa (2); Não atendeu a expectativa (1).</p></font>
    <br><br>

            
       
        <center>
        <table style="width: 790px; margin-left: -90px;" class="tabela-mod center" >

                <!----------------TITULO DA TABELA---------->

                <tr>
                    <th style="width: 350px; text-align: center; font-size: 12pt;">Fatores de Competência</th>
                    <th style="width: 250px; font-size: 12pt;">Quesitos</th>
                    <th colspan="5" style="font-size: 12pt;">Pontos</th>
                </tr>

                <!-----------------NUMERO 1------------------------>

                <tr>
                    <td style="font-size: 12pt;" rowspan="5">
                        1. Produtividade: capacidade de atender às demandas com qualidade e em quantidade apropriada, considerando-se os fatores tempo, emprego de recursos materiais e/ou financeiros com planejamento e organiza&ccedil;&atilde;o.
                    </td>
                    <td>
                        <strong>a)</strong> executa as suas atividades de acordo com os padrões de qualidade aceitáveis.
                    </td>
                    <td class="nota" colspan="5"  style="font-size: 12pt;"><?php echo $a1; ?><br> Ponto(s)<input class="caixa" type="text" name="a1" id="a1" value="<?php echo $a1; ?>" style="display:none"/></td>


                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Realiza suas atividades dentro dos prazos estabelecidos
                    </td>

                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $a2; ?><br> Ponto(s)<input class="caixa" type="text" name="a2" id="a2" value="<?php echo $a2; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Realiza volume de trabalho condizente com a demanda, considerando os recursos disponibilizados
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $a3; ?><br> Ponto(s) <input class="caixa" type="text" name="a3" id="a3" value="<?php echo $a3; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Realiza efetivamente as atribuições do cargo que ocupa
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $a4; ?><br> Ponto(s) <input class="caixa" type="text" name="a4" id="a4" value="<?php echo $a4; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                       <strong> e)</strong> Utiliza com racionalidade os recursos (humanos/ materiais/ financeiros) colocados à sua disposi&ccedil;&atilde;o
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $a5; ?><br> Ponto(s) <input class="caixa" type="text" name="a5" id="a1" value="<?php echo $a5; ?>" style="display:none"/></td>
                </tr>


                <!------------------------NUMERO----2------------------------------------------>

                <tr>
                    <td style="font-size: 12pt;" rowspan="3">
                        2. Conhecimento de Métodos e Técnicas: conhecimento, aprofundamento, atualiza&ccedil;&atilde;o, senso crítico e proposi&ccedil;&atilde;o de mudanças dos métodos, técnicas e processos inerentes ao seu trabalho
                    </td>
                    <td>
                        <strong>a)</strong> Planeja e organiza as próprias atividades, priorizando a execu&ccedil;&atilde;o das mais importantes
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $b1; ?><br> Ponto(s)<input class="caixa" type="text" name="b1" id="b1" value="<?php echo $b1; ?>" style="display:none"/></td>


                </tr>

                <tr>
                    <td>
                        <strong>b)</strong> Executa regularmente seu trabalho, sem necessidade de orienta&ccedil;&atilde;o
                    </td>

                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $b2; ?><br> Ponto(s)<input class="caixa" type="text" name="b2" id="b2" value="<?php echo $b2; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Busca atualizar-se quanto aos métodos e técnicas a serem aplicados no desempenho de suas atribuições
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $b3; ?><br> Ponto(s)<input class="caixa" type="text" name="b3" id="b3" value="<?php echo $b3; ?>" style="display:none"/></td>
                </tr>

                <!------------------------NUMERO----3------------------------------------------>

                <tr>
                    <td style="font-size: 12pt;" rowspan="5">
                        3. Trabalho em equipe: capacidade de trabalhar levando-se em conta a preserva&ccedil;&atilde;o dos relacionamentos, a colabora&ccedil;&atilde;o com seus pares, a dissemina&ccedil;&atilde;o do senso de coletividade, a abertura aos debates e a capacidade de agrega&ccedil;&atilde;o;
                    </td>
                    <td>
                        <strong>a)</strong> Desenvolve relacionamentos positivos com seus pares
                    </td>
                   <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $c1; ?><br> Ponto(s)<input class="caixa" type="text" name="c1" id="c1" value="<?php echo $c1; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Mostra-se colaborativo com seus pares, ajudando o grupo sempre que possível
                    </td>

                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $c2; ?><br> Ponto(s)<input class="caixa" type="text" name="c2" id="c2" value="<?php echo $c2; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Estimula e reforça ações que favoreçam a união do grupo, inibindo aquelas que prejudiquem a coletividade
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $c3; ?><br> Ponto(s)<input class="caixa" type="text" name="c3" id="c3" value="<?php echo $c3; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> É aberto ao debate, respeitando a opinião dos outros e revendo sua opinião, sempre que necessário
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $c4; ?><br> Ponto(s)<input class="caixa" type="text" name="c4" id="c4" value="<?php echo $c4; ?>" style="display:none"/></td>
                <tr>
                    <td>
                        <strong>e)</strong> É  visto como alguém que traz boas contribuições para o grupo, sendo agregador<br><br><br><br><br>
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $c5; ?><br> Ponto(s)<input class="caixa" type="text" name="c5" id="c5" value="<?php echo $c5; ?>" style="display:none"/></td>
                </tr>

                <!------------------------NUMERO--4-------------------------------------------------------------->

                <tr>
                    <td style="font-size: 12pt;" rowspan="6">
                        4. Comprometimento com o trabalho: envolvimento com as atividades pelas quais é responsável no sentido de facilitar e contribuir efetivamente para a resolu&ccedil;&atilde;o de problemas e para o alcance das metas institucionais;
                    </td>
                    <td>
                        <strong>a)</strong> Reconhece o seu papel para o cumprimento da missão do ON
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $d1; ?><br> Ponto(s)<input class="caixa" type="text" name="d1" id="d1" value="<?php echo $d1; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Colabora com os membros da equipe na execu&ccedil;&atilde;o das tarefas de sua unidade
                    </td>

                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $d2; ?><br> Ponto(s) <input class="caixa" type="text" name="d2" id="d2" value="<?php echo $d2; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                       <strong> c)</strong> Busca soluções para problemas e dúvidas do cotidiano, encaminhando adequadamente os assuntos que fogem a sua fun&ccedil;&atilde;o
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $d3; ?><br> Ponto(s)<input class="caixa" type="text" name="d3" id="d3" value="<?php echo $d3; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Cumpre no prazo as tarefas e compromissos pertinentes à sua fun&ccedil;&atilde;o
                    </td>
                    <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $d4; ?><br> Ponto(s)<input class="caixa" type="text" name="d4" id="d4" value="<?php echo $d4; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>e)</strong> Busca retroalimenta&ccedil;&atilde;o, interessando-se pelo impacto/resultado do seu trabalho
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $d5; ?><br> Ponto(s)<input class="caixa" type="text" name="d5" id="d5" value="<?php echo $d5; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>f)</strong> Demonstra persistência diante de dificuldades inerentes aos processos de trabalho
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $d6; ?><br> Ponto(s) <input class="caixa" type="text" name="d6" id="d6" value="<?php echo $d6; ?>" style="display:none"/></td>
                </tr>

                <!------------------------NUMERO----5------------------------------------------>


                <tr>
                    <td style="font-size: 12pt;" rowspan="5">
                        5. Cumprimento das normas de procedimento e de conduta ao desempenho das atribuições do cargo: capacidade para observar e cumprir normas e regulamentos, bem como de manter um padrão de comportamento adequado à administra&ccedil;&atilde;o pública.
                    </td>
                    <td>
                        <strong>a)</strong> Conhece e cumpre as normas e regras do ON e de sua unidade de lota&ccedil;&atilde;o
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $e1; ?><br> Ponto(s)<input class="caixa" type="text" name="e1" id="e1" value="<?php echo $e1; ?>" style="display:none"/></td>


                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Zela pelo ambiente de trabalho, pelos equipamentos e pelos materiais sob a sua responsabilidade
                    </td>

                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $e2; ?><br> Ponto(s)<input class="caixa" type="text" name="e2" id="e2" value="<?php echo $e2; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Trata com urbanidade e profissionalismo as pessoas no ambiente de trabalho
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $e3; ?><br> Ponto(s)<input class="caixa" type="text" name="e3" id="e3" value="<?php echo $e3; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Encaminha corretamente os assuntos que fogem do seu poder de decisão
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $e4; ?><br> Ponto(s)<input class="caixa" type="text" name="e4" id="e4" value="<?php echo $e4; ?>" style="display:none"/></td>
                </tr>
                <tr>
                    <td>
                        <strong> e)</strong> Mantém a apresenta&ccedil;&atilde;o pessoal de acordo com os padrões estabelecidos
                    </td>
                     <td class="nota" colspan="5" style="font-size: 12pt;"><?php echo $e5; ?><br> Ponto(s)<input class="caixa" type="text" name="e5" id="e5" value="<?php echo $e5; ?>" style="display:none"/></td>
                </tr>
                <tr>
                   <th colspan="1" style="font-size: 12pt;">TOTAL GERAL DE PONTOS OBTIDOS/PERCENTUAL (IDI): </th>
                    <td colspan ="1" style="font-size: 12pt; font-weight: bold; text-align:center;"><?php echo $total; ?> Pontos<input class="caixa" type="text" name="total" id="total" value="<?php echo $total; ?>" style="display:none"/></td>
                    <td colspan ="5" style="font-size: 12pt; font-weight: bold; text-align:center;"><?php echo round($perc); ?>%<input class="caixa" type="text" name="perc" id="perc" value="<?php echo round ($perc); ?>" style="display:none"/></td>
                </tr>

            </table>
            <BR><BR>
            <p>
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

                <table></p>

            <BR><BR>
        </center>
                  
          <BR>

            <a href="javascript:window.history.go(-1)">
            <span class="botao">
                FINALIZAR PESQUISA
            </span>
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
