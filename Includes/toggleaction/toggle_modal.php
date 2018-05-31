<div class="modal-dialog" role="document">   
    <div class="form-group modal-content">
        <div class="modal-header">
            <span class="toggleModal">&times;</span>
            <h3 class="modal-title text-primary text-left">Additional action</h3>
            <div id="message"></div>
        </div>
        <div class="modal-body">
            <form method="post" class="codebill">
                <div class="form-inline">
                    <h3 class="card-title text-primary text-center">Add bill code</h3>
                    <label>Start</label>
                    <input type="number" class="code_start form-control">
                    <label>End</label>
                    <input type="number" class="code_end form-control">
                </div>
                <span class="billcode btn btn-primary">Submit</span>
            </form>
            
            <form method="post" class="customer">
                <div class="form-inline">
                    <h3 class="card-title text-primary text-center">add customer info</h3>
                    <label>Name</label>
                    <input type="text" name="customer_name" class="customer_name form-control" required="required">
                    <label>Contact</label>
                    <input type="number" name="customer_contact" class="contact form-control" required="required">
                    <label>Email</label>
                    <input type="email" name="customer_email" class="contact form-control">
                    <label>Address/Company</label>
                    <input type="text" name="customer_address" class="address form-control">
                </div>
                <button type="submit" name="customer" class="customerbtn btn btn-primary">Submit</button>
            </form>
        </div>
    </div> 
</div>
