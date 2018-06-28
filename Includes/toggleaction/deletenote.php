<?php
session_start();
 include '../../connection/db_connection.php';
 $table = $_SESSION['user']."_note";
 $id = $_POST['noteid'];
 $query = "DELETE FROM ".$table." WHERE id ='$id'";
 $result = mysqli_query($conn, $query);
 if(!$result){
     die(mysqli_error($conn));
 }
 

