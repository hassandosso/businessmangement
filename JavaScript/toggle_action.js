$(document).ready(function(){
    $(".billcode").click(function(){
        var start = $(".code_start").val();
        var end = $(".code_end").val();
        var arrNumber = [];
        var number = start ;
        for(var i= start; i<=end; i++){
             var arrElement ={};
            arrElement['number'] = ("000" + number).slice(-4);
            arrNumber.push(arrElement);
            number = parseInt(number)+1;
        }
        $.ajax({
            url:"Includes/toggleaction/Insert_code_bill.php",
            type:"post",
            data:{billcode: JSON.stringify(arrNumber)},
            success: function(result){
               if(result.includes('successfully')){
                    $("#message").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign">\n\
                    </span> &nbsp; '+result+'!</div>');
                    $(".codebill")[0].reset();
                    setTimeout("location.href = 'index.php'",5000);
               }else{
              $("#message").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign">\n\
                </span> &nbsp; '+result+'!</div>');
          }
            },
            error:function(result){
                console.log(result);
            }

        });
//        console.log(JSON.stringify(arrNumber));
//        return false;
    });
    $(".customerbtn").click(function(){
        setTimeout(function(){
            $(".customer")[0].reset();
        }, 5000);
        
    });
});