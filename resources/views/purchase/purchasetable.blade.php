<h1>Purchase List</h1>


<table border="1">
<tr>
          <td>Id</td>
          <td>ProductId</td>
          <td>ProductQuantity</td>
          <td>ProductPrice</td>
          <td>ShopId</td>
          <td>StaffId</td>


        
         
         
</tr>
@foreach ($purchases as $item)
<tr>
            <td>{{$item['id']}}</td>
          <td>{{$item['productid']}}</td>
          <td>{{$item['productquantity']}}</td>
          <td>{{$item['productprice']}}</td>

         <td>{{$item['shop_id']}}</td>
          <td>{{$item['staff_id']}}</td>
         
        
         <td><a href ={{"deletepurchase/".$item['id']}}>Delete</a></td>
         <td><a href ={{"editpurchase/".$item['id']}}>Edit</a></td>
</tr>
@endforeach
</table>