<h2>ForgetPassword</h2>

    <form method="POST" action="/reset_password_with_token">
        {{ csrf_field() }}
        
        <div class="form-group">
        <?php
     //dd($email);
        ?>
       
        <input type="hidden" name="email" value="{{$email}}"><br>
            <label for="name">NewPassword:</label>
            <input type="text" class="form-control" id="newpassword" name="newpassword">
        </div>
 
        <div class="form-group">
            <label for="name">ConfirmPassword:</label>
            <input type="text" class="form-control" id="confirmpassword" name="confirmpassword">
        </div>
        
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
    
  </div>
    </form>