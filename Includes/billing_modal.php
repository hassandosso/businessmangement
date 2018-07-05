<div class="modal-content animated slideInUp">
    <span class="close1">&times;</span>
    <a class="btn-floating btn-medium red waves-effect waves-light hidden del" style="float: right; top: 45px; right: 24px;" >
        <i class="medium material-icons" id="deleterow" style="text-align: center;" title="remove line">delete</i>
    </a>
    <a class="btn-floating btn-medium blue waves-effect waves-light" style="float: right; top: 45px; right: 24px;">
        <i class="medium material-icons" id="addrow" style="text-align: center;" title="add item">add</i>
    </a>
    
<div id="invoice">
	<div id="header">
                <div id="address" class="span-12" style="float: left; width: 35%;">
                    <strong><input id="company" value="<?php echo $company;?>" readonly="readonly"></strong>
			<input class="ll" value="<?php echo $street;?>">
			<input class="ll" value="<?php echo $town;?>">
			<input class="ll" value="<?php echo $address;?>">	
                        <strong><input class="ll" value="<?php echo $mobile;?>" readonly="readonly"></strong>
                        <strong><input style="margin-bottom:30px;" class="ll" value="<?php echo $email;?>" readonly="readonly"></strong>
                </div>
                <div id="meta" class="span-12 last" style="float: right; width: 35%;">
                    <strong><input id="title" class="span-12 last rr" value="INVOICE" readonly="readonly"></strong>
                    <strong><input id="date" class="rr" value="<?php echo date("Y/m/d");?>" readonly="readonly"></strong>
                    
                    <strong><input class="code" value="<?php echo $code;?>" readonly="readonly" required="required"></strong>
<!--			<input class="rr" value="PO 456001200">-->
                        <input style="margin-top:20px;" class="customer" placeholder="customer name">
                        <input style="margin-bottom:30px;" class="company" value="company name">
		</div>
	</div>
	
	<hr>
	<table class='table table-striped table-bordered'>
	<thead>
	<tr>
        <th style="width: 5%;">No</th>
    	<th style="width: 65%;">Designation</th>
    	<th style="width: 5%;">Qt.</th>
        <th style="width: 5%;">Tax</th>
    	<th style="width: 7%;">U.price</th>
        <th style="width: 5%;">Disc.(%)</th>
    	<th style="width: 8%;">Total(Rs)</th>
	</tr>
	</thead>
        <tbody id="billtable">
	
	</tbody>	
	<tfoot id="footer">
            <tr>
                <th colspan="6">Subtotal</th>
                <th><input value="0.0" class="subtotal" readonly="readonly"></th>
            </tr>
            <tr>
                <th colspan="5">Tax (%)</th>
                <th><input value="0" class="tax" readonly="readonly"></th>
                <th><input value="0.0" class="totaltax" readonly="readonly"></th>
            </tr>
                <tr id="total">
                <th colspan="6">Total</th>
                <th><input value="0.0" class="total" readonly="readonly"></th>
            </tr>	
	</tfoot>												
	</table>
       
</div>
    <button id="printable"><i class="glyphicon glyphicon-print"></i>print bill</button>
</div>