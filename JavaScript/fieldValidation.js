$(document).ready(function()
{ 
    $("#confirmpassword").blur(function(){
         $('h2').remove();
        var confirmpassword = $("#confirmpassword").val();
        var password = $("#password").val();
        if(confirmpassword !=password){
            function insertBefore(el, referenceNode) {
	    referenceNode.parentNode.insertBefore(el, referenceNode);
	}
	var newEl = document.createElement('h2');
	newEl.innerHTML = 'password does not match!';
	
	var ref = document.querySelector('#confirmpassword');
	
	insertBefore(newEl, ref);
       $("#btn-submit").prop('disabled',true);
        }
        
        $('#confirmpassword').on('input', function() {
            $('h2').remove();
        });
        if(confirmpassword ==password){
             $("#btn-submit").prop('disabled',false);
        }
       
    
    });
    
    $("#mobile").blur(function(){
         $('h2').remove();
        var mobile = parseInt($("#mobile").val());
        if(isNaN(mobile) || mobile.toString().length<8){
            function insertBefore(el, referenceNode) {
	    referenceNode.parentNode.insertBefore(el, referenceNode);
	}
	var newEl = document.createElement('h2');
	newEl.innerHTML = 'please provide valide mobile number!';
	
	var ref = document.querySelector('#mobile');
	
	insertBefore(newEl, ref);
       $("#btn-submit").prop('disabled',true);
        }
        
        $('#mobile').on('input', function() {
            $('h2').remove();
        });
        if(!isNaN(mobile) && mobile.length>=8){
             $("#btn-submit").prop('disabled',false);
        }
    });
    
   });

