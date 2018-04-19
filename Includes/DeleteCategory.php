<?php
session_start();
    include '../connection/db_connection.php';
    $table_category = $_SESSION['user']."_category";
   $delid = $_POST['delid'];
   $delete = "DELETE FROM ".$table_category." WHERE category_id='$delid'";
   $ExecuteDelete = mysqli_query($conn, $delete);
   if($ExecuteDelete){
       echo "data has been deleted successfully";
   }
   else{
       $error = die(mysqli_error($conn));
       echo $error;
   }

