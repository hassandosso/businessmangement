<div class="chartContent form-inline"> 
<span class="btn btn-primary btnchart form-control" data-content="flow">Sales Chart</span>
    <span class="btn btn-primary btnchart form-control" data-content="billing">Gain Chart</span>
    <select class="form-control itemchart">
                    <option value="???">Select item and get monthly sales</option>
                    <?php
                        $table = $_SESSION['user']."_billing";
                        $table1 = $_SESSION['user']."_stock";
                        $select_item = "SELECT DISTINCT item_name FROM ".$table;
                        $resultselect = mysqli_query($conn, $select_item);
                        while($getdata = mysqli_fetch_array($resultselect)){
                    ?>
                    <option value="<?php echo $getdata['item_name'];?>"><?php echo $getdata['item_name'];?></option>
                    <?php  }?>
    </select>
</div>
<div> 
    <!--Div that will hold the dashboard-->
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="chart_div"></div>
      <div id="tooltips"></div>
       
    </div>
    <div class="mydivbar hidden" style=" margin-top: 15px;">
<!--    revenue-->
    <div class="panel panel-info" style="width: 30%; display: inline-block">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-inr fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="hugesold">26</div>
                <div class="itemName">New Comments!</div>
            </div>
        </div>
    </div>
        <div class="panel-footer" style="height: 50px">
            <div class="text-info">
                <p style="display: inline">Stock id:</p>
                <p  style="display: inline; text-align: right">0001</p><br>
                <p style="display: inline">Stock entry date:</p>
                <p style="display: inline">6/11/2018</p>
            </div>
        </div>
    </div>
<!--info item-->
<div class="panel panel-primary" style="width: 30%; display: inline-block">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-calculator fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge">26</div>
                <div class="itemName">New Comments!</div>
            </div>
        </div>
    </div>
        <div class="panel-footer" style="height: 40px">
            <div class="progress">
                <div class="progress-bar progress-bar-striped mybar" role="progressbar" style="width: 0%">0</div>
            </div>
        </div>
    </div>
    
    </div>
    <!--<div style="width: 1000px; height: 500px;">-->
     <div id="chartcol" style="width: 50%; height: 500px; display: inline-block" ></div>
    <div id="chartLine" style="position: relative; display: inline-block;"></div>
  
    <!--</div>-->   
    
</div>

