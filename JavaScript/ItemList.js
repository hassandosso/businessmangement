
$(document).ready(function(){
    //VARIABLE INITIALISATION
var tableDesign = "<div id='content'>\n\
<input type='text' class='myInput-item' data-criteria='name' placeholder='Search by names..' style='margin-bottom: 5px;'>\n\
<input type='text' class='myInput-item' data-criteria='category' placeholder='Search by category..' style='margin-bottom: 5px; margin-left:15px;'>\n\
<input type='text' class='myInput-item' data-criteria='price' placeholder='Search by price..' style='margin-bottom: 5px; margin-left:15px;'>\n\
<table width='100%' id='item_table' class='table table-striped table-bordered' style='width:100%;'>\n\
    <thead>\n\
        <tr>\n\
            <th>Item id</th>\n\
            <th>Item Name</th>\n\
            <th>category</th>\n\
            <th>Price</th>\n\
            <th style='width: 150px; text-align: center;'>Edit / Delete</th>\n\
        </tr>\n\
    </thead>\n\
    <tbody id='tbody_item'></tbody>\n\
    <tfoot>\n\
        <tr>\n\
            <th>Item id</th>\n\
            <th>Item Name</th>\n\
            <th>category</th>\n\
            <th>Price</th>\n\
            <th style='width: 150px; text-align: center;'>Edit / Delete</th>\n\
        </tr>\n\
    </tfoot>\n\
</table>\n\
<div id='div_pagination_item' style='float: right'>\n\
</div>\n\
</div>";
var btn_prev;
var btn_next;
var rowperpage = 10;
var lastline = rowperpage-1;
var alldata, searchdata =[];
var start = 0;
var filter ='';
var filter_criteria='';
//GET ALL DATA FROM DATABASE AND DISPLAY THE FIRST 10 CONTENTS;
$("#itemlist").click(function(){
    filter ='';
    searchdata =[];
    $(".mytable #content").remove();
    $(".mytable").append(tableDesign);
    $(".mytable #tbody_item tr").remove();
    $(".mytable #div_pagination_item span").remove();
    start = 0;
    lastline = rowperpage-1;
    $.ajax({
        url:'Includes/ItemList.php',
            type:'post',
            data:"",
            dataType:'json',
            success:function(response){
                
               if(response===''){
                    $("#tbody_item").append("<p style='text-align:center'><strong>item Table is empty!</strong></p>");
                }else{
                alldata = response;
                createTablerow(alldata, lastline, start);
                createPageNumber(rowperpage,alldata.length);
                }
                if(start ===0){
                    btn_prev = document.getElementById("but_prev_item");
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
$(".mytable").on('click','#but_next_item',function(){
    btn_prev = document.getElementById("but_prev_item");
    btn_next = document.getElementById("but_next_item");
    $(".mytable .page-item").removeClass('active');
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
     $(".mytable").on('click','#but_prev_item',function(){
         btn_next = document.getElementById("but_next_item");
         btn_prev = document.getElementById("but_prev_item");
        $(".mytable .page-item").removeClass('active'); 
            btn_next.removeAttribute("disabled");
            if(filter ===''){
                if(lastline===alldata.length && (lastline - start)<10){
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
                if(lastline===searchdata.length && (lastline - start)<10){
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
   $(".mytable").on('click','.page-item',function(){
       btn_next = document.getElementById("but_next_item");
       btn_prev = document.getElementById("but_prev_item");
      $(".mytable .page-item").removeClass('active');
      $(this).addClass('active');
       var page = $(this).data('itemvalue');
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
   $(".mytable").on('keyup','.myInput-item',function(){
       start = 0;
       lastline = rowperpage - 1;
      filter_criteria = $(this).data('criteria');
      console.log(filter_criteria);
      filter = $(this).val();
      filter = filter.toUpperCase();
      console.log(filter);
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
         lastline = rowperpage -1;
     }
     
   });
//FUNCTION TO CREATE TABLE BODY            
function createTablerow(data, perpage,start){
     $("#tbody_item tr").remove();
        for(var i=start; i<=perpage; i++){
                var itemid = data[i]['id'];
                var itemname = data[i]['name'];
                var category = data[i]['category'];
                var price = data[i]['price'];
                $("#tbody_item").append("<tr><td>"+itemid+"</td><td>"+itemname+"</td><td>"+category+"</td><td>"+price+"</td>\n\
                            <td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit-item' title='Edit' data-edititem='"+itemid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del-item'title='Delete' data-delitem='"+itemid+"'></span></td></tr>");
            }
        }
 
 //FUNCTION TO CREATE SEARCH TABLE
  function searchTablerow(data, perpage,start, filter, filter_criteria){
     $("#tbody_item tr").remove();
        for(var i=start; i<=perpage; i++){
                var itemid = data[i]['id'];
                var itemname = data[i]['name'];
                var category = data[i]['category'];
                var price = data[i]['price'];
                if(filter_criteria==='name'){
                if(itemname.toUpperCase().indexOf(filter)> -1)
                {
                        $("#tbody_item").append("<tr><td>"+itemid+"</td><td>"+itemname+"</td><td>"+category+"</td><td>"+price+"</td>\n\
                                    <td style='width: 150px; text-align: center'>\n\
                                    <span class='glyphicon glyphicon-edit edit-item' title='Edit' data-edititem='"+itemid+"'></span>&nbsp;\n\
                                    <span class='glyphicon glyphicon-trash del-item'title='Delete' data-delitem='"+itemid+"'></span></td></tr>");
                    }
                }
                else if(filter_criteria==='category'){
                    if(category.toUpperCase().indexOf(filter)> -1)
                    {
                        $("#tbody_item").append("<tr><td>"+itemid+"</td><td>"+itemname+"</td><td>"+category+"</td><td>"+price+"</td>\n\
                                    <td style='width: 150px; text-align: center'>\n\
                                    <span class='glyphicon glyphicon-edit edit-item' title='Edit' data-edititem='"+itemid+"'></span>&nbsp;\n\
                                    <span class='glyphicon glyphicon-trash del-item'title='Delete' data-delitem='"+itemid+"'></span></td></tr>");
                    }
                }
                else if(filter_criteria==='price'){
                    if(price.toUpperCase().indexOf(filter)> -1)
                    {
                        $("#tbody_item").append("<tr><td>"+itemid+"</td><td>"+itemname+"</td><td>"+category+"</td><td>"+price+"</td>\n\
                                    <td style='width: 150px; text-align: center'>\n\
                                    <span class='glyphicon glyphicon-edit edit-item' title='Edit' data-edititem='"+itemid+"'></span>&nbsp;\n\
                                    <span class='glyphicon glyphicon-trash del-item'title='Delete' data-delitem='"+itemid+"'></span></td></tr>");
                    }
                }
        }
        }  
 //FUNCTION TO CREATE PAGE NUMBER
 function createPageNumber(rowperpage,tablelength){
     $("#div_pagination_item span").remove();
     var nbpage = 1;
     var value =0;
     if(tablelength>rowperpage){
     nbpage = tablelength/rowperpage;
     nbpage = Math.ceil(nbpage);
     if(nbpage>1){
         
         $("#div_pagination_item").append("<span class='btn btn-primary' id='but_prev_item'>Previous</span>&nbsp;");
         for(var i=1; i<=nbpage; i++){
             $("#div_pagination_item").append("<span class='btn btn-default page-item' data-itemvalue='"+value+"'>"+i+"</span>");
             value+=rowperpage;
         }
         $("#div_pagination_item").append("&nbsp;<span class='btn btn-primary' id='but_next_item'>Next</span>");
     }
 }
 }
});

