<?php

//// Message from Ethan:
// This is the MAIN file for the entire website. (Everytime the server is requested http://localhost/...)
// This file is requested. Not fastest solution but it works. 
// TLD >> It means we don't use the system's filesystem and now we can do fancy stuff (e.g. authentication using middleware)
// If you want to make a new page then add a route (BELOW) and link it to a view (IN VIEWS folder)
// MVC-ing this mf.
//// Cheers <3

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' : // Index page
        require __DIR__ . '/views/login.php';
        break;
    case '' : // Catching anything else
        require __DIR__ . '/views/login.php';
        break;
    case '/login' : // Login
        require __DIR__ . '/includes/LogInScript.php';
        break;
    case '/staff':
        require __DIR__.'/views/staff/scan.php';
        break;
    case '/manager':
            require __DIR__.'/views/manager/shelves.php';
            break;
    default: // Any other (random files)
        http_response_code(404);
        require __DIR__ . '/views/other/404.php';
        break;
}