<h1>Update Distributor</h1>
<form action="/editdist1" method="POST">
@csrf
   <?php 
   // dd($data);
   ?>
    <input type="hidden" name="id" value="{{$data->id}}"><br>
    <input type="text" name="username" value="{{$data->username}}"><br>
    <input type="text" name="email" value="{{$data->email}}"><br>
    <input type="text" name="address" value="{{$data->address}}"><br>
    <input type="text" name="contact" value="{{$data->contact}}"><br>
    
    <button type="submit">Update</button>
    </form>