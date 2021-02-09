<h2>Add Staff</h2>
    <form method="POST" action="/addstaff">
    
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact">
        </div>
        <div class="form-group">
            <label for="contact">DistributorName:</label>
            <input type="text" class="form-control" id="distributorname" name="distributorname">
        </div>
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
    <p>Already have an account? <a href="/login">Login</a>.</p>
  </div>
    </form>