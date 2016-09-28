<?php
/**
 * Script que gera o link para o logout do Facebook
 *
 * https://developers.facebook.com/docs/php/FacebookRedirectLoginHelper/5.0.0
 */

require_once __DIR__ . '/bootstrap.php';

$fb = getFB();
$helper = $fb->getRedirectLoginHelper();
$url = $helper->getLogoutUrl($_SESSION['fb_access_token'], App::getDominio() . '/index.php');

session_destroy();
header("Location: $url");