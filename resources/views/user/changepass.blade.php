<h1>Change Password</h1>
<form action="/changepassword" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{Auth::user()->id}}"><br>
    <input type="password" name="OldPassword" ><br>
    <input type="password" name="NewPassword" ><br>
    <input type="password" name="ConfirmPassword" ><br>
    <button type="submit">Update</button>
    </form>