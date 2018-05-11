<form id="categoryModify"method="post">
      <div class="form-group modal-content">
      <span class="close1">&times;</span>
       <h3 class="card-title text-primary text-left mb-5 mt-4">Edit category</h3> 
        <input type="text" name="Id" value="" class="form-control" id="Idcat" readonly="readonly">
       <input type="text" name="catId" value="" class="form-control" id="catIdModif">
       <input type="text" name="category" value="" class="form-control" id="catNameModif">
       <input type="submit" name="modifcat" value="Modify" class="form-control btn btn-danger">
       </div>
  
    
</form>

<form id="itemModify"method="post">
      <div class="form-group modal-content">
      <span class="close1">&times;</span>
       <h3 class="card-title text-primary text-left mb-5 mt-4">Edit item</h3>
       <input type="text" name="Id" value="" class="form-control" id="Iditem" readonly="readonly">
       <input type="text" name="itemId" value="" class="form-control" id="itemIdModif">
       <input type="text" name="item" value="" class="form-control" id="itemNameModif">
       <select name="item-category" class="form-control user" id="item-category">
            <option value="1"></option>
            <?php
                $table = $_SESSION['user']."_category";
                $select_category = "SELECT * FROM ".$table;
                $resultselect = mysqli_query($conn, $select_category);
                while($getdata = mysqli_fetch_array($resultselect)){
            ?>
            <option value="<?php echo $getdata['category_name'];?>"><?php echo $getdata['category_name'];?></option>
            <?php  }?>
        </select>
       <input type="text" name="price" value="" class="form-control" id="itemPriceModif">
       <input type="submit" name="modifitem" value="Modify" class="form-control btn btn-danger">
       </div>
  
    
</form>

