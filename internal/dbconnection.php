<?php

// ALGUMAS CONSTANTES PARA FACILITAR AS DEFINICOES
$autoaval = "Autoavaliacao";
$chefimed = "Chefia Imediata";
$chefimedesp = "Chefia Imediata ESP";

function connect (){

	$server = "localhost";
	$user = "root";
	$xyz = "adivinha";
	$db = "gdactidi1920";

	$conn = mysql_connect($server, $user, $xyz) or die ("Erro na conexao com mysql");
	mysql_select_db($db, $conn) or die ("Erro na selecao do BD");

	return $conn;
}

function connectmeta (){

	$server = "localhost";
	$user = "root";
	$xyz = "adivinha";
	$db = "gdactplano1920";

	$conn = mysql_connect($server, $user, $xyz) or die ("Erro na conexao com mysql");
	mysql_select_db($db, $conn) or die ("Erro na selecao do BD");

	return $conn;
}



function fquery ($command){
	$conn = connect();
	
	if(!$conn) die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

	$res = mysql_query ($command, $conn);

	return $res;
}

?>