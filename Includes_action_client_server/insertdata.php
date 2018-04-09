<?php

$table_category = $_SESSION['user']."_category";
$table_item = $_SESSION['user']."_item";
$table_stock = $_SESSION['user']."_stock";
$table_billing = $_SESSION['user']."_billing";
$table_billcode = $_SESSION['user']."_billcode";
$table_customer = $_SESSION['user']."_customer";

// INSERT CATEGORY
if(isset($_POST['savecat'])){
    global $conn;
    $cat_id = $_POST['catId'];
    $cat_name = $_POST['category'];
    
    $insert_query = "INSERT INTO ".$table_category." VALUES('$cat_id', '$cat_name')";
    $insert_execute = mysqli_query($conn, $insert_query);
    if(!$insert_execute){
        $error = mysqli_error($conn);
        if(preg_match("/duplicate entry/i", $error)){
             echo '<script>alert("category already exist")</script>';
        }
    }
    else{
        echo '<script>alert("Successfuly save!")</script>';
    }
    
}

//INSERT ITEMS
if(isset($_POST['saveitem'])){
    global $conn;
    $item_id = $_POST['itemId'];
    $item_name = $_POST['item'];
    $category = $_POST['selectcategory'];
    $item_price = $_POST['price'];
    
    $insert_query = "INSERT INTO ".$table_item." VALUES('$item_id', '$item_name', '$category', '$item_price')";
    $insert_execute = mysqli_query($conn, $insert_query);
    if(!$insert_execute){
        $error = mysqli_error($conn);
        if(preg_match("/duplicate entry/i", $error)){
             echo '<script>alert("item already exist")</script>';
        }
    }
    else{
        echo '<script>alert("Successfuly save!")</script>';
    }
    
}

//INSERT STOCKS
if(isset($_POST['savestock'])){
    global $conn;
    $stock_id = $_POST['stockId'];
    $item= $_POST['selectItem'];
    $item_number = $_POST['number'];
    
    $insert_query = "INSERT INTO ".$table_stock." VALUES('$stock_id', '$item', '$item_number')";
    $insert_execute = mysqli_query($conn, $insert_query);
    if(!$insert_execute){
        
        $error = mysqli_error($conn);
        if(preg_match("/duplicate entry/i", $error)){
             echo '<script>alert("stock already exist")</script>';
        }
    }
    else{
       echo '<script>alert("Successfuly save!")</script>';
    }
    
}
