<?php
include "../db.php";
session_start();
if(isset($_POST['addsubject'])){
    $paperCode = $_POST['paperCode']; // Corrected here
    $paperCode = mysqli_real_escape_string($conn, $paperCode);
    $paperCode = htmlentities($paperCode);
    $course = $_POST['course'];
    $course = mysqli_real_escape_string($conn, $course);
    $course = htmlentities($course);
    $subject = $_POST['subject'];
    $subject = mysqli_real_escape_string($conn, $subject);
    $subject = htmlentities($subject);
    
    // Check if paperCode is not empty before inserting
    if(!empty($paperCode)) {
        $insert = "INSERT INTO subject (paperCode, course, subject) VALUES ('$paperCode','$course','$subject')";
        $insert_query = mysqli_query($conn, $insert);
        if($insert_query){
            $_SESSION['subject'] = "New subject added successfully.";
        }
        else{
            $_SESSION['subjectnot'] = "Error!! New subject not added.";
        }
    } else {
        $_SESSION['subjectnot'] = "Error!! Paper code cannot be empty.";
    }
    header("Location: add_subject.php");
}
?>