<?php

session_start();
 include '../../connection/db_connection.php';
 $table = $_SESSION['user']."_note";
 $id = $_POST['noteid'];
 $title = $_POST['notetitle'];
 $content = $_POST['notecontent'];
 $reminder = $_POST['notereminder'];
 date_default_timezone_set("Asia/Kolkata");
 $date = date('Y-m-d H:i:s');
 $query = "UPDATE ".$table." SET date='$date', title='$title', content='$content' WHERE id ='$id'";
 $result = mysqli_query($conn, $query);
 if(!$result){
     die(mysqli_error($conn));
 } else {
     $getnote = "SELECT * FROM ".$table." WHERE id ='$id'";
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

