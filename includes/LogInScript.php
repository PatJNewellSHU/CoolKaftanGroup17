<?php 

require_once("includes/db_connection.php");
require_once("functions.php");

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
        logIn($conn, $username, $password);

}