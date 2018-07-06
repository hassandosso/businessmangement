$(document).ready(function(){
    //VARIABLE INITIALISATION
var tableDesign = "<div id='content'>\n\
<input type='text' class='myInput-stock' data-criteria='name' placeholder='Search by item name..' style='margin-bottom: 5px;'>\n\
<input type='date' class='date-stock' data-criteria='entry' style='margin-bottom: 5px; margin-left:15px;'>\n\
<input type='date' class='date-stock' data-criteria='out' style='margin-bottom: 5px; margin-left:15px;'>\n\
<button class='btn btn-primary fa fa-download exportstock' style='margin-bottom: 5px; float: right'>Download</button>\n\
<table width='100%' id='stock_table' class='table table-striped table-bordered' style='width:100%;'>\n\
    <thead style='background-color: black; color: white;'>\n\
        <tr>\n\
            <th>stock id</th>\n\
            <th>Item Name</th>\n\
            <th>Initial number</th>\n\
            <th>Entry date</th>\n\
             <th>Actual number</th>\n\
            <th>Last transaction date</th>\n\
            <th style='width: 150px; text-align: center;'>Edit / Delete</th>\n\
        </tr>\n\
    </thead>\n\
    <tbody id='tbody_stock'></tbody>\n\
    <tfoot>\n\
        <tr class='success'>\n\
            <th>stock id</th>\n\
            <th>Item Name</th>\n\
            <th>Initial number</th>\n\
            <th>entry date</th>\n\
            <th>Actual number</th>\n\
            <th>Last transaction date</th>\n\
            <th style='width: 150px; text-align: center;'>Edit / Delete</th>\n\
        </tr>\n\
    </tfoot>\n\
</table>\n\
<div id='div_pagination_stock' style='float: right'>\n\
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
$("#stockList").click(function(){
    filter ='';
    searchdata =[];
    $(".mytable #content").remove();
    $(".mytable").append(tableDesign);
    $(".mytable #tbody_stock tr").remove();
    $(".mytable #div_pagination_stock span").remove();
    start = 0;
    lastline = rowperpage-1;
    $.ajax({
        url:'Includes/StockList.php',
            type:'post',
            data:"",
            dataType:'json',
            success:function(response){
                var len = response.length;
//               if(response===''){
//                    $("#tbody_stock").append("<p style='text-align:center'><strong>item Table is empty!</strong></p>");
//                }else{
                alldata = response;
                createTablerow(alldata, lastline, start);
                createPageNumber(rowperpage,alldata.length);
                console.log(len);
//                }
                if(start ===0){
                    btn_prev = document.getElementById("but_prev_stock");
                    btn_prev.setAttribute("disabled", true);
                }
              
            },
            error:function(response){
                console.log(response);
                alert(JSON.stringify(response));
            }
    });
});
//ACTION WHEN NEXT BUTTON IS CLICKED
$(".mytable").on('click','#but_next_stock',function(){
    btn_prev = document.getElementById("but_prev_stock");
    btn_next = document.getElementById("but_next_stock");
    $(".mytable .page-stock").removeClass('active');
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
     $(".mytable").on('click','#but_prev_stock',function(){
         btn_next = document.getElementById("but_next_stock");
         btn_prev = document.getElementById("but_prev_stock");
        $(".mytable .page-stock").removeClass('active'); 
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
   $(".mytable").on('click','.page-stock',function(){
       btn_next = document.getElementById("but_next_stock");
       btn_prev = document.getElementById("but_prev_stock");
      $(".mytable .page-stock").removeClass('active');
      $(this).addClass('active');
       var page = $(this).data('stockvalue');
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
   $(".mytable").on('keyup','.myInput-stock',function(){
       start = 0;
       searchdata =[];
       lastline = rowperpage - 1;
      filter = $(this).val();
      filter_criteria = $(this).data('criteria');
      filter = filter.toUpperCase();
      var count =0, j=0;
      for(var i=0; i<alldata.length; i++){
            var name = alldata[i]['name'];
          if(name.toUpperCase().indexOf(filter) > -1){
              count++;
              searchdata[j] =alldata[i];
              j++;
          }
      }
      if(lastline >= searchdata.length)
          lastline = searchdata.length -1;
      
     searchTablerow(searchdata, lastline,start, filter,filter_criteria);
     createPageNumber(rowperpage,count);
     if(filter ==''){
         start = 0;
         searchdata =[];
         lastline = rowperpage -1;
     }
     
   });
   
   $(".mytable").on('change','.date-stock',function(){
       searchdata =[];
       filter_criteria = $(this).data('criteria');
       filter = $(this).val();
       start = 0;
       lastline = rowperpage - 1;
       
     if(filter ==''){
         console.log('date: '+$(this).val());
         createTablerow(alldata, lastline, start);
         createPageNumber(rowperpage,alldata.length);
         
 }else{  
      var count =0, j=0;
      var name;
      for(var i=0; i<alldata.length; i++){
          if(filter_criteria ==='entry')
             name = alldata[i]['entry'];
          else if(filter_criteria ==='out')
              name = alldata[i]['last'];
          if(name===filter){
              count++;
              searchdata[j] =alldata[i];
              j++;
          }
      }
      if(lastline >= searchdata.length)
          lastline = searchdata.length -1;
      searchTablerow(searchdata, lastline,start, filter,filter_criteria);
      createPageNumber(rowperpage,count);
 } 
 
   });
//FUNCTION TO CREATE TABLE BODY            
function createTablerow(data, perpage,start){
     $("#tbody_stock tr").remove();
        for(var i=start; i<=perpage; i++){
                var stockid = data[i]['id'];
                var stockname = data[i]['name'];
                var number = data[i]['number'];
                var entryDate = data[i]['entry'];
                var actualNum = data[i]['actual'];
                var lastDate = data[i]['last'];
                $("#tbody_stock").append("<tr><td>"+stockid+"</td><td>"+stockname+"</td><td>"+number+"</td><td>"+entryDate+"</td>\n\
                            </td><td>"+actualNum+"</td><td>"+lastDate+"</td><td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit-stock' title='Edit' data-editstock='"+stockid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del-stock'title='Delete' data-delstock='"+stockid+"'></span></td></tr>");
            }
        }
 
 //FUNCTION TO CREATE SEARCH TABLE
  function searchTablerow(data, perpage,start, filter, filter_criteria){
     $("#tbody_stock tr").remove();
        for(var i=start; i<=perpage; i++){
                var stockid = data[i]['id'];
                var stockname = data[i]['name'];
                var number = data[i]['number'];
                var entryDate = data[i]['entry'];
                var actualNum = data[i]['actual'];
                var lastDate = data[i]['last'];
                if(filter_criteria==='name'){
                if(stockname.toUpperCase().indexOf(filter) > -1)
                {
                        $("#tbody_stock").append("<tr><td>"+stockid+"</td><td>"+stockname+"</td><td>"+number+"</td><td>"+entryDate+"</td>\n\
                            </td><td>"+actualNum+"</td><td>"+lastDate+"</td><td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit-stock' title='Edit' data-editstock='"+stockid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del-stock'title='Delete' data-delstock='"+stockid+"'></span></td></tr>");
                    }
                }
                else if(filter_criteria==='entry'){
                    if(entryDate ===filter)
                    {
                        $("#tbody_stock").append("<tr><td>"+stockid+"</td><td>"+stockname+"</td><td>"+number+"</td><td>"+entryDate+"</td>\n\
                            </td><td>"+actualNum+"</td><td>"+lastDate+"</td><td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit-stock' title='Edit' data-editstock='"+stockid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del-stock'title='Delete' data-delstock='"+stockid+"'></span></td></tr>");
                    }
                }
                else if(filter_criteria==='out'){
                    if(lastDate===filter)
                    {
                        $("#tbody_stock").append("<tr><td>"+stockid+"</td><td>"+stockname+"</td><td>"+number+"</td><td>"+entryDate+"</td>\n\
                            </td><td>"+actualNum+"</td><td>"+lastDate+"</td><td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit-stock' title='Edit' data-editstock='"+stockid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del-stock'title='Delete' data-delstock='"+stockid+"'></span></td></tr>");
                    }
                }
        }
        }  
 //FUNCTION TO CREATE PAGE NUMBER
 function createPageNumber(rowperpage,tablelength){
     $("#div_pagination_stock span").remove();
     var nbpage = 1;
     var value =0;
     if(tablelength>rowperpage){
     nbpage = tablelength/rowperpage;
     nbpage = Math.ceil(nbpage);
     if(nbpage>1){
         
         $("#div_pagination_stock").append("<span class='btn btn-primary' id='but_prev_stock'>Previous</span>&nbsp;");
         for(var i=1; i<=nbpage; i++){
             $("#div_pagination_stock").append("<span class='btn btn-default page-stock' data-stockvalue='"+value+"'>"+i+"</span>");
             value+=rowperpage;
         }
         $("#div_pagination_stock").append("&nbsp;<span class='btn btn-primary' id='but_next_stock'>Next</span>");
     }
 }
 }
});

