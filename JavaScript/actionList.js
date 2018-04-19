var btn_prev = document.getElementById("but_prev");
var btn_next = document.getElementById("but_next");
var rowperpage = 10;
var lastline = rowperpage-1;
var alldata;
var start = 0;
$("#catlist").click(function(){
    
    S.ajax({
        url:'Includes/CategoryList.php',
            type:'post',
            data:"",
            dataType:'json',
            success:function(response){
               alldata = response;
                createTablerow(alldata, lastline, start);
            }
    });
});
$("#but_next").click(function(){
//            var rowid = Number($("#txt_rowid").val());
//            var allcount = Number($("#txt_allcount").val());
               start +=rowperpage;
               lastline+=rowperpage;
//            rowid += rowperpage;
            if(lastline == alldata.length){
                btn_next.setAttribute("disabled", true);
//                $("#txt_rowid").val(rowid);
            }
            createTablerow(alldata, lastline, start);
            });
     $("#but_prev").click(function(){
//            btn_next.removeAttribute("disabled");
             start -=rowperpage;
             lastline-=rowperpage;
              createTablerow(alldata, lastline, start);
        });
            
function createTablerow(var data, var perpage, var start){

//        var dataLen = data.length;

//        $("#emp_table tr:not(:first)").remove();

        for(var i=start; i<perpage; i++){
            
                var catid = data[i]['id'];
                var catname = data[i]['name'];

                $("#emp_table").append("<tr><td>"+catid+"</td><td>"+catname+"</td>\n\
                <td><a class='edit' href='"+catid+"'><span class='glyphicon glyphicon-edit'>&nbsp;\n\
                </a><a class='del'  href='"+catid"'><span class='glyphicon glyphicon-trash'></a></td></tr>");
            }
        }