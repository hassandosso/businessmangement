<?php
session_start();
    include '../connection/db_connection.php';
    $table_stock= $_SESSION['user']."_stock";
   $delid = $_POST['delidstock'];
   $delete = "DELETE FROM ".$table_stock." WHERE stock_id='$delid'";
   $ExecuteDelete = mysqli_query($conn, $delete);
   if($ExecuteDelete){
       echo "data has been deleted successfully";
   }
   else{
       $error = die(mysqli_error($conn));
       echo $error;
   }
