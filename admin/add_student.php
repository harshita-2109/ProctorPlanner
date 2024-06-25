<?php 
    session_start();
?>
<html>
    <head>
        <title>Manage Student</title>
        <link rel="stylesheet" href="common.css">
        <?php include'../link.php' ?>
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
            if(isset($_POST['deletestudent'])){
                $rollNo = $_POST['deletestudent']; // Changed variable name to match form input name
                $delete = "DELETE FROM student WHERE rollNo = '$rollNo'"; // Corrected variable name
                $delete_query = mysqli_query($conn, $delete);
                if($delete_query){
                    $_SESSION['delstudent'] = "Student deleted successfully";
                }
                else{
                    $_SESSION['delnotstudent'] = "Error!! student not deleted.";
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
                        <a href="add_student.php" class="active_link"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Students</a>
                    </li>
                    <li>
                        <a href="add_subject.php"><img src="https://img.icons8.com/metro/25/ffffff/building.png"/> Subjects</a>
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
                        </button><span class="page-name"> Manage Students</span>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="https://img.icons8.com/ios-filled/20/ffffff/menu--v3.png"/>
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
                        if(isset($_SESSION['student'])){
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['student']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                            unset($_SESSION['student']);
                        }
                        if(isset($_SESSION['studentnot'])){
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['studentnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                            unset($_SESSION['studentnot']);
                        }
                        if(isset($_SESSION['delstudent'])){
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delstudent']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                            unset($_SESSION['delstudent']);
                        }
                        if(isset($_SESSION['delnotstudent'])){
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['delnotstudent']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                            unset($_SESSION['delnotstudent']);
                        }
                    ?>
                    <div class="table-responsive border">
                        <table class="table table-hover text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>RollNo.</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Year</th> <!-- Added Year column -->
                                    <th>Semester</th> <!-- Added Semester column -->
                                    <th>Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="addstudent.php" method="post">
                                        <th class="py-3 bg-light">
                                            <input class="form-control" type="number" name="rollNo">
                                        </th>
                                        <th class="py-3 bg-light">
                                            <input class="form-control" type="text" name="name">
                                        </th>
                                        <th class="py-3 bg-light">
                                            <select id="course" name="course" class="form-control">
                                                <?php 
                                                    $select_courses = "SELECT DISTINCT course FROM student";
                                                    $select_courses_query = mysqli_query($conn, $select_courses);
                                                    if($select_courses_query){
                                                        while($row = mysqli_fetch_assoc($select_courses_query)){
                                                            echo "<option value='".$row['course']."'>".$row['course']."</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>No options</option>";
                                                    }
                                                ?>
                                            </select>
                                        </th>
                                        <th class="py-3 bg-light">
                                            <input class="form-control" type="number" name="year"> <!-- Added input for Year -->
                                        </th>
                                        <th class="py-3 bg-light">
                                            <input class="form-control" type="number" name="semester"> <!-- Added input for Semester -->
                                        </th>
                                        <th class="py-3 bg-light">
                                            <button class="btn btn-primary" name="addstudent">Add</button>
                                        </th>
                                    </form>
                                </tr>  
                                <?php 
                                    $select_students = "SELECT * FROM student";
                                    $select_students_query = mysqli_query($conn, $select_students);
                                    if($select_students_query){
                                        while ($row = mysqli_fetch_assoc($select_students_query)) {
                                            echo "<tr>
                                                    <td>".$row['rollNo']."</td>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['course']."</td>
                                                    <td>".$row['year']."</td> <!-- Display Year -->
                                                    <td>".$row['semester']."</td> <!-- Display Semester -->
                                                    <td>
                                                        <form method='post'>
                                                            <button class='btn btn-light px-1 py-0' type='submit' value='".$row['rollNo']."' name='deletestudent'>
                                                                <img src='https://img.icons8.com/color/25/000000/delete-forever.png'/>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include'footer.php' ?>
    </body>
</html>