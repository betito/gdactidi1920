<?php
function replaceExtraSlashs ($str){
	
	echo ("REPLACE :: " . $str);
	
	$ret = preg_replace('/^\\\"/', '"', $str, 1);
	$ret = preg_replace('/$\\\"/', '"', $ret, 1);
	
	return $ret;
}

function startSession(){
	if(session_status() == PHP_SESSION_NONE){
		//	session has not started
		session_start();
	}
}

function showContent($origcontent){
	$output = $origcontent;
	
	return $output;
}


function cmpIgual ($string1, $string2){
    
    
    if (strcasecmp($string1, $string2) == 0){
        return TRUE;
    }
    
    return FALSE;
    
}

function convert($text){
    
//     return iconv("ISO-8859-9", "UTF-8//TRANSLIT", $text);
    return iconv("UTF-8", "ISO-8859-9//TRANSLIT", $text);
    //return $text;
}

function getCoordName($sigla){
    
    $coord = array();
    array_push($coord,"-- - --");
    array_push($coord,"ASCOM - Assessoria de Comunica&ccedil;&atilde;o");
    array_push($coord,"COADI - Coordena&ccedil;&atilde;o de Adiministra&ccedil;&atilde;o ");
    array_push($coord,"COAES - Cordena&ccedil;&atilde;o de A&ccedil;&otilde;es Estrat&eacute;gicas");
    array_push($coord,"COAPC - Coordena&ccedil;&atilde;o de Apoio aos Programas,Contratos e Conv&ecirc;nios ");
    array_push($coord,"COATL - Cooderna&ccedil;&atilde;o de Apoio T&eacute;cnico e Log&iacute;stico");
    array_push($coord,"COATL - TELEFONIA");
    array_push($coord,"COBIO - Coordena&ccedil;&atilde;o de Biodiversidade");
    array_push($coord,"COCAP - Coordena&ccedil;&atilde;o de Capacita&ccedil;&atilde;o ");
    array_push($coord,"COCIN - Coordena&ccedil;&otilde;es de Coopera&ccedil;&atilde;o e Interc&acirc;mbio ");
    array_push($coord,"CODAM - Coordena&ccedil;&atilde;o de Din&acirc;mica Ambiental");
    array_push($coord,"COETI - Coordena&ccedil;&atilde;o de Extens&atilde;o Tecnol&oacute;gica e Inova&ccedil;&atilde;o");
    array_push($coord,"COEXT - Coordena&ccedil;&atilde;o de Extens&atilde;o");
    array_push($coord,"COGPE - Coordena&ccedil;&atilde;o de Gest&atilde;o de Pessoas");
    array_push($coord,"COPES - Coordena&ccedil;&atilde;o de Pesquisas");
    array_push($coord,"COPOG - Coordena&ccedil;&atilde;o de P&oacute;s -Gradua&ccedil;&atilde;o ");
    array_push($coord,"COSAS - Coordena&ccedil;&atilde;o de Sociedade,Ambiente e Sa&uacute;de ");
    array_push($coord,"COTEI - Coordena&ccedil;&atilde;o de Tecnologia e Inova&ccedil;&atilde;o ");
    array_push($coord,"COTES - Coordena&ccedil;&atilde;o de Tecnologia Social ");
    array_push($coord,"COTIN - Coordena&ccedil;&atilde;o de Tecnologia da Informa&ccedil;&atilde;o");
    array_push($coord,"CPL - Comiss&atilde;o Permanentes de Licita&ccedil;&atilde;o");
    array_push($coord,"DIATU - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Agricultura do Tr&oacute;pico &Uacute;mido ");
    array_push($coord,"DIBAT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Biologia de &Aacute;gua Doce e Pesca Interior");
    array_push($coord,"DIBOT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Bot&acirc;nica");
    array_push($coord,"DICAM - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Clima e Ambiente");
    array_push($coord,"DICFT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Ci&ecirc;ncias de Florestas Tropicais");
    array_push($coord,"DIDAT - Divis&atilde;o de Apoio T&eacute;cnico");
    array_push($coord,"DIEAR - Divis&atilde;o de Engenharia e Arquitetura");
    array_push($coord,"DIECO - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Ecologia");
    array_push($coord,"DIENT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Entomologia");
    array_push($coord,"DIGEN - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Gen&eacute;tica,Conserva&ccedil;&atilde;o e Biologia Evolutiva");
    array_push($coord,"DIRETORIA - Diretoria do INPA");
    array_push($coord,"DISER - Divis&atilde;o de Suporte &aacute;s Esta&ccedil;&otilde;es e Reservas");
    array_push($coord,"EDITORA - Editora do INPA");
    array_push($coord,"GINPA - Gabinete do INPA");
    array_push($coord,"NADMI - N&uacute;cleo de Apoio Adimistrativo");
    array_push($coord,"NAPAC - N&uacute;cleo de Apoio &aacute; Pesquisa no Acre");
    array_push($coord,"NAPOG - N&uacute;cleo de Apoio Adimistrativo");
    array_push($coord,"NAPPA - N&uacute;cleo de Apoio &aacute; Pesquisa no Par&aacute;");
    array_push($coord,"NAPRO - N&uacute;cleo de Apoio &aacute; Pesquisa em Rond&ocirc;nia");
    array_push($coord,"NAPRR - N&uacute;cleo de Apoio &aacute; Pesquisa em Roraima");
    array_push($coord,"PROJETOS - Projetos FINEP, SUDAM, etc");
    array_push($coord,"SEAAV - Servi&ccedil;o de Apoio &aacute;s &Aacute;reas de Visita&ccedil;&atilde;o");
    array_push($coord,"SEATL - Setor de Apoio Administrativo");
    array_push($coord,"SEBIO - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; COBIO");
    array_push($coord,"SEDAB - Servi&ccedil;o de Documenta&ccedil;&atilde;o e Acervo Bibliogr&aacute;fico ");
    array_push($coord,"SEDAM - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; CODAM");
    array_push($coord,"SEGAB - Servi&ccedil;o Adiministrativo do Gabinete");
    array_push($coord,"SEGPE - Setor de Apoio Administrativo");
    array_push($coord,"SEMPC - Servi&ccedil;o de Material, Patrim&ocirc;nio e Compras");
    array_push($coord,"SEOFI - Servi&ccedil;o de Or&ccedil;amento e Finan&ccedil;as ");
    array_push($coord,"SEPCA - COLE&Ccedil;&Otilde;ES - Setor de Apoio ao Programa  de Cole&ccedil;&otilde;es e Acervos Cientificos");
    array_push($coord,"SEREH - Servi&ccedil;o de Recursos Humanos ");
    array_push($coord,"SESAS - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; COSAS ");
    array_push($coord,"SETEI - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; COTEI");
    array_push($coord,"SETRH - Setor de Treinamento de Recursos Humanos ");
    
    $output =  "";
    for ($i = 0; ($i < count($coord)) && (strcmp($output, "") == 0); $i++){
        if (strpos ($coord[$i], $sigla . " -") !== false){
            $output = $coord[$i];
        }
    }
    
    return str_replace($sigla . " -", "", $output);
    
}


function authenticationLDAP($user, $pass){


    $ldapHost = "172.20.0.68";
    $ldapPort = 389;
    $ldapVersion = 3;
    $containerName = "ou=Usuarios,dc=inpa,dc=gov,dc=br";
    $ldap_dn = "uid=" . $user . "," . $containerName;

    //echo ($ldap_dn . "<br/>" );
    $ldap_con = ldap_connect($ldapHost, $ldapPort) or die ("Could not connect to $ldaphost");
    ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, $ldapVersion);

    if ($ldap_con){

        $lbind = ldap_bind($ldap_con, $ldap_dn, $pass);
        if($lbind){
            return TRUE;
        }else{
            return FALSE;
        }

    }else{
        echo "Erro na conexao com LDAP!";

    }


}


function doLogin ($email, $pass){


    // fazer login via ldap. usar o email mas jogar pra session o siape


//    login fake
    // return TRUE;

//     if(isInWhiteList($_POST["email"])){
//       return TRUE;

    $login = $email;

    if(strstr($email, "@")){
        $login = substr($email, 0, strpos($email, "@"));
    }

    //echo ("LOGIN == " . $login . "<br/>");
    if(authenticationLDAP($login, $pass)){
        // echo ("DEU<br/>");
        return TRUE;
    }else{
        // echo ("NAO DEU<br/>");

        $_SESSION["error"] = "Erro na autentica&ccedil;&atilde;o do usu&aacute;rio;";

        return FALSE;
    }

//    }
    return false;

}

function prepareDate($datestr){

    $local = explode("/", $datestr);
    //echo ($local[2] ."-".$local[1] ."-".$local[0]);
    return $local[2] ."-".$local[1] ."-".$local[0];

}


function getFirstName ($str){

    $tmp = explode(" ", $str);

    return ($tmp[0]);
}

function getConceptGrade($notageral){
    
    $output = 0;
    if (($notageral > 75) && ($notageral <= 100)){
        $output = 15;
    }
    
    if (($notageral > 50) && ($notageral <= 75)){
        $output = 11;
    }
    
    if (($notageral > 25) && ($notageral <= 50)){
        $output = 7;
    }
    
    if ($notageral <= 25){
        $output = 3;
    }
    
    
    return $output;
    
}


?>
