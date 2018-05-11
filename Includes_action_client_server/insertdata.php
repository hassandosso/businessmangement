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
    if($_POST['savecat']=='Save')
    {
        $cat_id = $_POST['catId'];
        $cat_name = $_POST['category'];

        $insert_query = "INSERT INTO ".$table_category." (category_id, category_name) VALUES('$cat_id', '$cat_name')";
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
    else if($_POST['savecat']=='import'){
        $filename2=$_FILES['importcat']['tmp_name'];
         if($_FILES['importcat']['size'] > 0)
             {
            $file2 = fopen($filename2, "r");
            while (($getData2 = fgetcsv($file2, 255, ",")) !== FALSE)
             {
               $sql = "INSERT INTO ".$table_category." (category_id, category_name)"
                       . " VALUES('$getData2[0]','$getData2[1]')"; 

               $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                   echo '<script>alert("Invalid file, please upload CVS file")</script>';	
                    die(mysqli_error($conn));
                        
                }
                else {
                      echo '<script>alert("File has been successfully imported!")</script>';
                    }
	         }
			
	         fclose($file2);	
		 }
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
    
    $insert_query = "INSERT INTO ".$table_item." (item_id, item_name, category, price) "
            . "VALUES('$item_id', '$item_name', '$category', '$item_price')";
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
            while (($getData = fgetcsv($file, 255, ",")) !== FALSE)
             {
               $sql = "INSERT INTO ".$table_item." (item_id, item_name, category, price)"
                       . " VALUES('$getData[0]','$getData[1]','$getData[2]','$getData[3]')"; 

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
    $date = date("Y/m/d");
    $insert_query = "INSERT INTO ".$table_stock." (stock_id, item_name, initial_number, entry_date,actual_number) "
            . "VALUES('$stock_id', '$item', '$item_number', '$date','$item_number')";
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
    $id = $_POST['Id'];
    $modif_id = $_POST['catId'];
    $modif_name = $_POST['category'];
    
    $query = "UPDATE ".$table_category." SET category_name='$modif_name', category_id='$modif_id' "
            . "WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
         echo '<script>alert("Successfuly update!")</script>';
    }
    else{
        echo '<script>alert("you cannot modify both field at the same, delete and do new")</script>';
    }
    
}

//UPDATE ITEM DATA
if(isset($_POST['modifitem'])){
    $id = $_POST['Id'];
    $modif_id = $_POST['itemId'];
    $modif_name = $_POST['item'];
    $modif_category = $_POST['item-category'];
    $modif_price = $_POST['price'];
    $query = "UPDATE ".$table_item." SET item_name='$modif_name',category='$modif_category',price='$modif_price', "
            . "item_id='$modif_id' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
         echo '<script>alert("Successfuly update!")</script>';
    }
    else{
        $error = die(mysqli_error($conn));
        echo '<script>alert("'.$error.'")</script>';
    }
    
}
