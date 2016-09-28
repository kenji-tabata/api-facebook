<?php
/**
 * Script que gera o link para o logout do Facebook
 *
 * https://developers.facebook.com/docs/php/FacebookRedirectLoginHelper/5.0.0
 */

require_once __DIR__ . '/bootstrap.php';

session_destroy();
echo App::getDominio() . '/index.php';