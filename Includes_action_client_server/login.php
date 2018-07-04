<?php

if(isset($_POST['login'])){
    
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];
    $user_type = $_POST['useroption'];
    $user_account = $login_username."_useraccount";
    if($user_type=='admin'){
    $usercheck = "SELECT username,password,company FROM clients_account WHERE username='$login_username'";
    $resultcheck = mysqli_query($conn, $usercheck);
    if($resultcheck)
        
    {
        $getuser = mysqli_fetch_array($resultcheck);
        if($getuser>0){
            if(password_verify($login_password, $getuser['password']) )
            {
                 $adminrole = "SELECT role FROM ".$user_account." WHERE username='$login_username'";
                 $getadminrole = mysqli_fetch_array(mysqli_query($conn, $adminrole));
                $_SESSION['user'] = $getuser['username'];
                $_SESSION['company'] = $getuser['company'];
                $_SESSION['role']= $getadminrole['role'];
                header("location: index.php");
        
            }
            else{
                echo '<script>alert("Wrong username or password")</script>';
            }
        }
        else{
            echo '<script>alert("User does not exist, please create new account")</script>';
        }
    }
    else{
        die(mysqli_error($conn));
    }
    }
    else{
        $login_subuser = $_POST['subuser'];
        $subusercheck = "SELECT username,password,role FROM ".$user_account." WHERE username='$login_subuser'";
        $subresultcheck = mysqli_query($conn, $subusercheck);
        
         if($subresultcheck)
        
    {
        $getsubuser = mysqli_fetch_array($subresultcheck);
        if($getsubuser>0){
            if(password_verify($login_password, $getsubuser['password']) )
            {
                $_SESSION['role']= $getsubuser['role'];
                $_SESSION['subuser']= $getsubuser['username'];
                $usercheck = "SELECT username,company FROM clients_account WHERE username='$login_username'";
                $resultcheck = mysqli_query($conn, $usercheck);
                $getuser = mysqli_fetch_array($resultcheck);
                $_SESSION['user'] = $getuser['username'];
                $_SESSION['company'] = $getuser['company'];
                header("location: index.php");
        
            }
            else{
                echo '<script>alert("Wrong username or password")</script>';
            }
        }
        else{
            echo '<script>alert("Wrong username or password")</script>';
        }
    }
    else{
        die(mysqli_error($conn));
    }
    }
}

 if(isset($_POST['forgot'])){
     $email = $_POST['forgot_email'];
     $query = "SELECT username, password FROM clients_account WHERE email = '$email'";
     $result = mysqli_query($conn, $query);
     if($result){
         $count = mysqli_num_rows($result);
         if($count == 1){
             echo '<script>alert("Your password has been sent to your email id, please check")</script>';
         } else {
             echo '<script>alert("Email does not exist in database")</script>';
         }
     }else
     {
         die(mysqli_error($conn));
     }
 }

