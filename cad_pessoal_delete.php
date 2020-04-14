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

    <meta charset="UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <header id="cabecalho">
        <img id="logo" src="img/logo.png" alt="Logotipo do Observatório Nacional"/>

        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

        <h1 class="nome" style="width: 425px;">Cadastro de Servidores - GDACT</h1>

        <br>

        <?php

        
        if (isset($_POST["submit"])){
        
            if (isset($_POST["id"])){
                $id = $_POST["id"];
        
            
            // -------------------------------------------
            
            
                mysql_set_charset('UTF8', $conexao);
                
                
                $v = new Avaliado();
                $v->showCommandFlag = FALSE;
                $v->retrieveFromDB($conexao, $id);
                if ($v->delete($conexao)){
            ?>
              
                  <center><img class='center' src='img/icon-check.png'/></center>
                  <center><h2>Registro do  Servidor <strong> <font color=red>" <?=$id;?> " </font> </strong>foi deletado com Sucesso!</h2></center><br><br>
                  <center><br><a href='cad_pessoal.php'>Clique aqui para voltar.</a></center><br><br><br>
              
            <?php
            }else{
            ?>
                    <div class="alert alert-danger" role="alert">
                    <center>
                    <img class='center' src='img/atencao.png'/>
                    Houve algum erro no cadastro do Servidor. Este <strong> <font color=red> <?=$id;?> </font> </strong> gerou algum erro no banco de dados!<br>
                        <?=mysql_error($conexao);?><br/>
                        <br/><a href='cad_pessoal.php'>Clique aqui para voltar.</a><br><br>
                    </center>
                  </div>
              <?php   
            }

        
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
            <center>
            <img class='center' src='img/atencao.png'/>
            ID do Servidor n&atilde;o foi informado!<br>
            <br/><a href='cad_pessoal.php'>Clique aqui para voltar.</a><br><br>
            </center>
            </div> 
            <?php 
        }
    
        }else{
            if (isset($_GET["id"])){
                $id = $_GET["id"];
                
?>

            	<form action="cad_pessoal_delete.php" method="post">
            	
            		Deletar o ID = <?=$id;?> ?
            		<input type="hidden" value="<?=$id;?>"  name="id"/>
            		Tem certeza? <br/>
            		<input type="submit" name="submit" value="APAGAR" />
            	
            	</form>

<?php 
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                <center>
                <img class='center' src='img/atencao.png'/>
                ID do Servidor n&atilde;o foi informado!<br>
                <br/><a href='cad_pessoal.php'>Clique aqui para voltar.</a><br><br>
                </center>
                </div>
    
<?php
            }
        }
     
?>
    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="http://www.on.br" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>
</html>
