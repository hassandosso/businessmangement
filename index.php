<!DOCTYPE html>
<?php 
 session_start();
 include 'connection/db_connection.php';
 include 'Includes_action_client_server/registration.php';
// include 'Includes_action_client_server/logout.php';
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--	<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
        <link rel="stylesheet" href="Style/indexstyle.css">
        <link rel="stylesheet" href="Style/indexModalStyle.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top barnav">
            <?php include 'includes/indexNavbar.php'; ?>
        </nav>
        <div class="container-fluid afternav">
         <h3 class="card-title text-danger text-right mb-5 mt-4"><?php if(isset($_SESSION['user'])){echo "{$_SESSION['user']}";} ?></h3>
        
        <div class="row">
            <section class="col-xs-3">
<!--                 The Modal -->
                <div id="myModal-login" class="modal"><!--

                   Modal content 
                    <?php include 'includes/loginpage.php'; ?>
-->                </div><!--
                -->
                <div id="myModal-category" class="modal" >

<!--                   Modal content -->
                    <?php include 'includes/addcategory.php'; ?>
                </div>
                
                <div id="myModal-item" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/additem.php'; ?>
                </div>

                <div id="myModal-newStock" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/newstock.php'; ?>
                </div>
                
            </section>
        </div>
    </div>
     
    </body>
    
    <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
        </script>
        
        <script src="JavaScript/loginpage.js"></script>
<!--        <script src="JavaScript/signup_signin.js"></script>-->
       
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>
