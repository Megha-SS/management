<h1>Staff List</h1>


<table border="1">
<tr>
          <td>Id</td>
         
          <td>UserName</td>
          <td>Email</td>
          <td>Password</td>
          <td>Address</td>
          <td>Contact</td>
         
          
          <td>DistributorName</td>

        
          
         
</tr>
@foreach ($staffs as $item)
<tr>

            <td>{{$item->user_id}}</td>
          <td>{{$item->username}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->password}}</td>
          <td>{{$item->address}}</td>
          <td>{{$item->contact}}</td>
         <td>{{$item->distributorname}}</td>

       
         <td><a href ={{"editstaff/".$item->user_id}}>Edit</a></td>
         <td><a href ={{"deletestaff/".$item->user_id}}>Delete</a></td>
     
</tr>
@endforeach
</table>