<?php 
include_once './internal/dbconnection.php';
// Conecta com o Banco de Dados
$conexao = connect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>GDACT</title>

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
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

    <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>


        <br><br>

        <form id="login" action="validarh.php" method="post">

            <h3>LOGIN</h3>

           <p>
               <label for="usuario">Usu&aacute;rio: </label>
               <input class="caixa" id="usuario" name="usuario" type="text" autofocus="" placeholder="Usu&aacute;rio"/>
           </p>

            <p>
                <label for="senha">
                    Senha:
                </label>

                <input class="caixa" id="senha" name="senha" type="password" required="" placeholder="Senha"/>    <br>

            </p>

            <input onsubmit="showAlert();" onclick="showAlert('error','Login e Senha Inválidos!')"  style="border-radius: 4px; box-shadow: 1px 1px 4px rgba(0,0,0,.5);" class="but but-primary center" type="submit" value="ENTRAR"/>
        </form>
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON</a>
            <?php echo $nome; ?>
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

