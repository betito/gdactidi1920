<?php
include_once './internal/dbconnection.php';
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
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/formulario1.css">
    <link rel="stylesheet" type="text/css" href="css/alert.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/cadastroinfra-form.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/menu-accordion.css">
    <link rel="stylesheet" type="text/css" href="css/menu-lateral.css">
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_login.css">
    <link rel="stylesheet" type="text/css" href="css/tabela.css">
    <link rel="stylesheet" type="text/css" href="css/tabelanome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <script src="./css/jquery.js" type="text/javascript"></script>
    <script src="./css/jquery.min.js" type="text/javascript"></script>
    <script src="./css/jquery-ui.min.js" type="text/javascript"></script>
    <script src="./css/jquery-ui.js" type="text/javascript"></script>
    <script src="./css/bootstrap.js"></script>
    <script src="./css/bootstrap.min.js"></script>
    <script src="./css/bootstrap.bundle.js"></script>
    <script src="./css/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./css/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./css/datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="./css/datatable/js/dataTables.fixedHeader.min.js"></script>

<style>

.font24 {
    font-size: 24pt; 
}

.mlines {
    word-wrap: break-word;
    white-space: normal;
}
</style>

</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">
        <h1 class="nome" style="width: 425px;">Cadastro de Servidores - GDACT</h1>



        <br><br>


        <h3 class="center" >
            REGISTRE O <span style="color: forestgreen; text-shadow: 1px 1px 2px rgba(0,0,0,.4);">SERVIDOR</span> PARA AVALIA&ccedil;&atilde;O
        </h3>

        <br>


<?php 


$coord = array();
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



$v = NULL;
$v = new Avaliado();
if (isset($_GET["id"])){
    $id = $_GET["id"];

    $v->showCommandFlag = FALSE;
    $v->retrieveFromDB($conexao, $id);
}

?>

        <form id="cadastro" method="post" action="cad_pessoal_acesso.php" enctype="multipart/form-data">

			<?php 
			if ($v->getField("id") != -1){
			    ?>
			    <input type="hidden" value="<?=$id;?>"  name="id"/>
			    <?php 
			}
			
			?>
              <div class="row">
                  <div class="col-md-4 col-sm-4 ">
                    <strong> Unidade Organizacional:</strong>
                  </div>
                  <div class="col-md-5 col-sm-5 ">
                    <select name="unid_org" id="unid_org" class="mlines">
                    	<?php
                    	for ($i = 0; $i < count($coord); $i++){
                        	$selected = "";
                        	if ($v->getField("id") != -1){
                        	    if (strcmp ($v->getField("unid_org"), $coord[$i]) == 0){
                        	        $selected = "selected";
                        	    }
                        	}
                    	?>
	            			<option <?=$selected;?> value="<?=$coord[$i];?>"><?=substr($coord[$i], 0, 50);?></option>
            			<?php 
                        }
            			?>
            		</select>
                </div>
                <br/>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 ">
                <strong>Sigla da Unidade Organizacional:</strong>
              </div>
              <div class="col-md-8 col-sm-8 ">
                <input type="text" value="<?=$v->getField("sigla_org");?>" name="sigla_org" id="sigla_org" size="30" title="Esse campo deve ser preenchido."  required=""><br>
              </div>
              <br/>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <strong>Nome do Avaliado:</strong>
                </div>
                <div class="col-md-8 col-sm-8 ">
                  <input required type="text"  value="<?=$v->getField("nome");?>"  name="nome" id="nome" size="50" title="Esse campo deve ser preenchido." >
                </div>
                <br/>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <strong>Matrícula SIAPE:</strong>
                </div>
                <div class="col-md-8 col-sm-8 ">
                  <input required type="text" name="siape" id="siape"  value="<?=$v->getField("siape");?>" size="10" maxlength="7" title="Por favor, preencha corretamente. Deve conter 3 letras e 4 números">
                </div>
                <br/>
            </div>

			<div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <strong>Tipo de Servidor:</strong>
                </div>
                <div class="col-md-8 col-sm-8 ">
                  	<select required="required" name="tipo" >
          				<option <?php if(strcmp($v->getField("tipo"), "EFETIVO") == 0) echo ("selected");?> value="EFETIVO" selected>EFETIVO</option>
                    	<option <?php if(strcmp($v->getField("tipo"), "CHEFIA IMEDIATA") == 0) echo ("selected");?> value="CHEFIA IMEDIATA" >CHEFIA IMEDIATA</option>
          				<option <?php if(strcmp($v->getField("tipo"), "CHEFIA IMEDIATA ESP") == 0) echo ("selected");?> value="CHEFIA IMEDIATA ESP">CHEFIA IMEDIATA ESP</option>
					</select>
                </div>
                <br/>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <strong>Cargo Efetivo:</strong>
                </div>
                <div class="col-md-8 col-sm-8 ">
                  <select required="required" name="cargo" >
          					<option <?php if(strcmp($v->getField("cargo"), "ASSISTENTE") == 0) echo ("selected");?> value="ASSISTENTE" selected>ASSISTENTE</option>
                    <option <?php if(strcmp($v->getField("cargo"), "PESQUISADOR") == 0) echo ("selected");?> value="PESQUISADOR" >PESQUISADOR</option>
          					<option <?php if(strcmp($v->getField("cargo"), "T&Eacute;CNICO") == 0) echo ("selected");?> value="T&Eacute;CNICO">T&Eacute;CNICO</option>
                    <option value="TECNOLOGISTA" <?php if(strcmp($v->getField("cargo"), "TECNOLOGISTA") == 0) echo ("selected");?> >TECNOLOGISTA</option>
          				</select>
                </div>
                <br/>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <strong>Ramal:</strong>
                </div>
                <div class="col-md-8 col-sm-8 ">
                  <input type="text" name="ramal" id="ramal" size="15" value="<?=$v->getField("ramal");?>" >
                </div>
                <br/>
            </div>


            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <strong>Email:</strong>
                </div>
                <div class="col-md-8 col-sm-8 ">
                  <input type="text" name="email" id="email" value="<?=$v->getField("email");?>" style="width: 300px;">
                </div>
                <br/>
            </div>
            <br><br>
            <input class="but but-primary center" style=" width: 125px; box-shadow: 1px 1px 3px rgba(0,0,0,.4); border-radius: 4px; margin: auto; display: block;" type="submit" value="REGISTRAR" id="Registrar">


        </form>
    </div>

    <br/><br/>

    <div class="row">
      <div class="col-md-12  col-sm-12">
        <table class="table table-condensed font8" id="table1">

          <thead>
            <tr>

              <th class="txtleft">id</th>
              <th class="txtleft">NOME</th>
              <th class="txtleft">Unid. Org. (sigla)</th>
              <th class="txtleft">SIAPE</th>
              <th class="txtleft">CARGO</th>
              <th class="txtleft">RAMAL</th>
              <th class="txtleft">E-MAIL</th>
              <th align="center"></th>
              <th align="center"></th>
            </tr>

          </thead>
          <tfoot>
            <tr>
              <th class="txtleft">id</th>
              <th class="txtleft">NOME</th>
              <th class="txtleft">Unid. Org. (sigla)</th>
              <th class="txtleft">SIAPE</th>
              <th class="txtleft">CARGO</th>
              <th class="txtleft">RAMAL</th>
              <th class="txtleft">E-MAIL</th>
              <th align="center"></th>
              <th align="center"></th>
            </tr>

          </tfoot>
          <tbody>

    <?php
    $v = new Avaliado();
    $v->showCommandFlag = FALSE;
    $list = $v->getAllAsArrayAssoc($conexao);
    for($i = 0; $i < count ( $list ); $i ++) {

      ?>
            <tr>
              <td class="txtleft"><?=$list [$i]["id"]; ?></td>
              <td class="txtleft"><?=$list [$i]["nome"]; ?></td>
              <th class="txtleft"><?=$list [$i]["sigla_org"]; ?></th>
              <td class="txtleft"><?=$list [$i]["siape"]; ?></td>
              <td class="txtleft"><?=$list [$i]["cargo"]; ?></td>
              <td class="txtleft"><?=$list [$i]["ramal"]; ?></td>
              <td class="txtleft"><?=$list [$i]["email"]; ?></td>
              <td class="txtleft"><a
                  href="cad_pessoal.php?id=<?=$list [$i] ["id"]; ?>">EDITAR</a></td>
              <td class="txtleft"><a
                  href="cad_pessoal_delete.php?id=<?=$list [$i] ["id"]; ?>">APAGAR</a></td>
            </tr>
        <?php
         }
        ?>
          </tbody>
        </table>
      </div>
    </div>


    <br/><br/>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
                   </strong>
        <div style="float: right; margin-right: 40px;">
             <a href='javascript:window.history.go(-1)' style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);"> voltar</a></center><br><br><br>"
        </div>

    </footer>
</div>

<script>

$("#unid_org").change(
  function () {
    var textf = $(this).find(":selected").text();
    textf = textf.substring(0, textf.indexOf(" -"));
    $("#sigla_org").val(textf);
  }
);



$(document).ready(function(){
	$("#table1").DataTable({
		fixedHeader: {
            header: true,
            footer: true
        },
			"language": {
			    "sEmptyTable": "Nenhum registro encontrado",
			    "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",
			    "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
			    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
			    "sInfoPostFix": "",
			    "sInfoThousands": ".",
			    "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
			    "sLoadingRecords": "Carregando...",
			    "sProcessing": "Processando...",
			    "sZeroRecords": "Nenhum registro encontrado",
			    "sSearch": "Pesquisar",
			    "oPaginate": {
			        "sNext": "Pr&oacute;ximo",
			        "sPrevious": "Anterior",
			        "sFirst": "Primeiro",
			        "sLast": "&Uacute;ltimo"
			    },
			    "oAria": {
			        "sSortAscending": ": Ordenar colunas de forma ascendente",
			        "sSortDescending": ": Ordenar colunas de forma descendente"
			    }
			},
			"pageLength": 10,
			"columnDefs": [ {
				"targets": [7, 8],
				"orderable": false
				} ]
	});
});



</script>


</body>
</html>
