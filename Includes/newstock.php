<form method="post">
    <div class="form-group modal-content">
        <span class="close3">&times;</span>
        <h3 class="card-title text-primary text-left mb-5 mt-4">Create stock</h3> 
        <input type="text" name="stockId" placeholder="Id" class="form-control">
        <select name="selectItem"  class="form-control user">
            <option value="0">Select item's</option>
            <?php
                $table = $_SESSION['user']."_item";
                $select_item = "SELECT * FROM ".$table;
                $resultselect = mysqli_query($conn, $select_item);
                while($getdata = mysqli_fetch_array($resultselect)){
            ?>
            <option value="<?php echo $getdata['item_name'];?>"><?php echo $getdata['item_name'];?></option>
            <?php  }?>
        </select>
        <input type="text" name="number" placeholder="number of Item" class="form-control">
        <input type="submit" name="savestock" value="Save" class="form-control btn btn-danger">
        
    </div>
    
</form>



    