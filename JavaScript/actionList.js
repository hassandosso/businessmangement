var tableDesign = ` <tr class="row_1">
	<td class="noteditable" title="This field is done automatically">1</td>
    	<td>
            <select name="designation"  class="form-control" id="designation">
            <option value="0">Select item's</option>
            <?php
                $table = $_SESSION['user']."_item";
                $table1 = $_SESSION['user']."_stock";
                $select_item = "SELECT ".$table.".item_name, ".$table.".price FROM ".$table.",".$table1." "
                        . "WHERE ".$table.".item_name = ".$table1.".item_name";
                $resultselect = mysqli_query($conn, $select_item);
                while($getdata = mysqli_fetch_array($resultselect)){
            ?>
            <option value="<?php echo $getdata['price'];?>"><?php echo $getdata['item_name'];?></option>
            <?php  }?>
        </select>
        </td>
        <td><input value="1" class="qt"</td>
        <td><input value="0.0" class="price" readonly="readonly"></td>
        <td><input value="0" class="disc"</td>
        <td><input value="0.0" class="totalprice" readonly="readonly"></td>            
	</tr>`;