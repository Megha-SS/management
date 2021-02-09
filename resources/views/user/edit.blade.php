<h1>Update Member</h1>
<form action="/edituser" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}"><br>
    <input type="text" name="username" value="{{$data['username']}}"><br>
    <input type="text" name="email"value="{{$data['email']}}" ><br>
    
    <input type="text" name="address"value="{{$data['address']}}"><br>
    <input type="text" name="contact"value="{{$data['contact']}}"><br>
    <input type="text" name="role"value="{{$data['role']}}"><br>
    <button type="submit">Update</button>
    </form>