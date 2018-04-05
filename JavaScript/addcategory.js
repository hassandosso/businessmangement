$(document).ready(function(){
// Get the modal
var modal_cat = document.getElementById('myModal-category');

// Get the button that opens the modal
var btncategory = document.getElementById("addcategory");

// Get the <span> element that closes the modal
var spancategory = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btncategory.onclick = function() {
    modal_cat.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spancategory.onclick = function() {
    modal_cat.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_cat) {
        modal.style.display = "none";
    }
}
});