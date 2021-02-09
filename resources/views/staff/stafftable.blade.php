<h1>Staffs List</h1>


<table border="1">
<tr>
          <td>Id</td>
          
          <td>UserName</td>
          <td>DistributorName</td>
        
        
         
         
</tr>
@foreach ($staffs as $item)
<tr>
            <td>{{$item['id']}}</td>
            
            <td>{{$item['username']}}</td>
          <td>{{$item['distributorname']}}</td>
         
         
         
        
         <td><a href ={{"assigndist/".$item['id']}}>assign Distributor</a></td>
         <td><a href ={{"editstaff/".$item['id']}}>Edit</a></td>
         <td><a href ={{"deletestaff/".$item['id']}}>Delete</a></td>
</tr>
@endforeach
@if(session()->has('message'))
         <div class="alert alert-success">
         {{session()->get('message')}}
         
         </div>
         @endif
</table>