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
    <link rel="stylesheet" href="css/formulario.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>


       
</head>
<body>

<?php

$nm = "";
if(isset($_GET['nval'])){
    $nm = $_GET['nval'];
}
if(isset($_GET['lin'])){
    $nm = $_GET['lin'];
}


 mysql_set_charset('UTF8', $conexao);
 $strSQL = "SELECT * FROM avaliado WHERE nome like '$nm'";

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

        <h2 class="center">Ficha de Avalia&ccedil;&atilde;o de Desempenho Individual (FADI)  </h2>
        <p class="center" style="color: red;">Ciclo de Avalia&ccedil;&atilde;o: De  01/03/2014  a 28/02/2016</p>

        

        <form action="" id="cadastro" method="post">

        <br>

        <p class="center">
            <label  for="">Selecione uma Op&ccedil;&atilde;o:</label>

            <select  name="opcao" id="opcao">
                <option selected value="">Escolha uma Op&ccedil;&atilde;o</option>
                <option value="">Autoavalia&ccedil;&atilde;o</option>
                <option value="">Chefia Imediata - Servidor</option>
                <option value="">Servidor - Chefia Imediata (até DAS3)</option>
                <option value="">Membro da equipe - Pares</option>
            </select>
        </p>

        <br>


        <h2 class="center" style="font-size: 16pt;">Dados do Avaliado</h2>

        <p class="center">
            <label for="">Unidade de Avalia&ccedil;&atilde;o:</label>
            <input class="caixa" type="text" name="unid_org"  id="unid_org" value="<?php echo $unid; ?>" readonly="true"/>
        </p>

        <p class="center">
            <label for="">
                Sigla da Unidade de Avalia&ccedil;&atilde;o:
            </label>
            <input class="caixa" type="text" name="sigla_org"  id="sigla_org" value="<?php echo $sigla; ?>" readonly="true"/>
        </p>

        <br>

        <p class="center">
            <label for="">Nome completo do avaliado:</label>
            <input class="caixa" type="text"  name="nome" id="nome" value="<?php echo $nome; ?>" readonly="true"/>
        </p>

        <p class="center">
            <label for="">Matrícula SIAPE:</label>
            <input class="caixa" type="text" name="siape" id="siape" value="<?php echo $siape; ?>" readonly="true"/>
        </p>
        <p class="center">
            <label for="">Cargo Efetivo:</label>
            <input class="caixa" type="text" name="cargo" id="cargo" value="<?php echo $cargo; ?>" readonly="true"/>
        </p>
        <p class="center">
            <label> Ramal:</label>
            <input class="caixa" type="text" name="ramal" id="ramal" value="<?php echo $ramal; ?>" readonly="true"/>
        </p>
        <p class="center">
            <label>Endereço Eletrônico (e-mail):</label>
            <input class="caixa" type="text" name="email" id="email" value="<?php echo $email; ?>" readonly="true"/>
        </p>

        <br>

        <hr>

               
            <br><br><br><br><br>
        
            
            <h2 class="center" style="font-size: 16pt;">Dados do Avaliador</h2>

        <p class="center">
             <label for="">Nome do Avaliador:</label>

           <?php
                
           
           mysql_set_charset('UTF8', $conexao);
           $strSQL = "SELECT * FROM avaliado";
           $rs = mysql_query($strSQL, $conexao);
           $row = mysql_fetch_array($rs);
           $num = mysql_num_rows($rs);

           $nome = $row["nome"];

               echo'<select style="width: 250px; margin-bottom: 4px;" name="aval" id="aval">';

                    echo '<option selected > ----------- Nomes ----------- </option>';
                    while($row = mysql_fetch_assoc($rs)) {


                        echo '<option>' .strtoupper($row["nome"]).'</option>';


              }
               echo '</select>';


              ?>

        </p>

        <p class="center">
            <label for="siape_a">
                Matrícula SIAPE:
            </label>
            <input name="siape_a" id="siape_a" class="caixa" type="text"/>
        </p>

               
         <?php 

     mysql_set_charset('UTF8', $conexao);
       $strSQL = "SELECT * FROM avaliado group by cargo";
       $rs = mysql_query($strSQL, $conexao);
       $row = mysql_fetch_array($rs);
       $num = mysql_num_rows($rs);

       $cargo = $row["cargo"];


         echo '<p class="center">';
            echo'<label  for="cargo_aval">';
                echo'Cargo Efetivo:';
            echo'</label>';

            echo'<select style="width: 250px; margin-bottom: 4px;" name="cargo_aval" id="cargo_aval">';

            echo '<option selected> -------- Cargos --------- </option>';
                while($row = mysql_fetch_assoc($rs)) {

                echo '<option>'.strtoupper($row["cargo"]).'</option>';
            }
            echo '</select>';


         echo'</p>';
          ?>

           <p class="center">
            <label> Ramal:</label>
            <input class="caixa" type="text"/>
        </p>
        <p class="center">
            <label>Endereço Eletrônico (e-mail):</label>
            <input class="caixa" type="text"/>
        </p>
<br><br>
<br>

       

        <center>
            <table class="print" style="border: 2px solid #000;">
                <tr style="border: 2px solid #000;">
                    <th colspan="3">CHEFE IMEDIATO</th>
                </tr>
                <tr style=" height: 70px;">
                    <td style="border: 2px solid #000;">Nome:</td>
                    <td style="border: 2px solid #000;">Matrícula:</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #000; height: 100px;" class="center">
                        <br><br><br>

                        <hr style="width: 50%;" class="center"/>
                            Assinatura/Carimbo
                    </td>
                    <td style="border: 2px solid #000;">
                        Data:
                    </td>
                </tr>
            </table>
            <br><br><br>
        </center>


        <center>
            <table class="print" style="border: 2px solid #000;">
            <tr style="border: 2px solid #000;">
                <th colspan="3">CIêNCIA DO SERVIDOR</th>
            </tr>

            <tr>
                <td  style="width: 200px; border: 2px solid #000;">
                    (&nbsp;&nbsp;) Concordo com a avalia&ccedil;&atilde;o <br><br>

                    (&nbsp;&nbsp;) Discordo da avalia&ccedil;&atilde;o
                </td>

                <td style="border: 2px solid #000; height: 100px; text-align: center;" >
                    <br><br><br>

                    <hr style="width: 50%" class="center"/>
                    Assinatura/Carimbo
                </td>

                <td style="border: 2px solid #000; " >
                    Data:
                </td>
            </tr>

        </table>
        </center>




        <!--<p class="center">-->
            <!--Superou a expectativa (5);<br>  Atendeu a expectativa (4);<br>  Atendeu mais de 50% da expectativa (3);<br> Atendeu 50% ou menos da expectativa (2);<br> Não atendeu a expectativa (1).-->
        <!--</p>-->

        <div class="print">
            <br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br>
        </div>

        <form title="Formulário Avalia&ccedil;&atilde;o" id="formgdact" name="formgdact" action="calcular()" method="post">
        <center>
        <table style="width: 790px; margin-left: -90px;" class="tabela-mod center" >

                <!----------------TITULO DA TABELA---------->

                <tr>
                    <th style="width: 350px; text-align: center;">Fatores de Competência</th>
                    <th style="width: 250px;">Quesitos</th>
                    <th colspan="5">Pontos</th>
                </tr>

                <!-----------------NUMERO 1------------------------>

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                        1. Produtividade: capacidade de atender às demandas com qualidade e em quantidade apropriada, considerando-se os fatores tempo, emprego de recursos materiais e/ou financeiros com planejamento e organiza&ccedil;&atilde;o.
                    </td>
                    <td>
                        <strong>a)</strong> executa as suas atividades de acordo com os padrões de qualidade aceitáveis.
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="1a" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="1a" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="1a" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="1a" value="4"/>  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="1a" value="5" />  </td>


                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Realiza suas atividades dentro dos prazos estabelecidos
                    </td>

                    <td class="nota">1 <br> <input class="center" type="radio" name="1b" value="1"/>  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="1b" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="1b" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="1b" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="1b" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Realiza volume de trabalho condizente com a demanda, considerando os recursos disponibilizados
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="1c" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="1c" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="1c" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="1c" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="1c" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Realiza efetivamente as atribuições do cargo que ocupa
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="1d" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="1d" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="1d" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="1d" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="1d" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                       <strong> e)</strong> Utiliza com racionalidade os recursos (humanos/ materiais/ financeiros) colocados à sua disposi&ccedil;&atilde;o
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="1e" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="1e" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="1e" value="3"/>  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="1e" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="1e" value="5" />  </td>
                </tr>


                <!------------------------NUMERO----2------------------------------------------>

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="3">
                        2. Conhecimento de Métodos e Técnicas: conhecimento, aprofundamento, atualiza&ccedil;&atilde;o, senso crítico e proposi&ccedil;&atilde;o de mudanças dos métodos, técnicas e processos inerentes ao seu trabalho
                    </td>
                    <td>
                        <strong>a)</strong> Planeja e organiza as próprias atividades, priorizando a execu&ccedil;&atilde;o das mais importantes
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="2a" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="2a" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="2a" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="2a" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="2a" value="5" />  </td>


                </tr>

                <tr>
                    <td>
                        <strong>b)</strong> Executa regularmente seu trabalho, sem necessidade de orienta&ccedil;&atilde;o
                    </td>

                    <td class="nota">1 <br> <input class="center" type="radio" name="2b" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="2b" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="2b" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="2b" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="2b" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Busca atualizar-se quanto aos métodos e técnicas a serem aplicados no desempenho de suas atribuições
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="2c" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="2c" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="2c" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="2c" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="2c" value="5" />  </td>
                </tr>

                <!------------------------NUMERO----3------------------------------------------>

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                        3. Trabalho em equipe: capacidade de trabalhar levando-se em conta a preserva&ccedil;&atilde;o dos relacionamentos, a colabora&ccedil;&atilde;o com seus pares, a dissemina&ccedil;&atilde;o do senso de coletividade, a abertura aos debates e a capacidade de agrega&ccedil;&atilde;o;
                    </td>
                    <td>
                        <strong>a)</strong> Desenvolve relacionamentos positivos com seus pares
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="3a" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="3a" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="3a" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="3a" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="3a" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Mostra-se colaborativo com seus pares, ajudando o grupo sempre que possível
                    </td>

                    <td class="nota">1 <br> <input class="center" type="radio" name="3b" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="3b" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="3b" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="3b" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="3b" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Estimula e reforça ações que favoreçam a união do grupo, inibindo aquelas que prejudiquem a coletividade
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="3c" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="3c" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="3c" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="3c" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="3c" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> É aberto ao debate, respeitando a opinião dos outros e revendo sua opinião, sempre que necessário
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="3d" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="3d" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="3d" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="3d" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="3d" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>e)</strong> É  visto como alguém que traz boas contribuições para o grupo, sendo agregador
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="3e" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="3e" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="3e" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="3e" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="3e" value="5" />  </td>
                </tr>

                <!------------------------NUMERO--4-------------------------------------------------------------->

                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="6">
                        4. Comprometimento com o trabalho: envolvimento com as atividades pelas quais é responsável no sentido de facilitar e contribuir efetivamente para a resolu&ccedil;&atilde;o de problemas e para o alcance das metas institucionais;
                    </td>
                    <td>
                        <strong>a)</strong> Reconhece o seu papel para o cumprimento da missão do ON
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="4a" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="4a" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="4a" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="4a" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="4a" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Colabora com os membros da equipe na execu&ccedil;&atilde;o das tarefas de sua unidade
                    </td>

                    <td class="nota">1 <br> <input class="center" type="radio" name="4b" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="4b" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="4b" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="4b" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="4b" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                       <strong> c)</strong> Busca soluções para problemas e dúvidas do cotidiano, encaminhando adequadamente os assuntos que fogem a sua fun&ccedil;&atilde;o
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="4c" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="4c" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="4c" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="4c" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="4c" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Cumpre no prazo as tarefas e compromissos pertinentes à sua fun&ccedil;&atilde;o
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="4d" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="4d" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="4d" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="4d" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="4d" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>e)</strong> Busca retroalimenta&ccedil;&atilde;o, interessando-se pelo impacto/resultado do seu trabalho
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="4e" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="4e" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="4e" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="4e" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="4e" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>f)</strong> Demonstra persistência diante de dificuldades inerentes aos processos de trabalho
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="4f" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="4f" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="4f" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="4f" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="4f" value="5" />  </td>
                </tr>

                <!------------------------NUMERO----5------------------------------------------>


                <tr>
                    <td style="font-weight: bold; font-size: 13pt;" rowspan="5">
                        5. Cumprimento das normas de procedimento e de conduta ao desempenho das atribuições do cargo: capacidade para observar e cumprir normas e regulamentos, bem como de manter um padrão de comportamento adequado à administra&ccedil;&atilde;o pública.
                    </td>
                    <td>
                        <strong>a)</strong> Conhece e cumpre as normas e regras do ON e de sua unidade de lota&ccedil;&atilde;o
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="5a" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="5a" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="5a" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="5a" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="5a" value="5" />  </td>


                </tr>
                <tr>
                    <td>
                        <strong>b)</strong> Zela pelo ambiente de trabalho, pelos equipamentos e pelos materiais sob a sua responsabilidade
                    </td>

                    <td class="nota">1 <br> <input class="center" type="radio" name="5b" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="5b" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="5b" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="5b" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="5b" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>c)</strong> Trata com urbanidade e profissionalismo as pessoas no ambiente de trabalho
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="5c" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="5c" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="5c" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="5c" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="5c" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong>d)</strong> Encaminha corretamente os assuntos que fogem do seu poder de decisão
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="5d" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="5d" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="5d" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="5d" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="5d" value="5" />  </td>
                </tr>
                <tr>
                    <td>
                        <strong> e)</strong> Mantém a apresenta&ccedil;&atilde;o pessoal de acordo com os padrões estabelecidos
                    </td>
                    <td class="nota">1 <br> <input class="center" type="radio" name="5e" value="1" />  </td>
                    <td class="nota">2 <br> <input class="center" type="radio" name="5e" value="2" />  </td>
                    <td class="nota">3 <br> <input class="center" type="radio" name="5e" value="3" />  </td>
                    <td class="nota">4 <br> <input class="center" type="radio" name="5e" value="4" />  </td>
                    <td class="nota">5 <br> <input class="center" type="radio" name="5e" value="5" />  </td>
                </tr>
                <tr>
                   <th colspan="1">TOTAL GERAL DE PONTOS OBTIDOS/PERCENTUAL (IDI):</th>
                    <td colspan ="1"><center> <input type="submit" required  name='calcular' value=""calcular"/></td>
                    <td colspan ="5"><center> <?php echo $resultado; ?></td>
                </tr>

            </table>
        </center>
        </form>
          </div>
