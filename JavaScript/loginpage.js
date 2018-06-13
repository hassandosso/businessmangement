$(document).ready(function(){
// Get the modal
 var modif = document.getElementById("myModal-modif");
var modal_cat = document.getElementById('myModal-category');
var modal_item = document.getElementById('myModal-item');
var modal_newstock = document.getElementById('myModal-newStock');
var modal_adduser = document.getElementById('myModal-adduser');
var modal_codebill = document.getElementById('myModal-toggle');

// Get the button that opens the modal
var btncategory = document.getElementById("addcategory");
var btnitem = document.getElementById("additem");
var btnnewstock = document.getElementById("newstock");
var btnCodeBill = document.getElementById("billcode");
var btnCustomer = document.getElementById("customer");
var btnadduser = document.getElementById("adduser");



// Get the <span> element that closes the modal

var spancategory = document.getElementsByClassName("close1")[0];
var spanitem = document.getElementsByClassName("close2")[0];
var spannewstock = document.getElementsByClassName("close3")[0];
var spanadduser = document.getElementsByClassName("close4")[0];
var toggle = document.getElementsByClassName("toggleModal")[0];
var spanModif = document.getElementsByClassName("close5")[0];
// When the user clicks the button, open the modal 

btncategory.onclick = function() {
    modal_cat.style.display = "block";
    modal_item.style.display = "none";
    modal_newstock.style.display ="none";
     modal_adduser.style.display = "none";

}
btnitem.onclick = function() {
    modal_item.style.display = "block";
    modal_cat.style.display = "none";
    modal_newstock.style.display ="none";
    modal_adduser.style.display = "none";

}
btnnewstock.onclick = function(){
    modal_newstock.style.display = "block";
    modal_cat.style.display = "none";
    modal_item.style.display="none";
    modal_adduser.style.display = "none";

}
btnadduser.onclick = function() {
    modal_adduser.style.display = "block";
    modal_newstock.style.display = "none";
    modal_cat.style.display = "none";
    modal_item.style.display="none";

}

btnCodeBill.onclick = function(){
    modal_codebill.style.display = "block"; 
    $(".codebill").removeClass('hidden');
    $(".customer").addClass('hidden');
}
btnCustomer.onclick = function(){
    modal_codebill.style.display = "block"; 
    $(".customer").removeClass('hidden');
    $(".codebill").addClass('hidden');
}

// When the user clicks on <span> (x), close the modal
spancategory.onclick = function(){
     modal_cat.style.display = "none";
}

spanitem.onclick = function(){
    modal_item.style.display = "none";

}
spannewstock.onclick = function(){
    modal_newstock.style.display = "none";
//$(this).style.display = "none";
}
spanadduser.onclick = function() {
    modal_adduser.style.display = "none";
}
toggle.onclick = function(){
    modal_codebill.style.display = "none";
}
 spanModif.onclick = function(){
     modif.style.display="none";
    }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal_cat) {
        modal_cat.style.display = "none";
    }
    if (event.target === modal_item) {
        modal_item.style.display = "none";
    }
    if (event.target === modal_newstock) {
        modal_newstock.style.display = "none";
    }
    
    if (event.target === modal_adduser) {
        modal_adduser.style.display = "none";
    }
    if (event.target === modif) {
        modif.style.display = "none";
    }
            
}
$('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
    
  $('.modal-dialog').draggable();

    $('.myModal').on('show.bs.modal', function() {
      $(this).find('.modal-body').css({
        'max-height': '100%'
      });
    });
//CATEGORY MODIFICATION AJAX
$(".mytable").on('click','.edit',function(){
    $("#itemModify").addClass('hidden');
    $("#stockModif").addClass('hidden');
    $("#categoryModify").removeClass('hidden'); 
    var id = $(this).data('edit');
    $.ajax({
        type: "post",
       url:"Includes/Modifycategory.php",
       data: {id: id},
       dataType: "json",
       success: function(data){
//           console.log(JSON.stringify(data));
           document.getElementById("Idcat").value = data[0];
           document.getElementById("catIdModif").value = data[1];
           document.getElementById("catNameModif").value = data[2];
//            var spanModif = document.getElementsByClassName("close5");
            modif.style.display="block";
           
            
       }
       
    });
    
    return false;
});
 
$(".mytable").on('click','.del',function(){
    var id = $(this).data('del');
     var confirm = document.getElementById("myModal-confirm");
     confirm.style.display="block";
     $("#yes").click(function(){
         console.log(id);
    $.ajax({
        type: "post",
       url:"Includes/DeleteCategory.php",
       data: {delid: id},
       success: function(data){
           alert(data);
       }
    });
});
    $("#no").click(function(){
       confirm.style.display="none";
       id='';
        return false;
    });
    
    return false;
});

//    IMPORT OR ADD DIRECTLY ITEM CONTROL
$(".itemradio").click(function(){
  var  isSelected = $(this).val();
  console.log(isSelected);
    if(isSelected === "import" ){
        $("#file").removeClass('hidden');
        $(".tohide").addClass('hidden');
        $(".btn-saveitem").val("import");
    }
    
    else if(isSelected === "add" ){
        $("#file").addClass('hidden');
        $(".tohide").removeClass('hidden');
        $(".btn-saveitem").val("Save");
    }
    
});

//    IMPORT OR ADD DIRECTLY CATEGORY 
$(".catradio").click(function(){
  var  isSelected = $(this).val();
  console.log(isSelected);

    if(isSelected === "importcat" ){
        $("#category_csv").removeClass('hidden');
        $(".hideitem").addClass('hidden');
        $(".btn-cat").val("import");
    }
    
    else if(isSelected === "addcat" ){
        $("#category_csv").addClass('hidden');
        $(".hideitem").removeClass('hidden');
        $(".btn-cat").val("Save");
    }
    
});
//MODIFY ITEM
$(".mytable").on('click','.edit-item',function(){
    $("#categoryModify").addClass('hidden');
     $("#stockModif").addClass('hidden');
    $("#itemModify").removeClass('hidden');
    var id = $(this).data('edititem');
    console.log(id);
    $.ajax({
        type: "post",
       url:"Includes/ModifyItem.php",
       data: {iditem: id},
       dataType: "json",
       success: function(data){
            document.getElementById("Iditem").value = data[0];
           document.getElementById("itemIdModif").value = data[1];
           document.getElementById("itemNameModif").value = data[2];
           var sel = document.getElementById("item-category");
           sel.options[0].innerHTML = data[3];
           sel.options[0].value = data[3];
           document.getElementById("itemPriceModif").value = data[4];
            modif.style.display="block";
       },
       error:function(data){
           console.log(data);
       }
       
    });
    
    return false;
});

//DELETE ITEM
$(".mytable").on('click','.del-item',function(){
    var id = $(this).data('delitem');
     var confirm = document.getElementById("myModal-confirm");
     confirm.style.display="block";
     $("#yes").click(function(){
         console.log(id);
    $.ajax({
        type: "post",
       url:"Includes/deleteitem.php",
       data: {deliditem: id},
       success: function(data){
           alert(data);
       }
    });
});
    $("#no").click(function(){
       confirm.style.display="none";
       id ='';
        return false;
    });
    
    return false;
});

//MODIFY STOCK
$(".mytable").on('click','.edit-stock',function(){
    $("#categoryModify").addClass('hidden');
    $("#itemModify").addClass('hidden');
     $("#stockModif").removeClass('hidden');
    var id = $(this).data('editstock');
    console.log(id);
    $.ajax({
        type: "post",
       url:"Includes/modifStock.php",
       data: {idstock: id},
       dataType: "json",
       success: function(data){
            document.getElementById("stockFixedId").value = data[0];
           document.getElementById("stockId").value = data[1];
           var sel = document.getElementById("selectItem");
           sel.options[0].innerHTML = data[2];
           sel.options[0].value = data[2];
           document.getElementById("itemNumber").value = data[3];
            modif.style.display="block";
       },
       error:function(data){
           console.log(data);
       }
       
    });
    
    return false;
});

//DELETE ITEM
$(".mytable").on('click','.del-stock',function(){
    var id = $(this).data('delstock');
     var confirm = document.getElementById("myModal-confirm");
     confirm.style.display="block";
     $("#yes").click(function(){
         console.log(id);
    $.ajax({
        type: "post",
       url:"Includes/deletestock.php",
       data: {deliditem: id},
       success: function(data){
           alert(data);
       }
    });
});
    $("#no").click(function(){
       confirm.style.display="none";
       id ='';
        return false;
    });
    
    return false;
});
});