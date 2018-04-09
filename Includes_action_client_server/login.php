<?php

if(isset($_POST['login'])){
    
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];
    
    $passwordencrypted   = password_hash( $login_password, PASSWORD_BCRYPT, array('cost' => 11));
    
    $usercheck = "SELECT username,password,company FROM clients_account WHERE username='$login_username'";
    $resultcheck = mysqli_query($conn, $usercheck);
    if($usercheck)
        
    {
        $getuser = mysqli_fetch_array($resultcheck);
        if($getuser>0){
            if(password_verify($login_password, $getuser['password']) )
            {
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

