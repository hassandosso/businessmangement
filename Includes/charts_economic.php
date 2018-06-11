<?php
session_start();
include '../connection/db_connection.php';
$stock  = $_SESSION['user']."_stock";
$item = $_POST['item'];
$table= $_SESSION['user']."_billing";
 $item_arr = array();
 $flow_arr = array();
 $info_arr = array();
$query = "SELECT DATE_FORMAT(bill_date,'%Y/%c') AS month, quantity, "
            . "item_name AS name FROM ".$table." WHERE item_name='$item' GROUP BY bill_date";

$query1 = "SELECT SUM(total_price) as sold, SUM(discount) AS discounts, SUM(tax) AS taxes, DATE_FORMAT(bill_date,'%Y/%c')"
            . " AS month FROM ".$table." WHERE item_name='$item' GROUP BY bill_date";

$query2 = "SELECT initial_number AS initial, actual_number AS actual FROM ".$stock." WHERE item_name = '$item'";

$result = mysqli_query($conn,$query);
$result1 = mysqli_query($conn,$query1);
$result2 = mysqli_query($conn,$query2);
    while($row = mysqli_fetch_assoc($result)){

        $name = $row['name'];
        $month = $row['month'];
        $quantity = $row['quantity'];
    //    $flow_arr[] = array("name"=>$stockname,"month"=>$date,"count"=>$number);
        $item_arr[] = array($month,$name,$quantity);

    }   
    while($row1 = mysqli_fetch_assoc($result1)){
        
        $sold = $row1['sold'];
        $discounts = $row1['discounts'];
        $month = $row1['month'];
        $taxes = $row1['taxes'];
    //    $flow_arr[] = array("name"=>$stockname,"month"=>$date,"count"=>$number);
        $flow_arr[] = array($month,$sold,$discounts,$taxes);

      }
      
      $row2 = mysqli_fetch_assoc($result2);
      $info_arr[] = array($row2['initial'],$row2['actual']);
 echo ltrim(json_encode(array($item_arr, $flow_arr, $info_arr)), "\r\n");
