<h1>Update Distributor</h1>
<form action="/editdist" method="POST">
    @csrf


    <input type="hidden" name="id" value="{{$data->id}}"><br>
    <input type="text" name="username" value="{{$data->username}}"><br>
    <button type="submit">Update</button>
    </form>