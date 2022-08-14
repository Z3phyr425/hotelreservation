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
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eastwoods International Hotel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style type="text/css">
        body{
            width: 100%;
            height: calc(100%);
            /*background: #007bff;*/
        }
        main#main{
            width:100%;
            height: calc(100%);
            background:white;
        }
        .header {
            background: #142434;
            color: #f1f1f1;
        }
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }
        .sticky + .content {
            padding-top: 102px;
        }
    </style>
</head>
<body>
    <div class="header" id="myHeader">
        <?php
            include("header.php");
        ?>
    </div>
    <div class="content" id="body">

    </div>
    <div id="footer">

    </div>

    <!-- ========================================================================== -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
    </script>
</body>
</html>
