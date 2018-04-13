<!DOCTYPE html>
<?php 
 session_start();
 include 'connection/db_connection.php';
 include 'Includes_action_client_server/login.php';
 include 'Includes_action_client_server/insertdata.php';
 include 'Includes_action_client_server/createuseraccount.php';
  

 
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        
        
        <link rel="stylesheet" href="Style/indexstyle.css">
        <link rel="stylesheet" href="Style/indexModalStyle.css">
       
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top barnav">
            <?php include 'includes/indexNavbar.php'; ?>
        </nav>
        <div class="container-fluid afternav">
        
        <div class="row col-md-12">
<!--            <section class="col-xs-3">-->
<!--                 The Modal -->
               <!--
-->                <div id="myModal-login" class="modal"><!--
               
                   Modal content <!--
                   
                    <?php include 'Includes/loginpage.php'; ?>
-->                </div><!--
                -->
                <div id="myModal-category" class="modal" >

<!--                   Modal content -->
                    <?php include 'Includes/addcategory.php'; ?>
                </div>
                
                <div id="myModal-item" class="modal">

<!--                   Modal content -->
                    <?php include 'Includes/additem.php'; ?>
                </div>

                <div id="myModal-newStock" class="modal">

<!--                   Modal content -->
                    <?php include 'Includes/newstock.php'; ?>
                </div>
                <div id="myModal-modif" class="modal">

                  <?php include 'Includes/actionsList.php';?>
                  
                </div>
                 <div id="myModal-adduser" class="modal">

                   
                    <?php include 'Includes/createuseraccount.php'; ?>
               </div>
            <!--</section>-->
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-left: auto; margin-right: auto" ><?php  include 'Includes/CategoryList.php'; ?></div>
            
        </div>
    </div>
     
    </body>
    
    <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
        </script>
<!--        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="JavaScript/loginpage.js"></script>
        <script src="JavaScript/CategoryList.js"></script>
        


       
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>
