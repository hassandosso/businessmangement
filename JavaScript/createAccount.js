// JavaScript Document
//<script type="text/javascript"
           // src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js">
                
            
        //</script>
$('document').ready(function()
{ 
     /* validation */
  $("#registration").validate({
      rules:
   {
   fullname: {
      required: true,
      minlength: 3
   },
   username: {
      required: true,
      minlength: 3
   },
   company: {
      required: true
   },
   mobile: {
      required: true,
      phoneUs: true
   },
   phone: {
      required: false,
      phoneUs : true
   },
   email: {
            required: true,
            email: true
            },
   password: {
   required: true,
   minlength: 4,
   maxlength: 20
   },
   confirmpassword: {
   required: true,
   equalTo: '#password'
   }
    },
       messages:
    {
            fullname: "please provide your full name",
            username: "please provide a username",
            company: "please provide your company name",
            email: "please provide a valid email address",
            mobile:{
                required: 'please provide a mobile number',
                phoneUs: 'please enter valide mobile number'
            },
            password:{
                      required: "please provide a password",
                      minlength: "password at least have 4 characters"
                     },
   confirmpassword:{
      required: "please retype your password",
      equalTo: "password doesn't match !"
       }
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* form submit */
    function submitForm()
    {  
    var data = $("#registration").serialize();
    
    $.post({
    
   // type : 'POST',
    url  : 'Includes_action_client_server/registration.php',
    data : data,
    beforeSend: function()
    { 
     $("#error").fadeOut();
     $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
    },
    success :  function(data)
         {     
             console.log(data);
        if(data==1){
         
         $("#error").fadeIn(1000, function(){
           
           
           $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;problem to create account, contact registration office to fix the issue !</div>');
           
           $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
          
         });
                    
        }
        else if(data=="registered")
        {
         
         $("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing Up ...');
         setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("index.php"); }); ',5000);
        
        }
        else{
          
         $("#error").fadeIn(1000, function(){
           
      $("#error").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
           
         $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
          
         });
         
        }
        window.setTimeout(function(){location.reload()},5000)
         }
    });
    return false;
  }
    /* form submit */ 
    

});
        
