<h2>Add Purchase</h2>
    <form method="POST" action="/addpurchase">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="productid">ProductId:</label>
            <input type="text" class="form-control" id="productid" name="productid">
        </div>
 
        <div class="form-group">
            <label for="productquantity">ProductQuantity:</label>
            <input type="text" class="form-control" id="productquantity" name="productquantity">
        </div>
 
        <div class="form-group">
            <label for="productprice">ProductPrice:</label>
            <input type="text" class="form-control" id="productprice" name="productprice">
        </div>

        <div class="form-group">
            <label for="shop_id">ShopId:</label>
            <input type="text" class="form-control" id="shop_id" name="shop_id">
        </div>
        <div class="form-group">
            <label for="staff_id">StaffId:</label>
            <input type="text" class="form-control" id="staff_id" name="staff_id">
        </div>
       
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container signin">
  
  </div>
    </form>