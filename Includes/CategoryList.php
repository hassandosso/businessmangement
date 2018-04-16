<?php
    
if(isset($_GET['category'])){
$checkContent = $_GET['category'];
    if($Executecategory){
        
    echo '<table id="example" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>';
        if($checkContent=='modify'){
             echo   '<th style="width:5%;">Edit/Delete</th>';
        }
         echo  ' </tr>
        </thead>';
    while ($getList = mysqli_fetch_array($Executecategory)){
        if($checkContent=='modify'){
        echo '
        <tbody>
            <tr>
                <td id"catid">'.$getList['category_id'].'</td>
                <td>'.$getList['category_name'].'</td>
                <td><a class="edit" href="'.$getList['category_id'].'"><span class="glyphicon glyphicon-edit">&nbsp;</a><a class="del"  href="'.$getList['category_id'].'"><span class="glyphicon glyphicon-trash"></a></td>
            </tr>
            </tbody>';
        
    }
    else{
        echo '
        <tbody>
            <tr>
                <td id"catid">'.$getList['category_id'].'</td>
                <td>'.$getList['category_name'].'</td>
            </tr>
            </tbody>';
    }
    }
    
    echo '<tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>';
               if($checkContent=='modify'){
             echo   '<th>Edit/Delete</th>';
        }
         echo  '
            </tr>
        </tfoot>
    </table>';
    }
    else{
         die(mysqli_error($conn));
         
    }
}


