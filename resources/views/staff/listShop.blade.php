<h1>Shop list</h1>


<table border=1>
   <tr>
     <td>Id</td>
     <td>ShopName</td>
     <td>Email</td>
     <td>Address</td>
     <td>Contact</td>
     <td>StaffName</td>
     <td>Stock</td>
     </tr>
             

     @foreach($shops as $shop)
     <tr>
              <td>{{$shop['id']}}</td>
              <td>{{$shop['shopname']}}</td>
              <td>{{$shop['email']}}</td>
              <td>{{$shop['address']}}</td>
                <td>{{$shop['contact']}}</td>
              <td>{{$shop['staffname']}}</td> 
              <td>{{$shop['stock']}}</td> 

              <td><a href ={{"assignstaff/".$shop['id']}}>Assign Staff</a></td>
              
         <td><a href ={{"edit/".$shop['id']}}>Edit</a></td>
         <td><a href ={{"delete/".$shop['id']}}>Delete</a></td>
        
     </tr>
      @endforeach
      @if(session()->has('message'))
         <div class="alert alert-success">
         {{session()->get('message')}}
         
         </div>
         @endif

     </table> 
     
     
