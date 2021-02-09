<h1>User List</h1>


<table border="1">
<tr>
          <td>Id</td>
          <td>Username</td>
          <td>Email</td>
         <td>Address</td>
         <td>Contact</td>
         <td>Role</td>
         
</tr>
@foreach ($users as $item)
<tr>
            <td>{{$item['id']}}</td>
          <td>{{$item['username']}}</td>
          <td>{{$item['email']}}</td>
         <td>{{$item['address']}}</td>
         <td>{{$item['contact']}}</td>
         <td>{{$item['role']}}</td>
        
         <td><a href ={{"deleteuser/".$item['id']}}>Delete</a></td>
         <td><a href ={{"edituser/".$item['id']}}>Edit</a></td>
</tr>
@endforeach
@if(session()->has('message'))
         <div class="alert alert-success">
         {{session()->get('message')}}
         
         </div>
         @endif
</table>

     