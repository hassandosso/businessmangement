<div class="modal-dialog" role="document">  
    <div class="form-group modal-content">
        <div class="modal-header">
            <span class="close5">&times;</span>
            <h3 class="modal-title text-primary text-left">Modify action</h3>
        </div>
        <div class="modal-body">
            <form id="categoryModify"method="post">
              
                <h3 class="card-title text-primary text-left mb-5 mt-4">Edit category</h3> 
                <input type="text" name="Id" value="" class="form-control" id="Idcat" readonly="readonly">
                <label>category's id</label>
                <input type="text" name="catId" value="" class="form-control" id="catIdModif">
                <label>category's name</label>
                <input type="text" name="category" value="" class="form-control" id="catNameModif">
                <input type="submit" name="modifcat" value="Modify" class="form-control btn btn-danger">
              
            </form>

            <form id="itemModify"method="post">
               <h3 class="card-title text-primary text-left mb-5 mt-4">Edit item</h3>
               <input type="text" name="Id" value="" class="form-control" id="Iditem" readonly="readonly">
               <label>item's id</label>
               <input type="text" name="itemId" value="" class="form-control" id="itemIdModif">
               <label>item's name</label>
               <input type="text" name="item" value="" class="form-control" id="itemNameModif">
               <label>select category</label>
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
               <label>item's price</label>
               <input type="text" name="price" value="" class="form-control" id="itemPriceModif">
               <input type="submit" name="modifitem" value="Modify" class="form-control btn btn-danger">
                
            </form>
            
            <form method="post" id="stockModif">
                <h3 class="card-title text-primary text-left mb-5 mt-4">Edit stock</h3>
                <input type="text" name="stockFixedId" class="form-control" id="stockFixedId" readonly="readonly">
                <label>stock's id</label>
                <input type="text" name="stockId" class="form-control" id="stockId">
                <label>select stock item</label>
                <select name="selectItem"  class="form-control user" id="selectItem">
                    <option></option>
                    <?php
                        $table = $_SESSION['user']."_item";
                        $select_item = "SELECT * FROM ".$table;
                        $resultselect = mysqli_query($conn, $select_item);
                        while($getdata = mysqli_fetch_array($resultselect)){
                    ?>
                    <option value="<?php echo $getdata['item_name'];?>"><?php echo $getdata['item_name'];?></option>
                    <?php  }?>
                </select>
                <label>initial number of item</label>
                <input type="text" name="itemNumber" class="form-control" id="itemNumber">
                <input type="submit" name="modifstock" value="Save" class="form-control btn btn-danger">
            </form>
        </div>
    </div>
</div>

