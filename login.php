<?php
    include("connection.php");
    session_start();

    if(isset($_SESSION['User'])){
        header("location: indexportal.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-9">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eastwoods International Hotel | Login</title>
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
        .container{
            width:60%;
            height: calc(80vh);
            background: #132332;
            border-radius: 20px;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        #login-left {
            background: url(img/bg_login.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 20px;
        }
        .row_login{
            height: calc(100%);
        }
        .input_{
            background: none;
            border: none;
            border-bottom: solid 1px #ffffff;
            outline: none;
        }
        .btn_login{
            width: 100%;
            background-color: #CA8749;
            border-radius: 20px;
            color: #ffffff;
        }
        </style>
</head>
<body>
<main id="main" class="alert-info">
    <div class="container ">
        <div class="row row_login">
            <div class="col-md-6" id="login-left">
                <!-- Logo is here-->
            </div>
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center text-white">
                            <h1 class="display-1">LOGO</h1>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center text-white">
                            <h2>Log in</h2>
                        </div>
                    </div>
                    <div class="row mt-2 d-flex justify-content-center text-white">
                        <div class="col-md-9">
                            <label class="control-label h6">Username</label>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center text-white">
                        <div class="col-md-9">
                            <input type="text" class="input_ w-100 text-white" name="username" placeholder="Enter username" required>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center text-white">
                        <div class="col-md-9">
                            <label class="control-label h6">Password</label>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center text-white">
                        <div class="col-md-9">
                            <input type="password" class="input_ w-100 text-white" name="password" placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center text-white">
                        <div class="col-md-9">
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
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center text-white">
                        <div class="col-md-9">
                            <input type="submit" name="login" class="btn btn_login btn-block btn-wave col-md-4 mt-3" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>
</html>
