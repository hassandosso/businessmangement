$(document).ready(function(){
    $(".todonote").click(function(){
        var todo = $(this).text();
        var url;
        if(todo === 'Today TODO')
            url = "Includes/toggleaction/todaynotecontent.php";
        else if(todo === 'Current Week TODO')
            url = "Includes/toggleaction/weeknotecontent.php";
        else
            url = "Includes/toggleaction/getnotecontent.php"
        $("#registered-note li").remove();
    $.ajax({
         url:url,
         data:"",
         dataType:'json',
         success:function(result){
              appendLi(result);
         },
        error:function(result){
            console.log(result);
        }
     });
     });
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	$(".date").text(dd+"/"+mm+"/"+yyyy);
	$(".save").click(function(){
            var test = $(this).text();
                var id = $(".id").text();
		var date = $(".date").text();
		var title = $(".title").val();
		var content = $(".content").val();
                var reminder = $(".reminder").val();
                if(test ==='save'){
                if(content !==''){
                 $.ajax({
                     url:"Includes/toggleaction/notecontent.php",
                     type:"post",
                     data:{the_title: title, the_content: content, the_reminder:reminder},
                     dataType:'json',
                     success:function(result){
                            appendLi(result);
                            $(".noteform")[0].reset();
          
                     },
                    error:function(result){
                        console.log(result);
                    }
                 });   
             }
            }
                    else{
                        $.ajax({
                        type: "post",
                       url:"Includes/toggleaction/updatenote.php",
                       data: {noteid: id, notetitle: title, notecontent: content, notereminder: reminder},
                        dataType:'json',
                     success:function(result){
                         
                            appendLi(result);
                            $(".noteform")[0].reset();
          
                     },
                    error:function(result){
                        console.log(result);
                    }
                    });
                    }
	});
        
        $("#registered-note").on('click', '.delete', function(){
            var parentClass = $(this).parent().attr('class');
            var id = $("."+parentClass+" .saveid").text();
            var confirm = document.getElementById("myModal-confirm");
             confirm.style.display="block";
             $("#yes").click(function(){
                  confirm.style.display="none";
                $("."+parentClass).remove();
            $.ajax({
                type: "post",
               url:"Includes/toggleaction/deletenote.php",
               data: {noteid: id},
               success: function(data){
                  // alert(data);
               }
            });
            });
            $("#no").click(function(){
               confirm.style.display="none";
               id='';   
            });
            
        });
         $("#registered-note").on('click', '.edit', function(){
            var parentClass = $(this).parent().attr('class');
            var id = $("."+parentClass+" .saveid").text();
            var title = $("."+parentClass+" .savetitle").text();
            var content = $("."+parentClass+" .savecontent").text();
            var reminder = $("."+parentClass+" .savereminder").text();
            $("#takenote .id").text(id);
            $(".save").text("Modify");
            $("#takenote .title").val(title);
            $("#takenote .content").val(content);
            $("#takenote .reminder").val(reminder);
                $("."+parentClass).remove();
            
        });
        
    function appendLi(result){
        for(var i=0; i<result.length; i++){
        $("#registered-note").append(`<li class="animated bounceInDown">
                <div style="position:relative" class=div${result[i][0]}>
                    <small class="saveid hidden">${result[i][0]}</small>
                    <small class="savedate" readonly="readonly">${result[i][1]}</small>
                    <h4 class="savetitle"><strong>${result[i][2]}</strong></h4>
                    <p class="savecontent">${result[i][3]}</p>
                    <p style="color:red">Remind date:</p>
                    <p class="savereminder">${result[i][4]}</p>
                    <span style="position:absolute; bottom:0; left:90px" class="delete" title="Delete"><i class="fa fa-trash-o fa-2x"></i></span>
                    <span style="position:absolute; bottom: 0" class="edit" title="Edit"><i class="fa fa-edit fa-2x"></i></span>
                </div>
            </li>`);
        }
    }    
});


