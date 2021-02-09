
<h1>Add Product</h1>
<form action="/addproduct" method="POST">
    @csrf
    
    <input type="text" name="productname" placeholder="Product Name"><br>
    <input type="text" name="productdescription" placeholder="Product Description" ><br>
    
    <button type="submit">Add </button>
    </form>