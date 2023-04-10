<?php

// No autoloader so have to include + use it.
include 'autoload.php';

use App\Controllers\accountController;
use App\Controllers\staffController;
use App\Controllers\managerController;

use App\Models\boxModel;

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
    case '/manager/add/box':
        managerController::addBox();
        break;
    case (preg_match('/manager\/delete\/box.*/', $request)? true: false):
        managerController::deleteBox();
        break;
    case (preg_match('/manager\/edit\/box.*/', $request)? true: false):
        managerController::editBox();
        break;
    case (preg_match('/manager\/stock.*/', $request)? true: false):
        managerController::stock();
        break;
    case '/manager/add/stock':
        managerController::addStock();
        break;
    case (preg_match('/manager\/delete\/stock.*/', $request)? true: false):
        managerController::deleteStock();
        break;
    case (preg_match('/manager\/edit\/stock.*/', $request)? true: false):
        managerController::editStock();
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
    case '/test':
        $box = new boxModel();
        print_r($box->find(1)->edit([
            'box_type' => 0,
            'shelf' => 'top_floor'
        ]));
        break;
    default: // Any other (random files)
        http_response_code(404);
        require __DIR__ . '/views/other/404.php';
        break;
}