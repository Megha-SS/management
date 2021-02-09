<h2>Add stock</h2>
    <form method="POST" action="/addstock">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">ProductId:</label>
            <input type="text" class="form-control" id="productid" name="productid">
        </div>
 
        <div class="form-group">
            <label for="email">ProductQuantity:</label>
            <input type="text" class="form-control" id="productquantity" name="productquantity">
        </div>
 
       

       <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
    
  </div>
    </form>