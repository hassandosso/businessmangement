
$(document).ready(function(){
    //VARIABLE INITIALISATION
var btn_prev;
var btn_next;
var rowperpage = 10;
var lastline = rowperpage-1;
var alldata;
var start = 0;
//GET ALL DATA FROM DATABASE AND DISPLAY THE FIRST 10 CONTENTS;
$("#catlist").click(function(){
    $("#tbody tr").remove();
    $("#div_pagination span").remove();
    start = 0;
    lastline = rowperpage-1;
    $.ajax({
        url:'Includes/CategoryList.php',
            type:'post',
            data:"",
            dataType:'json',
            success:function(response){
               alldata = response;
                createTablerow(alldata, lastline, start);
                createPageNumber(rowperpage,alldata.length);
            }
    });
});
//ACTION WHEN NEXT BUTTON IS CLICKED
$("#div_pagination").on('click','#but_next',function(){
    btn_prev = document.getElementById("but_prev");
    btn_next = document.getElementById("but_next");
    btn_prev.removeAttribute("disabled");
               start +=rowperpage;
               lastline+=rowperpage;
            if(lastline >= alldata.length ){
                btn_next.setAttribute("disabled", true);
                  lastline = alldata.length-1;
            }
            createTablerow(alldata, lastline, start);
            
            });
     //END ACTION NEXT BUTTON
//ACTION WHEN PREVIOUS BUTTON IS CLICKED
     $("#div_pagination").on('click','#but_prev',function(){
         btn_next = document.getElementById("but_next");
         btn_prev = document.getElementById("but_prev");
            btn_next.removeAttribute("disabled");
             start -=rowperpage;
             lastline-=rowperpage;
             if(start<=0){
                 start =0;
                 lastline = rowperpage-1;
                 btn_prev.setAttribute("disabled", true);
             }
              createTablerow(alldata, lastline, start);
        });
     //END ACTION PREVIOUS BUTTON
     //
   $("#div_pagination").on('click','.page',function(){
       var page = $(this).data('value');
       var firstrow =page;
       var lastrow = page+rowperpage-1;
       if (page+rowperpage-1>=alldata.length){
           lastrow =alldata.length;    
       }
        createTablerow(alldata, lastrow, firstrow);
   });
//FUNCTION TO CREATE TABLE BODY            
function createTablerow(data, perpage,start){
     $("#tbody tr").remove();
        for(var i=start; i<=perpage; i++){
                var catid = data[i]['id'];
                var catname = data[i]['name'];
                $("#tbody").append("<tr><td>"+catid+"</td><td>"+catname+"</td><td style='width: 150px; text-align: center'><span class='glyphicon glyphicon-edit edit' title='Edit' data-edit='"+catid+"'></span>&nbsp;<span class='glyphicon glyphicon-trash del'title='Delete' data-del='"+catid+"'></span></td></tr>");
            }
        }
        
 //FUNCTION TO CREATE PAGE NUMBER
 function createPageNumber(rowperpage,tablelength){
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
});