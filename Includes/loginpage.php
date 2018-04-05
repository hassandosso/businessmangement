<form id="sign_in" method="post" action="">
                  <div class="form-group modal-content">
                      <span class="close">&times;</span>
                    <h3 class="card-title text-primary text-left mb-5 mt-4">Login</h3>  
                    <div class="input-group user">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="username" class="form-control p_input" placeholder="Username">
                  
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
                    </ul>
                  </div>
</form>

<form id="registration" method="post" class="">
                  <div class="modal-content">
                      <span class="close01">&times;</span>
                    <h3 class="card-title text-primary text-left mb-5 mt-4">Sign up</h3>
                     <h3 id="error"></h3>
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control" placeholder="Full name">
                        <input type="text" name="username" class="form-control" placeholder="Username" >
                        <input type="text" name="company" class="form-control" placeholder="company name">
                        <input type="email" name="email" class="form-control" placeholder="Enter a valid email">
                        <input type="text" name="mobile" class="form-control" placeholder="mobile number (ex. +country_code number)">
                        <input type="text" name="phone" class="form-control" placeholder="Phone number">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password">
                    </div>  
                <div class="text-center form-inline">
                  <input type="submit" name="save" class=" form-control btn btn-primary" value="Sign up" id="btn-submit">
                  <input type="reset" class="form-control btn btn-primary" value="Reset">
                </div>
                       <ul>
                        <li><a href="#" id="alreadyuser">Already user</a></li>  
                    </ul>
                        
                  </div>
</form>