<h1>Update Staff</h1>
<form action= "/staffedit" method="POST">
    @csrf
    
    <input type="hidden" name="id" value="{{$data->id}}"><br>
    <input type="hidden" name="userid" value="{{$data->user_id}}"><br>
    <input type="text" name="UserName" value="{{$data->username}}"><br>
    <input type="text" name="Email" value="{{$data->email}}"><br>
    <input type="text" name="Address" value="{{$data->address}}"><br>
    <input type="text" name="Contact" value="{{$data->contact}}"><br>
    <input type="text" name="DistributorName" value="{{$data->username}}"><br>
    <button type="submit">Update</button>
    </form>