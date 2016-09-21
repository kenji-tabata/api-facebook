<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/Facebook.php';

if(existeToken()) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    try {
        // escolhe os campos
        $response = $fb->get('/me?fields=name,email,picture');
        // somente os dados do usuário em formato de objeto
        $userNode = $response->getGraphUser();

        # debug
        //var_dump($response);
        //var_dump($response->getDecodedBody()); # exibe formato de array
        //var_dump($userNode); # exibe formato de objeto

    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    // Os dados obtidos do usuário depende do preenchimento do usuário,
    // se ele não forneceu seu e-mail por exemplo,
    //     o email não será mostrado.
    echo '<img src=" '. $userNode->getPicture()['url'] .'"><br/>';
    echo 'Nome do usuário logado: ' . $userNode->getName();
    echo '<p><a href="logout.php">Sair</a></p>';
} else {
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['public_profile', 'email']; // Opcional, adicione quais são dados que precisamos do usuário
    $loginUrl = $helper->getLoginUrl('http://www.ouse.net.br.vm01/uteis/app-facebook/sdk-php/login-callback.php', $permissions);

    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}