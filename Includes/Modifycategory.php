<?php
 session_start();
//if(isset($_GET['edit'])){
 include '../connection/db_connection.php';
    $table_category = $_SESSION['user']."_category";
   
    $id = $_GET['id'];

    $EditQuery = "SELECT category_id, category_name FROM ".$table_category." WHERE category_id='$id'";
   $result = mysqli_query($conn, $EditQuery);
   if($result){
       $record = array();
   $data = mysqli_fetch_array($result);
   $record[0] = $data['category_id'];
   $record[1] = $data['category_name'];
   
   echo json_encode($record);
   }
   else{
      die(mysqli_error($conn));
   }



