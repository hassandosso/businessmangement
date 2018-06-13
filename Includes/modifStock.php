<?php
session_start();
//if(isset($_GET['edit'])){
 include '../connection/db_connection.php';
    $table_stock = $_SESSION['user']."_stock";
   
    $id = $_POST['idstock'];

    $EditQuery = "SELECT id, stock_id, item_name, initial_number FROM ".$table_stock." WHERE stock_id='$id'";
   $result = mysqli_query($conn, $EditQuery);
   if($result){
       $record = array();
   $data = mysqli_fetch_array($result);
   $record[0] = $data['id'];
   $record[1] = $data['stock_id'];
   $record[2] = $data['item_name'];
   $record[3] = $data['initial_number'];
   
   echo ltrim(json_encode($record), "\r\n");
   }
   else{
      die(mysqli_error($conn));
   }

