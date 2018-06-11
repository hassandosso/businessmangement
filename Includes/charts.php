<?php

session_start();
include '../connection/db_connection.php';
$db = $_POST['db'];
$table_stock = $_SESSION['user']."_stock";
$table= $_SESSION['user']."_".$db;
$flow_arr = array();
if($db=='flow')
{
    $flow_arr = array();
    $query = "SELECT DATE_FORMAT(hf.flow_date,'%Y/%c') AS month, SUM(hf.flow_item_number) AS monthlySales, hs.item_name AS stockName FROM ".$table_stock." hs"
         . ", ".$table." hf WHERE hs.stock_id = hf.stockid GROUP BY hs.item_name, MONTH(hf.flow_date) ORDER BY DATE(hf.flow_date)";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){

        $stockname = $row['stockName'];
        $date = $row['month'];
        $number = $row['monthlySales'];
    //    $flow_arr[] = array("name"=>$stockname,"month"=>$date,"count"=>$number);
        $flow_arr[] = array($date,$stockname,$number);

      }

}else if($db =='billing'){
    $flow_arr = array();
    $query = "SELECT SUM(total_price) as sold, SUM(discount) AS discounts, SUM(tax) AS taxes, DATE_FORMAT(bill_date,'%Y/%c')"
            . " AS month FROM ".$table." GROUP BY bill_date";
    
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
        
        $sold = $row['sold'];
        $discounts = $row['discounts'];
        $month = $row['month'];
        $taxes = $row['taxes'];
    //    $flow_arr[] = array("name"=>$stockname,"month"=>$date,"count"=>$number);
        $flow_arr[] = array($month,$sold,$discounts,$taxes);

      }

    
}
/* encoding array to json format */
echo ltrim(json_encode($flow_arr), "\r\n");

//echo json_encode(nl2br($item_arr));
