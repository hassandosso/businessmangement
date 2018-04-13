<?php

if(isset($_POST['saveuser'])){
    global $conn;
    $user_fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $user_password = $_POST['password'];
      $user_role = $_POST['role'];
      $user_table = $_SESSION['user']."_useraccount";
      
      $passwordencrypted   = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
      
      $Insert_user = "INSERT INTO ".$user_table." (fullname, username, password, role) VALUES('$user_fullname', '$username', '$passwordencrypted', '$user_role')";
      $result_user = mysqli_query($conn, $Insert_user);

            if(!$result_user){
                die(mysqli_error($conn));

              $error = (mysqli_error($conn));
              if(preg_match("/duplicate entry/i", $error)){
                  echo '<script>alert("user already exist")</script>';
              }
            }
           else{
               echo '<script>alert("user has been registered successfully")</script>';
           }
  }

