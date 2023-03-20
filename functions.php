<?php

require_once("includes/db_connection.php");

function logIn($conn, $username, $password) {

    $users = getUsers($conn, $username);

    if(!$users) {
        header("location: views/index.php");
        exit();
    }

    if ($password != $users["password"]) {
        header("location: views/index.php");
        exit();
    }
    else if ($password == $users["password"]) {
        if($UsernameExists["isManager"] == 0) {

            header("location: views/staff/scan.html");
        }
        else if($UsernameExists["isManager"] == 1) {
            header("location: views/manager/buffer.html");
            exit();
        }
            
    }
}

function getUsers($conn, $username) {

    $stmt = $mysqli -> prepare("SELECT * FROM users WHERE username = ?");
    $stmt -> bind_param("s", $username);
    $stmt -> execute();

    $result = $stmt -> get_result();

    $row = $result -> fetch_assoc();

    $stmt -> close();
    $mysqli -> close();

    return $row;
}
