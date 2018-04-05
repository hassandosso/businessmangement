$(document).ready(function(){
// Get the modal
var modal_cat = document.getElementById('myModal-category');
var modal_item = document.getElementById('myModal-item');
var modal_newstock = document.getElementById('myModal-newStock');
// Get the button that opens the modal
//var btn = document.getElementById("logout");
var btncategory = document.getElementById("addcategory");
var btnitem = document.getElementById("additem");
var btnnewstock = document.getElementById("newstock");

// Get the <span> element that closes the modal

var spancategory = document.getElementsByClassName("close1")[0];
var spanitem = document.getElementsByClassName("close2")[0];
var spannewstock = document.getElementsByClassName("close3")[0];
// When the user clicks the button, open the modal 

btncategory.onclick = function() {
    modal_cat.style.display = "block";
    modal_item.style.display = "none";
    modal_newstock.style.display ="none";
}
btnitem.onclick = function() {
    modal_item.style.display = "block";
    modal_cat.style.display = "none";
    modal_newstock.style.display ="none";
}
btnnewstock.onclick = function(){
    modal_newstock.style.display = "block";
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
}
});