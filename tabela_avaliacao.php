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

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/cadastrointra-form.css" />
    <link rel="stylesheet" href="css/tabela.css" />
    <link rel="stylesheet" href="css/formulario.css" />

    <meta charset="UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>

    <?php

// variáveis do avaliador
$nm = $_POST['nval'];
$nome1 = $_POST["nome1"];
$siape1 = $_POST["siape1"];
$cargo1 = $_POST["cargo1"];
$ramal1 = $_POST["ramal1"];

/*$tohex = String2Hex($ramal1);
$reptohex = str_replace($ramal1);*/



$email1 = $_POST["email1"];
$tipo1 = $_POST["tipo1"];
$tcont = $_POST["cont"];



 //mysql_set_charset('UTF8', $conexao);
 $strSQL = "SELECT * FROM avaliado WHERE nome = '$nm'";
 $strSQL1 = "SELECT * FROM periodo";

  // Executa a query (o recordset $rs contém o resultado da query)
 $rs = mysql_query($strSQL, $conexao);
 $row = mysql_fetch_array($rs);
 $num = mysql_num_rows($rs);

 $rs1 = mysql_query($strSQL1, $conexao);
 $row1 = mysql_fetch_array($rs1);
 $num1 = mysql_num_rows($rs1);


$nome = $row["nome"];
$unid = getCoordName($row["sigla_org"]);
$sigla = $row["sigla_org"];
$siape = $row["siape"];
$cargo = $row["cargo"];
$ramal = $row["ramal"];

$email = $row["email"];
$tipo = $row["tipo"];

$dataentc = $row1["dataentc"];
$datafech = $row1["datafetch"];
$dataent = $row1["dataent"];
$datafec = $row1["datafec"];
$ciclo = $row1["ciclo"];


?>

    <div class="container">
        <header id="cabecalho">
            <img id="logo" src="img/logo.png" alt="Logotipo do Observat&oacute;rio Nacional" />

            <img id="logoinpa" src="img/logo-inpa.png" alt="Logotipo do Instituto Nacional De Pesquisas da Amaz&ocirc;nia"/>
        <h3 class="title">DTIN/COTIN - GDACT - IDI</h3>
        </header>

        <div class="conteudo">

            <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>


            <br>

            <h2 class="center">Ficha de Avalia&ccedil;&atilde;o de Desempenho Individual (FADI) </h2>
            <center> <strong>
                    <font color="red">Ciclo de Avalia&ccedil;&atilde;o:</font> De <?php echo $dataentc; ?> a
                    <?php echo $datafech; ?> - <?php echo $ciclo; ?>
                </strong></center>





            <form action="calculo.php" id="cadastro" method="post" enctype="multipart/form-data">

                <br>
                <!--/////-->

                <p class="center">
                    <label for="">Tipo de Avalia&ccedil;&atilde;o:</label>

                    <?php

            if(cmpIgual($tipo1,$chefimedesp) and $nome <> $nome1){
                $opcao = $chefimedesp;
                echo "<strong>Chefia Imediata ESP</strong>";
            }

            if(cmpIgual($tipo1,$chefimed) and $nome <> $nome1){
                $opcao = $chefimed;
                echo "<strong>".$opcao."</strong>";
            }elseif(cmpIgual($tipo, $chefimed) and cmpIgual($tipo1,"Servidor")){
                $opcao = "Servidor - Chefia Imediata";
                // echo "<strong>Servidor - Chefia Imediata</strong>";

            }elseif($nome == $nome1){
                $opcao = $autoaval;
                // echo "<strong>$autoaval</strong>";
            }elseif (cmpIgual($tipo1, "Servidor") and cmpIgual($tipo,"Servidor")){
                $opcao = "Membro da equipe - Pares";
                // echo "Membro da equipe - Pares";
            }

            echo (" $opcao <br/>");

            ?>

                </p>


                <!--<p class="center">
            <label  for="">Selecione uma Op&ccedil;&atilde;o:</label>

            <select  name="opcao" id="opcao" required="required">
                <option value="">Escolha uma Op&ccedil;&atilde;o</option>
                <option value="Autoavalia&ccedil;&atilde;o">Autoavalia&ccedil;&atilde;o</option>
                <option value="Chefia Imediata">Chefia Imediata</option>
                <option value="Servidor - Chefia Imediata (at&eacute; DAS3)">Servidor - Chefia Imediata (at&eacute; DAS3)</option>
                <option value="Membro da equipe - Pares">Membro da equipe - Pares</option>
            </select>
        </p>
<!--/////-->
                <br>


                <h2 class="center" style="font-size: 16pt;">Dados do Avaliado</h2>

                <input class="caixa" type="text" name="opcao" id="opcao" value="<?=$opcao;?>"
                    style="display:none" />
                <p>
                    <label for="">Unidade de Avalia&ccedil;&atilde;o:</label>
                    <input class="caixa" type="text" name="unid_org" id="unid_org" value="<?php echo $unid; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label for="">
                        Sigla da Unidade de Avalia&ccedil;&atilde;o:
                    </label>
                    <input class="caixa" type="text" name="sigla_org" id="sigla_org" value="<?php echo $sigla; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label for="">Nome completo do avaliado:</label>
                    <input class="caixa" type="text" name="nome" id="nome" value="<?php echo $nome; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label for="">Matr&iacute;cula SIAPE:</label>
                    <input class="caixa" type="text" name="siape" id="siape" value="<?php echo $siape; ?>"
                        readonly="true" />
                </p>
                <p>
                    <label for="">Cargo Efetivo:</label>
                    <input class="caixa" type="text" name="cargo" id="cargo" value="<?php echo $cargo; ?>"
                        readonly="true" />
                </p>
                <p>
                    <label> Ramal:</label>
                    <input class="caixa" type="text" name="ramal" id="ramal" value="<?php echo $ramal; ?>"
                        readonly="true" />
                </p>
                <p>
                    <label>Endere&ccedil;o Eletr&ocirc;nico (e-mail):</label>
                    <input class="caixa" type="text" name="email" id="email" value="<?php echo $email; ?>"
                        readonly="true" />
                </p>

                <br>

                <hr>


                <br>


                <h2 class="center" style="font-size: 16pt;">Dados do Avaliador</h2>

                <p>
                    <label for="">Nome completo do avaliador:</label>
                    <input class="caixa" type="text" name="nome1" id="nome1" value="<?php echo $nome1; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label for="">Matr&iacute;cula SIAPE:</label>
                    <input class="caixa" type="text" name="siape1" id="siape1" value="<?php echo $siape1; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label for="">Cargo Efetivo:</label>
                    <input class="caixa" type="text" name="cargo1" id="cargo1" value="<?php echo $cargo1; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label> Ramal:</label>
                    <input class="caixa" type="text" name="ramal1" id="ramal1" value="<?php echo $ramal1; ?>"
                        readonly="true" />
                </p>

                <p>
                    <label>Endere&ccedil;o Eletr&ocirc;nico (e-mail):</label>
                    <input class="caixa" type="text" name="email1" id="email1" value="<?php echo $email1; ?>"
                        readonly="true" />
                </p>

                <br><br>
                <hr>

                <strong>Observa&ccedil;&otilde;es:</strong>

                <ul>
                    <li>
                        <p align="justify">Para que o processo de avalia&ccedil;&atilde;o de desempenho individual seja
                            efetivo, solicitamos que o avaliador preencha os dados abaixo, proceda &agrave;
                            avalia&ccedil;&atilde;o de acordo com os 5 fatores e seus crit&eacute;rios abaixo
                            especificados.</p><br>
                    </li>
                    <li>
                        <p align="justify">&Eacute; de responsabilidade dos envolvidos no processo o cumprimento dos
                            prazos determinados no cronograma, o acompanhamento da evolu&ccedil;&atilde;o do processo e,
                            ao final, o registro e a ci&ecirc;ncia dos procedimentos.</p><br>
                    </li>
                    </p>
                    <li>
                        <p align="justify">
                            <font color="red"><em>Superou a expectativa (5); Atendeu a expectativa (4); Atendeu mais de
                                    50% da expectativa (3); Atendeu 50% ou menos da expectativa (2); N&atilde;o atendeu
                                    a expectativa (1).</em></font>
                        </p><br>
                    </li>
                </ul>

                <br>



                <center>
                    <table style="width: 790px; margin-left: -90px;" class="tabela-mod center">

                        <!----------------TITULO DA TABELA---------->

                        <tr>
                            <th style="width: 350px; text-align: center;">Fatores de Compet&ecirc;ncia</th>
                            <th style="width: 250px;">Quesitos</th>
                            <th colspan="5">Pontos</th>
                        </tr>

                        <!-----------------NUMERO 1------------------------>

                        <tr>
                            <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                                1. Produtividade: capacidade de atender &agrave;s demandas com qualidade e em quantidade
                                apropriada, considerando-se os fatores tempo, emprego de recursos materiais e/ou
                                financeiros com planejamento e organiza&ccedil;&atilde;o.
                            </td>
                            <td>
                                <strong>a)</strong> executa as suas atividades de acordo com os padr&otilde;es de
                                qualidade aceit&aacute;veis.
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="1a" value="1"
                                    placeholder=" " /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="1a" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="1a" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="1a" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="1a" value="5" /> </td>


                        </tr>
                        <tr>
                            <td>
                                <strong>b)</strong> Realiza suas atividades dentro dos prazos estabelecidos
                            </td>

                            <td class="nota">1 <br> <input class="center" type="radio" name="1b" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="1b" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="1b" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="1b" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="1b" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>c)</strong> Realiza volume de trabalho condizente com a demanda, considerando os
                                recursos disponibilizados
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="1c" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="1c" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="1c" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="1c" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="1c" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>d)</strong> Realiza efetivamente as atribui&ccedil;&otilde;es do cargo que ocupa
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="1d" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="1d" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="1d" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="1d" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="1d" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong> e)</strong> Utiliza com racionalidade os recursos (humanos/ materiais/
                                financeiros) colocados &agrave; sua disposi&ccedil;&atilde;o
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="1e" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="1e" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="1e" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="1e" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="1e" value="5" /> </td>
                        </tr>


                        <!------------------------NUMERO----2------------------------------------------>

                        <tr>
                            <td style="font-weight: bold; font-size: 13pt;" rowspan="3">
                                2. Conhecimento de M&eacute;todos e T&eacute;cnicas: conhecimento, aprofundamento,
                                atualiza&ccedil;&atilde;o, senso cr&Iacute;tico e proposi&ccedil;&atilde;o de
                                mudan&ccedil;as dos m&eacute;todos, t&eacute;cnicas e processos inerentes ao seu
                                trabalho
                            </td>
                            <td>
                                <strong>a)</strong> Planeja e organiza as pr&oacute;prias atividades, priorizando a
                                execu&ccedil;&atilde;o das mais importantes
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="2a" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="2a" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="2a" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="2a" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="2a" value="5" /> </td>


                        </tr>

                        <tr>
                            <td>
                                <strong>b)</strong> Executa regularmente seu trabalho, sem necessidade de
                                orienta&ccedil;&atilde;o
                            </td>

                            <td class="nota">1 <br> <input class="center" type="radio" name="2b" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="2b" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="2b" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="2b" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="2b" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>c)</strong> Busca atualizar-se quanto aos m&eacute;todos e t&eacute;cnicas a
                                serem aplicados no desempenho de suas atribui&ccedil;&otilde;es
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="2c" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="2c" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="2c" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="2c" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="2c" value="5" /> </td>
                        </tr>

                        <!------------------------NUMERO----3------------------------------------------>

                        <tr>
                            <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                                3. Trabalho em equipe: capacidade de trabalhar levando-se em conta a
                                preserva&ccedil;&atilde;o dos relacionamentos, a colabora&ccedil;&atilde;o com seus
                                pares, a dissemina&ccedil;&atilde;o do senso de coletividade, a abertura aos debates e a
                                capacidade de agrega&ccedil;&atilde;o;
                            </td>
                            <td>
                                <strong>a)</strong> Desenvolve relacionamentos positivos com seus pares
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="3a" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="3a" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="3a" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="3a" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="3a" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>b)</strong> Mostra-se colaborativo com seus pares, ajudando o grupo sempre que
                                poss&iacute;vel
                            </td>

                            <td class="nota">1 <br> <input class="center" type="radio" name="3b" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="3b" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="3b" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="3b" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="3b" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>c)</strong> Estimula e refor&ccedil;a a&ccedil;&otilde;es que favore&ccedil;am a
                                uni&atilde;o do grupo, inibindo aquelas que prejudiquem a coletividade
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="3c" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="3c" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="3c" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="3c" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="3c" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>d)</strong> &eacute; aberto ao debate, respeitando a opini&atilde;o dos outros e
                                revendo sua opini&atilde;o, sempre que necess&aacute;rio
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="3d" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="3d" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="3d" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="3d" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="3d" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>e)</strong> &eacute; visto como algu&eacute;m que traz boas
                                contribui&ccedil;&otilde;es para o grupo, sendo agregador
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="3e" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="3e" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="3e" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="3e" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="3e" value="5" /> </td>
                        </tr>

                        <!------------------------NUMERO--4-------------------------------------------------------------->

                        <tr>
                            <td style="font-weight: bold; font-size: 13pt;" rowspan="6">
                                4. Comprometimento com o trabalho: envolvimento com as atividades pelas quais &eacute;
                                respons&aacute;vel no sentido de facilitar e contribuir efetivamente para a
                                resolu&ccedil;&atilde;o de problemas e para o alcance das metas institucionais;
                            </td>
                            <td>
                                <strong>a)</strong> Reconhece o seu papel para o cumprimento da miss&atilde;o do INPA
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="4a" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="4a" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="4a" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="4a" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="4a" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>b)</strong> Colabora com os membros da equipe na execu&ccedil;&atilde;o das
                                tarefas de sua unidade
                            </td>

                            <td class="nota">1 <br> <input class="center" type="radio" name="4b" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="4b" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="4b" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="4b" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="4b" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong> c)</strong> Busca solu&ccedil;&otilde;es para problemas e d&uacute;vidas do
                                cotidiano, encaminhando adequadamente os assuntos que fogem a sua fun&ccedil;&atilde;o
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="4c" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="4c" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="4c" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="4c" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="4c" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>d)</strong> Cumpre no prazo as tarefas e compromissos pertinentes &agrave; sua
                                fun&ccedil;&atilde;o
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="4d" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="4d" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="4d" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="4d" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="4d" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>e)</strong> Busca retroalimenta&ccedil;&atilde;o, interessando-se pelo
                                impacto/resultado do seu trabalho
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="4e" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="4e" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="4e" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="4e" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="4e" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>f)</strong> Demonstra persist&ecirc;ncia diante de dificuldades inerentes aos
                                processos de trabalho
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="4f" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="4f" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="4f" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="4f" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="4f" value="5" /> </td>
                        </tr>

                        <!------------------------NUMERO----5------------------------------------------>


                        <tr>
                            <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                                5. Cumprimento das normas de procedimento e de conduta ao desempenho das
                                atribui&ccedil;&otilde;es do cargo: capacidade para observar e cumprir normas e
                                regulamentos, bem como de manter um padr&atilde;o de comportamento adequado &agrave;
                                administra&ccedil;&atilde;o p&uacute;blica.
                            </td>
                            <td>
                                <strong>a)</strong> Conhece e cumpre as normas e regras do INPA e de sua unidade de
                                lota&ccedil;&atilde;o
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="5a" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="5a" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="5a" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="5a" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="5a" value="5" /> </td>


                        </tr>
                        <tr>
                            <td>
                                <strong>b)</strong> Zela pelo ambiente de trabalho, pelos equipamentos e pelos materiais
                                sob a sua responsabilidade
                            </td>

                            <td class="nota">1 <br> <input class="center" type="radio" name="5b" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="5b" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="5b" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="5b" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="5b" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>c)</strong> Trata com urbanidade e profissionalismo as pessoas no ambiente de
                                trabalho
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="5c" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="5c" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="5c" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="5c" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="5c" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>d)</strong> Encaminha corretamente os assuntos que fogem do seu poder de
                                decis&atilde;o
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="5d" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="5d" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="5d" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="5d" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="5d" value="5" /> </td>
                        </tr>
                        <tr>
                            <td>
                                <strong> e)</strong> Mant&eacute;m a apresenta&ccedil;&atilde;o pessoal de acordo com os
                                padr&otilde;es estabelecidos
                            </td>
                            <td class="nota">1 <br> <input class="center" type="radio" name="5e" value="1" /> </td>
                            <td class="nota">2 <br> <input class="center" type="radio" name="5e" value="2" /> </td>
                            <td class="nota">3 <br> <input class="center" type="radio" name="5e" value="3" /> </td>
                            <td class="nota">4 <br> <input class="center" type="radio" name="5e" value="4" /> </td>
                            <td class="nota">5 <br> <input class="center" type="radio" name="5e" value="5" /> </td>
                        </tr>
                        <tr>
                            <th colspan="7"><input class="but but-primary center"
                                    style=" width: 300px; box-shadow: 1px 1px 3px rgba(0,0,0,.4); border-radius: 4px; margin: auto; display: block;"
                                    type="submit" value="VER RESUMO DA AVALIA&Ccedil;&Atilde;O" id="CALCULAR"></td>
                        </tr>

                    </table>
                    <BR><BR><BR>
                </center>
                <input type="text" name="cont" id="cont" value="<?php echo $tcont; ?>" style="display:none;">
            </form>
        </div>

        <footer id="rodape">
            <strong>
                Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
            </strong>
            <div style="float: right; margin-right: 40px;">
                <a href='javascript:window.history.go(-1)'
                    style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> voltar</a>
                </center><br><br><br>
            </div>

        </footer>

        <script type="text/javascript">
        $("td").click(function() {
            $(this).find('input:radio').attr('checked', true);
        });
        </script>