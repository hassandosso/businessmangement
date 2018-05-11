$(document).ready(function(){
    var bill_item=[];
    var foot =[];
    $("#printable").click(function(){
        var len = $("#billtable tr").length;
        for(var i = 0; i<len; i++){
            var arrayelement={};
            var data = document.getElementById("billtable").rows[i].cells;
            arrayelement['item'] = data[1].children[1].value;
            arrayelement['quantity'] = data[2].children[0].value;
            arrayelement['unitprice'] = data[3].children[0].value;
            arrayelement['discount'] = data[4].children[0].value;
            arrayelement['totalprice'] = data[5].children[0].value;
            bill_item.push(arrayelement);
            
        }
       var len2 = $('tfoot tr').length;
           var arrayfoot = {};
           var subtotal = document.getElementById('footer').rows[0].cells;
           var tax = document.getElementById('footer').rows[1].cells;
           var amount = document.getElementById('footer').rows[2].cells;
           arrayfoot['subtotal'] = subtotal[1].children[0].value;
           arrayfoot['tax'] = tax[2].children[0].value;
           arrayfoot['amount'] = amount[1].children[0].value;
           foot.push(arrayfoot);
       
        var jsondata = JSON.stringify(bill_item);
        var jsonfoot = JSON.stringify(foot);
        console.log("json data: "+jsondata);
        console.log("json foot data: "+jsonfoot);
        $.ajax({
            url:"Includes/stockflow.php",
            type:"post",
            data:{mydata: jsondata},
            success: function(item){
                console.log(item);
            },
            error:function(item){
                console.log(item);
            }
            
        });
    });
});