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
    $town = $_POST['town'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    
    
    $passwordencrypted   = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 11));
    
    //client tables name
    $category = $username.'_category';
    $item = $username.'_item';
    $stock = $username.'_stock';
    $stock_flow = $username.'_flow';
    $billing = $username.'_billing';
    $billcode = $username.'_billcode';
    $customer = $username.'_customer';
    $user_account =$username.'_useraccount'; 
    $note =$username.'_note'; 
    
    $create_useraccount = "CREATE TABLE `$user_account`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "fullname VARCHAR(100) NOT NULL, ".
     "username VARCHAR(100) NOT NULL, ".
     "password VARCHAR(100) NOT NULL, ".
     "role VARCHAR(100) NOT NULL, ".
     "CONSTRAINT PK_".$user_account." PRIMARY KEY (id,username)".
     ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_category = "CREATE TABLE `$category`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "category_id VARCHAR(20) NOT NULL, ".
     "category_name VARCHAR(100) NOT NULL, ".
     "CONSTRAINT PK_".$category." PRIMARY KEY (id,category_id)".
     ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_item = "CREATE TABLE `$item`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "item_id VARCHAR(20) NOT NULL, ".
     "item_name VARCHAR(100) NOT NULL, ".
     "category VARCHAR(100) DEFAULT NULL, ".
     "price DOUBLE NOT NULL, ".
     "CONSTRAINT PK_".$item." PRIMARY KEY (id,item_id)".
     ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_flow = "CREATE TABLE `$stock_flow`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "stockid VARCHAR(50) NOT NULL, ".
     "flow_date date, ".
     "flow_item_number INT, ".
     "PRIMARY KEY ( id )".
     ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_stock = "CREATE TABLE `$stock`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "stock_id VARCHAR(50) NOT NULL, ".
     "item_name VARCHAR(100) NOT NULL, ".
     "initial_number INT NOT NULL, ".
     "entry_date date, ".
     "actual_number INT, ".
     "out_date date DEFAULT NULL, ".
     "CONSTRAINT PK_".$stock." PRIMARY KEY (id,stock_id)".
     ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_billing = "CREATE TABLE `$billing`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "bill_id VARCHAR(20) NOT NULL, ".
     "quantity INT NOT NULL, ".
     "unit_price DOUBLE NOT NULL, ".
     "total_price DOUBLE NOT NULL, ".
     "tax DOUBLE DEFAULT NULL, ".
     "discount DOUBLE DEFAULT NULL, ".
     "final_price DOUBLE NOT NULL, ".
     "item_name VARCHAR(100) NOT NULL, ".
     "bill_date date DEFAULT NULL, ".
     "customer VARCHAR(100) DEFAULT NULL, ".
     "CONSTRAINT PK_".$billing." PRIMARY KEY (id,bill_id)".
     ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_billcode= "CREATE TABLE `$billcode`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "code VARCHAR(20) NOT NULL, ".
     "PRIMARY KEY ( id )) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_customer = "CREATE TABLE `$customer`( ".
    "id INT NOT NULL AUTO_INCREMENT, ". 
    "customer_id VARCHAR(100) NOT NULL, ".
     "customer_name VARCHAR(100) NOT NULL, ".
     "customer_contact VARCHAR(100) DEFAULT NULL, ".
     "customer_email VARCHAR(100) DEFAULT NULL, ".
     "customer_address VARCHAR(100) DEFAULT NULL, ".
     "CONSTRAINT PK_".$customer." PRIMARY KEY (id,customer_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    $create_note= "CREATE TABLE `$note`( ".
     "id INT NOT NULL AUTO_INCREMENT, ".
     "date datetime NOT NULL, ".
     "title VARCHAR(100) DEFAULT NULL, ".
     "content VARCHAR(100) DEFAULT NULL, ".
     "reminder date DEFAULT NULL, ".
     "PRIMARY KEY ( id )) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ";
    
    
    $checkUsername = "SELECT * FROM clients_account WHERE username='$username'";
    $checkCompany= "SELECT * FROM clients_account WHERE company='$company'";
    $checkEmail = "SELECT * FROM clients_account WHERE email='$email'";
    $checkMobile = "SELECT * FROM clients_account WHERE mobile='$mobile'";
    
    $getUsername = mysqli_fetch_array(mysqli_query($conn, $checkUsername));
    $getCompany = mysqli_fetch_array(mysqli_query($conn, $checkCompany));
    $getEmail = mysqli_fetch_array(mysqli_query($conn, $checkEmail));
    $getMobile = mysqli_fetch_array(mysqli_query($conn, $checkMobile));
    
    $Insert_user = "INSERT INTO clients_account (fullname,username,password,company,email,mobile,phone,town,address,street) "
            . "VALUES('$fullname', '$username', '$passwordencrypted', '$company', '$email', '$mobile', '$phone', '$town', '$address', '$street')";
    
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
               $result_useraccount = mysqli_query($conn, $create_useraccount);
               $result_flow = mysqli_query($conn, $create_flow);
               $result_note = mysqli_query($conn, $create_note);
               if(!$result_useraccount){  
                  
                      $error = die(mysqli_error($conn));
                      echo $error;
                      
              }
 else {
               $Insert_user = "INSERT INTO ".$user_account." (fullname, username, password, role) VALUES('$fullname', '$username', '$passwordencrypted', 'admin')";
               $result_user = mysqli_query($conn, $Insert_user);
             //$flowresult = mysqli_query($conn, $alter_flow);
               //if($flowresult)
               //{
                  echo 'Account creates with success! click on login to acces your profile';
               //} else {
                   //$error = die(mysqli_error($conn));
                      //echo $error;
               //}
             
              }
        //       header("location: home.php");
           }
   }
    
//}

