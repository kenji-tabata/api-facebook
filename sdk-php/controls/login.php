<?php

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../Facebook.php';

// Se o usuário está logado...
if(existeToken()) {
    // Seta o token que está armazenado na session no objeto Facebook
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    // Retorna os dados do usuário do Facebook
    $userNode = retornarDadosUsuario($fb);

}
// Se não estiver logado...
else {
    // Helper auxilia no gerador de url para o login
    $helper = $fb->getRedirectLoginHelper();

    // Opcional, adicione quais as permissões que precisaremos para visualizar os dados do usuário
    $permissions = ['public_profile', 'email'];

    // Controi a url do login que será utilizado no botão de login.
    // O primeiro parâmetro é o redirecionamento para o action que salva o token na session.
    $loginUrl =  $helper->getLoginUrl('http://www.ouse.net.br.vm01/uteis/app-facebook/sdk-php/controls/login-action.php', $permissions);

    // debug
    // var_dump($helper);
    //var_dump($loginUrl);
}