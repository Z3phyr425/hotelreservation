<?php
    error_reporting(0);
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
        <form action="" method="post">
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
            <br>
            <label for="">First Name: </label><input type="text" class="text1" name="firstname" value="<?php echo "$firstname";?>">
            <br>
            <br>
            <label for="">Surname: </label><input type="text" class="text1" name="surname" value="<?php echo "$surname";?>">
            <br>
            <br>
            <label for="">Email Address: </label><input type="text" class="text1" name="email" value="<?php echo "$email";?>">
            <br>
            <br>
            <label for="">Contact No.: </label><input type="text" class="text1" name="contactnumber" value="<?php echo "$contactnumber";?>">
            <br>
            <br>
            <input type="submit" class="btn1" name="update" value="Update">
            <?php
                if(isset($_POST['update'])){
                    $updatelogin = "UPDATE `tbllogin` SET `firstname`='".$_POST['firstname']."',`surname`='".  $_POST['surname']."',`emailadd`='".$_POST['email']."',`contactno`='".$_POST['contactnumber']."' WHERE `uname`='".$_SESSION    ['User']."'";
                    $sqlupdatelogin = mysqli_query($conn, $updatelogin);
                    echo "  <script>
                                alert(\"Your profile has been successfully updated!\");
                                window.location.href = \"editprofile.php\";
                            </script>";
                }
            ?>
        </form>
        
    </div>
    <div id="footer">

    </div>
</body>
</html>