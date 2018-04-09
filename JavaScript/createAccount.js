 $("#registration").submit(function(){
        $.ajax({
    
    type : 'POST',
    url  : 'Includes_action_client_server/registration.php',
    data : $("#registration").serialize(),
    beforeSend: function()
    { 
     $("#error").fadeOut();
    },
    success :  function(data)
         {     
        if(data==1)
        {
         
         $("#error").fadeIn(1000, function(){
           
           
           $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Account cannot be created, please admin!</div>');
           
          
         });
        
        }
        else{
          
         $("#error").fadeIn(1000, function(){
           
          if(data.includes("Account"))
          { 
               $("#error").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+'!</div>');
              $("#registration")[0].reset();
          }
          else{
              $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+'!</div>');
          }
         });
         
        }
//        window.setTimeout(function(){location.reload()},5000)
         }
    });
   
    return false;
   });
        
