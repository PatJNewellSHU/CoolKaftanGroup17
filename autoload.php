<?php

// Better error reporting
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

// This file pre-loads all the other files so code is cleaner.
// Doesn't impact performance as this is a tiny project.

// Controllers
require_once(__DIR__."/App/Controllers/accountController.php");
require_once(__DIR__."/App/Controllers/managerController.php");
require_once(__DIR__."/App/Controllers/staffController.php");

// Helpers
require_once(__DIR__ . "/App/Helpers/dbHelper.php");
require_once(__DIR__ . "/App/Helpers/authenticationHelper.php");
require_once(__DIR__ . "/App/Helpers/mailHelper.php");

// Models
require_once(__DIR__ . "/App/Models/productModel.php");