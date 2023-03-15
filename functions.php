<?php

require_once("includes/db_connection.php");

function logIn($conn, $username, $password) {

    $UsernameExists = UsernameExists($conn, $username);


    if($UsernameExists === false) {
        header("location: views/index.html");
        exit();
    }
    
    

    if ($password != $UsernameExists["password"]) {
        header("location: ");
        exit();
    }
    else if ($password == $UsernameExists["password"]) {
        if($UsernameExists["isManager"] == 0) {

            header("location: views/staff/scan.html");
        }
        else if($UsernameExists["isManager"] == 1) {
            header("location: views/manager/buffer.html");
            exit();
        }
            
    }
}

function UsernameExists($conn, $username) {

    $sql = "SELECT * FROM users WHERE username = ?";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: LogIn.php?error=stmt");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}