<?php
session_start();
include '../connection/db_connection.php';
$table_billing = $_SESSION['user']."_billing";
$bill_info = array();
$bill_item = array();
$query = "SELECT bill_id, SUM(total_price) AS subamount, SUM(tax) AS tax, SUM(discount) AS discount, "
        . "SUM(final_price) AS totalamount, bill_date FROM ".$table_billing." GROUP BY bill_id";

$query1 = "SELECT item_name, bill_id FROM ".$table_billing." WHERE bill_id IN ( SELECT bill_id FROM ".$table_billing.""
        . " GROUP BY bill_id)";
$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($result)){
    $billNo = $row['bill_id'];
    $subAmount = $row['subamount'];
    $tax = $row['tax'];
    $discount = $row['discount'];
    $totalAmount = $row['totalamount'];
    $date = $row['bill_date'];
    
    $bill_info[] = array("billNo"=>$billNo, "subAmount"=>$subAmount, "tax"=>$tax, "discount"=>$discount, "totalAmount"=>$totalAmount, "date"=>$date);
}
while ($row1 = mysqli_fetch_array($result1)){
    $billNo = $row1['bill_id'];
    $itemName = $row1['item_name'];
    
    $bill_item[] = array("itemName"=>$itemName, "billNo"=>$billNo);
}

echo ltrim(json_encode(array($bill_info, $bill_item)), "\r\n");

