<?php

require_once __DIR__ . '/../bootstrap.php';

// Helper auxilia no gerador do token do logado
$helper = $fb->getRedirectLoginHelper();

try {
    // Gera o Token apoś a autenticação do usuário
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

// Se o token foi gerado
if (isset($accessToken)) {
    // Salva o token na session
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    // Redireciona o usuário para uma página especifica
    header("Location: /uteis/app-facebook/sdk-php/conteudo1.php");

}

