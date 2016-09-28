<?php

require_once __DIR__ . '/bootstrap.php';

$fb = getFB();
$helper = $fb->getJavaScriptHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    die();
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    die();
}

if (!isset($accessToken)) {
    echo 'No cookie set or no OAuth data could be obtained from cookie.';
    die();
}

//var_dump($accessToken->getValue());


if ($accessToken->getValue()) {
    try {
        // Solicita para o Facebook os dados do usuário que precisamos
        $response = $fb->get('/me?fields=name,email,picture,gender', $accessToken->getValue());
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        die();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        die();
    }

    // Adiciona na session os dados do usuário e o token do Facebook
    $_SESSION['usuario'] = $response->getDecodedBody();
    $_SESSION['fb_access_token'] = (string) $accessToken;

    // Com a permissão do usuário salvamos os dados do usuário

    // Retorna a url para onde o usuário será redirecionado após o login
    echo App::getDominio() . '/outra.php';
} else {
    echo false;
}
