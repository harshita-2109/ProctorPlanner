<?php
session_start();
include '../link.php';
// Function to check if exams clash
function checkExamClash($conn, $block, $startNo, $endNo, $date) {
    $query = "SELECT * FROM allotment WHERE block = '$block' AND date = '$date' AND ((startNo <= '$startNo' AND endNo >= '$startNo') OR (startNo <= '$endNo' AND endNo >= '$endNo'))";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}

if(isset($_POST['addallotment'])){
    $classroom = $_POST['classroom'];
    $paperCode = $_POST['paperCode'];
    $block = $_POST['block'];
    $startNo = $_POST['startNo'];
    $endNo = $_POST['endNo'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Validate input data
    if(empty($classroom) || empty($block) || empty($startNo) || empty($endNo) || empty($date) || empty($start_time) || empty($end_time)) {
        $_SESSION['batchnot'] = "Error!! All fields are required.";
    } else {
        // Check if exams clash
        if(checkExamClash($conn, $block, $startNo, $endNo, $date)) {
            $_SESSION['batch'] = "Warning: Please select a different time slot.";
        } else {
            // Insert new exam allotment into the database
            $insert_query = mysqli_query($conn, "INSERT INTO allotment (cid, paperCode, block, startNo, endNo, date, start_time, end_time) VALUES ('$classroom', '$paperCode','$block', '$startNo', '$endNo', '$date', '$start_time', '$end_time')");
            if($insert_query){
                $_SESSION['batch'] = "Allotment added successfully";
            } else {
                $_SESSION['batchnot'] = "Error!! Allotment not added.";
            }
        }
    }
}

if(isset($_POST['deletebatch'])){
    $allotment_id = $_POST['deletebatch'];
    $delete_query = mysqli_query($conn, "DELETE FROM allotment WHERE aid = '$allotment_id'");
    if($delete_query){
        $_SESSION['delbatch'] = "Allotment deleted successfully";
    } else {
        $_SESSION['delnotbatch'] = "Error!! Allotment not deleted.";
    }
}

header("Location: dashboard.php");
?>