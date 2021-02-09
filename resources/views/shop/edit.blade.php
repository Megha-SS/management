<h1>update Staff</h1>
<form action="/assignstaff" method="POST">
    @csrf
    <input type="hidden" name="Id" value="{{$data['id']}}"><br>
    <input type="text" name="StaffName" value="{{$data['staffname']}}"><br>
    <button type="submit">Update</button>
    </form>