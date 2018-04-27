<?php
 session_start();
//if(isset($_GET['edit'])){
 include '../connection/db_connection.php';
    $table_item = $_SESSION['user']."_item";
   
    $id = $_POST['iditem'];

    $EditQuery = "SELECT * FROM ".$table_item." WHERE item_id='$id'";
   $result = mysqli_query($conn, $EditQuery);
   if($result){
       $record = array();
   $data = mysqli_fetch_array($result);
   $record[0] = $data['item_id'];
   $record[1] = $data['item_name'];
   $record[2] = $data['category'];
   $record[3] = $data['price'];
   
   echo ltrim(json_encode($record), "\r\n");
   }
   else{
      die(mysqli_error($conn));
   }



