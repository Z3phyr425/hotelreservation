<?php
    include("connection.php");
    session_start();
    
    if(isset($_SESSION['User'])){
        $selectlogin = "SELECT * FROM `tbllogin` WHERE `uname`='".$_SESSION['User']."'";
        $sqlselectlogin = mysqli_query($conn, $selectlogin);
        $fetchselectlogin = mysqli_fetch_assoc($sqlselectlogin);

        $username = $_SESSION['User'];
        $role = $fetchselectlogin['urole'];
    }else{
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eastwoods International Hotel | View Profile</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div id="body">
        <?php
            $getuserdetails = "SELECT * FROM `tbllogin` WHERE `uname`='".$_SESSION['User']."'";
            $sqlgetuserdetails = mysqli_query($conn, $getuserdetails);
            $fetchgetuserdetails = mysqli_fetch_assoc($sqlgetuserdetails);

            $firstname = $fetchgetuserdetails['firstname'];
            $surname = $fetchgetuserdetails['surname'];
            $email = $fetchgetuserdetails['emailadd'];
            $contactnumber = $fetchgetuserdetails['contactno'];
        ?>
        <label for="">Username: <?php echo "$username";?></label>
        <br>
        <label for="">Full Name: <?php echo "$firstname $surname";?></label>
        <br>
        <label for="">Email Address: <?php echo "$email";?></label>
        <br>
        <label for="">Contact No.: <?php echo "$contactnumber";?></label>
        <br>
    </div>
    <div id="footer">

    </div>
</body>
</html>