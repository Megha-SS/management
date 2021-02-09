<h1>Edit Purchase</h1>
<form action="/editpurchase" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}"><br>
    <input type="text" name="productid" value="{{$data['productid']}}"><br>
    <input type="text" name="productquantity" value="{{$data['productquantity']}}"><br>
    <input type="text" name="productprice" value="{{$data['productprice']}}"><br>
    <input type="text" name="shopid" value="{{$data['shop_id']}}"><br>
    <input type="text" name="staffid" value="{{$data['staff_id']}}"><br>
    <button type="submit">Update</button>
    </form>