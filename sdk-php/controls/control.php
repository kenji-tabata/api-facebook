<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/Facebook.php';

if(existeToken()) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    $userNode = retornarDadosUsuario($fb);

} else {
    $loginUrl = retornarLinkLogin($fb);
}