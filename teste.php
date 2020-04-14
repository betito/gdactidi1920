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
    <link rel="stylesheet" href="css/formulario.css"/>

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>


       
</head>
<body>

<?php

$x = "03/09/2019"; // from database

 $date_now = new DateTime();
 $date2    = new DateTime(prepareDate($x));

 echo ("prepared: " . prepareDate($x) . "<br/>");
 echo ("now: " . $date_now->format("Y-m-d") . "<br/>");

if ($date_now > $date2) {
    echo 'greater than';
}else{
    echo 'Less than';
}

?>

</div>
</body>

