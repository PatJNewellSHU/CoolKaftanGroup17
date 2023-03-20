<?php

require_once("includes/db_connection.php");

//Login functions

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
        if($UsernameExists["id"] == 2) {

            header("location: views/staff/scan.php");
        }
        else if($UsernameExists["id"] == 1) {
            header("location: views/manager/shelves.php");
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

//Item functions