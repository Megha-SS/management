<h2>ForgetPassword</h2>
    <form method="POST" action="/forgetpasswordform">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
 
     <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
    
  </div>
    </form>