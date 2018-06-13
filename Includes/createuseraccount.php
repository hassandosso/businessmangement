<div class="modal-dialog" role="document">   
    <div class="form-group modal-content">
        <div class="modal-header">
            <span class="close4">&times;</span>
            <h3 class="modal-title text-primary text-left">Additional action</h3>
        </div>
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label>Complete name</label>
                    <input type="text" name="fullname" class="form-control" required="required">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required="required">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required="required">
                    <label>Confirm password</label>
                    <input type="password" name="confirmpassword" class="form-control" required="required">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="0">Select role</option>
                        <option value="admin">Admin</option>
                         <option value="cashier">cashier</option>
                          <option value="simple">Simple user</option>
                    </select>
                </div>
                <button type="submit" name="saveuser" class=" form-control btn btn-primary">Submit</button>
            </form>
        </div>
    </div> 
</div>
