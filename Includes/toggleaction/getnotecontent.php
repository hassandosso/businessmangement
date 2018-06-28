<?php
session_start();
 include '../../connection/db_connection.php';
 $table = $_SESSION['user']."_note";
 $query = "SELECT * FROM ".$table." ORDER BY date DESC";
 $note = array();
 $result = mysqli_query($conn, $query);
 if(!$result){
     $error = die(mysqli_error($conn));
     echo $error;
 } else {
     while ($row = mysqli_fetch_array($result)){
         $id = $row['id'];
         $date = $row['date'];
         $title = $row['title'];
         $content = $row['content'];
         $reminder = $row['reminder'];
         $note[] = array($id, $date, $title, $content, $reminder );
     }
     
     echo ltrim(json_encode($note), "\r\n");
}

