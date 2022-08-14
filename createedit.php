<?php
    include("connection.php");
    error_reporting(0);
    session_start();

    if($_SESSION['User'] == $getusername){
        header("location: browse.php");;
    }
    
    if(isset($_SESSION['User'])){
        $selectlogin = "SELECT * FROM `tbllogin` WHERE `uname`='".$_SESSION['User']."'";
        $sqlselectlogin = mysqli_query($conn, $selectlogin);
        $fetchselectlogin = mysqli_fetch_assoc($sqlselectlogin);

        $username = $_SESSION['User'];
        $role = $fetchselectlogin['urole'];
        if($role == "Admin"){

        }else{
            header("location: indexportal.php");
        }
    }else{
        header("location: login.php");
    }

    if($_GET['uname'] != null){
        $getusername = $_GET['uname'];
        $selectclogin = "SELECT * FROM `tbllogin` WHERE `uname`='".$getusername."'";
        $sqlselectlcogin = mysqli_query($conn, $selectclogin);
        $fetchselectclogin = mysqli_fetch_assoc($sqlselectlcogin);

        $usernamevalue = $fetchselectclogin['uname'];
        $firstnamevalue = $fetchselectclogin['firstname'];
        $surnamevalue = $fetchselectclogin['surname'];
        $contactnovalue = $fetchselectclogin['contactno'];
        $emailvalue = $fetchselectclogin['emailadd'];
        $passwordvalue = $fetchselectclogin['upass'];
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
            <h2>CREATE USER</h2>
            <select name="filter" id="">
                <option value="">Filter</option>
                <option value="username">Username</option>
                <option value="firstname">First Name</option>
                <option value="surname">Surname</option>
            </select>
            <input type="text" class="text1" name="searchtxt" placeholder="Search..."><input type="submit" class="btn1" name="searchbtn" value="Search">
            <h3>Account Details</h3>
            <hr>
            <label for="" class="labels">Username: </label><input type="text" class="text1" name="username" value="<?php echo "$usernamevalue";?>">
            <br>
            <br>
            <label for="" class="labels">Password: </label><input type="password" class="text1" name="password">
            <br>
            <br>
            <label for="" class="labels">Confirm Password: </label><input type="password" class="text1" name="cpassword">
            <br>
            <br>
            <h3>User Details</h3>
            <hr>
            <label for="" class="labels">First Name: </label><input type="text" class="text1" name="firstname" value="<?php echo "$firstnamevalue";?>">
            <br>
            <br>
            <label for="" class="labels">Surname: </label><input type="text" class="text1" name="surname" value="<?php echo "$surnamevalue";?>">
            <br>
            <br>
            <label for="" class="labels">Email Address: </label><input type="text" class="text1" name="email" value="<?php echo "$emailvalue";?>">
            <br>
            <br>
            <label for="" class="labels">Contact Number: </label><input type="text" class="text1" name="contactnumber" value="<?php echo "$contactnovalue";?>">
            <br>
            <?php
                if(isset($_POST['createaccount'])){
                    if($_POST['password'] == $_POST['cpassword']){
                        $checkuname = "SELECT * FROM `tbllogin` WHERE `uname`='".$_POST['username']."'";
                        $sqlcheckuname = mysqli_query($conn, $checkuname);
                        if(mysqli_num_rows($sqlcheckuname)>0){
                            echo "  <span style=\"color:red;font-size:9pt\">Username is existing!</span>";
                        }else{
                            $addlogin = "INSERT INTO `tbllogin`(`uname`,`upass`,`urole`,`firstname`,`surname`,`emailadd`,`contactno`) VALUES ('".$_POST['username']."','".$_POST['password']."','User','".$_POST['firstname']."','".$_POST['surname']."','".$_POST['email']."','".$_POST['contactnumber']."')";

                            $sqladdlogin = mysqli_query($conn, $addlogin);
                            echo "  <script>
                                        alert(\"A user has been successfully created!\");
                                    </script>"; 
                        }
                    }else{
                        echo "  <span style=\"color:red;font-size:9pt\">Password did not match!</span>";
                    }
                }

                if(isset($_POST['update'])){
                    if($_POST['password'] == $_POST['cpassword']){
                        if($_SESSION['User'] == $getusername){
                            echo "  <script>
                                        alert(\"You cannot edit your own username.\");
                                    </script>";
                        }else{
                            $updatelogin = "UPDATE `tbllogin` SET `uname`='".$_POST['username']."',`upass`='".$_POST['password']."',`firstname`='".$_POST['firstname']."',`surname`='".$_POST['surname']."',`emailadd`='".$_POST['email']."',`contactno`='".$_POST['contactnumber']."' WHERE `uname`='".$getusername."'";
                            $sqlupdatelogin = mysqli_query($conn, $updatelogin);
                            echo "  <script>
                                        alert(\"A user has been successfully updated!\");
                                    </script>"; 
                        }
                    }else{
                        echo "  <span style=\"color:red;font-size:9pt\">Password did not match!</span>";
                    }
                }
            ?>
            <br>
            <input type="submit" class="btn1" name="createaccount" value="Create Account">
            <input type="submit" class="btn1" name="update" value="Update">

            <?php
                if(isset($_POST['searchbtn'])){
                    if($_POST['filter'] == "username"){
                        $searchlogin = "SELECT * FROM `tbllogin` WHERE `uname`='".$_POST['searchtxt']."'";
                        $sqlsearchlogin = mysqli_query($conn, $searchlogin);
                        if(mysqli_num_rows($sqlsearchlogin)>0){
                            echo "  <table>
                                        <h2>USER LIST</h2>
                                        <hr>
                                        <tr>
                                            <th>USERNAME</th>
                                            <th>FIRST NAME/SURNAME</th>
                                            <th>EMAIL ADDRESS</th>
                                            <th>CONTACT NUMBER</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    ";
                            while($fetchsearchlogin = mysqli_fetch_assoc($sqlsearchlogin)){
                                $username = $fetchsearchlogin['uname'];
                                echo "  
                                        <tr>
                                            <td>".$fetchsearchlogin['uname']."</td>
                                            <td>".$fetchsearchlogin['firstname']." ".$fetchsearchlogin['surname']."</td>
                                            <td>".$fetchsearchlogin['emailadd']."</td>
                                            <td>".$fetchsearchlogin['contactno']."</td>
                                            <td>
                                                <a href=\"createedit.php?uname=$username\">Edit</a>
                                                <a href=\"delete.php?uname=$username\">Delete</a>
                                            </th>
                                        </tr>";
                            }
                            echo "</table>";
                        }
                    }else if($_POST['filter'] == "firstname"){
                        $searchlogin = "SELECT * FROM `tbllogin` WHERE `firstname`='".$_POST['searchtxt']."'";
                        $sqlsearchlogin = mysqli_query($conn, $searchlogin);
                        if(mysqli_num_rows($sqlsearchlogin)>0){
                            echo "  <table>
                                        <h2>USER LIST</h2>
                                        <hr>
                                        <tr>
                                            <th>USERNAME</th>
                                            <th>FIRST NAME/SURNAME</th>
                                            <th>EMAIL ADDRESS</th>
                                            <th>CONTACT NUMBER</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    ";
                            while($fetchsearchlogin = mysqli_fetch_assoc($sqlsearchlogin)){
                                $username = $fetchsearchlogin['uname'];
                                echo "  
                                        <tr>
                                            <td>".$fetchsearchlogin['uname']."</td>
                                            <td>".$fetchsearchlogin['firstname']." ".$fetchsearchlogin['surname']."</td>
                                            <td>".$fetchsearchlogin['emailadd']."</td>
                                            <td>".$fetchsearchlogin['contactno']."</td>
                                            <td>
                                                <a href=\"createedit.php?uname=$username\">Edit</a>
                                                <a href=\"delete.php?uname=$username\">Delete</a>
                                            </th>
                                        </tr>";
                            }
                            echo "</table>";
                        }
                    }else if($_POST['filter'] == "surname"){
                        $searchlogin = "SELECT * FROM `tbllogin` WHERE `surname`='".$_POST['searchtxt']."'";
                        $sqlsearchlogin = mysqli_query($conn, $searchlogin);
                        if(mysqli_num_rows($sqlsearchlogin)>0){
                            echo "  <table>
                                        <h2>USER LIST</h2>
                                        <hr>
                                        <tr>
                                            <th>USERNAME</th>
                                            <th>FIRST NAME/SURNAME</th>
                                            <th>EMAIL ADDRESS</th>
                                            <th>CONTACT NUMBER</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    ";
                            while($fetchsearchlogin = mysqli_fetch_assoc($sqlsearchlogin)){
                                $username = $fetchsearchlogin['uname'];
                                echo "  
                                        <tr>
                                            <td>".$fetchsearchlogin['uname']."</td>
                                            <td>".$fetchsearchlogin['firstname']." ".$fetchsearchlogin['surname']."</td>
                                            <td>".$fetchsearchlogin['emailadd']."</td>
                                            <td>".$fetchsearchlogin['contactno']."</td>
                                            <td>
                                                <a href=\"createedit.php?uname=$username\">Edit</a>
                                                <a href=\"delete.php?uname=$username\">Delete</a>
                                            </th>
                                        </tr>";
                            }
                            echo "</table>";
                        }
                    }else if($_POST['searchtxt'] == ""){
                        $searchlogin = "SELECT * FROM `tbllogin`";
                        $sqlsearchlogin = mysqli_query($conn, $searchlogin);
                        if(mysqli_num_rows($sqlsearchlogin)>0){
                            echo "  <table>
                                        <h2>USER LIST</h2>
                                        <hr>
                                        <tr>
                                            <th>USERNAME</th>
                                            <th>FIRST NAME/SURNAME</th>
                                            <th>EMAIL ADDRESS</th>
                                            <th>CONTACT NUMBER</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    ";
                            while($fetchsearchlogin = mysqli_fetch_assoc($sqlsearchlogin)){
                                $username = $fetchsearchlogin['uname'];
                                echo "  
                                        <tr>
                                            <td>".$fetchsearchlogin['uname']."</td>
                                            <td>".$fetchsearchlogin['firstname']." ".$fetchsearchlogin['surname']."</td>
                                            <td>".$fetchsearchlogin['emailadd']."</td>
                                            <td>".$fetchsearchlogin['contactno']."</td>
                                            <td>
                                                <a href=\"createedit.php?uname=$username\">Edit</a>
                                                <a href=\"delete.php?uname=$username\">Delete</a>
                                            </th>
                                        </tr>";
                            }
                            echo "</table>";
                        } 
                    }
                }else{
                    $searchlogin = "SELECT * FROM `tbllogin`";
                    $sqlsearchlogin = mysqli_query($conn, $searchlogin);
                    if(mysqli_num_rows($sqlsearchlogin)>0){
                        echo "  <table>
                                    <h2>USER LIST</h2>
                                    <hr>
                                    <tr>
                                        <th>USERNAME</th>
                                        <th>FIRST NAME/SURNAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT NUMBER</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                ";
                        while($fetchsearchlogin = mysqli_fetch_assoc($sqlsearchlogin)){
                            $username = $fetchsearchlogin['uname'];
                            echo "  
                                    <tr>
                                        <td>".$fetchsearchlogin['uname']."</td>
                                        <td>".$fetchsearchlogin['firstname']." ".$fetchsearchlogin['surname']."</td>
                                        <td>".$fetchsearchlogin['emailadd']."</td>
                                        <td>".$fetchsearchlogin['contactno']."</td>
                                        <td>
                                            <a href=\"createedit.php?uname=$username\">Edit</a>
                                            <a href=\"delete.php?uname=$username\">Delete</a>
                                        </th>
                                    </tr>";
                        }
                        echo "</table>";
                    } 
                }
            ?>
        </form>
    </div>
    <div id="footer">

    </div>
</body>
</html>