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

        <h1 class="nome" style="width: 325px;">Relatório GDACT</h1>

       
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

      
    $strSQL1 = "SELECT distinct(sigla_org) as sigla FROM avaliado order by sigla_org asc";
    $rs = mysql_query($strSQL1, $conexao);
    $num_rows = mysql_num_rows($rs);

        while ($res = mysql_fetch_assoc($rs)) {
    // $res = [];
    // $res["sigla"] = "COSAS";
    if($res){
        ?>    

<br/>
<table border="1" width="90%">
 
    <tr>
        <th bgcolor="#abcdef" colspan="7"><h2><?=$res["sigla"]; ?></h2></th>
    </tr>

    <tr>
 
        <th bgcolor="#abcdef">Nome</th>
        <th bgcolor="#abcdef">Cargo</th>
        <th bgcolor="#abcdef">Coord</th>
        <th bgcolor="#abcdef">Subord</th>
        <th bgcolor="#abcdef">Autoavalia&ccedil;&atilde;o</th>
        <th bgcolor="#abcdef">Foi Avaliado / Avaliou Chefia</th>
        <th bgcolor="#abcdef">Pares <br/> (AVALIOU / FOI AVALIADO)</th>
    </tr>

        <?php
        $strSQL2 = "SELECT * from avaliado where situacao like 'ativo' and (sigla_org like '".$res["sigla"]."' "
            . " or subordinacao like '".$res["sigla"]."') order by nome asc";
        $rs2 = mysql_query($strSQL2, $conexao);
        $num_rows2 = mysql_num_rows($rs2);

        if ($num_rows2 > 0) {


            // quem eh o chefe
            $strSQL21 = "SELECT * from avaliado where tipo like 'chefia%' and sigla_org like '".$res["sigla"]."'";
            //echo ($strSQL21);
            $rs21 = mysql_query($strSQL21, $conexao);
            $num_rows21 = mysql_num_rows($rs21);
            if($num_rows21 == 1){
                $res21 = mysql_fetch_assoc($rs21);
                $chefeemail = $res21['email'];
            }

            // validar se fez autoavaliacao, aval da chefia e dos pares
            while ($res2 = mysql_fetch_assoc($rs2)) {

                $avaliouchefe = FALSE;
                $avaliadopelochefe = FALSE;
                $fezautoavaliacao = FALSE;

                if (cmpIgual($chefeemail, $res2["email"])){ // quer dizer que este registro é do chefe

                    //echo ('caiu aqui na chefia.... <br/>');

                    // testar se fe autoavaliacao
                    $strSQL3 = "SELECT * from avaliacao where sigla like '".$res["sigla"]."' and emailaval like '".$chefeemail
                        . "' and email like '".$res2["email"]. "' and opcao like 'auto%'";
                
                    //echo ($strSQL3);
                    $rs3 = mysql_query($strSQL3, $conexao);
                    $num_rows3 = mysql_num_rows($rs3);
                
                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    if ($num_rows3 == 1) {
                        $res3 = mysql_fetch_assoc($rs3);
                        $fezautoavaliacao = true;
                    }

                    // pegar se a chehfia fez avaliacao do servidor

		    $strSQL3 = "select email from avaliado where sigla_org like "
                        . " (select subordinacao from avaliado where email like "
                        . " '".$res2["email"]."' and (sigla_org like '".$res2["sigla_org"]."' or "
                        ." subordinacao like '".$res["sigla_org"]."') ) "
                        . " and tipo like 'chefia%'";

                    // echo ($strSQL3);
                    $rs3 = mysql_query($strSQL3, $conexao);
                    $num_rows3 = mysql_num_rows($rs3);

                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    $emaildasubordinacao = "";
                    if ($num_rows3 == 1) {
                        $res3 = mysql_fetch_assoc($rs3);
                        $emaildasubordinacao = $res3["email"];

                    }

                    // testar se o servidor chefe foi avaliado pelo seu chefe (subordinacao)
                    $strSQL3 = "SELECT * from avaliacao where email like '".$chefeemail
                    . "' and emailaval like '".$emaildasubordinacao. "' and opcao like 'chefia%'";

                    // echo ($strSQL3);
                    $rs3 = mysql_query($strSQL3, $conexao);
                    $num_rows3 = mysql_num_rows($rs3);

                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    if ($num_rows3 == 1) {
                        $res3 = mysql_fetch_assoc($rs3);
                        $avaliadopelochefe = true;
                    }

                    // testar se o servidor chefe avaliou o seu chefe (subordinacao)
                    $strSQL3 = "SELECT * from avaliacao where emailaval like '".$chefeemail
                    . "' and email like '".$emaildasubordinacao. "' and opcao like 'chefia%'";

                    // echo ($strSQL3);
                    $rs3 = mysql_query($strSQL3, $conexao);
                    $num_rows3 = mysql_num_rows($rs3);

                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    if ($num_rows3 == 1) {
                        $res3 = mysql_fetch_assoc($rs3);
                        $avaliouchefe = true;
                    }

                    // validacao dos pares

                    $strSQL4 = "SELECT * from avaliado where sigla_org like '".$res["sigla"]."' and email not like '".$res2["email"]
                    . "' and grupo like '".$res2["grupo"]. "' and Situacao not like 'impedido'";

                    $rs4 = mysql_query($strSQL4, $conexao);

                    // echo ($strSQL4."<br/>");

                    $emailpares = array();
                    while ($res4 = mysql_fetch_assoc($rs4)) {
                        array_push($emailpares, $res4["email"]);
                    }

                    // var_dump($emailpares);
                    // echo ("<br/>");

                    $strSQL5 = "SELECT * from avaliacao where sigla like '".$res["sigla"]."' "
                    . " and emailaval like '".$res2["email"]. "' and opcao like '%pares%' order by nome";
                    $rs5 = mysql_query($strSQL5, $conexao);

                    //echo ($strSQL4."<br/>");
                    $rs5 = mysql_query($strSQL5, $conexao);
                    $num_rows5 = mysql_num_rows($rs5);
                    $servidoravaliou = array();
                    while ($res5 = mysql_fetch_assoc($rs5)) {
                        array_push($servidoravaliou, $res5["email"]);
                    }

                    $strSQL5 = "SELECT * from avaliacao where sigla like '".$res["sigla"]."' and email like '".$res2["email"]
                    . "' and opcao like '%pares%'  order by nome";

                    // echo ($strSQL5."<br/>");
                    $rs5 = mysql_query($strSQL5, $conexao);
                    $num_rows5 = mysql_num_rows($rs5);
                    $servidorfoiavaliado = array();
                    while ($res5 = mysql_fetch_assoc($rs5)) {
                        array_push($servidorfoiavaliado, $res5["emailaval"]);
                    }




                }else{ // nao eh chefia

                    // pegar se a chehfia fez avaliacao do servidor
                    $strSQL3 = "SELECT * from avaliacao where emailaval like '".$chefeemail
                        . "' and email like '".$res2["email"]. "' and opcao like 'chefia%'";
                
                    //echo ($strSQL3);
                    $rs3 = mysql_query($strSQL3, $conexao);
                    $num_rows3 = mysql_num_rows($rs3);
                
                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    if ($num_rows3 == 1) {
                        $res3 = mysql_fetch_assoc($rs3);
                        $avaliadopelochefe = true;
                    }
                
                    // pegar se servidor fez a avaliacao da chefia
                    $strSQL4 = "SELECT * from avaliacao where email like '".$chefeemail
                    . "' and emailaval like '".$res2["email"]. "' and opcao like 'servidor%chefia%'";

                    // echo ($strSQL4);
                    $rs4 = mysql_query($strSQL4, $conexao);
                    $num_rows4 = mysql_num_rows($rs4);

                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    if ($num_rows4 == 1) {
                        $res4 = mysql_fetch_assoc($rs4);
                        $avaliouchefe = true;
                    }

                    // pegar se servidor fez a autoavaliacao
                    $strSQL4 = "SELECT * from avaliacao where email like '".$res2["email"]
                    . "' and emailaval like '".$res2["email"]. "' and opcao like 'auto%'";

                    //echo ($strSQL4."<br/>");
                    $rs4 = mysql_query($strSQL4, $conexao);
                    $num_rows4 = mysql_num_rows($rs4);

                    //echo ("Chegou aqui.... ".$num_rows. "<br/>");
                    if ($num_rows4 == 1) {
                        $res4 = mysql_fetch_assoc($rs4);
                        $fezautoavaliacao = true;
                    }

                    // validacao dos pares

                    $strSQL4 = "SELECT * from avaliado where sigla_org like '".$res["sigla"]."' and email not like '".$res2["email"]
                    . "' and grupo like '".$res2["grupo"]. "' and Situacao not like 'impedido'";

                    $rs4 = mysql_query($strSQL4, $conexao);
                    
                    // echo ($strSQL4."<br/>");
                
                    $emailpares = array();
                    while ($res4 = mysql_fetch_assoc($rs4)) {
                        array_push($emailpares, $res4["email"]);
                    }

                    // var_dump($emailpares);
                    // echo ("<br/>");
        
                    $strSQL5 = "SELECT * from avaliacao where sigla like '".$res["sigla"]."' "
                    . " and emailaval like '".$res2["email"]. "' and opcao like '%pares%' order by nome";
                    $rs5 = mysql_query($strSQL5, $conexao);
                
                    //echo ($strSQL4."<br/>");
                    $rs5 = mysql_query($strSQL5, $conexao);
                    $num_rows5 = mysql_num_rows($rs5);
                    $servidoravaliou = array();
                    while ($res5 = mysql_fetch_assoc($rs5)) {
                        array_push($servidoravaliou, $res5["email"]);
                    }

                    $strSQL5 = "SELECT * from avaliacao where sigla like '".$res["sigla"]."' and email like '".$res2["email"]
                    . "' and opcao like '%pares%'  order by nome";
                
                    // echo ($strSQL5."<br/>");
                    $rs5 = mysql_query($strSQL5, $conexao);
                    $num_rows5 = mysql_num_rows($rs5);
                    $servidorfoiavaliado = array();
                    while ($res5 = mysql_fetch_assoc($rs5)) {
                        array_push($servidorfoiavaliado, $res5["emailaval"]);
                    }

                    // echo ( " AVALIOU <br/>");
                    // var_dump($servidoravaliou);
                    // echo ( " <br/>AVALIADO POR <br/>");
                    // var_dump($servidorfoiavaliado);
                } // fecha o else prap verificar se é chefe
            




        ?>
    <tr>
        <td><?=$res2["nome"]; ?></td>
        <td><center><?=$res2["cargo"]; ?></center></td>
        <td><center><?=$res2["sigla_org"]; ?></center></td>
        <td><center><?=$res2["subordinacao"]; ?></center></td>
        <td><center>
            <?php
                
                if($fezautoavaliacao){
                ?>
                    &#x2705;
                <?php
                }else{
                ?>
                    &#x274C;
                <?php
                } 
            ?>    
    
            </center>
        </td>
        <td><center>
            <?php
                
                if($avaliadopelochefe){
                ?>
                    &#x2705;
                <?php
                }else{
                ?>
                    &#x274C;
                <?php
                } 
            ?>
            /
            <?php
                if($avaliouchefe){
                ?>
                    &#x2705;
                <?php
                }else{
                ?>
                    &#x274C;
                <?php
                } 
            ?>
            </center></td>
        <td><center>

            <table width="100%">
            <?php 


                for($i = 0; $i < count($emailpares); $i++){
                ?>
                    <tr>
                    <?php

                    $tmp = new Avaliado();
                    $tmp->retrieveFromDBByAttr("email", $emailpares[$i]);

                    ?>
                    <td style="text-align: left;">
                    <?php
                    echo (getFirstName($tmp->getField("nome")));
                    ?>
                    </td>
                    <td>
                    <?php
                    if (in_array($emailpares[$i], $servidoravaliou)){
                    ?>
                        &#x2705;
                    <?php
                    }else{
                    ?>
                        &#x274C;
                    <?php
                    } 
                    ?>
                    </td>
                    <td>
                    
                    <?php
                    if (in_array($emailpares[$i], $servidorfoiavaliado)){
                    ?>
                        &#x2705;
                    <?php
                    }else{
                    ?>
                        &#x274C;
                    <?php
                    } 
                    ?>
                    </td>
                </tr>
                <?php
                }



            ?>
            </table>
            </center>
        </td>
    </tr>
 <?php
            }
        }
    }
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
