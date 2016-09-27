<?php
/**
 * Script PHP que gera o link de login, apresentará o link de login.
 * 
 * https://developers.facebook.com/docs/php/howto/example_facebook_login
 * https://developers.facebook.com/docs/php/gettingstarted
 * 
 */

require_once __DIR__ . '/bootstrap.php';

$fb     = getFB();
$helper = $fb->getRedirectLoginHelper();

// Opcional, adicione quais as permissões que precisaremos para visualizar os dados do usuário
$permissions = ['public_profile', 'email'];
$loginUrl    =  $helper->getLoginUrl(App::getDominio() . '/login-callback.php', $permissions);
?>

<a href="<?php echo htmlspecialchars($loginUrl); ?>"><img src="imagens/facebook.png" id="btn-login" alt="Log in with Facebook!"/></a>