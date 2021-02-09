<h1>Updatestock</h1>
<form action="/Incrementstock" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$shopid}}"><br>
    
    <input type="text" name="stock" value=""><br>
    <button type="submit">Update</button>
    </form>