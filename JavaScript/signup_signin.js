$(document).ready(function(){
// Get the modal
var modal = document.getElementById('myModal-login');


// Get the button that opens the modal
var btn = document.getElementById("signup");
var btn1 = document.getElementById("login");
var alreadyuser = document.getElementById('alreadyuser');
var newaccount = document.getElementById('newaccount');


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span01 = document.getElementsByClassName("close01")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
    $('#sign_in').addClass('hidden');
    $('#registration').removeClass('hidden');
    
}

btn1.onclick = function() {
    modal.style.display = "block";
     $('#sign_in').removeClass('hidden');
    $('#registration').addClass('hidden');
   
    
}
alreadyuser.onclick = function() {
    //modal.style.display = "block";
     $('#sign_in').removeClass('hidden');
    $('#registration').addClass('hidden');
   
    
}
newaccount.onclick = function() {
    modal.style.display = "block";
    $('#sign_in').addClass('hidden');
    $('#registration').removeClass('hidden');
    }



// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
span01.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    
}
});


