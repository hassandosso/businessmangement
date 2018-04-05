$(document).ready(function(){
// Get the modal
var modal_item = document.getElementById('myModal-item');

// Get the button that opens the modal
var btnitem = document.getElementById("additem");

// Get the <span> element that closes the modal
var spanitem = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btnitem.onclick = function() {
    modal_item.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanitem.onclick = function() {
    modal_item.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_item) {
        modal.style.display = "none";
    }
}
});