<?php
    include("connection.php");
    session_start();
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
    <div id="header">

    </div>
    <div id="body">
        <form action="" method="post">
            <h2>SIGN IN</h2>
            <label for="">Username: </label><input type="text" name="username" class="text1" required>
            <br>
            <br>
            <label for="">Password: </label><input type="password" name="password" class="text1" required>
            <br>
            <?php
                if(isset($_POST['login'])){
                    $verify = "SELECT * FROM tbllogin WHERE `uname`='".$_POST['username']."' AND `upass`='".$_POST['password']."'";
                    $sqlverify = mysqli_query($conn, $verify);
                    if(mysqli_fetch_assoc($sqlverify)){
                        $_SESSION['User'] = $_POST['username'];
                        $username = $_POST['username'];
                        
                        echo "  <script>
                                    alert(\"Welcome Back $username\");
                                    window.location.href = \"indexportal.php\";
                                </script>";
                    }else{
                        echo "  <span style=\"color:red;font-size:9pt\">Wrong Credentials!</span>";
                    }
                }
            ?>
            <br>
            <input type="submit" name="login" class="btn1" value="Login">
        </form>
    </div>
    <div id="footer">

    </div>
</body>
</html>