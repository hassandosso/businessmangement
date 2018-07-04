<div class="modal-dialog" role="document">   
    <div class="form-group modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h3 class="modal-title text-primary text-left">Sign up / Sign in</h3>
            <div id="message"></div>
        </div>
        <form id="sign_in" method="post" action="">
            <h3 class="card-title text-primary text-center">Sign In</h3>
                    <div class="form-inline">
                      <input type="radio" name="useroption" class="form-control radio" value="admin" checked="checked">Admin
                      <input type="radio" name="useroption" class="form-control radio" value="subuser">Sub-user
                    </div>
                    <div class="input-group user" id="useradmin">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="username" class="form-control p_input" placeholder="Admin">
                  
                    </div>
                    <div class="input-group" id="subusername">
                  
                    </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="password" class="form-control p_input" placeholder="Password">
                  </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div><br>
                    <ul class="">
                        <li><a href="#" id="newaccount">Create new account</a></li>
                        <li class="text-right"><a href="#" id="forgotPassword">Forgot Password?</a></li>
                    </ul>
        </form>
        <form id="registration" method="post" class="">
                    <h3 class="card-title text-primary text-left mb-5 mt-4">Sign up</h3>
                     <div id="error"></div>
                    <div class="form-group">
                        <label>Full name:</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" required="required">
                        <label>Username:</label>
                        <input type="text" name="username" class="form-control" id="username" required="required">
                        <label>Company:</label>
                        <input type="text" name="company" class="form-control" id="company" required="required">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" id="email" required="required">
                        <label>Mobile number (ex. 00 country_code number):</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" required="required">
                        <label>Phone number:</label>
                        <input type="number" name="phone" class="form-control" id="phone" minlength="8" maxlength="14">
                        <label>Enter Password:</label>
                        <input type="password" name="password" class="form-control" id="password" required="required">
                        <label>Confirm password:</label>
                        <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" required="required">
                         <label>Town:</label>
                        <input type="text" name="town" class="form-control" id="town">
                         <label>Address:</label>
                        <input type="text" name="address" class="form-control" id="address">
                         <label>Street:</label>
                        <input type="text" name="street" class="form-control" id="street">
                    </div>  
                <div class="text-center form-inline">
                  <input type="submit" name="save" class=" form-control btn btn-primary" value="Sign up" id="btn-submit">
                  <input type="reset" class="form-control btn btn-primary" value="Reset">
                </div>
                       <ul>
                        <li><a href="#" id="alreadyuser">Already user</a></li>  
                    </ul>            
        </form>
        <form id="getForgotPassword" method="post">
            <h3 class="card-title text-primary text-left mb-5 mt-4">Forgot password</h3>
            <label>Enter Registered Email:</label>
            <input type="email" name="forgot_email" class="form-control" required="required">
            <button type="submit" class="btn btn-primary" name="forgot">Send</button>
        </form>
    </div>
</div>