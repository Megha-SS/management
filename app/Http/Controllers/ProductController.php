<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use DB;


class ProductController extends Controller
{
    public function template(){

        return view('product.create');
    }

    public function addProduct(Request $request){

        $data=[
            'productname' => $request->productname,
            'productdescription'=>$request->productdescription,
           'created_at'=>Carbon::now(),
            'status'=>1
        ];
       // $data->save();
        DB::table('products')->insert($data);
        return view('product.create');

    }

    public function show(){

        $data= Product::all();
        return view('product.pdtable',['products'=>$data]);
       
     }

     public function showPdtDetails($id){

        $data= Product::find($id);
   return view('product.editpdt',['data'=>$data]);

}

public function updatePdt(Request $req){

   // dd($req->all());

    $data=Product::find($req->id);
    $data->productname=$req->ProductName;
    $data->productdescription=$req->ProductDescription;
    $data->save();
    return redirect('lstaff')->with('message','succesfully updated');

}

public function delete(Request $request,$id){

    Product::where('id',$id)->delete();
    DB::table('products')->where('id',$id)->update(['status'=>0]);
    $request->session()->flash('message','Deleted successfully');
     return redirect('lstaff')->with('message','succesfully deleted');
}
 public function index(){
     
    return view('product.editpdt');
 }


 public function countProducts(){

    $count =  Product::where('status', '1')->count();
    print_r ($count);
 
 }

}
