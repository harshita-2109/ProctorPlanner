<?php
session_start();
include '../link.php';
if(isset($_POST['deletebatch'])){
    $aid = $_POST['deletebatch'];
    $delete_query = mysqli_query($conn, "DELETE FROM allotment WHERE aid = '$aid'");
    if($delete_query){
        $_SESSION['delbatch'] = "Allotment deleted successfully";
    } else {
        $_SESSION['delnotbatch'] = "Error!! Allotment not deleted.";
    }
}
?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="common.css">
    <?php include '../link.php'; ?>
</head>
<style>
#sidebar {
    background-color: #006400 !important;
}
#sidebar .list-unstyled.components li.active a,
#sidebar .sidebar-header {
    background-color: #006400 !important;
}
.page-name {
    color: #006400;
}
</style>
<body>
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
                    <a href="add_subject.php"><img src="https://img.icons8.com/metro/25/ffffff/building.png"/> Subjects</a>
                </li>
                <li>
                    <a href="dashboard.php" class="active_link"><img src="https://img.icons8.com/nolan/30/ffffff/summary-list.png"/> Allotment</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <img src="https://img.icons8.com/ios-filled/19/ffffff/menu--v3.png"/>
                    </button><span class="page-name"> Allotment</span>
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
                if(isset($_SESSION['batch'])){
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['batch']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    unset($_SESSION['batch']);
                }
                if(isset($_SESSION['batchnot'])){
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['batchnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    unset($_SESSION['batchnot']);
                }

                if(isset($_SESSION['delbatch'])){
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delbatch']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    unset($_SESSION['delbatch']);
                }
                if(isset($_SESSION['delnotbatch'])){
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['delnotbatch']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    unset($_SESSION['delnotbatch']);
                }
                ?>
                <div class="table-responsive border">
                    <table class="table table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Room & Floor</th>
                                <th>Block</th> 
                                <th>PaperCode</th>
                                <th>Start Roll No.</th>
                                <th>End Roll No.</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Form for adding allotments -->
                            <form action="addallot.php" method="post">
                                <tr>
                                    <!-- Select room -->
                                    <th class="py-3 bg-light">
                                        <select name="classroom" class="form-control">
                                            <?php
                                            $select_rooms = "SELECT cid, roomNo, floor FROM classroom";
                                            $select_rooms_query = mysqli_query($conn, $select_rooms);
                                            if(mysqli_num_rows($select_rooms_query) > 0){
                                                echo "<option>--select--</option>";
                                                while($row = mysqli_fetch_assoc($select_rooms_query)){
                                                    echo "<option value=\"" . $row['cid'] . "\">Room-" . $row['roomNo'] . " & Floor-" . $row['floor'] . "</option>";
                                                }
                                            } else {
                                                echo "<option>No Rooms</option>";
                                            }
                                            ?>
                                        </select>
                                    </th>
                                    <!-- Select block -->
                                    <th class="py-3 bg-light">
                                        <select id="sem" name="block" class="form-control">
                                            <?php 
                                            $select_blocks_query = "SELECT DISTINCT SUBSTRING_INDEX(block, '-', 1) AS block FROM classroom ORDER BY block";
                                            $select_blocks_result = mysqli_query($conn, $select_blocks_query);

                                            if($select_blocks_result){
                                                echo "<option>--select--</option>";
                                                while($row = mysqli_fetch_assoc($select_blocks_result)){
                                                    echo "<option value=\"" . $row['block'] . "\">" . $row['block'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value='No options'>No options</option>";
                                            }
                                            ?>
                                        </select>
                                    </th>
                                    <!-- PaperCode -->
                                    <th class="py-3 bg-light">
                                        <select id="paperCode" name="paperCode" class="form-control">
                                        <?php 
                                        $select_subject = "SELECT DISTINCT paperCode FROM subject";
                                        $select_subject_query = mysqli_query($conn, $select_subject);
                                        if($select_subject_query){
                                        while($row = mysqli_fetch_assoc($select_subject_query)){
                                        echo "<option value='".$row['paperCode']."'>".$row['paperCode']."</option>";
                                        }
                                        } else {
                                        echo "<option value=''>No options</option>";
                                        }
                                        ?>
                                        </select>
                                        </th>   
                                    <!-- Start roll no -->
                                    <th class="py-3 bg-light"><input type="number" name="startNo" class="form-control" size="4"></th>
                                    <!-- Input for end roll no. -->
                                    <th class="py-3 bg-light"><input type="number" name="endNo" class="form-control" size="4"></th>
                                    <!-- Total -->
                                    <th class="py-3 bg-light"></th>
                                    <!-- Input for date -->
                                    <th class="py-3 bg-light"><input type="date" name="date" class="form-control"></th>
                                    <!-- Input for start time -->
                                    <th class="py-3 bg-light"><input type="time" name="start_time" class="form-control"></th>
                                    <!-- Input for end time -->
                                    <th class="py-3 bg-light"><input type="time" name="end_time" class="form-control"></th>
                                    <!-- Add button -->
                                    <th class="py-3 bg-light"><button class="btn btn-info form-control" name="addallotment">Add</button></th>
                                </tr> 
                            </form>
    
                            <!-- Fetch and display allotments -->
                            <?php
                            $select_allotment_query = mysqli_query($conn, "SELECT a.*, c.roomNo, c.floor, a.block, c.capacity, a.date, a.startNo, a.endNo FROM allotment a JOIN classroom c ON a.cid = c.cid");

                            if($select_allotment_query){
                                while ($row = mysqli_fetch_assoc($select_allotment_query)) {
                                    // Calculate total
                                    $total = $row['endNo'] - $row['startNo'] + 1; // Calculate the total number of students
                                    echo "<tr>
                                    <td>Room-" . $row['roomNo'] . " & Floor-" . $row['floor'] . "</td>
                                    <td>" . $row['block'] . "</td>
                                    <td>" . $row['paperCode'] . "</td>
                                    <td>" . $row['startNo'] . "</td>
                                    <td>" . $row['endNo'] . "</td>
                                    <td>" . $total . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['start_time'] . "</td>
                                    <td>" . $row['end_time'] . "</td>
                                    
                                        <td>
                                            <form method=\"post\">
                                                <button class=\"btn btn-light px-1 py-0\" type=\"submit\" value=\"" . $row['aid'] . "\" name=\"deletebatch\">
                                                    <img src=\"https://img.icons8.com/color/25/000000/delete-forever.png\"/>
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
    <?php include'footer.php'; ?>
</body>
</html>