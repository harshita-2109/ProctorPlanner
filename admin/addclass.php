<?php
include '../db.php';
session_start();
if(isset($_POST['addclass'])){
    $cid = $_POST['cid'];
    $cid = mysqli_real_escape_string($conn, $cid);
    $cid = htmlentities($cid);
    $roomNo = $_POST['roomNo'];
    $roomNo = mysqli_real_escape_string($conn, $roomNo);
    $roomNo = htmlentities($roomNo);
    $block = $_POST['block'];
    $block = mysqli_real_escape_string($conn, $block);
    $block = htmlentities($block);
    $floor = $_POST['floor'];
    $floor = mysqli_real_escape_string($conn, $floor);
    $floor = htmlentities($floor);
    $capacity = $_POST['capacity'];
    $capacity = mysqli_real_escape_string($conn, $capacity);
    $capacity = htmlentities($capacity);

    // Using prepared statement to prevent SQL injection
    $insert = "INSERT INTO classroom (cid, roomNo, block, floor, capacity) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert);
    mysqli_stmt_bind_param($stmt, "ssssi", $cid, $roomNo, $block, $floor, $capacity);
    mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if(mysqli_stmt_affected_rows($stmt) > 0){
        $_SESSION['class'] = "New class added successfully.";
    }
    else{
        $_SESSION['classnot'] = "Error!! New class not added.";
    }

    // Redirect back to the add_class.php page
    header("Location: add_class.php");
    exit();
}
?>