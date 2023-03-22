<?php 

require_once("db_connection.php");
require_once("functions.php");

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    
        logIn($conn, $username, $password);

}
else {
    header("location: /?error=form");
}