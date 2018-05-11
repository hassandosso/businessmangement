<div class="modal-content">
    <span class="close1">&times;</span>
    <div class="btn-floating btn-large blue waves-effect waves-light" style="float: right; top: 45px; right: 24px;" >
        <span class="large material-icons" id="addrow" style="text-align: center;" title="add item">add</span>
</div>
<div id="invoice">
	<div id="header">
                <div id="address" class="span-12" style="float: left; width: 35%;">
                    <strong><input id="company" value="<?php echo $company;?>" readonly="readonly"></strong>
			<input class="ll" value="123 Your Street">
			<input class="ll" value="Your Town">
			<input class="ll" value="Address Line 3">	
                        <strong><input class="ll" value="<?php echo $mobile;?>" readonly="readonly"></strong>
                        <strong><input style="margin-bottom:30px;" class="ll" value="<?php echo $email;?>" readonly="readonly"></strong>
                </div>
                <div id="meta" class="span-12 last" style="float: right; width: 35%;">
                    <strong><input id="title" class="span-12 last rr" value="INVOICE" readonly="readonly"></strong>
                    <strong><input id="date" class="rr" value="<?php echo date("Y/m/d");?>" readonly="readonly"></strong>
                    
                    <strong><input class="code" value="<?php echo $code;?>" readonly="readonly"></strong>
<!--			<input class="rr" value="PO 456001200">-->
                        <input style="margin-top:20px;" class="client rr" placeholder="customer name">
                        <input style="margin-bottom:30px;" class="client rr" placeholder="customer company name">
		</div>
	</div>
	
	<hr>
	<table class='table table-striped table-bordered'>
	<thead>
	<tr>
        <th style="width: 5%;">No</th>
    	<th style="width: 70%;">Designation</th>
    	<th style="width: 5%;">Qt.</th>
    	<th style="width: 7%;">U.price</th>
        <th style="width: 5%;">Disc.(%)</th>
    	<th style="width: 8%;">Total(Rs)</th>
	</tr>
	</thead>
        <tbody id="billtable">
	
	</tbody>	
	<tfoot id="footer">
            <tr>
                <th colspan="5">Subtotal</th>
                <th><input value="0.0" class="subtotal"></th>
            </tr>
            <tr>
                <th colspan="4">Tax (%)</th>
                <th><input value="0" class="tax"></th>
                <th><input value="0.0" class="totaltax"></th>
            </tr>
                <tr id="total">
                <th id="totallabel" colspan="5" class="span-20">Total</th>
                <th id="formtotal" class="span-4 noteditable"><input value="0.0" class="total"></th>
            </tr>	
	</tfoot>												
	</table>
       
</div>
    <button id="printable"><i class="glyphicon glyphicon-print"></i>print bill</button>
</div>