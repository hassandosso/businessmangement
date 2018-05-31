<?php

session_start();
include '../../connection/db_connection.php';
$table_code= $_SESSION['user']."_billcode";
$code = json_decode($_POST['billcode'], true);
foreach ($code as $value) {
    $num = $value['number'];
   $Insert = mysqli_query($conn, "INSERT INTO ".$table_code." (code) VALUES('$num')"); 
}
if($Insert){
    echo "bill code registered successfully";
}
 else {
    echo "code already used or exist";
}


