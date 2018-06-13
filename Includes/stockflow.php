<?php

session_start();
include '../connection/db_connection.php';
$table_stock= $_SESSION['user']."_stock";
$table_flow= $_SESSION['user']."_flow";
$table_billing= $_SESSION['user']."_billing";
$table_code= $_SESSION['user']."_billcode";
$date = date("Y/m/d");
$data = json_decode($_POST['billinfo'],true);
$bill_no = $_POST['billno'];
$client = $_POST['client'];
$i = count($data);

foreach ($data as $value) {
   $item = $value["item"];
   $quantity = $value['quantity'];
   $tax = $value['tax'];
   $unitprice = $value['unitprice'];
   $discount = $value['discount'];
   $totalprice = $value['totalprice'];
   //UPDATING STOCK TABLE
   $query = "select actual_number from ".$table_stock." where item_name='$item'";
   $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
   $number = $result['actual_number'];
   $actual_number = $number-$quantity;
   $query2 = "UPDATE ".$table_stock." SET actual_number='$actual_number', out_date='$date'"
           . " WHERE item_name='$item'";
   $result2 = mysqli_query($conn, $query2);
   //END UPDATING STOCK
   //UPDATING FLOW TABLE
   $queryFlow = "SELECT stock_id FROM ".$table_stock." WHERE item_name='$item'";
   $resultflow = mysqli_fetch_assoc(mysqli_query($conn, $queryFlow));
   $id = $resultflow['stock_id'];
   $insertflow = "INSERT INTO ".$table_flow." (stockid, flow_date, flow_item_number) VALUES('$id','$date','$quantity')";
   $insertflowResult = mysqli_query($conn, $insertflow);
   $amount = ($tax*$totalprice/100)+$totalprice;
   //INSERT BILLING TABLE
   $query_bill = "INSERT INTO ".$table_billing." (bill_id,quantity,unit_price,total_price,tax, discount,final_price,"
           . "item_name, customer,bill_date) VALUES('$bill_no','$quantity','$unitprice','$totalprice','$tax',"
           . "'$discount','$amount','$item','$client','$date')";
    $result_bill = mysqli_query($conn, $query_bill);
    if($result_bill){
       $i=$i-1;
       if($i==0){
            $deletecode = mysqli_query($conn, "DELETE FROM ".$table_code." LIMIT 1 ");
       }
    }
   
   
}
