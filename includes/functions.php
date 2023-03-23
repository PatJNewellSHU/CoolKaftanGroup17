<?php

require_once("db_connection.php");

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

function GetBoxShelf($conn, $shelfID) {

    $stmt = $conn -> prepare("SELECT * FROM box WHERE shelf_id = ?");
    $stmt -> bind_param("s", $shelfID);
    $stmt -> execute();

    $result = $stmt -> get_result();

    $row = $result -> fetch_assoc();

    $stmt -> close();
    $conn -> close();

    return $row;

}

function MoveToBuffer($conn, $boxID) {

    $stmt = $conn -> prepare("SELECT * FROM box WHERE box_id = ?");
    $stmt -> bind_param("s", $boxID);
    $stmt -> execute();

    $result = $stmt -> get_result();

    $row = $result -> fetch_assoc();

    $stmt -> close(); 

    $sql = "INSERT INTO buffer (product_id, number_of_items) VALUES (?, ?)";

    $stmt2 = $conn ->prepare($sql);
    $stmt2 -> bind_param("ss", $row["product_id"], $row["units"]);

    if ($conn->query($stmt2) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}