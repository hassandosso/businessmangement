<?php
if(isset($_GET['category'])){
    
$table_category = $_SESSION['user']."_".$_GET['category'];

    $categoryList = "SELECT * FROM ".$table_category;
    $Executecategory = mysqli_query($conn, $categoryList);
    if($Executecategory){
        
    echo '<table id="example" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>';
    while ($getList = mysqli_fetch_array($Executecategory)){
        
        echo '
        <tbody>
            <tr>
                <td id"catid">'.$getList['category_id'].'</td>
                <td>'.$getList['category_name'].'</td>
                <td><a id="edit" class="btn btn-primary" href="?edit='.$getList['category_id'].'">Edit</a><a id ="del" class="btn btn-danger" href="?del='.$getList['category_id'].'">Delete</a></td>
            </tr>
            </tbody>';
        
    }
    echo '<tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit/Delete</th>
            </tr>
        </tfoot>
    </table>';
    }
    else{
         die(mysqli_error($conn));
         
    }
}

