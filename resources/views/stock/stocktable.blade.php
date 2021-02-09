<h1>stock List</h1>


<table border="1">
<tr>      
           <td>Id</td>
          <td>ProductId</td>
          <td>Productquantity</td>
        
         
         
</tr>
@foreach ($stocks as $item)
<tr>
             <td>{{$item['id']}}</td>
            <td>{{$item['productid']}}</td>
          <td>{{$item['productquantity']}}</td>
         
         
        
         <td><a href ={{"deletestock/".$item['id']}}>Delete</a></td>
         <td><a href ={{"editstock/".$item['id']}}>Edit</a></td>
</tr>
@endforeach
</table>