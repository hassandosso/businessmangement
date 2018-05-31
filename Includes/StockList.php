<?php
session_start();
include '../connection/db_connection.php';
$table_stock = $_SESSION['user']."_stock";
 $query = "SELECT stock_id AS id, item_name AS name, initial_number AS number, entry_date AS entry,"
         . " actual_number AS actualNumber, out_date AS lastTransaction FROM ".$table_stock;
$result = mysqli_query($conn,$query);
$stock_arr = array();
if($result){
while($row = mysqli_fetch_assoc($result)){
    
    $stockid = $row['id'];
    $stockname = $row['name'];
    $number = $row['number'];
    $entry = $row['entry'];
    $actualNumber = $row['actualNumber'];
    $lastTransaction = $row['lastTransaction'];

    $stock_arr[] = array("id"=>$stockid,"name"=>$stockname,"number"=>$number,"entry"=>$entry,"actual"=>$actualNumber,"last"=>$lastTransaction);
 
  }


/* encoding array to json format */
echo ltrim(json_encode($stock_arr), "\r\n");
//echo json_encode(nl2br($item_arr));
}
else{
    $error = die(mysqli_error($conn));
    echo $error;
}

