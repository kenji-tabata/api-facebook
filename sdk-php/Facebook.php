<?php

require_once __DIR__ . '/bootstrap.php';

function existeToken() {
    if(isset($_SESSION['facebook_access_token'])) {
        return true;
    }
    return false;
}
