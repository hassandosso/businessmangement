<div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand bmlogo" href="#"><img src="images/Business Management.png" class="img-responsive"></a>
                </div>
                    <ul class="nav navbar-nav menu">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="contact.php">contact us</a></li>
                    </ul>
                    <?php
                    if(!isset($_SESSION['user'])){
                    echo '<ul class="nav navbar-nav navbar-right">
                      <li><a href="#" id="signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>';
                    }
                    else{
                        echo '<ul class="nav navbar-nav navbar-right">
                        <li><a href="Includes_action_client_server/logout.php" id="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>';
                    }
                    ?>
            </div>