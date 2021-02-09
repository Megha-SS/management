<h1>Reducestock</h1>
<form action="/reducestock" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$shopid}}"><br>
    
    <input type="text" name="stock" value=""><br>
    <button type="submit">Update</button>
    </form>