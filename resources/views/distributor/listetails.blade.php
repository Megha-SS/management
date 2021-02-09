<h1>Distributors List</h1>


<table border="1">
<tr>
          <td>Id</td>
          <td>UserName</td>
          <td>Email</td>
          <td>Password</td>
          <td>Address</td>
          <td>Contact</td>
         
          

        
          
         
</tr>
@foreach ($distributors as $item)
<tr>

            <td>{{$item->id}}</td>
          <td>{{$item->username}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->password}}</td>
          <td>{{$item->address}}</td>
          <td>{{$item->contact}}</td>
          
         
         
         
          <td><a href ="/deletedist/{{$item->id}}">Delete</a></td>
          <td><a href ={{"editdist1/".$item->id}}>Edit</a></td>
        
     
</tr>
@endforeach
@if(session()->has('message'))
         <div class="alert alert-success">
         {{session()->get('message')}}
         
         </div>
         @endif
</table>