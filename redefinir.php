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
    <link rel="stylesheet" href="css/menu.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/style_login.css"/>
 <script>
        function showAlert(type,message) {
            $('#alert').addClass('alert-' + type).html( message ).fadeIn();
            setTimeout("closeAlert()", 4000);
        }



        function closeAlert() {
            $('#alert').fadeOut();
        }
    </script>
    
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

    <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>


        <br><br>

        <form id="login" action="red.php" method="post" enctype="multipart/form-data">

            <h3>REDEFINI&ccedil;&atilde;O DE SENHA</h3>

           <p>

          
               <label for="usuario">SIAPE:</label>
               <input class="caixa" id="siape" name="siape" type="text">
           </p>

            <p>
                <label for="senha">
                    SENHA ATUAL:
                </label>

                <input class="caixa" id="senha" name="senha" type="password" required="" maxlength="8" placeholder="Senha"/>    <br>

            </p>
            <p>
                <label for="senha">
                    NOVA SENHA:
                </label>

                <input class="caixa" id="senha1" name="senha1" type="password" maxlenght="8" required="" maxlength="8" placeholder="Máximo de 8 caracteres"/>    <br>

            </p>

            <input type="submit" value="ENTRAR"/>
        </form>
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>
