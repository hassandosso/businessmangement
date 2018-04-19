<?php
session_start();
include '../connection/db_connection.php';
$table_category = $_SESSION['user']."_category";
 $query = "SELECT * FROM ".$table_category;
$result = mysqli_query($conn,$query);
$category_arr = array();

while($row = mysqli_fetch_array($result)){
    $catid = $row['category_id'];
    $catname = $row['category_name'];

    $category_arr[] = array("id" => $catid,"name" => $catname);
}

/* encoding array to json format */
echo json_encode($category_arr);

 
//if(isset($_GET['category'])){
//$checkContent = $_GET['category'];
//    if($Executecategory){
//        
//    echo '<table id="example" class="table table-striped table-bordered" style="width:100%;">
//        <thead>
//            <tr>
//                <th>Id</th>
//                <th>Name</th>';
//        if($checkContent=='modify'){
//             echo   '<th style="width:5%;">Edit/Delete</th>';
//        }
//         echo  ' </tr>
//        </thead>';
//    while ($getList = mysqli_fetch_array($Executecategory)){
//        if($checkContent=='modify'){
//        echo '
//        <tbody>
//            <tr>
//                <td id"catid">'.$getList['category_id'].'</td>
//                <td>'.$getList['category_name'].'</td>
//                <td><a class="edit" href="'.$getList['category_id'].'"><span class="glyphicon glyphicon-edit">&nbsp;</a><a class="del"  href="'.$getList['category_id'].'"><span class="glyphicon glyphicon-trash"></a></td>
//            </tr>
//            </tbody>';
//        
//    }
//    else{
//        echo '
//        <tbody>
//            <tr>
//                <td id"catid">'.$getList['category_id'].'</td>
//                <td>'.$getList['category_name'].'</td>
//            </tr>
//            </tbody>';
//    }
//    }
//    
//    echo '<tfoot>
//            <tr>
//                <th>Id</th>
//                <th>Name</th>';
//               if($checkContent=='modify'){
//             echo   '<th>Edit/Delete</th>';
//        }
//         echo  '
//            </tr>
//        </tfoot>
//    </table>';
//    }
//    else{
//         die(mysqli_error($conn));
//         
//    }
//}


