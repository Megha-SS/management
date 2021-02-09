<h2>Enter Email</h2>
    <form method="POST" action="{{ url('/reset_password_without_token') }}">
        {{ csrf_field() }}

       
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
 
       
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
   
  </div>
    </form>