<?php
session_start();
include '../../connection/db_connection.php';
$table_item = $_SESSION['user']."_item";
 $query = "SELECT * FROM ".$table_item;
$result = mysqli_query($conn,$query);
$item_arr = array();
if($result){
while($row = mysqli_fetch_array($result)){
    $itemid = $row['item_id'];
    $itemname = $row['item_name'];
    $category = $row['category'];
    $price = $row['price'];

    $item_arr[] = array("id" => $itemid,"name" => $itemname,"category"=>$category,"price"=>$price);
}

/* encoding array to json format */
echo json_encode($item_arr);
}
else{
    $error = die(mysqli_error($conn));
    echo $error;
}

