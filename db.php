<?php

    $conn = mysqli_connect("localhost","root","","igdtuw_data");
    if($conn){
	    // echo "Successfully";
    }
    else{
        die("no conn" . mysqli_connect_error());
    }

?>