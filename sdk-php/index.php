<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => 'seu-id',
    'app_secret' => 'sua-secret-key',
    'default_graph_version' => 'v2.7',
        ]);

//  Existe o token do login do Facebook ativo?
if (isset($_SESSION['facebook_access_token'])) {
    // ...se tiver o usuário está logado
    // então, seto ele como default no face
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

    
} 
// ...caso não exista o token de logado então
// mostramos o botão de login
else {
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['public_profile', 'email']; // Opcional, adicione quais são dados que precisamos do usuário
    $loginUrl = $helper->getLoginUrl('http://www.ouse.net.br.vm01/uteis/app-facebook/sdk-php/login-callback.php', $permissions);

    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}