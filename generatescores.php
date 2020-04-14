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

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cadastrointra-form.css"/>
    <link rel="stylesheet" href="css/tabela.css"/>
    <link rel="stylesheet" href="css/formulario1.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>


       
</head>
<body>

<?php

function listSameGroup($sigla, $grupo, $mysiape, $conexao){

    $strSQL = "select siape from avaliado where sigla_org like '$sigla'  "
        . " and tipo like 'servidor%' and siape not like '$mysiape' and Situacao like 'ativo' and grupo like '".$grupo."'";

    // echo ("PARES : " . $strSQL."<br/>");
    $rs = mysql_query($strSQL, $conexao);

    return $rs;

}

function listSubordinadosFrom($sigla, $conexao){

    $strSQL = "select siape from avaliado where sigla_org like '$sigla'  "
        . " and tipo not like 'chefia%' and Situacao like 'ativo'";

    $rs = mysql_query($strSQL, $conexao);

    return $rs;

}

function countSubordinadosFrom($sigla, $siape, $conexao){

    $strSQL = "select count(*) as tot from avaliado where (sigla_org like '$sigla' or subordinacao like '$sigla') "
        . " and siape not like '$siape' and Situacao like 'ativo'";

    // echo ("CONT : " . $strSQL."<br/>");
    $rs = mysql_query($strSQL, $conexao);
    $res = mysql_fetch_assoc($rs);

    return (int) $res["tot"];

}

function getNotaAutoAval($siape, $conexao){

    $strSQL = "select perc as total from avaliacao where siape = cast('$siape' as unsigned)  "
        . " and siapeaval = cast('$siape' as unsigned)";

    // echo ("auto : " . $strSQL . "<br/>");
    $rs = mysql_query($strSQL, $conexao);
    $res = mysql_fetch_assoc($rs);

    return (int) $res["total"];

}



function getNotaFromSubordinado($siapesubord, $siapechefia, $conexao){

    $strSQL = "select perc as total from avaliacao where siapeaval = cast('$siapechefia' as unsigned)  "
        . " and siape = cast('$siapesubord' as unsigned)";

    //echo ("getnota : " . $strSQL . "<br/>");
    $rs = mysql_query($strSQL, $conexao);
    $res = mysql_fetch_assoc($rs);

    return (int) $res["total"];

}

function getNotaChefia($siapesubord, $siapechefia, $conexao){

    $strSQL = "select perc as total from avaliacao where siape = cast('$siapesubord' as unsigned)  "
        . " and siapeaval = cast('$siapechefia' as unsigned)";

    // echo ("getchefia : " . $strSQL . "<br/>");
    $rs = mysql_query($strSQL, $conexao);
    $res = mysql_fetch_assoc($rs);

    return (int) $res["total"];

}


function updateIDIAndScore  ($avalscore, $idi, $siape, $conexao){

    $truncaval = floor($avalscore * 100) / 100;
    $strSQL = "update avaliado set avalscore = $truncaval, idi = $idi where siape like '$siape'";

    // echo ("UPDATE : " . $strSQL . "<br/>");
    $rs = mysql_query($strSQL, $conexao);
    if($rs === false){
        echo (mysql_error() . "<br/>");
    }

}

$strSQL1 = "SELECT * FROM avaliado WHERE Situacao like 'ativo' order by sigla_org, nome";
// $strSQL1 = "SELECT * FROM avaliado WHERE sigla_org like 'COTIN' and Situacao like 'ativo' order by nome";
// $strSQL1 = "SELECT * FROM avaliado WHERE sigla_org like 'SEBIO' and Situacao like 'ativo' order by nome";
// $strSQL1 = "SELECT * FROM avaliado WHERE (sigla_org like 'COBIO' or subordinacao like 'COBIO') and Situacao like 'ativo' order by nome";
// $strSQL1 = "SELECT * FROM avaliado WHERE (sigla_org like 'CODAM' or subordinacao like 'CODAM') and Situacao like 'ativo' order by nome";
// $strSQL1 = "SELECT * FROM avaliado WHERE (sigla_org like 'COSAS' or subordinacao like 'COSAS') and Situacao like 'ativo' order by nome";
// $strSQL1 = "SELECT * FROM avaliado WHERE (sigla_org like 'COADI' or subordinacao like 'COADI') and Situacao like 'ativo' order by nome";

// Executa a query (o recordset $rs contém o resultado da query)
$rs1 = mysql_query($strSQL1, $conexao);

while ($res1 = mysql_fetch_assoc($rs1)){

    if ((cmpIgual($res1["tipo"], $chefimed) == TRUE) || (cmpIgual($res1["tipo"], $chefimedesp) == TRUE)){

        echo ($res1["nome"] . " = <b>" . $res1["tipo"] . "</b>");

        $strSQL2 = "SELECT * FROM avaliado WHERE  "
            . " tipo like 'chefia%' and "
            . " sigla_org like '".$res1["subordinacao"]."' order by nome";

        // Executa a query (o recordset $rs contém o resultado da query)
        $rs2 = mysql_query($strSQL2, $conexao);
        $res2 = mysql_fetch_assoc ($rs2);

        // echo (" ==> ".$res2["nome"]."<br/>");

        $totsubord = countSubordinadosFrom($res1["sigla_org"],$res1["siape"], $conexao);
        // echo ("CONT :: $totsubord <br/>");
        if($totsubord > 0){
            // echo ("Tot subord : " . $totsubord . "<br/>"); // a conta aqui é a nota da chefia, nota auto e media das notas dos subordinados  (60%, 25% e 15%)
            $siapechefia = $res1["siape"];
            $siapechefiadachefia = $res2["siape"];
            if(cmpIgual($res1["subordinacao"], "DIR") == TRUE){
                $siapechefiadachefia = '663787';
            }
            $listsubordrs = listSubordinadosFrom($res1["sigla_org"], $conexao);
            $sumnotas = 0;
            while ($listsubord = mysql_fetch_assoc($listsubordrs)){
                // echo ($listsubord["siape"] . " | ");
                $notasubord = (int) getNotaFromSubordinado($listsubord["siape"], $siapechefia ,$conexao);
                // echo ($notasubord."<br/>");
                $sumnotas += $notasubord;
            }

            $avegsubord = $sumnotas/$totsubord;

            $autoaval = getNotaAutoAval ($siapechefia, $conexao);
            $notachefia = getNotaChefia ($siapechefia, $siapechefiadachefia, $conexao);

            $scorefinal = $notachefia*0.6 + $autoaval*0.25 + $avegsubord*0.15;
            $idi = getConceptGrade($scorefinal);

            // echo ("SUM :: " . $sumnotas . "<br/>");
            // echo ("TOT :: " . $totsubord . "<br/>");
            // echo ("AVER :: " . $avegsubord . "<br/>");
            // echo ("AUTO :: " . $autoaval . "<br/>");
            // echo ("CHEFIA :: " . $notachefia . "<br/>");
            // echo ("SCORE :: " . $scorefinal . "<br/>");
            // echo ("==> <b>IMI</b> :: " . $idi . "<br/>"); 
            echo ("&nbsp;&nbsp;SCORE :: " . $scorefinal );
            echo ("==> <b>IMI</b> :: " . $idi . "<br/>");

            updateIDIAndScore($scorefinal, $idi, $res1["siape"], $conexao);



        }

        if($totsubord == 0){ //chefia que nao tem par
            

            $strSQL2 = "SELECT * FROM avaliado WHERE  "
            . " tipo like 'chefia%' and "
            . " sigla_org like '".$res1["subordinacao"]."' order by nome";

            // echo ( "DEBUG 1: $strSQL2 <br/>");
            // Executa a query (o recordset $rs contém o resultado da query)
            $rs2 = mysql_query($strSQL2, $conexao);
            $res2 = mysql_fetch_assoc ($rs2);

            $siapechefia = $res1["siape"];
            $siapechefiadachefia = $res2["siape"];

            // echo (" ==> ".$res2["nome"]."<br/>");

            $autoaval = getNotaAutoAval ($siapechefia, $conexao);
            $notachefia = getNotaChefia ($siapechefia, $siapechefiadachefia, $conexao);

            $scorefinal = $notachefia*0.7 + $autoaval*0.3;
            $idi = getConceptGrade($scorefinal);

            // echo ("AUTO :: " . $autoaval . "<br/>");
            // echo ("CHEFIA :: " . $notachefia . "<br/>");
            // echo ("SCORE :: " . $scorefinal . "<br/>");
            // echo ("==> <b>IMI</b> :: " . $idi . "<br/>");
            echo ("&nbsp;&nbsp;SCORE :: " . $scorefinal);
            echo ("==> <b>IMI</b> :: " . $idi . "<br/>");

            updateIDIAndScore($scorefinal, $idi, $res1["siape"], $conexao);

        }


    }else{ // aqui é pra processar quem não é chefia

        echo ($res1["nome"] . " = <i>" . $res1["tipo"] );
        //echo ("Grupo = <i>" . $res1["grupo"] . "</i><br/>");

        $totsubord = countSubordinadosFrom($res1["sigla_org"],$res1["siape"], $conexao);
        // echo ("CONT2 :: $totsubord <br/>");

        if($totsubord == 0){ //chefia que nao tem par
            

            $strSQL2 = "SELECT * FROM avaliado WHERE  "
            . " tipo like 'chefia%' and "
            . " sigla_org like '".$res1["subordinacao"]."' order by nome";

            // echo ( "DEBUG 1: $strSQL2 <br/>");
            // Executa a query (o recordset $rs contém o resultado da query)
            $rs2 = mysql_query($strSQL2, $conexao);
            $res2 = mysql_fetch_assoc ($rs2);

            $siapechefia = $res1["siape"];
            $siapechefiadachefia = $res2["siape"];

            // echo (" ==> ".$res2["nome"]."<br/>");

            $autoaval = getNotaAutoAval ($siapechefia, $conexao);
            $notachefia = getNotaChefia ($siapechefia, $siapechefiadachefia, $conexao);

            $scorefinal = $notachefia*0.7 + $autoaval*0.3;
            $idi = getConceptGrade($scorefinal);

            // echo ("AUTO :: " . $autoaval . "<br/>");
            // echo ("CHEFIA :: " . $notachefia . "<br/>");
            // echo ("SCORE :: " . $scorefinal . "<br/>");
            // echo ("==> <b>IMI</b> :: " . $idi . "<br/>");
            echo ("&nbsp;&nbsp;SCORE :: " . $scorefinal);
            echo ("==> <b>IMI</b> :: " . $idi . "<br/>");

            updateIDIAndScore($scorefinal, $idi, $res1["siape"], $conexao);

        }else{
            $strSQL2 = "SELECT siape FROM avaliado WHERE  "
            . " tipo like 'chefia%' and Situacao like 'ativo' and "
            . " sigla_org like '".$res1["sigla_org"]."'";

            // Executa a query (o recordset $rs contém o resultado da query)
            $rs2 = mysql_query($strSQL2, $conexao);
            $res2 = mysql_fetch_assoc($rs2);

            $siapechefia = $res2["siape"];
            $listpares = listSameGroup($res1["sigla_org"], $res1["grupo"], $res1["siape"], $conexao);
            $sumnotas = 0;
            $contpares = 0;
            while ($listsubord = mysql_fetch_assoc($listpares)) {
                // echo ($listsubord["siape"]);
                $notasubord = (int) getNotaFromSubordinado($listsubord["siape"], $siapechefia, $conexao);
                // echo ($notasubord."<br/>");
                $sumnotas += $notasubord;
                $contpares++;
            }

            $avegsubord = $sumnotas/$contpares;

            $autoaval = getNotaAutoAval($res1["siape"], $conexao);
            $notachefia = getNotaChefia($siapechefia, $res1["siape"], $conexao);

            $scorefinal = $notachefia*0.6 + $autoaval*0.25 + $avegsubord*0.15;
            $idi = getConceptGrade($scorefinal);

            // echo("SUM :: " . $sumnotas . "<br/>");
            // echo("TOT :: " . $contpares . "<br/>");
            // echo("AVER :: " . $avegsubord . "<br/>");
            // echo("AUTO :: " . $autoaval . "<br/>");
            // echo("CHEFIA :: " . $notachefia . "<br/>");
            // echo("SCORE :: " . $scorefinal . "<br/>");
            // echo("==> <b>IMI</b> :: " . $idi . "<br/>");
            echo ("&nbsp;&nbsp;SCORE :: " . $scorefinal);
            echo ("==> <b>IMI</b> :: " . $idi . "<br/>");

            updateIDIAndScore($scorefinal, $idi, $res1["siape"], $conexao);
        }

    }


}




?>

</body>
</html>