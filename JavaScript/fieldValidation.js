$(document).ready(function()
{ 
    $(function() {
  setInterval(function() {
    var animationName = 'animated slideInUp';
    var animationend = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    $('.bmlogo').addClass(animationName).one(animationend, function() {
      $(this).removeClass(animationName);
    });
  }, 3000);
});

//    CHECK PASSWORD AND CONFIRM PASSWORD
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
//    CHECK IF MOBILE NUMBER IS ONLY NUMERIC
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
    
//    CONTROL ADMIN AND SUBUSER OF ACCOUNT
$(".radio").click(function(){
  var  isSelected = $('input:radio[name=useroption]:checked').val();
  var element = "<span class='input-group-addon removable'><i class='glyphicon glyphicon-user removable'></i></span>\
                                <input type='text' name='subuser' class='form-control removable' placeholder='Sub user'>";
    if(isSelected === "subuser" ){
        $(".removable").remove();
        $("#subusername").append(element);
        $("#subusername").addClass('user')
    }
    
    else if(isSelected === "admin" ){
        $(".removable").remove();
        $("#subusername").removeClass('user');
    }
    
});

 }); 
    

   

