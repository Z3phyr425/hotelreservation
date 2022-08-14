<div id="header">
        <h3>
            <?php echo $_SESSION['User'];?>
        </h3>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logout" class="btn1">
            <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header("location: index.php");
                }
            ?>
        </form>
        <?php
            if($role == "Admin"){
                echo "  <ul>
                            <li><a href=\"indexportal.php\">Home</a></li>
                            <li><a href=\"\">Accounts</a>
                                <ul>
                                    <li><a href=\"createedit.php\">Create & Edit User</a></li>
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
                                    <li><a href=\"viewprofile.php\">View Profile</a></li>
                                    <li><a href=\"editprofile.php\">Edit Profile</a></li>
                                </ul>
                            </li>
                        </ul>";
            }
        ?>
    </div>
