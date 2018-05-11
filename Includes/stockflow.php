<?php

session_start();
include '../connection/db_connection.php';
$table_stock= $_SESSION['user']."_stock";
$table_flow= $_SESSION['user']."_flow";
$date = date("Y/m/d");
$data = json_decode($_POST['mydata'],true);
//foreach ($data as $value) {
//   $item = $value["item"];
//   $quantity = $value['quantity'];
//   //UPDATING STOCK TABLE
//   $query = "select actuel_number from ".$table_stock." where item_name='$item'";
//   $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
//   $number = $result['actuel_number'];
//   $actual_number = $number-$quantity;
//   $query2 = "UPDATE ".$table_stock." SET actuel_number='$actual_number', out_date='$date'"
//           . " WHERE item_name='$item'";
//   $result2 = mysqli_query($conn, $query2);
//   //END UPDATING STOCK
//   //UPDATING FLOW TABLE
//   $queryFlow = "SELECT stock_id FROM ".$table_stock." WHERE item_name='$item'";
//   $resultflow = mysqli_fetch_assoc(mysqli_query($conn, $queryFlow));
//   $id = $resultflow['stock_id'];
//   $insertflow = "INSERT INTO ".$table_flow." (stockid, flow_date, flow_item_number) VALUES('$id','$date','$quantity')";
//   $insertflowResult = mysqli_query($conn, $insertflow);
//   
//   
//}
