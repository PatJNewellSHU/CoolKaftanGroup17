<?php

// No autoloader so have to include + use it.
include 'autoload.php';

use App\Controllers\accountController;
use App\Controllers\staffController;
use App\Controllers\managerController;

use App\Helpers\mailHelper;
use App\Helpers\authenticationHelper;
use App\Models\userModel;

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
    case (preg_match('/settings.*/', $request)? true: false):
        accountController::settings();
        break;    
    case '/account/edit/notification':
        accountController::editNotification();
        break;
    case '/account/edit':
        accountController::editAccount();
        break;
    case '/account/sendnotif':
        accountController::sendTestNotification();
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
    case '/manager/add/performance':
        managerController::addPerformance();
        break;
    case (preg_match('/manager\/delete\/performance.*/', $request)? true: false):
        managerController::deletePerformance();
        break;
    case (preg_match('/manager\/edit\/performance.*/', $request)? true: false):
        managerController::editPerformance();
        break;
    case (preg_match('/manager\/products.*/', $request)? true: false):
        managerController::products();
        break;
    case '/manager/add/product':
        managerController::addProduct();
        break;
    case (preg_match('/manager\/delete\/product.*/', $request)? true: false):
        managerController::deleteProduct();
        break;
    case (preg_match('/manager\/edit\/product.*/', $request)? true: false):
        managerController::editProduct();
        break;
    case (preg_match('/staff\/scan\/submit.*/', $request)? true: false):
        staffController::submitScan();
        break;
    case '/400':
        http_response_code(400);
        require __DIR__ . '/views/other/400.php';
        break;
    case '/test':

        break;
    default: // Any other (random files)
        http_response_code(404);
        require __DIR__ . '/views/other/404.php';
        break;
}