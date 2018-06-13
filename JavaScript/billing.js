$(document).ready(function(){
    var bill_item=[];
    $("#printable").click(function(){
        var len = $("#billtable tr").length;
        for(var i = 0; i<len; i++){
            var arrayelement={};
            var data = document.getElementById("billtable").rows[i].cells;
            arrayelement['item'] = data[1].children[1].value;
            arrayelement['quantity'] = data[2].children[0].value;
             arrayelement['tax'] = data[3].children[0].value;
            arrayelement['unitprice'] = data[4].children[0].value;
            arrayelement['discount'] = data[5].children[0].value;
            arrayelement['totalprice'] = data[6].children[0].value;
            bill_item.push(arrayelement);
            
        }
           var billcode = $(".code").val();
           var customer = $(".company").val()+" / "+$(".customer").val();
       
        var jsondata = JSON.stringify(bill_item);
        console.log("json data: "+jsondata);
        $.ajax({
            url:"Includes/stockflow.php",
            type:"post",
            data:{billinfo: jsondata,billno:billcode,client:customer},
            success: function(item){
            },
            error:function(item){
                console.log(item);
            }
            
        });
    });
});