<?php

$servername = "sp2023.mysql.database.azure.com";
$username = "Group17";
$password = "Gr0Up17_Sp";
$dbname = "group17";
$port = 3306;

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection

if ($conn->connect_error) {

                die("Connection failed: " . $conn->connect_error);

}

?>
