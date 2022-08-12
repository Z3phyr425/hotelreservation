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
    <title>Eastwoods International Hotel</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div id="body">
        <form action="" method="post">
            <h2>CREATE ACCOUNT</h2>
            </label><input type="text" class="text1" name="searchtxt" placeholder="Search..." required><input type="submit" class="btn1" name="searchbtn" value="Search">
            <h3>Account Details</h3>
            <hr>
            <label for="" class="labels">Username: </label><input type="text" class="text1" name="username" required>
            <br>
            <br>
            <label for="" class="labels">Password: </label><input type="password" class="text1" name="password" required>
            <br>
            <br>
            <label for="" class="labels">Confirm Password: </label><input type="password" class="text1" name="cpassword" required>
            <br>
            <br>
            <h3>User Details</h3>
            <hr>
            <label for="" class="labels">First Name: </label><input type="text" class="text1" name="firstname" required>
            <br>
            <br>
            <label for="" class="labels">Surname: </label><input type="text" class="text1" name="surname" required>
            <br>
            <br>
            <label for="" class="labels">Email Address: </label><input type="text" class="text1" name="email" required>
            <br>
            <br>
            <label for="" class="labels">Contact Number: </label><input type="text" class="text1" name="contactnumber" required>
            <br>
            <br>
            <input type="submit" class="btn1" name="createaccount" value="Create Account">
            <input type="submit" class="btn1" name="update" value="Update">
        </form>

    </div>
    <div id="footer">

    </div>
</body>
</html>
