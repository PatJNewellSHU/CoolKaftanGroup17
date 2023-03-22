<?php

require_once("db_connection.php");

//Login functions

function logIn($conn, $username, $password) {

    $users = getUsers($conn, $username);

    if(!$users) {
        header("location: ../views/index.php");
        exit();
    }

    if ($password != $users["password"]) {
        header("location: ../views/index.php");
        exit();
    }
    else if ($password == $users["password"]) {
        if($users["id"] == 2) {

            header("location: ../views/staff/scan.html");
        }
        else if($users["id"] == 1) {
            header("location: ../views/manager/shelves.php");
            exit();
        }
            
    }
}

function getUsers($conn, $username) {

    $stmt = $conn -> prepare("SELECT * FROM user WHERE username = ?");
    $stmt -> bind_param("s", $username);
    $stmt -> execute();

    $result = $stmt -> get_result();

    $row = $result -> fetch_assoc();

    $stmt -> close();
    $conn -> close();

    return $row;
}

//Item functions