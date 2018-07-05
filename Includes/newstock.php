<div class="modal-dialog" role="document">   
    <div class="form-group modal-content animated slideInDown">
        <div class="modal-header">
            <span class="close3">&times;</span>
            <h3 class="card-title text-primary text-left">Create stock</h3> 
        </div>
        <div class="modal-body">
            <form method="post">
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
            </form>
        </div>
    </div>
</div>



    