<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '1760820287509416',
    'app_secret' => '7d83dddaa0a22a142e425521c3963a64',
    'default_graph_version' => 'v2.7',
        ]);

// Recupera o token da sessão e adiciona no objeto.
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
$token        = $fb->getDefaultAccessToken();
$redirecionar = "http://www.ouse.net.br.vm01/uteis/app-facebook/sdk-php/index.php";

// Faz o logout no Facebook
$url = 'https://www.facebook.com/logout.php?next=' . $redirecionar . '&access_token='.$token->getValue();

// Remove a sessão do usuário no site (logout)
session_destroy();

// Redireciona para realizar o logout no Facebook
header("Location: $url");