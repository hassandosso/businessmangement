$(document).ready(function(){
    
   // Pivot array function
   function getPivotArray(dataArray, rowIndex, colIndex, dataIndex) {
           var result = {}, ret = [];
           var newCols = [];
           for (var i = 0; i < dataArray.length; i++) {
 
               if (!result[dataArray[i][rowIndex]]) {
                   result[dataArray[i][rowIndex]] = {};
               }
               result[dataArray[i][rowIndex]][dataArray[i][colIndex]] = dataArray[i][dataIndex];
 
               //To get column names
               if (newCols.indexOf(dataArray[i][colIndex]) === -1) {
                   newCols.push(dataArray[i][colIndex]);
               }
           }
 
           newCols.sort();
           var item = [];
 
           //Add Header Row
           item.push('Month');
           item.push.apply(item, newCols);
           ret.push(item);
 
           //Add content 
           for (var key in result) {
               item = [];
               item.push(key);
               for (var i = 0; i < newCols.length; i++) {
                   item.push(result[key][newCols[i]] || 0);
               }
               ret.push(item);
           }
           return ret;
       }
    //Pie chart function   
   function drawDashboard(pieData) {
      var data = new google.visualization.arrayToDataTable(pieData);
      var dashboard = new google.visualization.Dashboard(
          document.getElementById('dashboard_div'));

  // Create a range slider, passing some options
    var donutRangeSlider = new google.visualization.ControlWrapper({
      'controlType': 'NumberRangeFilter',
      'containerId': 'filter_div',
      'options': {
        'filterColumnLabel': 'Count'
      }
    });
    // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': 700,
            'height': 300,
            'pieSliceText': 'value',
            'legend': 'right',
            'title':'sales statistic',
            'is3D': true
          }
        });
        dashboard.bind(donutRangeSlider, pieChart);

        // Draw the dashboard.
        dashboard.draw(data);
        } 
   
   //bar chart function
   
  function drawChart(myData) {
         var myarr = getPivotArray(myData,0,1,2);   
        var dataTable = new google.visualization.arrayToDataTable(myarr);
        var options = {
          title : 'items sold by month',
          vAxis: {title: 'Count'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };
        var chart = new google.visualization.ComboChart(document.getElementById('tooltips'));
        chart.draw(dataTable, options);
      }  
  //Line chart function
   function drawLine(myData) {
          
         var myarr = getPivotArray(myData,0,1,2); 
          console.log(myarr);
        var dataTable = new google.visualization.arrayToDataTable(myarr);
    var options = {
        chart: {
          title: 'Monthly sales by item',
          subtitle: 'in term of Quantity'
        },
        width: 600,
        height: 500
      };
        var chart = new google.charts.Line(document.getElementById('chartLine'));
        chart.draw(dataTable, google.charts.Line.convertOptions(options));
      }
 
 //column chart function
 function columnChart(colData, item='Sales details (Rs)') {
        var data = google.visualization.arrayToDataTable(colData)
        var options = {
          chart: {
            title: item,
            subtitle: `Sold, discounts, and Taxes: current year`,
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chartcol'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

   
   function initialize(){
       // bar and pie chart
    $(".btnchart").on('click',function(){
//        $("#dashboard_div").removeClass('hidden');
        $(".mydivbar").addClass('hidden');
        $("#chartcol").addClass('hidden');
        $("#chartLine").addClass('hidden');
          var valueForChart = $(this).data('content');
            
         $.ajax({
    url:'Includes/charts.php',
    type:'post',
    data:{db: valueForChart},
    dataType:'json',
    success:function(value){
if(valueForChart==='flow'){
    $("#dashboard_div").removeClass('hidden');
     $("#chartcol").addClass('hidden');
    var pieData = [];
    for(var i =0; i<value.length; i++){
        value[i][2] = parseInt(value[i][2]);
        pieData.push([value[i][1], value[i][2], value[i][0]]);
       
    }  
    var barData = value;
  pieData.unshift(['Product','Count','Month']) ;
   drawDashboard(pieData);
   drawChart(barData);
}else if(valueForChart==='billing'){
    $("#chartcol").removeClass('hidden');
    $("#dashboard_div").addClass('hidden');
    var colData = value;
    colData.unshift(['month','sold','discounts','taxes','Total gain']) ;
    for(var i =1; i<colData.length; i++){
        colData[i][1] = parseInt(colData[i][1]);
        colData[i][2] = parseInt(colData[i][2])/100 * parseInt(colData[i][1]);
        colData[i][3] = parseInt(colData[i][3])/100 * parseInt(colData[i][1]);
       colData[i][4] = colData[i][1] + colData[i][2] + colData[i][3];
    }  
    
    console.log(colData);
    columnChart(colData);
}
      },
      error:function(error){
         console.log(error);
      }
     });
    });
    
       //Line charts
    $(".itemchart").on('change',function(){
        $(".mydivbar").removeClass('hidden');
        $("#chartLine").removeClass('hidden');
        $("#dashboard_div").addClass('hidden');
        //$("#progressBar").removeClass('hidden');
        var itemName = $(".itemchart").val();
        let mysold =0;
        $(".itemName").text(itemName);
        if(itemName==='???'){
            $(".mybar").width('100%');
            $(".mybar").text('No item selected!!');
            $(".huge").text(0)
        }
        $.ajax({
            url:'Includes/charts_economic.php',
            type:'post',
            data:{item: itemName},
            dataType:'json',
            success:function(myvalue){
            //draw line
                var value =myvalue[0];
                var date = value[0][0].split('/');
                date[1] = parseInt(date[1])-1;
                value.unshift([date[0]+'/'+date[1],value[0][1],0]) ;
            for(var i =0; i<value.length; i++){
                value[i][2] = parseFloat(value[i][2]);
            }  
                var barData = value;
                drawLine(barData);
           //draw column 
            var colData = myvalue[1];
            
    colData.unshift(['month','sold','discounts','taxes','Total gain']) ;
    for(var i =1; i<colData.length; i++){
        colData[i][1] = parseFloat(colData[i][1]);
        colData[i][2] = parseFloat(colData[i][2])/100 * parseFloat(colData[i][1]);
        colData[i][3] = parseFloat(colData[i][3])/100 * parseFloat(colData[i][1]);
       colData[i][4] = colData[i][1] + colData[i][2] + colData[i][3];
       mysold += (colData[i][4]);
    }  
    var secondArg = `${itemName} sale's details (Rs)`;
    columnChart(colData,secondArg);
    // Indicators info
  
        var infoIndicator = myvalue[2];
        $(".huge").text(infoIndicator[0][1]);
         $(".hugesold").text(mysold.toFixed(3));
        var barWidth = parseInt((parseInt(infoIndicator[0][1])/parseInt(infoIndicator[0][0])) * 100);
        $(".mybar").width(barWidth+'%');
        $(".mybar").text(barWidth+'%');
        var mybarStyle = document.getElementsByClassName('mybar')[0];
        if(barWidth>=50){
           mybarStyle.style.background = '#007E33';
        }else if(barWidth>=30){
            mybarStyle.style.background = '#00C851';
        }else if(barWidth>=11){
            mybarStyle.style.background = '#ff4444';
        }else{
            mybarStyle.style.background = '#CC0000';
        }
    
    
        },
        error:function(error){
            console.log(error);
        }
        });
    });
   }
    google.charts.load('current', {'packages':['corechart', 'controls']});
    google.charts.load('current', {'packages':['line']});
    google.charts.load('current', {'packages':['bar']});

   google.charts.setOnLoadCallback(initialize);
    
});