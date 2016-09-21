<?php

require_once __DIR__ . '/../bootstrap.php';

// Valida e seta o token da session no objeto facebook,
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

// Recupera o token do objeto Facebook
$token = $fb->getDefaultAccessToken();

// Define a url que o usuário será redirecionado após o logout
$redirecionar = "http://www.ouse.net.br.vm01/uteis/app-facebook/sdk-php/conteudo2.php";

// Faz o logout no Facebook
$url = 'https://www.facebook.com/logout.php?next=' . $redirecionar . '&access_token='.$token->getValue();

// Remove a sessão do usuário no site (logout)
session_destroy();

// Redireciona para realizar o logout no Facebook
header("Location: $url");