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
    if($_POST['saveitem']=='Save'){
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
    else if($_POST['saveitem']=='import'){
        $filename=$_FILES['import']['tmp_name'];	
         if($_FILES['import']['size'] > 0)
             {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {
               $sql = "INSERT INTO ".$table_item." VALUES('$getData[0]','$getData[1]','$getData[2]','$getData[3]')"; 

               $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    die(mysqli_error($conn));
                        echo '<script>alert("Invalid file, please upload CVS file")</script>';	
                }
                else {
                      echo '<script>alert("File has been successfully imported!")</script>';
                    }
	         }
			
	         fclose($file);	
		 }
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
//UPDATE CATEGORY DATA
if(isset($_POST['modifcat'])){
    $modif_id = $_POST['catId'];
    $modif_name = $_POST['category'];
    
    $query = "UPDATE ".$table_category." SET category_name='$modif_name', category_id='$modif_id' "
            . "WHERE category_id='$modif_id' OR category_name='$modif_name'";
    $result = mysqli_query($conn, $query);
    if($result){
         echo '<script>alert("Successfuly update!")</script>';
    }
    else{
        echo '<script>alert("you cannot modify both field at the same, delete and do new")</script>';
    }
    
}
