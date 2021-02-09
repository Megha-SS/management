<div id="updatestock"> 
          <h2>Add Stock</h2>

    

        <div class="form-group">
            <label for="name">ShopName:</label>
            <!-- <input type="text" class="form-control" id="shopname" name="shopname"> -->
            
             <select name="shop" id="shopname">
             
         @foreach($shoplist as $shop)
            
             <option value="{{$shop->id}}">{{$shop->shopname}}</option>
             
             @endforeach
             </select>
        </div>
 
       
     <div class="form-group">
            <button style="cursor:pointer" id="Incrementstock" class="btn btn-primary">IncrementStock</button>
        </div>
        <div class="form-group">
            <button style="cursor:pointer" id="reducestock" class="btn btn-primary">ReduceStock</button>
        </div>
        <div class="container signin">
    
  </div>
    
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#Incrementstock").click(function(){
var shop=$("#shopname").val();

$.ajax({  //create an ajax request to display.php
          type: "GET",
          url: "Incrementstock/" + shop,       
          success: function (data) {
            console.log(data);
            var value=`<h1>Updatestock</h1>
<form action="Incrementstock" method="POST">
    @csrf
    <input type="hidden" name="id" value="`+data.data+`"><br>
    
    <input type="text" name="stock" value=""><br>
    <button type="submit">Update</button>
    </form>`;

    $('#updatestock').html(value);

          }
        });
      });
      
    $("#reducestock").click(function(){
var shop=$("#shopname").val();

$.ajax({  //create an ajax request to display.php
          type: "GET",
          url: "reducestock/" + shop,       
          success: function (data) {
            console.log(data);
            var value=`<h1>Reducestock</h1>
<form action="/reducestock" method="POST">
    @csrf
    <input type="hidden" name="id" value="`+data.data+`"><br>
    
    <input type="text" name="stock" value=""><br>
    <button type="submit">Update</button>
    </form>`;

    $('#updatestock').html(value);

          }
        });
       
        
       
  }); 
  


});
</script>