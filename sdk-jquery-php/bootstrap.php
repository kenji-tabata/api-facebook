<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

class App {
    static function getDominio() {
        return "http://192.168.0.149/api-facebook/sdk-jquery-php";
    }
}



/**
 * $fb = getFB();
 */
function getFB() {
    return new Facebook\Facebook(
        array(
            'app_id'     => get_fb_app_id(),
            'app_secret' => get_fb_app_secret(),
            'default_graph_version' => 'v2.7',
        )
    );
}

/**
 * app id
 */
function get_fb_app_id() {
    return 'Replace {app-id} with your app id';
}

/**
 * app secret
 */
function get_fb_app_secret() {
    return 'Replace {app-scrpt} with your app secret key';
}