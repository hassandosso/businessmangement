$("#edit").submit(function(){
    var id = $("#edit").val();
    $.ajax({
        type: "post",
        url:"Includes/actionsList.php",
        data: id,
        success: function(data){
            $.each(data, function (i, msg) {

    	       console.log(msg[i]);
});
        }
    });
    return false;
});


