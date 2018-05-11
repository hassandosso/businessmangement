$(document).ready(function(){
// Get the modal
var modal_cat = document.getElementById('myModal-category');
var modal_item = document.getElementById('myModal-item');
var modal_newstock = document.getElementById('myModal-newStock');
var modal_adduser = document.getElementById('myModal-adduser');

// Get the button that opens the modal
var btncategory = document.getElementById("addcategory");
var btnitem = document.getElementById("additem");
var btnnewstock = document.getElementById("newstock");
var btnadduser = document.getElementById("adduser");



// Get the <span> element that closes the modal

var spancategory = document.getElementsByClassName("close1")[0];
var spanitem = document.getElementsByClassName("close2")[0];
var spannewstock = document.getElementsByClassName("close3")[0];
var spanadduser = document.getElementsByClassName("close4")[0];
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

// When the user clicks on <span> (x), close the modal
spancategory.onclick = function(){
     modal_cat.style.display = "none";
}

spanitem.onclick = function(){
    modal_item.style.display = "none";
}
spannewstock.onclick = function(){
    modal_newstock.style.display = "none";
}
spanadduser.onclick = function() {
    modal_adduser.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_cat) {
        modal_cat.style.display = "none";
    }
    if (event.target == modal_item) {
        modal_item.style.display = "none";
    }
    if (event.target == modal_newstock) {
        modal_newstock.style.display = "none";
    }
    
    if (event.target == modal_adduser) {
        modal_adduser.style.display = "none";
    }
}
$('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
//CATEGORY MODIFICATION AJAX
$(".mytable").on('click','.edit',function(){
    $("#itemModify").addClass('hidden');
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
           var modif = document.getElementById("myModal-modif");
//            var spanModif = document.getElementsByClassName("close5");
            modif.style.display="block";
            spancategory.onclick = function(){
                 modif.style.display = "none";
            }
            window.onclick = function(event) {
            if (event.target == modif) {
                modif.style.display = "none";
            }
            }
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

//    IMPORT OR ADD DIRECTLY CATEGORY CONTROL
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
    $("#itemModify").removeClass('hidden');
    var id = $(this).data('edititem');
    $.ajax({
        type: "post",
       url:"Includes/ModifyItem.php",
       data: {iditem: id},
       dataType: "json",
       success: function(data){
           console.log(JSON.stringify(data));
            document.getElementById("Iditem").value = data[0];
           document.getElementById("itemIdModif").value = data[1];
           document.getElementById("itemNameModif").value = data[2];
           $('select option[0]').innerHTML = data[3];
           $('select option[0]').value = data[3];
           document.getElementById("itemPriceModif").value = data[4];
           var modif = document.getElementById("myModal-modif");
//            var spanModif = document.getElementsByClassName("close5");
            modif.style.display="block";
//            spanModif.onclick = function(){
//                modif.style.display="none";
//            }
            window.onclick = function(event) {
            if (event.target === modif) {
                modif.style.display = "none";
            }
            }
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
});