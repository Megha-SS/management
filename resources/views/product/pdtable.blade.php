<h1>Product List</h1>


<table border="1">
<tr>
          <td>Id</td>
          <td>ProductName</td>
          <td>ProductDescription</td>
        
        
         
         
</tr>
@foreach ($products as $item)
<tr>
            <td>{{$item['id']}}</td>
          <td>{{$item['productname']}}</td>
          <td>{{$item['productdescription']}}</td>
         
         
        
         <td><a href ={{"deletepdt/".$item['id']}}>Delete</a></td>
         <td><a href ={{"editpdt/".$item['id']}}>Edit</a></td>
         
</tr>
@endforeach
@if(session()->has('message'))
         <div class="alert alert-success">
         {{session()->get('message')}}
         
         </div>
         @endif
</table>