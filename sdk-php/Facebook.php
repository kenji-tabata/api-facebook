<?php

// Verifica se o token de autenticação existe
function existeToken() {
    if (isset($_SESSION['facebook_access_token'])) {
        return true;
    }
    return false;
}

function retornarDadosUsuario($fb) {
    try {
        // Solicita para o Facebook os dados do usuário que precisamos
        $response = $fb->get('/me?fields=name,email,picture,gender');

        // somente os dados do usuário em formato de objeto
        return $response->getGraphUser();

        # debug
        //var_dump($response);
        //var_dump($response->getDecodedBody()); # exibe formato de array
        //var_dump($userNode); # exibe formato de objeto
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        die();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        die();
    }
}
