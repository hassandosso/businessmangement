$(document).ready(function(){
    //VARIABLE INITIALISATION
var tableDesign = "<div id='content'>\n\
<input type='text' class='myInput-account' placeholder='Search by bill no..' style='margin-bottom: 5px;'>\n\
<span class='btn btn-info search'style='margin-bottom: 5px;'><i class='fa fa-search'></i>Search</span>\n\
<input type='date' class='date-bill' style='margin-bottom: 5px; margin-left:15px; float:'>\n\
<button class='btn btn-primary fa fa-download' id='export' style='margin-bottom: 5px; float: right'>Download</button>\n\
<table width='100%' id='account_table' class='table table-striped table-bordered' style='width:100%;'>\n\
    <thead style='color: #222; background-color: #d9534f'>\n\
        <tr>\n\
            <th>Bill id</th>\n\
            <th>Sub amount</th>\n\
            <th>Tax</th>\n\
            <th>Discount</th>\n\
            <th>Total amount</th>\n\
            <th>Items</th>\n\
            <th>Date</th>\n\
        </tr>\n\
    </thead>\n\
    <tbody id='tbody_account'></tbody>\n\
    <tfoot>\n\
        <tr class='success'>\n\
            <th>Totals:</th>\n\
            <th class='subamount'>Sub amount</th>\n\
            <th class='alltax'>Tax</th>\n\
            <th class='alldisc'>Discount</th>\n\
            <th class='totalAmount'></th>\n\
            <th></th>\n\
            <th></th>\n\
        </tr>\n\
    </tfoot>\n\
</table>\n\
<div id='div_pagination_account' style='float: right'>\n\
</div>\n\
</div>";
var btn_prev;
var btn_next;
var rowperpage = 15;
var lastline = rowperpage-1;
var alldata, searchdata =[];
var start = 0;
var filter ='';
var filter_criteria='';
//GET ALL DATA FROM DATABASE AND DISPLAY THE FIRST 10 CONTENTS;
$("#soldDetails").click(function(){
    filter ='';
    searchdata =[];
    $(".mytable #content").remove();
    $(".mytable").append(tableDesign);
    $(".mytable #tbody_account tr").remove();
    $(".mytable #div_pagination_account span").remove();
    start = 0;
    lastline = rowperpage-1;
    $.ajax({
        url:'Includes/accountList.php',
            type:'post',
            data:"",
            dataType:'json',
            success:function(myresponse){
                var response = [];
                var bill_info = myresponse[0];
                var bill_item = myresponse[1];
               var totalDiscount = 0, totaltax = 0, subAmount = 0, totalAmount= 0;
            for(var i = 0; i<bill_info.length; i++){
                var arrayelement={};
                arrayelement['billNo'] = bill_info[i]['billNo'];
                arrayelement['subAmount'] = bill_info[i]['subAmount'];
                subAmount = parseFloat(bill_info[i]['subAmount'],10)+parseFloat(subAmount,10);
                 arrayelement['tax'] = bill_info[i]['tax'];
                 totaltax = parseFloat(bill_info[i]['tax'],10)+parseFloat(totaltax,10);
                arrayelement['discount'] = bill_info[i]['discount'];
                totalDiscount = parseFloat(bill_info[i]['discount'],10)+parseFloat(totalDiscount,10);
                arrayelement['totalAmount'] = bill_info[i]['totalAmount'];
                totalAmount = parseFloat(bill_info[i]['totalAmount'],10)+parseFloat(totalAmount,10);

                var item ='';
                var t =0;
                for(var j=0; j<bill_item.length; j++){
                    if(bill_item[j]['billNo']===bill_info[i]['billNo']){
                        t+=1;
                        if(t===3){
                            item += bill_item[j]['itemName']+',<br> ';
                            t=0;
                        }
                        else{
                            if(j< (bill_item.length-1))
                                item += bill_item[j]['itemName']+', '; 
                            else
                               item += bill_item[j]['itemName'];  
                        }
                    }
                    
                }
                arrayelement['items'] = item;
                arrayelement['date'] = bill_info[i]['date'];
                response.push(arrayelement);
            
        }
                $('.mytable  .subamount').text(subAmount);
                $('.mytable  .alltax').text(totaltax);
                $('.mytable  .alldisc').text(totalDiscount);
                $('.mytable  .totalAmount').text(totalAmount);
        
               if(response===''){
                    $("#tbody_account").append("<p style='text-align:center'><strong>item Table is empty!</strong></p>");
                }else{
                alldata = response;
                createTablerow(alldata, lastline, start);
                createPageNumber(rowperpage,alldata.length);
                }
                if(start ===0){
                    btn_prev = document.getElementById("but_prev_account");
                    btn_prev.setAttribute("disabled", true);
                }
            },
            error:function(response){
                console.log(response);
//                alert(JSON.stringify(response));
            }
    });
});
//ACTION WHEN NEXT BUTTON IS CLICKED
$(".mytable").on('click','#but_next_account',function(){
    btn_prev = document.getElementById("but_prev_account");
    btn_next = document.getElementById("but_next_item");
    $(".mytable .page-account").removeClass('active');
    btn_prev.removeAttribute("disabled");
               start +=rowperpage;
               lastline+=rowperpage;
             if(filter === ''){
           if (lastline>=alldata.length-1 ){
               btn_next.setAttribute("disabled", true);
               lastline =alldata.length; 
           }
           else{
               btn_next.removeAttribute("disabled");
           }
         createTablerow(alldata, lastline, start);
       }
       else{
           if(lastline>=searchdata.length-1){
                btn_next.setAttribute("disabled", true);
                lastline =searchdata.length;
           }else{
           btn_next.removeAttribute("disabled");
            }
        searchTablerow(searchdata, lastline,start, filter, filter_criteria);
       }
            });
     //END ACTION NEXT BUTTON
//ACTION WHEN PREVIOUS BUTTON IS CLICKED
     $(".mytable").on('click','#but_prev_account',function(){
         btn_next = document.getElementById("but_next_account");
         btn_prev = document.getElementById("but_prev_account");
        $(".mytable .page-account").removeClass('active'); 
            btn_next.removeAttribute("disabled");
            if(filter ===''){
                if(lastline===alldata.length && (lastline - start)<rowperpage){
                    lastline = start -1;
                    start -=rowperpage;
                }else{
                    start -=rowperpage;
                    lastline-=rowperpage;
                }
            if(start<=0){
                 start =0;
                 lastline = rowperpage-1;
                 btn_prev.setAttribute("disabled", true);
             }
             createTablerow(alldata, lastline, start);
            }else{
                if(lastline===searchdata.length && (lastline - start)<rowperpage){
                    lastline = start -1;
                    start -=rowperpage;
                }else{
                    start -=rowperpage;
                    lastline-=rowperpage;
                }
            if(start<=0){
                 start =0;
                 lastline = rowperpage-1;
                 btn_prev.setAttribute("disabled", true);
             }
               searchTablerow(searchdata, lastline,start, filter, filter_criteria);
            }
        });
     //END ACTION PREVIOUS BUTTON
     //
   $(".mytable").on('click','.page-account',function(){
       btn_next = document.getElementById("but_next_account");
       btn_prev = document.getElementById("but_prev_account");
      $(".mytable .page-account").removeClass('active');
      $(this).addClass('active');
       var page = $(this).data('accountvalue');
       start =page;
       if(start ===0){
           btn_prev.setAttribute("disabled", true);
       }
       else{
           btn_prev.removeAttribute("disabled");
       }
       lastline = page+rowperpage-1;
       if(filter === ''){
           if (lastline>=alldata.length-1 ){
               btn_next.setAttribute("disabled", true);
               lastline =alldata.length; 
           }
           else{
               btn_next.removeAttribute("disabled");
           }
         createTablerow(alldata, lastline, start);
       }
       else{
           if(lastline>=searchdata.length-1){
                btn_next.setAttribute("disabled", true);
                lastline =searchdata.length;
           }else{
           btn_next.removeAttribute("disabled");
            }
        searchTablerow(searchdata, lastline,start, filter, filter_criteria);
       }
   });
   
   //SEARCH FUNCTION
   $(".mytable").on('click','.search',function(){
      filter = $('.myInput-account').val();
      if(filter ==''){
         createTablerow(alldata, lastline, start);
     }else{
         function search(mydata){
             $("#tbody_account tr").remove();
         for(var i=0; i<mydata.length; i++){
             if(alldata[i]['billNo']===filter){
                 var billNo = alldata[i]['billNo'];
                var subAmount = alldata[i]['subAmount'];
                var tax = alldata[i]['tax'];
                var discount = alldata[i]['discount'];
                var totalAmount = alldata[i]['totalAmount'];
                var items = alldata[i]['items'];
                var date = alldate[i]['date'];
                $("#tbody_account").append("<tr><td>"+billNo+"</td><td>"+subAmount+"</td><td>"+tax+"</td><td>"+discount+"</td>\n\
                            <td>"+totalAmount+"</td><td>"+items+"</td></td><td>"+date+"</td>\n\
                        </tr>");
                 break;
             }
         }
     }
     search(alldata);
     }
   });
   
   
$(".mytable").on('change','.date-bill',function(){
       searchdata =[];
       filter = $(this).val();
       start = 0;
       lastline = rowperpage - 1;
     if(filter ==''){
         console.log('date: '+$(this).val());
         createTablerow(alldata, lastline, start);
         createPageNumber(rowperpage,alldata.length);
         
 }else{  
      var count =0, j=0;
      for(var i=0; i<alldata.length; i++){
          var mydate = alldata[i]['date'];
          if(mydate === filter){
              count++;
              searchdata[j] =alldata[i];
              j++;
          }
      }
      if(lastline >= searchdata.length)
          lastline = searchdata.length -1;
      searchTablerow(searchdata, lastline,start, filter);
      createPageNumber(rowperpage,count);
 } 
 
   });
//FUNCTION TO CREATE TABLE BODY   
function createTablerow(data, perpage,start){
     $("#tbody_account tr").remove();
        for(var i=start; i<=perpage; i++){
                var billNo = data[i]['billNo'];
                var subAmount = data[i]['subAmount'];
                var tax = data[i]['tax'];
                var discount = data[i]['discount'];
                var totalAmount = data[i]['totalAmount'];
                var items = data[i]['items'];
                var date = data[i]['date'];
                $("#tbody_account").append("<tr><td>"+billNo+"</td><td>"+subAmount+"</td><td>"+tax+"</td><td>"+discount+"</td>\n\
                            <td>"+totalAmount+"</td><td>"+items+"</td></td></td><td>"+date+"</td>\n\
                        </tr>");
            }
        }
 
 //FUNCTION TO CREATE SEARCH TABLE
  function searchTablerow(data, perpage,start, filter){
     $("#tbody_account tr").remove();
        for(var i=start; i<=perpage; i++){
                var billNo = data[i]['billNo'];
                var subAmount = data[i]['subAmount'];
                var tax = data[i]['tax'];
                var discount = data[i]['discount'];
                var totalAmount = data[i]['totalAmount'];
                var items = data[i]['items'];
                var date = data[i]['date'];
                if(date === filter)
                {
                         $("#tbody_account").append("<tr><td>"+billNo+"</td><td>"+subAmount+"</td><td>"+tax+"</td><td>"+discount+"</td>\n\
                            <td>"+totalAmount+"</td><td>"+items+"</td></td></td><td>"+date+"</td>\n\
                            </tr>");
                  }
                
        }
        }  
 //FUNCTION TO CREATE PAGE NUMBER
 function createPageNumber(rowperpage,tablelength){
     $("#div_pagination_account span").remove();
     var nbpage = 1;
     var value =0;
     if(tablelength>rowperpage){
     nbpage = tablelength/rowperpage;
     nbpage = Math.ceil(nbpage);
     if(nbpage>1){
         
         $("#div_pagination_iaccount").append("<span class='btn btn-primary' id='but_prev_account'>Previous</span>&nbsp;");
         for(var i=1; i<=nbpage; i++){
             $("#div_pagination_account").append("<span class='btn btn-default page-item' data-accountvalue='"+value+"'>"+i+"</span>");
             value+=rowperpage;
         }
         $("#div_pagination_account").append("&nbsp;<span class='btn btn-primary' id='but_next_account'>Next</span>");
     }
 }
 }
 
 
});



