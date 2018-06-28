<?php
session_start();
 include '../../connection/db_connection.php';
 $table = $_SESSION['user']."_note";
 date_default_timezone_set("Asia/Kolkata");
 $date = date('Y-m-d H:i:s');
 $title = $_POST['the_title'];
 $content = $_POST['the_content'];
 $reminder = $_POST['the_reminder'];
 $query = "INSERT INTO ".$table." (date, title, content, reminder) VALUES('$date', '$title', '$content','$reminder')";
 if($reminder ==''){
    $query = "INSERT INTO ".$table." (date, title, content, reminder) VALUES('$date', '$title', '$content')";
 }
 
 $result = mysqli_query($conn, $query);
 if(!$result){
     $error = die(mysqli_error($conn));
     echo $error;
 }else{
     $getnote = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 1";
     $record = mysqli_fetch_array(mysqli_query($conn, $getnote));
     $lastrecord = array();
     $id = $record['id'];
     $date1 = $record['date'];
     $title1 = $record['title'];
     $content1 = $record['content'];
     $reminder1 = $record['reminder'];
     $lastrecord[] = array($id, $date1, $title1, $content1, $reminder1);
     echo ltrim(json_encode($lastrecord), "\r\n");
 }

