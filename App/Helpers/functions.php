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

function GetAllItems($conn) {

    $stmt = $conn -> prepare("SELECT * FROM product");
    $stmt -> execute();

    $result = $stmt -> get_result();

    $row = $result -> fetch_all();

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

function AddItems($conn, $prodName, $prodDetail, $prodSize, $prodPrice) {

    $added = false;

    $sql = "INSERT INTO product(product_Name, product_Detail, product_Size, product_Price) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../views/manager/allItems.php");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssss", $prodName, $prodDetail, $prodSize, $prodPrice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $added = true;
    return $added;
}

function AddBoxes($conn, $shelfID, $prodID) {

    $added = false;

    $sql = "INSERT INTO box(shelf_id, product_id) VALUES (?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../views/manager/manager.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $shelfID, $prodID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $added = true;
    return $added;
}