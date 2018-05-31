<?php

session_start();
include '../connection/db_connection.php';
$db = $_POST['db'];
$table_stock = $_SESSION['user']."_stock";
$table_flow = $_SESSION['user']."_".$db;
 $query = "SELECT hs.item_name AS stockName, hf.flow_date AS date, SUM(hf.flow_item_number) AS monthlySales FROM ".$table_stock." hs"
         . ", ".$table_flow." hf WHERE hs.stock_id = hf.stockid GROUP BY hs.item_name, MONTH(hf.flow_date)";
$result = mysqli_query($conn,$query);
$flow_arr = array();
if($result){
while($row = mysqli_fetch_assoc($result)){
    
    $stockname = $row['stockName'];
    $date = $row['date'];
    $number = $row['monthlySales'];
    $flow_arr[] = array("name"=>$stockname,"count"=>$number);
 
  }


/* encoding array to json format */
echo ltrim(json_encode($flow_arr), "\r\n");
//echo json_encode(nl2br($item_arr));
}
else{
    $error = die(mysqli_error($conn));
    echo $error;
}
