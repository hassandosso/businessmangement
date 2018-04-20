$(document).ready(function(){
// Get the modal
var modal_cat = document.getElementById('myModal-category');
var modal_item = document.getElementById('myModal-item');
var modal_newstock = document.getElementById('myModal-newStock');
var modal_adduser = document.getElementById('myModal-adduser');
// Get the button that opens the modal
//var btn = document.getElementById("logout");
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
//CATEGORY MODIFICATION AJAX
$("#tbody").on('click','.edit',function(){
    var id = $(this).data('edit');
     console.log(id);
    $.ajax({
        type: "post",
       url:"Includes/Modifycategory.php",
       data: {id: id},
       dataType: "json",
       success: function(data){
//           console.log(JSON.stringify(data));
           document.getElementById("catIdModif").value = data[0];
           document.getElementById("catNameModif").value = data[1];
           var modif = document.getElementById("myModal-modif");
//            var spanModif = document.getElementsByClassName("close5");
            modif.style.display="block";
//            spanModif.onclick = function(){
//                modif.style.display="none";
//            }
            window.onclick = function(event) {
            if (event.target == modif) {
                modif.style.display = "none";
            }
            }
       }
       
    });
    
    return false;
});
 
$("#tbody").on('click','.del',function(){
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
        return false;
    });
    
    return false;
});

//    IMPORT OR ADD DIRECTLY ITEM CONTROL
$(".itemradio").click(function(){
  var  isSelected = $('input:radio[name=addoption]:checked').val();
//  var element = "<input type='file' name='import' class='form-control removefile'>";
    if(isSelected == "import" ){
        $("#file").removeClass('hidden');
        $(".tohide").addClass('hidden');
        $(".btn-saveitem").val("import");
    }
    
    else if(isSelected == "add" ){
        $("#file").addClass('hidden');
        $(".tohide").removeClass('hidden');
        $(".btn-saveitem").val("Save");
    }
    
});

});