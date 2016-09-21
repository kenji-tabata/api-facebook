<?php

require_once __DIR__ . '/bootstrap.php';

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