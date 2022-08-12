<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "hotelreservation";
    $conn = mysqli_connect($server, $user, $pass, $dbname);

    if(!$conn){
        die("Could not connect to database");
    }
?>
