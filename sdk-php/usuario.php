<?php

require_once __DIR__ . '/bootstrap.php';

$fb = getFB();
try {
    // Solicita para o Facebook os dados do usuário que precisamos
    $response = $fb->get('/me?fields=name,email,picture,gender', $_SESSION['fb_access_token']);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    die();
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    die();
}

// somente os dados do usuário em formato de objeto
$usuario = $response->getGraphUser();

# debug
//var_dump($response);
//var_dump($response->getDecodedBody()); # exibe formato de array
//var_dump($usuario); # exibe formato de objeto
?>
<div>
    <p><img style="vertical-align: middle;" src="<?php echo $usuario->getPicture()['url']; ?>" alt="foto">
    <?php echo $usuario->getName(); ?> - <a href="logout-callback.php">Sair</a></p>
</div>