<?php 
session_start();
?>
<html>
<head>
    <title>Manage subjects</title>
    <link rel="stylesheet" href="common.css">
    <?php include'../link.php'; ?>
    <style>
    #sidebar {
        background-color: #006400 !important; /* Dark green color for navbar */
    }

    #sidebar .list-unstyled.components li.active a,
    #sidebar .sidebar-header {
        background-color: #006400 !important; /* Change active item and header background color */
    }
    .page-name {
        color: #006400; /* Dark green color */
    }
    </style>
</head>
<body>
<?php
if(isset($_POST['deletesubject'])){
    $subject = $_POST['deletesubject'];
    $delete = "DELETE FROM subject WHERE paperCode = '$subject'";
    $delete_query = mysqli_query($conn, $delete);
    if($delete_query){
        $_SESSION['delsubject'] = "Subject deleted successfully";
    }
    else{
        $_SESSION['delnotsubject'] = "Error!! Subject not deleted.";
    }
}
?>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
        <h4><img src="igdtuw_logo.png" width=60px height=50px>IGDTUW</h4>  
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="add_class.php"><img src="https://img.icons8.com/ios-filled/26/ffffff/google-classroom.png"/> Classes</a>
            </li>
            <li>
                <a href="add_student.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Students</a>
            </li>
            <li>
                <a href="add_subject.php" class="active_link"><img src="https://img.icons8.com/metro/26/ffffff/building.png"/> Subjects</a>
            </li>
            <li>
                <a href="dashboard.php"><img src="https://img.icons8.com/nolan/30/ffffff/summary-list.png"/> Allotment</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <img src="https://img.icons8.com/ios-filled/19/ffffff/menu--v3.png"/>
                </button><span class="page-name"> Manage Subjects</span>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="https://img.icons8.com/ios-filled/19/ffffff/menu--v3.png"/>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main-content">
            <?php
            if(isset($_SESSION['subject'])){
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['subject']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['subject']);
            }
            if(isset($_SESSION['subjectnot'])){
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['subjectnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['subjectnot']);
            }

            if(isset($_SESSION['delsubject'])){
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delsubject']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['delsubject']);
            }
            if(isset($_SESSION['delnotsubject'])){
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['delnotsubject']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['delnotsubject']);
            }
            ?>

            <div class="table-responsive border">
                <table class="table table-hover text-center">
                   <thead class="thead-light">
                    <tr>
                        <th>Paper Code</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>   
                    </thead>
                    <tbody>
                    <form action="addsubject.php" method="post">
                    <tr>
                        <th class="py-3 bg-light">
                        <textarea class="form-control" rows="1" cols="8" name="paperCode"></textarea>
                        </th>
                        <th class="py-3 bg-light">
                        <textarea class="form-control" rows="1" cols="8" name="course"></textarea>
                        </th>
                        <th class="py-3 bg-light">
                        <textarea class="form-control" rows="1" cols="10" name="subject"></textarea>
                        </th>
                        <th class="py-3 bg-light">
                            <button class="btn btn-primary" name="addsubject">Add</button>
                        </th>
                    </tr>  
                    </form>
                    <?php
                    $select_subjects = "SELECT paperCode, course, subject FROM subject";
                    $select_subjects_query = mysqli_query($conn, $select_subjects);
                    if($select_subjects_query){
                        while ($row = mysqli_fetch_assoc($select_subjects_query)) {
                            echo "<tr>
                            <td>".$row['paperCode']."</td>
                            <td>".$row['course']."</td>
                            <td>".$row['subject']."</td>
                            <td>
                                <form method='post'>
                                    <button class='btn btn-light px-1 py-0' type='submit' value='".$row['paperCode']."' name='deletesubject'>
                                        <img src='https://img.icons8.com/color/25/000000/delete-forever.png'/>
                                    </button>
                                </form>
                            </td>
                            </tr>";
                        }
                    }
                    else{
                        echo "<tr><td colspan=4>No subjects available.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>