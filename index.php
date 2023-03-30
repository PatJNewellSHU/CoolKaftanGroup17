<?php

// No autoloader so have to include + use it.
include 'autoload.php';

use App\Controllers\accountController;
use App\Controllers\staffController;
use App\Controllers\managerController;

$request = $_SERVER['REQUEST_URI'];

if(session_status() == 1)
{
    session_start();
}

// Need to check for '?'
if(str_contains($request, '?') == true)
{
    $url = current(explode('?', $request));
} else {
    $url = $request;
}

switch ($url) {
    case '/' :
        accountController::login();
        break;
    case '/login' :
        accountController::sendlogin();
        break;
    case '/logout' :
        accountController::logout();
        break;
    case '/settings' :
        accountController::settings();
        break;    
    case '/staff':
        staffController::scan();
        break;
    case (preg_match('/manager\/boxes.*/', $request)? true: false):
        managerController::boxes();
        break;
    case (preg_match('/manager\/stock.*/', $request)? true: false):
        managerController::stock();
        break;
    case (preg_match('/manager\/performance.*/', $request)? true: false):
        managerController::performance();
        break;
    case (preg_match('/manager\/products.*/', $request)? true: false):
        managerController::products();
        break;
    case '/manager/addItem':
        managerController::addItem();
        break;
    case '/400':
        http_response_code(400);
        require __DIR__ . '/views/other/400.php';
        break;
    default: // Any other (random files)
        http_response_code(404);
        require __DIR__ . '/views/other/404.php';
        break;
}