<h2>Add Shop</h2>
    <form method="POST" action="/shopadd">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">ShopName:</label>
            <input type="text" class="form-control" id="shopname" name="shopname">
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
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
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock">
        </div> 
        <div class="form-group">
            <label for="stock">StaffName:</label>
            <input type="text" class="form-control" id="staffname" name="staffname">
        </div>

        
        
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
       
    
  </div>
 
    </form>
    