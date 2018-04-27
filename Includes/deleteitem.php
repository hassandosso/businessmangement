<?php
session_start();
    include '../connection/db_connection.php';
    $table_item = $_SESSION['user']."_item";
   $delid = $_POST['deliditem'];
   $delete = "DELETE FROM ".$table_item." WHERE item_id='$delid'";
   $ExecuteDelete = mysqli_query($conn, $delete);
   if($ExecuteDelete){
       echo "data has been deleted successfully";
   }
   else{
       $error = die(mysqli_error($conn));
       echo $error;
   }
