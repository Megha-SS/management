<h1>Update Product</h1>

<form action="/editpdt" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}"><br>
    <input type="text" name="ProductName" value="{{$data['productname']}}"><br>
    <input type="text" name="ProductDescription" value="{{$data['productdescription']}}"><br>
    <button type="submit">Update</button>
    </form>