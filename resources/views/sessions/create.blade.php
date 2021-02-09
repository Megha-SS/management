<h2>Login</h2>
    <form method="POST" action="/loginpost">
   @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
    
        <div class="form-group">
       
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        
        
 
        <div class="form-group"> <a href="/login"></a>
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <p>Don't  have an account? <a href="/register">Register</a>.</p>
    </form>