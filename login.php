<?php
header('Content-Type: text/html; charset=utf-8');
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
        <h3 class="title">DTIN/COTIN - GDACT-IDI</h3>
    </header>

    <div class="conteudo">

    <h1 class="nome" style="width: 325px;">Sistema de Avalia&ccedil;&atilde;o</h1>


        <br><br>

        <form id="login" action="individual.php" method="post" enctype="multipart/form-data">

            <h3>LOGIN</h3>

           <p>

           <?php 
           $nm = $_GET['lin'];
           ?>

               <label for="usuario"><?php echo $nm; ?></label>
               <input class="caixa" id="usuario" name="usuario" type="text"  value="<?php echo $nm; ?>" style="display:none;">
               <br/><br/>
               <label for="email">E-MAIL:</label><br/>
               <input class="caixa" style="width: 120px; text-align: right;" id="email" name="email" type="text" required="required"/>@inpa.gov.br
           </p>

            <p>
                <label for="senha">
                    SENHA:
                </label><br/>

                <input class="caixa" id="senha" name="senha" type="password" required="" placeholder="Senha" />    <br>

            </p>

            <input type="submit" value="ENTRAR"/>
        </form>
       

    </div>

    <br><br><br>

    <footer id="rodape">
        <strong>
            Copyright&copy; - <a class="link" href="#">DTIN/ON </a> & COTIN/COGPE/INPA
        </strong>
        <div style="float: right; margin-right: 40px;">
            <a class="link" href="index.php" style="text-transform: uppercase; color: red; text-shadow: 1px 1px 3px rgba(0,0,0,.3);">Sair</a>
        </div>
    </footer>
</div>
</body>

