<!DOCTYPE html>
<?php 
 session_start();
 include 'connection/db_connection.php';
 include 'Includes_action_client_server/login.php';
 include 'Includes_action_client_server/insertdata.php';
 include 'Includes_action_client_server/createuseraccount.php';
//DASHBOARD ACTION
 $table_category = $_SESSION['user']."_category";
    $categoryList = "SELECT * FROM ".$table_category;
    $Executecategory = mysqli_query($conn, $categoryList);
    $rowcount=mysqli_num_rows($Executecategory);
    
 $table_item = $_SESSION['user']."_item";
    $ItemList = "SELECT * FROM ".$table_item;
    $ExecuteItem = mysqli_query($conn, $ItemList);
    $rowcount_item=mysqli_num_rows($ExecuteItem);
    
  $table_stock = $_SESSION['user']."_stock";
    $stockList = "SELECT * FROM ".$table_stock;
    $Executestock = mysqli_query($conn, $stockList);
    $rowcount_stock=mysqli_num_rows($Executestock);

 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Style/materialize.css">
	<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
       
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">-->

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
<!--         <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
<!--         new link-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--        end new style-->
        
        <link rel="stylesheet" href="Style/indexModalStyle.css">
         <link rel="stylesheet" href="Style/indexstyle.css">
         
      
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top barnav">
            <?php include 'includes/indexNavbar.php'; ?>
        </nav>
        <div class="container-fluid afternav">
        
        <div class="myModal">
            <div id="myModal-toggle" class="modal closemodal">
                    <?php include 'Includes/toggleaction/toggle_modal.php'; ?>
               </div>
<!--            <section class="col-xs-3">-->
                <div id="myModal-confirm" class="modal">
                    <?php include 'Includes/ConfirmModal.php'; ?>
               </div>
               <div id="myModal-login" class="modal">
                    <?php include 'Includes/loginpage.php'; ?>
             </div>
                <div id="myModal-category" class="modal" >

<!--                   Modal content -->
                    <?php include 'Includes/addcategory.php'; ?>
                </div>
                
                <div id="myModal-item" class="modal closemodal">

<!--                   Modal content -->
                    <?php include 'Includes/additem.php'; ?>
                </div>

                <div id="myModal-newStock" class="modal">

<!--                   Modal content -->
                    <?php include 'Includes/newstock.php'; ?>
                </div>
                <div id="myModal-modif" class="modal">
                      
                  <?php 
                  include 'Includes/CategoryModify_modal.php';?>
                   </div>
                
                 <div id="myModal-adduser" class="modal">

                   
                    <?php include 'Includes/createuseraccount.php'; ?>
               </div>
            <!--</section>-->
            </div>
            <div class="row col-md-1 col-lg-1"></div>
            <div class="row col-md-10 col-lg-10 mytable">
                <?php 
                if(isset($_GET['boards'])){
                     include "Includes/dashboard.php";
                }
                if(isset($_GET['charts'])){
                    include "Includes/chartsDesign.php";
                }
//                    
                      ?>
                
            </div>
            
            <div class="fixed-action-btn click-to-toggle" style="bottom: 45px; right: 24px;">
      <a class="btn-floating btn-large pink waves-effect waves-light">
        <i class="large material-icons">add</i>
      </a>

      <ul>
        <li>
            <span id="add_note" class="btn-floating red"><i class="material-icons" title="Take note">note_add</i></span>
        </li>

        <li>
            <span class="btn-floating yellow darken-1" id="billcode"><i class="material-icons" title="Add bill code">vpn_key</i></span>
        </li>

        <li>
            <span class="btn-floating green" id="customer" ><i class="material-icons" title="add customer">account_circle</i></span>
        </li>
      </ul>
    </div>
            
        </div>
    
    </body>
    
    <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
        </script>
<!--        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<!--        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
       <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
       <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
       <script src='dist/jspdf.min.js'></script>
        <script src="JavaScript/loginpage.js"></script>
        <script src="JavaScript/CategoryList.js"></script>
        <script src="JavaScript/ItemList.js"></script> 
        <script src="JavaScript/StockList.js"></script> 
        <script src="JavaScript/toggle_action.js"></script>  
         <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
         <script src="JavaScript/onlineScript/googleCharts.js"></script>
         <script src="JavaScript/charts.js"></script>
        <script>
        
        </script>
</html>
