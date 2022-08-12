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
    <div id="header">
        <h3>
            <?php echo $_SESSION['User'];?>
        </h3>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logout" class="btn1">
            <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header("location: login.php");
                }
            ?>
        </form>
        <?php
            if($role == "Admin"){
                echo "  <ul>
                            <li><a href=\"indexportal.php\">Home</a></li>
                            <li><a href=\"\">Tab2</a>
                                <ul>
                                    <li><a href=\"#\">Tab2.1</a></li>
                                    <li><a href=\"#\">Tab2.2</a></li>
                                </ul>
                            </li>
                            <li><a href=\"\">Tab3</a>
                                <ul>
                                    <li><a href=\"#\">Tab3.1</a></li>
                                </ul>
                            </li>
                        </ul>";
            }else{
                echo "  <ul>
                            <li><a href=\"indexportal.php\">Home</a></li>
                            <li><a href=\"\">My Profile</a>
                                <ul>
                                    <li><a href=\"#\">View Profile</a></li>
                                    <li><a href=\"#\">Edit Profile</a></li>
                                </ul>
                            </li>
                        </ul>";
            }
        ?>
    </div>
    <div id="body">
    
    </div>
    <div id="footer">

    </div>
</body>
</html>
