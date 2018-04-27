<?php
session_start();
include '../connection/db_connection.php';
$table_category = $_SESSION['user']."_category";
 $query = "SELECT * FROM ".$table_category;
$result = mysqli_query($conn,$query);
$category_arr = array();

while($row = mysqli_fetch_array($result)){
    $catid = $row['category_id'];
    $catname = $row['category_name'];

    $category_arr[] = array("id" => $catid,"name" => $catname);
}

/* encoding array to json format */
echo ltrim(json_encode($category_arr), "\r\n");

 
