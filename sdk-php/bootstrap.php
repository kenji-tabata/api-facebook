<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook(
    array(
        'app_id' => 'seu-id',
        'app_secret' => 'sua-secret-key',
        'default_graph_version' => 'v2.7',
    )
 );
