<?php

// No autoloader so have to include + use it.
include './App/Controllers/loginController.php';
include './App/Controllers/staffController.php';
include './App/Controllers/managerController.php';

use App\Controllers\loginController;
use App\Controllers\staffController;
use App\Controllers\managerController;

//// Message from Ethan:
// This is the MAIN file for the entire website. (Everytime the server is requested http://localhost/...)
// This file is requested. Not fastest solution but it works. 
// TLD >> It means we don't use the system's filesystem and now we can do fancy stuff (e.g. authentication using middleware)
// If you want to make a new page then add a route (BELOW) and link it to a view (IN VIEWS folder) or controller (IN CONTROLLERS folder)
// MVC-ing this mf.
//// Cheers <3

$request = $_SERVER['REQUEST_URI'];

// Need to check for '?'
if(str_contains($request, '?') == true)
{
    $url = current(explode('?', $request));
} else {
    $url = $request;
}

switch ($url) {
    case '/' : // Index page
        loginController::login();
        break;
    case '' : // Catching anything else
        loginController::login();
        break;
    case '/login' : // Login
        loginController::sendlogin();
        break;
    case '/staff':
        staffController::scan();
        break;
    case '/manager':
        managerController::shelves();
        break;
    case '/manager/buffer':
        managerController::buffer();
        break;
    case '/manager/mixed':
        managerController::mixed();
        break;
    case '/manager/performance':
        managerController::performance();
        break;
    case '/manager/all':
        managerController::all();
        break;
    case '/manager/top':
        managerController::top();
        break;
    case (preg_match('/manager\/p\/.*/', $request)? true: false):
        managerController::p($request);
        break;
    default: // Any other (random files)
        http_response_code(404);
        require __DIR__ . '/views/other/404.php';
        break;
}