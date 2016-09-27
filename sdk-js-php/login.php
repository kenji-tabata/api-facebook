<?php

require_once __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['fb_access_token'])) {
    echo '<p><a href="#" id="btn-login"><img src="imagens/facebook.png" alt="Log in with Facebook!"/></a></p>';

} else {
    echo '<p><img style="vertical-align: middle;" src="<?php echo $usuario->getPicture()["url]; ?>" alt="foto">';
    echo $usuario->getName() . ' - <a href="#" id="btn-logout">Sair</a></p>';
}