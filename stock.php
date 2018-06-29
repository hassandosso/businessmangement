<?php 
 session_start();
 include 'connection/db_connection.php';
 include 'Includes_action_client_server/login.php';
 include 'Includes_action_client_server/insertdata.php';
 include 'Includes_action_client_server/createuseraccount.php';
//DASHBOARD ACTION
 $username = $_SESSION['user'];
 $table_category = $_SESSION['user']."_category";
    $categoryList = "SELECT * FROM ".$table_category;
    $Executecategory = mysqli_query($conn, $categoryList);
    $rowcount=mysqli_num_rows($Executecategory);
    
 $table_item = $_SESSION['user']."_item";
    $ItemList = "SELECT * FROM ".$table_item;
    $ExecuteItem = mysqli_query($conn, $ItemList);
    $rowcount_item=mysqli_num_rows($ExecuteItem);
    
  $table_stock = $_SESSION['user']."_stock";
    $stockList = "SELECT * FROM ".$table_stock;
    $Executestock = mysqli_query($conn, $stockList);
    $rowcount_stock=mysqli_num_rows($Executestock);
    
    $table_code= $_SESSION['user']."_billcode";
    $querycode = "SELECT code FROM ".$table_code." LIMIT 1";
    $resultcode = mysqli_fetch_assoc(mysqli_query($conn,$querycode));
    $code = $resultcode['code'];
    
    $queryinfo = "SELECT * FROM clients_account WHERE username ='$username'";
    $resultinfo = mysqli_fetch_assoc(mysqli_query($conn, $queryinfo));
    $company = $resultinfo['company'];
    $mobile = $resultinfo['mobile'];
    $email = $resultinfo['email'];
    $town = $resultinfo['town'];
    $address = $resultinfo['address'];
    $street = $resultinfo['street'];
    

 
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Style/materialize.css">
	<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
       
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />

<!--         new link-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="Style/indexstyle.css">
       <link rel="stylesheet" href="Style/indexModalStyle.css">
        
    </head>
    <body>
        <button id="bill">edit bill</button><br>
        <button id="back">Go to profile</button>
                   <!-- all Modal content --> 
                 <div class="row">
            <section class="col-xs-3">
                <div id="myModal-billing" class="modal">
                    <?php include 'Includes/billing_modal.php'; ?>
                </div>
                <div id="myModal-login" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/loginpage.php'; ?>
                </div>
                
                <div id="myModal-category" class="modal" >

<!--                   Modal content -->
                    <?php include 'includes/addcategory.php'; ?>
                </div>
                
                <div id="myModal-item" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/additem.php'; ?>
                </div>
                 <div id="myModal-newStock" class="modal">

<!--                   Modal content -->
                    <?php include 'includes/newstock.php'; ?>
                </div>
                
            </section>
        </div>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
        </script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
       <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
       <script src='dist/jspdf.min.js'></script>
       <script src="JavaScript/billing.js"></script>
       
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        var subtotal =0;
        var countrows =0;
        var tableDesign = ` <tr class="new">
                <td><input value="" class="nb"></td>
                <td>
                    <select name="designation"  class="form-control designation">
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
                 <input value="" class="item hidden">          
                </td>
                <td><input value="1" class="qt"></td>
                <td><input value="0" class="tx"></td>
                <td><input value="0.0" class="price" readonly="readonly"></td>
                <td><input value="0" class="disc"></td>
                <td><input value="0.0" class="totalprice" readonly="readonly"></td>            
                </tr>`;
     $("#addrow").click(function(){
       $("#billtable").append(tableDesign);
        countrows = $("#billtable tr").length;
        $("#billtable .new").attr("class","row_"+countrows);
        $(".row_"+countrows+" .nb").val(countrows);      
        var i = countrows;
        $(".row_"+i).on('change','.designation',function(){
            $(".row_"+i+" .item").removeClass('hidden');
            var item =  $(".row_"+i+" .designation option:selected").text();
            $(".row_"+i+" .item").val(item);
            $(".row_"+i+" .designation").addClass('hidden');
            var price = $(this).val();
            var disc =  $(".row_"+i+" .disc").val();
            $(".row_"+i+" .price").val(price);
            var qt =  $(".row_"+i+" .qt").val();
            var total = (price * qt)-(price * qt*disc)/100;
            $(".row_"+i+" .totalprice").val(total.toFixed(2));
            for(var j=0; j<countrows; j++){
            var data = document.getElementById("billtable").rows[j].cells;
            subtotal =parseFloat(data[6].children[0].value)+(parseFloat(subtotal));
        } 
            var tax = $(".totaltax").val();
            $(".subtotal").val(subtotal.toFixed(2));
            subtotal = parseFloat(subtotal) + parseFloat(tax);
            $(".total").val(subtotal.toFixed(2));
            subtotal =0;
    });
    $(".row_"+i).on('click','.item', function(){
        $(".row_"+i+" .item").addClass('hidden');
        $(".row_"+i+" .designation").removeClass('hidden');
    })
                
    $(".row_"+i).on('change','.qt', function(){
        var price =  $(".row_"+i+" .price").val();
        var disc =  $(".row_"+i+" .disc").val();
        var qt =  $(".row_"+i+" .qt").val();
        var total = (price * qt)-(price*qt*disc)/100;
        $(".row_"+i+" .totalprice").val(total.toFixed(2));

        for(var j=0; j<countrows; j++){
        var data = document.getElementById("billtable").rows[j].cells;
        subtotal =parseFloat(data[6].children[0].value)+(parseFloat(subtotal));
    }
        var tax = $(".totaltax").val();
        $(".subtotal").val(subtotal.toFixed(2));
         subtotal = parseFloat(subtotal,10) + parseFloat(tax,10);
        $(".total").val(subtotal.toFixed(2));
        subtotal =0;
    });
                
    $(".row_"+i).on('change','.disc', function(){
       var disc =  $(".row_"+i+" .disc").val();
       var price = $(".row_"+i+" .price").val();
       var qt =  $(".row_"+i+" .qt").val();
       var total = ((price)-(price*disc)/100) * qt;
       $(".row_"+i+" .totalprice").val(total.toFixed(2));

       for(var j=0; j<countrows; j++){
        var data = document.getElementById("billtable").rows[j].cells;
        subtotal =parseFloat(data[6].children[0].value)+(parseFloat(subtotal));
    }
    var tax = $(".totaltax").val();
    $(".subtotal").val(subtotal.toFixed(2));
     $(".tax").val(((tax * 100 )/subtotal).toFixed(3));
    subtotal = parseFloat(subtotal) + parseFloat(tax);
   
    $(".total").val(subtotal.toFixed(2));
    subtotal =0;
    });
    
     $(".row_"+i).on('change','.tx', function(){
         var unittax=0;
         var taxesAmount = 0;
         for(var t=0; t<countrows; t++){
        var data = document.getElementById("billtable").rows[t].cells;
        unittax =parseFloat(data[3].children[0].value * data[2].children[0].value)+(parseFloat(unittax));
        taxesAmount = (parseFloat(data[4].children[0].value) * data[3].children[0].value * data[2].children[0].value)/100 + parseFloat(taxesAmount);
        
    } 
         
//         var totaltax = $(".tax").val();
         var partial = $(".subtotal").val();
         var taxes = ((taxesAmount * 100 )/parseFloat(partial)).toFixed(3);
         $(".tax").val(taxes);
       // var totaltax =  parseFloat(unittax)*parseFloat(partial)/100;
         $(".totaltax").val(taxesAmount.toFixed(2));
         
         var amount = taxesAmount + parseFloat(partial);
        $(".total").val(amount.toFixed(2));
     });
      $(".del").removeClass("hidden");
  
  });
  
 //delete row logic 
  $("#deleterow").click(function(){
  var unittax=0;
  var subtotal =0;
  var len = $("#billtable tr").length;
  console.log(len);
  $(".row_"+len).remove();
  if(len-1>0){
  for(var j=0; j<len-1; j++){
        var data = document.getElementById("billtable").rows[j].cells;
        subtotal =parseFloat(data[6].children[0].value)+(parseFloat(subtotal));
        unittax =parseInt(data[3].children[0].value)+(parseInt(unittax));
    }
    $(".tax").val(parseInt(unittax));
    $(".subtotal").val(subtotal.toFixed(2));
    var partial = $(".subtotal").val();
    var totaltax =  parseFloat(unittax)*parseFloat(partial)/100;
    $(".totaltax").val(totaltax.toFixed(2));
    var amount = totaltax + parseFloat(partial);
    $(".total").val(amount.toFixed(2));
    }
    else{
        $(".tax").val(0);
        $(".subtotal").val(parseFloat(0.0));
        $(".totaltax").val(parseFloat(0.0));
        $(".total").val(parseFloat(0.0));
    }
  if(len-1==0){
      $(".del").addClass("hidden");
  }
  });
     var btnbill = document.getElementById("bill");
    var modal_billing = document.getElementById('myModal-billing');
    var spancategory = document.getElementsByClassName("close1")[0];


    btnbill.onclick = function() {
    modal_billing.style.display = "block";
    }
    spancategory.onclick = function(){
         modal_billing.style.display = "none";
         }
    $("#back").click(function(){
        window.location.replace("http://localhost/business-management-master/index.php");
    })
    $('.modal-content').resizable({
    //alsoResize: ".modal-dialog",
    minHeight: 300,
    minWidth: 300
    });
      
    var print = document.getElementById("printable");
    print.onclick = function () {
    printElement(document.getElementById("invoice"));
}

    function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    modal_billing.style.display = "none";
    $("#bill").addClass('hidden');
    $("#back").addClass('hidden');
    window.print();
    $("#bill").removeClass('hidden');
    $("#back").removeClass('hidden');
    window.location.replace("http://localhost/business-management-master/index.php");
    }
});
            
</script> 
</html>


