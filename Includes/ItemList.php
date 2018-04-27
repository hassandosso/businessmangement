<?php
session_start();
include '../connection/db_connection.php';
$table_item = $_SESSION['user']."_item";
 $query = "SELECT item_id AS id, item_name AS name, category, price FROM ".$table_item;
$result = mysqli_query($conn,$query);
$item_arr = array();
if($result){
while($row = mysqli_fetch_assoc($result)){
    
    $itemid = $row['id'];
    $itemname = $row['name'];
    $category = $row['category'];
    $price = $row['price'];

    $item_arr[] = array("id"=>$itemid,"name"=>$itemname,"category"=>$category,"price"=>$price);
 
  }


/* encoding array to json format */
echo ltrim(json_encode($item_arr), "\r\n");
//echo json_encode(nl2br($item_arr));
}
else{
    $error = die(mysqli_error($conn));
    echo $error;
}

