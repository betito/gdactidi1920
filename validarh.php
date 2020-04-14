<?php
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 10/16/15
 * Time: 1:39 PM
 */
 // Inclui o arquivo com o sistema de segurança
    require_once("segurancarh.php");
// Verifica se um formulário foi enviado

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verifica&ccedil;&atilde;o com isset() pra saber se o campo foi preenchido

        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
        $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    // Utiliza uma fun&ccedil;&atilde;o criada no seguranca.php pra validar os dados digitados

        if (validaUsuario($usuario, $senha) == true) {
        // O usuário e a senha digitados foram validados, manda pra página interna

            header("Location: painelrh.php");

        }
        else {
            // O usuário e/ou a senha são inválidos, manda de volta pro form de login
            // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
            expulsaVisitante();

        }
}