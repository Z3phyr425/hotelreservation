<?php
    include("connection.php");
    session_start();

    if(isset($_SESSION['User'])){
        $getlogin = "SELECT * FROM `tbllogin` WHERE `uname`='".$_SESSION['User']."'";
        $sqllogin = mysqli_query($conn, $getlogin);
        $rowlogin = mysqli_fetch_assoc($sqllogin);
    }else{
        header("Location: login.php");
    }
    
    $getuname = $_GET['uname'];
    $dellogin = "DELETE FROM `tbllogin` WHERE `uname`='$getuname'";
    $sqllogin = mysqli_query($conn, $dellogin);
    if($sqllogin){
        echo "  <script>
                    alert(\"An account has been successfully deleted\");
                    window.location.href=\"createedit.php\";
                </script>";
    }else{
        echo "something went wrong";
    }
?>