<h1>Distributors List</h1>


<table border="1">
<tr>
          <td>Id</td>
          <td>UserName</td>
        
         
         
</tr>
@foreach ($distributors as $item)
<tr>
            <td>{{$item['id']}}</td>
          <td>{{$item['username']}}</td>
         
         
        
         <td><a href ={{"deletedist/".$item['id']}}>Delete</a></td>
         <td><a href ={{"editdist/".$item['id']}}>Edit</a></td>
</tr>
@endforeach
@if(session()->has('message'))
         <div class="alert alert-success">
         {{session()->get('message')}}
         
         </div>
         @endif
</table>