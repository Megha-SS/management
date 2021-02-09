<h1>ForgetPassword</h1>
<form action="/forgetpassword" method="POST">
    @csrf
    
    
    <input type="hidden" name="email"value="{{$data['email']}}" ><br>
    <input type="hidden" name="Password" ><br>
    <input type="hidden" name="NewPassword" ><br>
    <input hidden name="token" placeholder="token" value="{{request()->get('token')}}">
    
    <button type="submit">Update</button>
    </form>