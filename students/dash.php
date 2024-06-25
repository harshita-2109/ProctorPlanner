<?php
    session_start();
?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../admin/common.css">
    <?php include '../link.php'; ?>
</head>
<body>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <span class="page-name"> DASHBOARD</span>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <a class="nav-link p-0" href="../logout.php">
                        <img src="https://img.icons8.com/ios-filled/20/ffffff/open-pane.png"/>
                    </a>
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

        <div class="main-content d-lg-flex justify-content-around">
            <?php
                if(isset($_SESSION['loginid'])){
                    $id = $_SESSION['loginid'];

                    $select_student = "SELECT * FROM student WHERE rollNo='$id'";
                    $select_student_query = mysqli_query($conn, $select_student);

                    if(mysqli_num_rows($select_student_query) > 0){
                        $row = mysqli_fetch_assoc($select_student_query);
                        $roll = $row['rollNo'];
                        $year = $row['year'];
                        $semester = $row['semester'];

                        echo "<div class='mt-4 '>
                                <h3>".$row['name']."</h3>
                                <h5>Roll No. ".$row['rollNo']." </h5>
                                <h5>Year ".$row['year']." </h5>
                                <h5>Semester ".$row['semester']." </h5>
                            </div>";

                        echo "<div>
                                <h5 align='center' class='mt-4 mb-3 text-primary'>Exam Seating Allotment</h5>";

                        echo "<table class='table text-center table-bordered table-responsive'>
                                <tr>
                                    <th>Block</th>
                                    <th>Room Number</th>
                                    <th>Floor Number</th>
                                    <th>Start Roll Number</th>
                                    <th>End Roll Number</th>
                                    <th>Total</th>
                                </tr>";

                        $allotment = "SELECT allotment.block, allotment.*, classroom.* FROM allotment, classroom WHERE allotment.cid=classroom.cid AND startno<='$roll' AND endno>='$roll'";
                        $allotment_query = mysqli_query($conn, $allotment);

                        if(mysqli_num_rows($allotment_query) > 0){
                            $array = mysqli_fetch_assoc($allotment_query);

                            $select_subject = "SELECT * FROM subject WHERE paperCode='" . $array['paperCode'] . "'";
                            $select_subject_query = mysqli_query($conn, $select_subject);

                            $rows = mysqli_fetch_assoc($select_subject_query);
                            $rpaperCode = $rows['paperCode'];
                            $course = $rows['course'];
                            $subject = $rows['subject'];

                            echo "<div class='mt-4'>
                                    <h6>Course :  ".$rows['course']." </h6>
                                    <h6>Paper Code :  ".$rows['paperCode']." </h6>
                                    <h6>Subject :  ".$rows['subject']." </h6>
                                </div>";

                            echo "<div class='mt-4 mb-4 text-danger'>
                                    <h6>Date : ".$array['date']." </h6>
                                    <h6>Start Time : ".$array['start_time']." </h6>
                                    <h6>End Time : ".$array['end_time']." </h6>
                                </div>";

                            echo "<tr>
                                    <td>".$array['block']."</td>
                                    <td>".$array['roomNo']."</td>
                                    <td>".$array['floor']."</td>
                                    <td>".$array['startNo']."</td>
                                    <td>".$array['endNo']."</td>
                                    <td>".$array['total']."</td>
                                </tr>";
                        }
                        else{
                            echo "<tr><td colspan='6'>Exam Seat Not Allotted</td></tr>";
                        }
                        echo "</table></div>";
                    }
                    else{
                        echo "No student with Id = '$id'";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
