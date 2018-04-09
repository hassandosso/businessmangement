<?php

//if(isset($_POST['save']))
//{
    include '../connection/db_connection.php';
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $phone = $_POST['phone'];
    
    $passwordencrypted   = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 11));
    
    //client tables name
    $category = $username.'_category';
    $item = $username.'_item';
    $stock = $username.'_stock';
    $billing = $username.'_billing';
    $billcode = $username.'_billcode';
    $customer = $username.'_customer';
    
    $create_category = "CREATE TABLE `$category`( ".
     "category_id VARCHAR(20) NOT NULL, ".
     "category_name VARCHAR(225) NOT NULL, ".
     "PRIMARY KEY ( category_id )); ";
    
    $create_item = "CREATE TABLE `$item`( ".
     "item_id VARCHAR(20) NOT NULL, ".
     "item_name VARCHAR(225) NOT NULL, ".
     "category VARCHAR(225) NOT NULL, ".
     "price DOUBLE NOT NULL, ".
     "PRIMARY KEY ( item_id )); ";
    
    $create_stock = "CREATE TABLE `$stock`( ".
     "stock_id VARCHAR(20) NOT NULL, ".
     "item_name VARCHAR(225) NOT NULL, ".
     "number INT NOT NULL, ".
     "PRIMARY KEY ( stock_id )); ";
    
    $create_billing = "CREATE TABLE `$billing`( ".
     "bill_id VARCHAR(20) NOT NULL, ".
     "quantity INT NOT NULL, ".
     "unit_price DOUBLE NOT NULL, ".
     "total_price DOUBLE NOT NULL, ".
     "tax DOUBLE DEFAULT NULL, ".
     "discount DOUBLE DEFAULT NULL, ".
     "final_price DOUBLE NOT NULL, ".
     "item_name VARCHAR(225) NOT NULL, ".
     "bill_date date DEFAULT NULL, ".
     "customer VARCHAR(225) NOT NULL, ".
     "bill_no INT NOT NULL, ".
     "PRIMARY KEY ( bill_id )); ";
    
    $create_billcode= "CREATE TABLE `$billcode`( ".
     "id VARCHAR(20) NOT NULL, ".
     "code VARCHAR(225) NOT NULL, ".
     "PRIMARY KEY ( id )); ";
    
    $create_customer = "CREATE TABLE `$customer`( ".
     "customer_id VARCHAR(20) NOT NULL, ".
     "customer_name VARCHAR(225) NOT NULL, ".
     "customer_contact VARCHAR(225) NOT NULL, ".
     "customer_address VARCHAR(225) NOT NULL, ".
     "PRIMARY KEY ( customer_id )); ";
    
    
    
    $checkUsername = "SELECT * FROM clients_account WHERE username='$username'";
    $checkCompany= "SELECT * FROM clients_account WHERE company='$company'";
    $checkEmail = "SELECT * FROM clients_account WHERE email='$email'";
    $checkMobile = "SELECT * FROM clients_account WHERE mobile='$mobile'";
    
    $getUsername = mysqli_fetch_array(mysqli_query($conn, $checkUsername));
    $getCompany = mysqli_fetch_array(mysqli_query($conn, $checkCompany));
    $getEmail = mysqli_fetch_array(mysqli_query($conn, $checkEmail));
    $getMobile = mysqli_fetch_array(mysqli_query($conn, $checkMobile));
    
    $Insert_user = "INSERT INTO clients_account VALUES('$fullname', '$username', '$passwordencrypted', '$company', '$email', '$mobile', '$phone')";
    
    if($getUsername>0){
        echo "username already exist";
    }
    else if($getCompany>0){
        echo 'company name already exist';
    }
    else if($getEmail>0){
        echo 'email already exist';
    }
    else if($getMobile>0){
        echo 'mobile number already exist';
    }
 else {
        $result_user = mysqli_query($conn, $Insert_user);

            if(!$result_user){
                

              $error = (mysqli_error($conn));
              if(preg_match("/duplicate entry/i", $error)){
                  echo 1;
              }
            }
           else{
               //CREATION OF USER TABLE

               $result_category = mysqli_query($conn, $create_category);
               $result_item = mysqli_query($conn, $create_item);
               $result_stock = mysqli_query($conn, $create_stock);
               $result_billing = mysqli_query($conn, $create_billing);
               $result_billcode = mysqli_query($conn, $create_billcode);
               $result_customer = mysqli_query($conn, $create_customer);
                
        //      if(!$result_billing)
        //      {die(mysqli_error($conn));}

               echo 'Account creates with success! click on login to acces you profile';
        //       header("location: home.php");
           }
   }
    
//}
