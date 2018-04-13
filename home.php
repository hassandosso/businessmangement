<!DOCTYPE html>
<?php
session_start();
include 'connection/db_connection.php';
include 'Includes_action_client_server/login.php';
//include 'Includes_action_client_server/logout.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
        <!--        Bootstrap and awesome icon-->
	<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">   
        <link href="fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
       
        <!--        CSS link-->
        <link rel="stylesheet" href="Style/menustyle.css">
        <link rel="stylesheet" href="Style/home_contact_ModalStyle.css">
        <link rel="stylesheet" href="Style/carousel.css">
    </head>
    <body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
            <?php include 'includes/navbar.php'; ?>
        </nav>
        <div class="container afternav">
            <a href="index.php" class="card"><h3 class=" card-link text-right">
                <?php 
                    if(isset($_SESSION['user']) && !isset ($_SESSION['subuser'])){
                        echo "{$_SESSION['user']}";     
                    }
                    else if(isset ($_SESSION['user']) && isset ($_SESSION['subuser'])){
                       echo $_SESSION['user']."@".$_SESSION['subuser'];
                                        
                    }  
                ?>
                </h3></a>
            <div class="row">
                <section class="col-md-4">
                    <div class="modal" id="myModal-login">
                        <?php include 'includes/loginpage.php'; ?>
                    </div>
                </section>
            </div>
         <div id="wrapper">
    	<div id="slider">
            <?php include 'includes/slidecontent.php'; ?>
     
    	</div>
    </div>
        </div>
        
       
    </body>
    
    <script src="vendor/jquery/jquery.min.js"></script>
        
        <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js">
        </script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
        </script>
        <script src="JavaScript/signup_signin.js"></script>
        <script src="JavaScript/carousel.js"></script>
        <script src="JavaScript/fieldValidation.js"></script>
        <script src="JavaScript/createAccount.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>


