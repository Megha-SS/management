<h1>Update Shop</h1>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}"><br>
    <input type="text" name="ShopName" value="{{$data->shopname}}"><br>
    <input type="text" name="Email" value="{{$data->email}}"><br>
    <input type="text" name="Address" value="{{$data->address}}"><br>
    <input type="text" name="StaffName" value="{{$data->staffname}}"><br>
    <button type="submit">Update</button>
    </form>