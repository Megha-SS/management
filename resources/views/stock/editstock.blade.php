<h1>Update Stock</h1>
<form action="/editstock" method="POST">
    @csrf
    <input type="hidden" name="Id" value="{{$data['id']}}"><br>
    
    <input type="text" name="ProductId" value="{{$data['productid']}}"><br>
    <input type="text" name="Productquantity" value="{{$data['productquantity']}}"><br>
    <button type="submit">Update</button>
    </form>