<?php 
include_once './internal/dbconnection.php';
include_once './internal/utils.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<TITLE>GDACT</TITLE>    
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/tabela.css"/>
    <link rel="stylesheet" href="css/formulario.css"/>
       <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

     
</head>
<body>

<?php

// variáveis do avaliador
$nm = $_GET['lin'];
 
 $strSQL = "SELECT * FROM avaliacao WHERE nome = '$nm' order by nomeaval asc";

 $strSQL1 = "SELECT * FROM periodo";

  // Executa a query (o recordset $rs contém o resultado da query)
 $rs = mysql_query($strSQL, $conexao);
 $row = mysql_fetch_array($rs);
 $num = mysql_num_rows($rs);
 $rs1 = mysql_query($strSQL, $conexao);
 $row1 = mysql_fetch_array($rs1);
 $rs2 = mysql_query($strSQL, $conexao);
 $row2 = mysql_fetch_array($rs2);
 $rs3 = mysql_query($strSQL, $conexao);
 $row3 = mysql_fetch_array($rs2);
 $rs4 = mysql_query($strSQL, $conexao);
 $row4 = mysql_fetch_array($rs2);
 $rs5 = mysql_query($strSQL, $conexao);
 $row5 = mysql_fetch_array($rs2);
$rs6 = mysql_query($strSQL, $conexao);
 $row6 = mysql_fetch_array($rs2);
 $rs8 = mysql_query($strSQL, $conexao);
 $row8 = mysql_fetch_array($rs2);

 $rs9 = mysql_query($strSQL, $conexao);
 

 $rs7 = mysql_query($strSQL1, $conexao);
 $row7 = mysql_fetch_array($rs7);
 $num7 = mysql_num_rows($rs7);


$nome = $row["nome"];
$unid = getCoordName($row["sigla"]);
$sigla = $row["sigla"];
$siape = $row["siape"];
$cargo = $row["cargo"];
$ramal = $row["ramal"];
$email = $row["email"];
$nomeaval = $row["nomeaval"];
$opcao = $row["opcao"];
$perc = $row["perc"];

$dataentc = $row7["dataentc"];
$datafech = $row7["datafetch"];
$dataent = $row7["dataent"];
$datafec = $row7["datafec"];
$ciclo= $row7["ciclo"];


?>

<div class="container">
    <header>
       <center> <img  src="img/logo-on2.png" alt="Logotipo do Observat&oacute;rio Nacional"/></center>

          </header>

    <div class="conteudo">

        

        <br>

        <h2 class="center" style="font-size: 14pt;">TABELA DE CONSOLIDA&Ccedil;&Atilde;O DE PONTOS - GDACT/<?php echo $ciclo; ?>° CICLO</h2>
        <p class="center" style="color: red; font-size: 14pt;">Ciclo de Avalia&ccedil;&atilde;o: De <?php echo $dataentc; ?> a <?php echo $datafech; ?></p>
        <h2 class="center" style="font-size: 14pt;">UNIDADE DE AVALIA&Ccedil;&Atilde;O: <?php echo $unid; ?> - <?php echo $sigla; ?></h2>
               
       <hr style="width: 800px; margin: auto; display: block;" color="#0c3068" size="2" noshade="noshade"/>
        

        

        <br>

       <form method ="post" action="resumo1.php" id="cadastro" enctype="multipart/form-data">

        <h2 class="center" style="font-size: 14pt;">Dados do Avaliado</h2><br>
        <hr>

        
        <p class="">
            <label for="">Nome completo do avaliado:&nbsp;&nbsp;<?php echo $nome; ?></label>
        </p>

        <p class="">
            <label for="">Matr&iacute;cula SIAPE:&nbsp;&nbsp;<?php echo $siape; ?></label>
        </p>
        <p class="">
            <label for="">Cargo Efetivo:&nbsp;&nbsp;<?php echo $cargo; ?></label>
        </p>
        <p class="">
            <label> Ramal:&nbsp;&nbsp;<?php echo $ramal; ?></label>
        </p>
        <p class="">
            <label>Endere&ccedil;o Eletr&ocirc;nico (e-mail):&nbsp;&nbsp;<?php echo $email; ?></label>
        </p>

       
        <hr>

               <br><br>
 
        <center>
        <table style="width: 980px; heigth: 90px; margin-left: -190px;" class="tabela-mod center" >

                <!----------------TITULO DA TABELA---------->

                <tr>
                    <th style="width: 980px; text-align: center; font-size: 14pt;" colspan="7">AVALIADORES/PERCENTUAL E PONTOS ATRIBU&Iacute;DOS</th>
                    
                </tr>

                <!-----------------NUMERO 1------------------------>

                <tr>
                   
                    <td rowspan="2"><strong><center><label>Autoavalia&ccedil;&atilde;o</strong></td>
                    <td><strong><center><label>Percentual Autoavalia&ccedil;&atilde;o</Strong></td>
                    <td colspan="3"><center><label>Percentual Ponderado</td>
                    
                    
                </tr>
                <tr>
                   
                    <td><center><strong><label><?php
                    while($row3 = mysql_fetch_assoc($rs3)){ 
                        $opcao1 = $row3["opcao"]; 
                        $perc = $row3["perc"]; 
                        if ($opcao1 == $autoaval) {  echo $perc;}} ?>%</center></strong></td>
                    <td colspan="3"><center><strong><label><?php while($row4 = mysql_fetch_assoc($rs4)){ $opcao1 = $row4["opcao"]; $perc = $row4["perc"]; if ($opcao1 == $autoaval) { $ponderado = ($perc*0.15); echo round($ponderado, 1);}}?>%</center></strong></td>
                  
                    
                </tr>

                <tr>
                   
                    <td rowspan="2"><strong><center><label>Chefia Imediata <br></strong></td>
                    <td><strong><center><label>Percentual Avalia&ccedil;&atilde;o Chefia Imediata</strong></td>
                    <td colspan="3"><center><label>Percentual Ponderado</td>
                   
                    
                </tr>
                <tr>
                   
                    <td><center><strong><label><?php while($row5 = mysql_fetch_assoc($rs5)){ $opcao2 = $row5["opcao"];
                        if (cmpIgual($opcao2,$chefimed) or $opcao2 == $chefimedesp) { 
                            $perc3 = $row5["perc"]; echo $perc3;
                        }
                        } ?>
                        %</center></strong></td>
                    <td colspan="3"><center><strong><label><?php while($row8 = mysql_fetch_assoc($rs8)){ $opcao1 = $row8["opcao"]; $perc = $row8["perc"]; if ($opcao1 == $chefimed or $opcao1 == $chefimedesp) {$ponderado2 = ($perc3*0.60); echo round($ponderado2,1);}}?>%</center></strong></td>
                    
                    
                </tr>

                <tr>
                   
                    <td rowspan="1" colspan="2"><strong><center><label>Membros de Equipe<br></strong></td>
                    <td rowspan="1"><strong><center><label>Percentual Membros<br>de Equipe</strong></td>
                    <td colspan="1"><strong><center><label>M&eacute;dia % Membros<br>de Equipe</strong></td>
                    <td colspan="1"><strong><center><label>Percentual<br>Ponderado</strong></td>
                    <!--<td colspan="7" align="center"><strong><center><label>Total de <br>Pontos</strong></td>-->
                    
                    
                </tr>
                <tr>
                    
                    <td colspan="2"><strong><center><label><center><?php $opcao = $row1["opcao"]; if ($opcao <> $chefimed  and $opcao <> $chefimedesp and $opcao <> $autoaval) {echo $row1["nomeaval"]."<br>";} 
                    while($row1 = mysql_fetch_assoc($rs1)){
                        $aval = $row1["nomeaval"];
                        $opcao = $row1["opcao"];
                        if (!cmpIgual($opcao, $chefimed) and !cmpIgual($opcao, $chefimedesp) and !cmpIgual($opcao, $autoaval)) {
                           
                        
                        echo $aval."<br>"; }}?></td>

                        <td><strong><center><label><center>
                        <?php 
                        $opcao1 = $row6["opcao"];
                        if (!cmpIgual($opcao1, $chefimed) and !cmpIgual($opcao1, $chefimedesp) and !cmpIgual($opcao1, $autoaval)) {
                            $result = $row6["perc"];
                            //echo $row6["perc"];
                            
                           


                        }
                        $cont =0;
                        while($row6 = mysql_fetch_assoc($rs6)){
                           $perc2 = $row6["perc"];
                           $opcao1 = $row6["opcao"];
                            
                         if (!cmpIgual($opcao1, $chefimed) and !cmpIgual($opcao1, $chefimedesp) and !cmpIgual($opcao1, $autoaval)) {
                            $result1 = $perc2;
                            $totalr = ($totalr +  $result1);
                            
                           echo $perc2."%<br>";
                           $cont = $cont + 1;
                          
                        }
                        }

                        ?>




                        </td>



                    <td colspan="1"><center><strong><label><?php if ($cont <> 0) {                      
                    $tot = ($totalr / $cont); echo round($tot, 1);
                    
                    }else{$tot = $perc3;} ?>%</strong></td>
                    <td colspan="2"><center><strong><label><?php $ponderado3 = ($tot*0.25); echo round($ponderado3, 1); ?>%</strong></td>
                    <!--<td colspan="5" rowspan = "-4"><center><strong><label ><?php   $soma = round($ponderado3 + $ponderado2 + $ponderado, 1); if ($soma <= 25) {
    $totalp = 8;
    echo $totalp. "</strong>";
} 

if ($soma> 25 and $soma <= 50){
    $totalp = 7;
    echo $totalp. "</strong>";
} 

if ($soma > 50 and $soma <= 75){
    $totalp = 11;
    echo $totalp. "</strong>";
} 

if ($soma > 75 and $soma <= 100){
    $totalp = 15; 
    echo $totalp. "</strong>";}
    ?>
                   
                    
                </tr>-->

            <tr>
                   
                    <td colspan="2"><center><strong><label><br/>Nota Final Global<br/></strong></td>
                   <td colspan="8"><center><strong><label><?php $soma = round($ponderado3 + $ponderado2 + $ponderado, 1); echo $soma."%"; ?></td>
                                      
                </tr>

                <tr>
                   
                    <td colspan="2"><center><strong><label><br/>Pontos<br/></strong></td>
                    <td colspan="8"><center>
                        <strong><label>
                            <?php
                            $totalp = 8;
                            if ($soma <= 25) {
                                $totalp = 8;
                            } 

                            if ($soma> 25 and $soma <= 50){
                                $totalp = 7;
                            } 

                            if ($soma > 50 and $soma <= 75){
                                $totalp = 11;
                            } 

                            if ($soma > 75 and $soma <= 100){
                                $totalp = 15; 
                            }
                            echo $totalp;
                            ?>
                        </strong>
                    </td>
                                     
               </tr>

                <tr>
                    
                   
                </tr>
                <tr>
                   <td colspan="7" bgcolor="gray">
                   
                           
                  
                  
                  
                   <?php
                   $nm = $nome;
                                   
                   echo '<input type="text" name="nome" id="nome" value="'.$nm.'" style="display:none;">';
                   echo '<br><strong>Detalhamento da Avalia&ccedil;&atilde;o Individual:</strong>&nbsp;&nbsp;<select name="nomeaval" id="nomeaval">';
                   echo '<option> Selecione um nome </option>';
                  while($row9 = mysql_fetch_assoc($rs9)) {
                  $aval = $row9["nomeaval"];
                  $nn = $row9["nome"];
                  if ($nn == $nm) {
                                       
                  echo '<option>' .$aval. '</option>';
                } }
                   echo '</select>';

                   echo '&nbsp;&nbsp;<input type="submit" value="Visualizar"><br><br>';
                   echo '</form>';?>
                   


</td>
                </tr>

            </table>
            
            <BR>
        </center>
        </form>
          </div>

          <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON & COTIN/COGPE/INPA</a>
                   </strong>
        <div style="float: right; margin-right: 40px;">
             <a href='javascript:window.history.go(-1)' style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> voltar</a></center><br><br><br>
        </div>

    </footer>
