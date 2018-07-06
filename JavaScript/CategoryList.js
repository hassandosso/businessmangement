
$(document).ready(function(){
    //VARIABLE INITIALISATION
var tableDesign = " <div id='content'>\n\
<input type='text' id='myInput' placeholder='Search for names..' style='margin-bottom: 5px;'>\n\
<button class='btn btn-primary fa fa-download exportcat' style='margin-bottom: 5px; float: right'>Download</button>\n\
<table width='100%' id='emp_table' class='table table-striped table-bordered' style='width:100%;'>\n\
    <thead style='background-color: black; color: white;'>\n\
        <tr>\n\
            <th>Category id</th>\n\
            <th>Category Name</th>\n\
            <th style='width: 150px; text-align: center;'>Edit / Delete</th>\n\
        </tr>\n\
    </thead>\n\
    <tbody id='tbody'></tbody>\n\
    <tfoot>\n\
        <tr class='success'>\n\
            <th>Category id</th>\n\
            <th>Category Name</th>\n\
            <th style='width: 150px; text-align: center;'>Edit / Delete</th>\n\
        </tr>\n\
    </tfoot>\n\
</table>\n\
<div id='div_pagination' style='float: right'>\n\
</div>\n\
</div>";
var btn_prev;
var btn_next;
var rowperpage = 15;
var lastline = rowperpage-1;
var alldata;
var start = 0, searchdata =[];
var filter ='';
//GET ALL DATA FROM DATABASE AND DISPLAY THE FIRST 10 CONTENTS;
$("#catlist").click(function(){
    filter ='';
    searchdata =[];
    $(".mytable #content").remove();
    $(".mytable").append(tableDesign);
    $(".mytable #tbody tr").remove();
    $(".mytable #div_pagination span").remove();
    
    start = 0;
    lastline = rowperpage-1;
    $.ajax({
        url:'Includes/CategoryList.php',
            type:'post',
            data:"",
            dataType:'json',
            success:function(response){
                if(response===''){
                    $("#tbody").append("<p style='text-align:center'><strong>Category Table is empty!</strong></p>");
                }else{
                alldata = response;
                createTablerow(alldata, lastline, start);
                createPageNumber(rowperpage,alldata.length);
               
            }
             if(start ===0){
                    btn_prev = document.getElementById("but_prev");
                    btn_prev.setAttribute("disabled", true);
                }
            }
    });
});
//ACTION WHEN NEXT BUTTON IS CLICKED
$(".mytable").on('click','#but_next',function(){
    btn_prev = document.getElementById("but_prev");
    btn_next = document.getElementById("but_next");
    $(".mytable .page").removeClass('active');
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
        searchTablerow(searchdata, lastline,start, filter);
       }
            
            });
     //END ACTION NEXT BUTTON
//ACTION WHEN PREVIOUS BUTTON IS CLICKED
     $(".mytable").on('click','#but_prev',function(){
         btn_next = document.getElementById("but_next");
         btn_prev = document.getElementById("but_prev");
            $(".mytable .page").removeClass('active'); 
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
               searchTablerow(searchdata, lastline,start, filter);
            }
        });
     //END ACTION PREVIOUS BUTTON
     //
   $(".mytable").on('click','.page',function(){
       btn_next = document.getElementById("but_next");
       btn_prev = document.getElementById("but_prev");
       $(".mytable .page").removeClass('active');
      $(this).addClass('active');
       var page = $(this).data('value');
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
        searchTablerow(searchdata, lastline,start, filter);
       }
   });
   
   //SEARCH FUNCTION
   $(".mytable").on('keyup','#myInput',function(){
       start = 0;
       searchdata =[];
       lastline = rowperpage - 1;
      filter = $("#myInput").val();
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
      
     searchTablerow(searchdata, lastline,start, filter);
     createPageNumber(rowperpage,count);
     if(filter ===''){
         start = 0;
         searchdata =[];
         lastline = rowperpage -1;
     }
     
   });
   
//FUNCTION TO CREATE TABLE BODY            
function createTablerow(data, perpage,start){
     $("#tbody tr").remove();
        for(var i=start; i<=perpage; i++){
                var catid = data[i]['id'];
                var catname = data[i]['name'];
                $("#tbody").append("<tr><td>"+catid+"</td><td>"+catname+"</td><td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit' title='Edit' data-edit='"+catid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del'title='Delete' data-del='"+catid+"'></span></td></tr>");
            }
        }
        
//FUNCTION TO CREATE SEARCH TABLE
  function searchTablerow(data, perpage,start, filter){
     $("#tbody tr").remove();
        for(var i=start; i<=perpage; i++){
                var catid = data[i]['id'];
                var catname = data[i]['name'];
                if(catname.toUpperCase().indexOf(filter)> -1)
                {
                         $("#tbody").append("<tr><td>"+catid+"</td><td>"+catname+"</td><td style='width: 150px; text-align: center'>\n\
                            <span class='glyphicon glyphicon-edit edit' title='Edit' data-edit='"+catid+"'></span>&nbsp;\n\
                            <span class='glyphicon glyphicon-trash del'title='Delete' data-del='"+catid+"'></span></td></tr>");
                    }
        }
        }
        
 //FUNCTION TO CREATE PAGE NUMBER
 function createPageNumber(rowperpage,tablelength){
     $("#div_pagination span").remove();
     var nbpage = 1;
     var value =0;
     if(tablelength>rowperpage){
     nbpage = tablelength/rowperpage;
     nbpage = Math.ceil(nbpage);
     if(nbpage>1){
         $("#div_pagination").append("<span class='btn btn-primary' id='but_prev'>Previous</span>&nbsp;");
         for(var i=1; i<=nbpage; i++){
             $("#div_pagination").append("<span class='btn btn-default page' data-value='"+value+"'>"+i+"</span>");
             value+=rowperpage;
         }
         $("#div_pagination").append("&nbsp;<span class='btn btn-primary' id='but_next'>Next</span>");
     }
 }
 }
 
 
   if(lastline ===alldata.length){
        btn_next = document.getElementById("but_next");
        btn_prev = document.getElementById("but_prev");
        btn_next.setAttribute("disabled", true);
        btn_prev.removeAttribute("disabled");
        }
  else{
      btn_next = document.getElementById("but_next");
      btn_prev = document.getElementById("but_prev");
      btn_prev.removeAttribute("disabled");
      btn_next.removeAttribute("disabled");
  }
});