<h2>Add Distributor</h2>
    <form method="POST" action="/addproduct">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">ProductId:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
 
        <div class="form-group">
            <label for="email">SellingPrice:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
    
  </div>
    </form>