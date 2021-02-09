<h1>Assign Distributor</h1>
<form action="/assigndist" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}"><br>
    <input type="text" name="DistributorName" value="{{$data['distributorname']}}"><br>
    <button type="submit">Update</button>
    </form>