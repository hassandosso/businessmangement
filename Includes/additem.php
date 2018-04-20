<form method="post"  accept-charset="utf-8" enctype="multipart/form-data">
    <div class="form-group modal-content">
        <span class="close2">&times;</span>
        <h3 class="card-title text-primary text-left mb-5 mt-4">Add item</h3> 
        <div class="form-inline">
          <input type="radio" name="addoption" class="form-control itemradio" value="add" checked="checked">Add
          <input type="radio" name="addoption" class="form-control itemradio" value="import">Import
        </div>
        <div class="tohide">
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
        </div>
        <div id="file" class="form-inline hidden">
          <input type='file' name='import' class='removefile'>
        </div>
        <input type="submit" name="saveitem" value="Save" class="form-control btn btn-danger btn-saveitem">
        
    </div>
    
</form>