<?php
global $conn;
$id = $_GET['edit'];
$table_category = $_SESSION['user']."_category";
$selectModif = "SELECT * FROM ".$table_category." WHERE category_id='$id'";
$resultModif = mysqli_query($conn, $selectModif);
if($resultModif){
    
    while ($getModif = mysqli_fetch_array($resultModif)){
       
        echo '<form method="post">
    <div class="form-group modal-content">
        <span class="close1">&times;</span>
        <h3 class="card-title text-primary text-left mb-5 mt-4">Edit category</h3> 
        <input type="text" name="catId" value="'.$getModif['category_id'].'" class="form-control">
        <input type="text" name="category" value="'.$getModif['category_name'].'" class="form-control">
        <input type="submit" name="modifcat" value="Modify" class="form-control btn btn-danger">
        
    </div>
    
</form>';
}
?>
 <script>
            $(document).ready(function(){
                var id = document.getElementById("myModal-modif");
            id.modal("show");
                
            })
           
        </script>
<?php
}
else{
    die(mysqli_error($conn));
}


