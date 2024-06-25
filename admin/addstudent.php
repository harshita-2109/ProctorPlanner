<?php
include "../db.php";
session_start();
if(isset($_POST['addstudent'])){
	$rollNo = $_POST['rollNo'];
	$rollNo = mysqli_real_escape_string($conn, $rollNo);
	$rollNo = htmlentities($rollNo);
	$name = $_POST['name'];
	$name = mysqli_real_escape_string($conn, $name);
	$name = htmlentities($name);
	$course = $_POST['course']; // Corrected variable name
	$course = mysqli_real_escape_string($conn, $course);
	$course = htmlentities($course);
	$year = $_POST['year']; // Added year
	$year = mysqli_real_escape_string($conn, $year);
	$year = htmlentities($year);
	$semester = $_POST['semester']; // Added semester
	$semester = mysqli_real_escape_string($conn, $semester);
	$semester = htmlentities($semester);
	
	$insert = "insert into student(rollNo, name, course, year, semester) VALUES ('$rollNo', '$name', '$course', '$year', '$semester')"; // Updated query to include year and semester
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['student'] = "New student added successfully.";
	}
	else{
		$_SESSION['studentnot'] = "Error!! New student not added.";
	}
	header("Location: add_student.php");
}
?>