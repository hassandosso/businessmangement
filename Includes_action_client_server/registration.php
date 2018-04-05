<?php

if(isset($_POST['save']))
{
     global  $conn;
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
    
    
    
    
    
    $Insert_user = "INSERT INTO clients_account VALUES('$fullname', '$username', '$passwordencrypted', '$company', '$email', '$mobile', '$phone')";
    $result_user = mysqli_query($conn, $Insert_user);
    
    if(!$result_user){
       
      $error = (mysqli_error($conn));
      if(preg_match("/duplicate entry/i", $error)){
          echo '<script>alert("Username or email or mobile or Company name already exist")</script>';
      }
    }
   else{
       //CREATION OF USER TABLE
       
    /* $result_category = mysqli_query($conn, $create_category);
       $result_item = mysqli_query($conn, $create_item);
       $result_stock = mysqli_query($conn, $create_stock);
       $result_billing = mysqli_query($conn, $create_billing);
       $result_billcode = mysqli_query($conn, $create_billcode);
       $result_customer = mysqli_query($conn, $create_customer);
        */
//      if(!$result_billing)
//      {die(mysqli_error($conn));}
       
       echo '<script>alert("your account has been created successfuly\nClick on login to access your profile")</script>';
       header("location: home.php");
   }
    
}
if(isset($_POST['login'])){
    
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];
    
    $passwordencrypted   = password_hash( $login_password, PASSWORD_BCRYPT, array('cost' => 11));
    
    $usercheck = "SELECT username,company FROM clients_account WHERE username='$login_username' and password='$login_password'";
    $resultcheck = mysqli_query($conn, $usercheck);
    if($usercheck)
        
    {
        $getuser = mysqli_fetch_array($resultcheck);
        if($getuser>0){
            $_SESSION['user'] = $getuser['username'];
            $_SESSION['company'] = $getuser['company'];
            header("location: index.php");
        }
        else{
            echo '<script>alert("Wrong username or password")</script>';
        }
    }
    else{
        die(mysqli_error($conn));
    }
}
