<form method="post">
    <div class="form-group modal-content">
        <span class="close2">&times;</span>
        <h3 class="card-title text-primary text-left mb-5 mt-4">Add item</h3> 
        <input type="text" name="itemId" placeholder="Id" class="form-control">
        <input type="text" name="item" placeholder="Item's name" class="form-control">
        <select name="selectcategory" class="form-control user">
            <option value="0">Select item's category</option>
            <?php
                $table = $_SESSION['user']."_category";
                $select_category = "SELECT * FROM ".$table;
                $resultselect = mysqli_query($conn, $select_category);
                while($getdata = mysqli_fetch_array($resultselect)){
            ?>
            <option value="<?php echo $getdata['category_name'];?>"><?php echo $getdata['category_name'];?></option>
            <?php  }?>
        </select>
        <input type="text" name="price" placeholder="Price" class="form-control">
        <input type="submit" name="saveitem" value="Save" class="form-control btn btn-danger">
        
    </div>
    
</form>